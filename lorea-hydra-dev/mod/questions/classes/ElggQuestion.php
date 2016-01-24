<?php

class ElggQuestion extends ElggObject {
	
	protected function initializeAttributes() {
		parent::initializeAttributes();
		
		$this->attributes['subtype'] = 'question';
	}

	public function getAnswers(array $options = array()) {
		$defaults = [
			'order_by' => 'time_created asc',
		];

		$overrides = [
			'type' => 'object',
			'subtype' => 'answer',
			'container_guid' => $this->getGUID(),
		];
		
		$options = array_merge($defaults, $options, $overrides);

		return elgg_get_entities($options);
	}

	public function listAnswers(array $options = []) {
		return elgg_list_entities($options, [$this, 'getAnswers']);
	}
	
	public function getURL() {
		$url = "questions/view/{$this->getGUID()}/" . elgg_get_friendly_title($this->title);
		
		return elgg_normalize_url($url);
	}
	
	/**
	 * Get the answer that was marked as the correct answer.
	 *
	 * @return bool|ElggAnswer the answer or false if non are marked
	 */
	public function getMarkedAnswer() {
		$result = false;
		
		$options = [
			'type' => 'object',
			'subtype' => 'answer',
			'limit' => 1,
			'container_guid' => $this->getGUID(),
			'metadata_name_value_pairs' => array(
				'name' => 'correct_answer',
				'value' => true
			)
		];
		
		$answers = elgg_get_entities_from_metadata($options);
		if (!empty($answers)) {
			$result = $answers[0];
		}
		
		return $result;
	}
	
	/**
	 * Helper function to close a question from further answers.
	 *
	 * @return void
	 */
	public function close() {
		$this->status = 'closed';
	}
	
	/**
	 * Reopen the question for more answers.
	 *
	 * @return void
	 */
	public function reopen() {
		$this->status = 'open';
	}
	
	/**
	 * Get the current status of the question.
	 *
	 * This can be
	 * - 'open'
	 * - 'closed'
	 *
	 * @return string the current status
	 */
	public function getStatus() {
		$result = 'open';
		
		// do we even support status
		if (questions_close_on_marked_answer()) {
			// make sure the status is correct
			switch ($this->status) {
				case 'open':
					// is it still open, so no marked answer
					if ($this->getMarkedAnswer()) {
						$result = 'closed';
					}
					break;
				case 'closed':
					$result = 'closed';
					// is it still open, so no marked answer
					if (!$this->getMarkedAnswer()) {
						$result = 'open';
					}
					break;
				default:
					// no setting yet
					if ($this->getMarkedAnswer()) {
						$result = 'closed';
					}
					break;
			}
		}
		
		return $result;
	}
}
