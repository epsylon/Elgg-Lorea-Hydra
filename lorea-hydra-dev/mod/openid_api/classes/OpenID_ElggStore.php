<?php
/**
 * Uses Elgg data model to store OpenID associations
 *
 * Written to be compatible with the Elgg store written by Kevin Jardine for
 * the original OpenID client plugin.
 */
class OpenID_ElggStore extends Auth_OpenID_OpenIDStore {

	/**
	 * Store an association
	 *
	 * @param string                  $server_url  The identity server endpoint
	 * @param Auth_OpenID_Association $association The association to store.
	 */
	public function storeAssociation($server_url, $association) {

		$object = new ElggObject();
		$object->subtype = 'openid_client::association';
		$object->owner_guid = 0;
		$object->container_guid = 0;
		$object->title = 'association';
		$object->access_id = ACCESS_PUBLIC;
		$object->server_url = $server_url;
		$object->handle = $association->handle;
		$object->secret = base64_encode($association->secret);
		$object->issued = $association->issued;
		$object->lifetime = $association->lifetime;
		$object->expires = $object->issued + $object->lifetime;
		$object->assoc_type = $association->assoc_type;

		$object->save();
	}

	/**
	 * Get an association
	 * 
	 * @param string $server_url The identity server endpoint
	 * @param string $handle     The association handle
	 * @return Auth_OpenID_Association
	 */
	public function getAssociation($server_url, $handle = null) {

		$assocs = $this->getAssociations($server_url, $handle);
		if (!$assocs || count($assocs) == 0) {
			return null;
		} else {
			$associations = array();

			foreach ($assocs as $object) {
				$assoc = new Auth_OpenID_Association(
								$object->handle,
								base64_decode($object->secret),
								$object->issued,
								$object->lifetime,
								$object->assoc_type);

				if ($assoc->getExpiresIn() == 0) {
					$this->removeAssociation($server_url, $assoc->handle);
				} else {
					$associations[] = array($assoc->issued, $assoc);
				}
			}

			if ($associations) {
				$issued = array();
				$assocs = array();
				foreach ($associations as $key => $assoc) {
					$issued[$key] = $assoc[0];
					$assocs[$key] = $assoc[1];
				}

				array_multisort($issued, SORT_DESC, $assocs, SORT_DESC, $associations);

				// return the most recently issued one.
				list($issued, $assoc) = $associations[0];
				return $assoc;
			} else {
				return null;
			}
		}
	}

	/**
	 * Remove selected associations from storage
	 *
	 * @param string $server_url The identity server endpoint
	 * @param string $handle     The association handle
	 */
	public function removeAssociation($server_url, $handle) {
		$assocs = $this->getAssociations($server_url, $handle);
		foreach ($assocs as $assoc) {
			$assoc->delete();
		}
	}

	/**
	 * Get all associations
	 * 
	 * @param string $server_url The identity server endpoint
	 * @param string $handle     The association handle
	 * @return array
	 */
	protected function getAssociations($server_url, $handle) {
		$options = array(
			'type' => 'object',
			'subtype' => 'openid_client::association',
			'metadata_name_value_pairs' => array(
				array('name' => 'server_url', 'value' => $server_url)
			),
			'limit' => 0,
		);

		if ($handle !== null) {
			$options['metadata_name_value_pairs'][] = array(
				'name' => 'handle',
				'value' => $handle
			);
		}

		return elgg_get_entities_from_metadata($options);
	}

	/**
	 * Cleanup associations that have expired
	 *
	 * @todo I think we need to store expire time ans use that here
	 *
	 * @return int
	 */
	public function cleanupAssociations() {
		$options = array(
			'type' => 'object',
			'subtype' => 'openid_client::association',
			'metadata_name_value_pairs' => array(
				array('name' => 'expires', 'value' => time(), 'operand' => '<')
			),
			'limit' => 0,
		);
		$associations = elgg_get_entities_from_metadata($options);
		$total = count($associations);

		foreach ($associations as $association) {
			$association->delete();
		}

		return $total;
	}

	/**
	 * Can we use this nonce?
	 *
	 * Checks for time skew and replay attacks
	 *
	 * @param type $server_url The identity server endpoint
	 * @param type $timestamp  The timestamp from the nonce
	 * @param type $salt       The salt from the nonce
	 * @return bool
	 */
	public function useNonce($server_url, $timestamp, $salt) {
		global $Auth_OpenID_SKEW;

		if (abs($timestamp - time()) > $Auth_OpenID_SKEW) {
			return false;
		}

		if (!$this->addNonce($server_url, $timestamp, $salt)) {
			return false;
		}

		return true;
	}

	/**
	 * Store the nonce to prevent replay attacks
	 *
	 * @param string $server_url
	 * @param string $timestamp
	 * @param string $salt
	 * @return bool
	 */
	protected function addNonce($server_url, $timestamp, $salt) {
		global $Auth_OpenID_SKEW;

		$identifier = md5($server_url . $timestamp . $salt);

		// was the nonce already used
		$count = elgg_get_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'openid_client::nonce',
			'metadata_name' => 'identifier',
			'metadata_value' => $identifier,
			'count' => true,
		));
		if ($count) {
			return false;
		}

		// add it
		$object = new ElggObject();
		$object->subtype = 'openid_client::nonce';
		$object->owner_guid = 0;
		$object->container_guid = 0;
		$object->access_id = ACCESS_PUBLIC;
		$object->server_url = $server_url;
		$object->expires = $timestamp + $Auth_OpenID_SKEW;
		$object->identifier = $identifier;
		$object->save();

		return true;
	}

	/**
	 * Cleanup nonces that would not pass the time skew test
	 *
	 * @return int
	 */
	public function cleanupNonces() {
		$options = array(
			'type' => 'object',
			'subtype' => 'openid_client::nonce',
			'metadata_name_value_pairs' => array(
				array('name' => 'expires', 'value' => time(), 'operand' => '<')
			),
			'limit' => 0,
		);
		$nonces = elgg_get_entities_from_metadata($options);
		$total = count($nonces);

		foreach ($nonces as $nonce) {
			$nonce->delete();
		}

		return $total;
	}

	/**
	 * Does this storage class support cleanup?
	 *
	 * @return bool
	 */
	public function supportsCleanup() {
		return true;
	}

	/**
	 * Cleanup expired data in storage
	 *
	 * @return array
	 */
	public function cleanup() {
		return array($this->cleanupNonces(), $this->cleanupAssociations());
	}

	/**
	 * Remove everything from storage
	 *
	 * @return void
	 */
	public function reset() {
		$associations = elgg_get_entities(array(
			'type' => 'object',
			'subtype' => 'openid_client::association',
			'limit' => 0,
		));
		foreach ($associations as $association) {
			$association->delete();
		}

		$nonces = elgg_get_entities(array(
			'type' => 'object',
			'subtype' => 'openid_client::nonce',
			'limit' => 0,
		));

		foreach ($nonces as $nonce) {
			$nonce->delete();
		}
	}

	protected function getTrustedSites($user_guid = true) {
		
		if ($user_guid === true) {
			$user_guid = elgg_get_logged_in_user_guid();
		} elseif (!$user_guid) {
			$user_guid = ELGG_ENTITIES_ANY_VALUE;
		}

		$results = elgg_get_entities(array(
			'type' => 'object',
			'subtype' => 'openid_server::trust_root',
			'owner_guid' => $user_guid,
		));
		
		return $results;
	}
	
	public function getTrustedRoots ($user_guid = true) {
		
		$results = $this->getTrustedSites($user_guid);
		
		$sites = array();
		if ($results) {
			foreach ($results as $site) {
				$sites[] = $site->trust_root;
			}
		}
		return $sites;
	}

	/**
	* Returns the autologin URLs for every trusted site
	*/ 	

	public function getAutoLoginSites() {
		
		$default_trusted_sites = $this->getTrustedSites(false);

		$sites = array();
		if ($default_trusted_sites) {
			foreach ($default_trusted_sites as $site) {
				if ($site->auto_login_url) {
					$sites[] = $site;
				}
			}
		}
		return $sites;
	}

	/**
	* Returns the autologout URLs for every trusted site
	*/ 	

	public function getAutoLogoutSites() {

		$default_trusted_sites = $this->getTrustedSites(false);
		
		$sites = array();
		if ($default_trusted_sites) {
			foreach ($default_trusted_sites as $site) {
				if ($site->auto_logout_url) {
					$sites[] = $site;
				}
			}
		}
		return $sites;
	}

	static function isTrustedRoot($trust_root) {
		$results = elgg_get_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'openid_server::trust_root',
			'owner_guid' => elgg_get_logged_in_user_guid(),
			'metadata_name' => 'trust_root',
			'metadata_value' => $trust_root,
		));
		
		return !! $results;
	}

	public function setTrustedSite($trust_root) {
		
		if (self::isTrustedRoot($trust_root)) {
			return true;
		}
		
		$site = new ElggObject();
		$site->subtype = 'openid_server::trust_root';
		$site->owner_guid = elgg_get_logged_in_user_guid();
		$site->title = 'association';
		$site->access_id = ACCESS_PUBLIC;

		if ($site->save()) {
			$site->trust_root = $trust_root->trust_root;
			$site->site_name = $trust_root->site_name;
			$site->autologin = $trust_root->autologin;
			$site->autologout = $trust_root->autologout;
			$site->width = $trust_root->width;
			$site->height = $trust_root->height;
			return true;
		}
		return false; 	
	}

	public function removeUserTrustedSites($user = true) {

		$results = $this->getTrustedSites($user);

		if ($results) {
			foreach($results as $trust_root) {
				$trust_root->delete();
			}
		}
		return true;
	}

	public function removeTrustedSite($trust_root, $user_guid = true) {
		
		if ($user_guid === true) {
			$user_guid = elgg_get_logged_in_user_guid();
		} elseif (!$user_guid) {
			$user_guid = ELGG_ENTITIES_ANY_VALUE;
		}

		$results = elgg_get_entities_from_metadata(array(
			'type' => 'object',
			'subtype' => 'openid_server::trust_root',
			'owner_guid' => $user_guid,
			'metadata_name' => 'trust_root',
			'metadata_value' => $trust_root,
		));

		if ($results) {
			foreach($results as $trust_root) {
				$trust_root->delete();
			}
		}
		return true;
	}
}
