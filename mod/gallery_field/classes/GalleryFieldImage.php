<?php

class GalleryFieldImage extends \ElggFile{
	
	const SUBTYPE = "gallery_field_image";
	
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = self::SUBTYPE;
	}	
	
	/**
	 * Save the image
	 *
	 * @warning container_guid must be set first
	 *
	 * @param array $data
	 * @return bool
	 */
	public function save($data = null) {

		if (!parent::save()) {
			return false;
		}

		/*if ($data) {
			// new image
			$this->simpletype = "image";
			$this->saveImageFile($data);
			$this->saveThumbnails();
			$this->extractExifData();
		}*/

		return true;
	}	
	
	/**
	 * Delete image
	 *
	 * @return bool
	 */
	public function delete() {

		$thumb_image = get_entity($this->thumb_file_guid);
		if($thumb_image)
		{
			$thumb_image->delete();
		}

		return parent::delete();
	}	
	
	/**
	 * Get the URL of this image
	 *
	 * @return string
	 */
	public function getURL($size = 'small') {	
		return elgg_normalize_url("gallery_field/image/{$this->guid}/{$size}");
	}	
	
	/**
	 * Save the uploaded image
	 *
	 * @param array $data
	 */
	protected function saveImageFile($data) {		
		
		$imginfo = getimagesize($data['tmp_name']);
		
		// move the uploaded file into album directory
		$this->setOriginalFilename($data['name']);
		$filename = $this->getFilenameOnFilestore();
		$result = move_uploaded_file($data['tmp_name'], $filename);
		if (!$result) {
			return false;
		}

		return true;
	}
	
	protected static function genGUID()
	{
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			//mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
				.substr($charid, 0, 8).$hyphen
				.substr($charid, 8, 4).$hyphen
				.substr($charid,12, 4).$hyphen
				.substr($charid,16, 4).$hyphen
				.substr($charid,20,12)
				.chr(125);// "}"
			return $uuid;
		}			
	}
	
	/**
	 * 
	 * @param string $tmp_name path to file
	 * @param string $type mime type
	 * @return self
	 * @throws Exception
	 */
	public static function createFromFile($tmp_name, $type)
	{	
		$mime_type = ElggFile::detectMimeType($tmp_name, $type);
		
		if(false == in_array($mime_type, array("image/jpeg","image/jpg")))
		{
			register_error(elgg_echo("gallery_field:only_jpg"));
			return null;
		}
		
		$ext = "jpg";
		
		$file = new self();
		$thumb_file = new ElggFile();		
		
		$random_guid = self::genGUID();
		
		$file->setFilename($random_guid.".".$ext);
		$thumb_file->setFilename($random_guid."_thumb.".$ext);
		
		$file->setMimeType($mime_type);
		$thumb_file->setMimeType($mime_type);
		
		$imgsizearray = getimagesize($tmp_name);
		if ($imgsizearray == false) {
			register_error("bad file");
			return null;
		}

		$width = $imgsizearray[0];
		$height = $imgsizearray[1];		
		
		
		$file->open("write");
		$file->write(self::cropImage($tmp_name, $width, $height, 760, 580));
		$file->close();		
		
		$thumb_file->open("write");
		$thumb_file->write(self::cropImage($tmp_name, $width, $height, 200, 140));
		$thumb_file->close();	
		
		$thumb_file->save();
		$file->thumb_file_guid = $thumb_file->guid;
		$file->save();
		
		return $file;
	}		
	
	protected static function cropImage($tmp_name, $orig_width, $orig_height, $new_width, $new_height)
	{
		$crop = array();
		
		if($new_height / $new_width > $orig_height / $orig_width)
		{
			$scaled_new_width = $new_width * $orig_height / $new_height;			
			$crop = array(
				'x1' => round(($orig_width - $scaled_new_width) / 2),
				'y1' => 0,
				'x2' => round(($orig_width + $scaled_new_width) / 2),
				'y2' => $orig_height
			);
		}
		else
		{
			$scaled_new_height = $new_height * $orig_width / $new_width;			
			$crop = array(
				'x1' => 0,
				'y1' => round(($orig_height - $scaled_new_height) / 2),
				'x2' => $orig_width,
				'y2' => round(($orig_height + $scaled_new_height) / 2)
			);			
		}
		/*echo "<pre>";
		var_dump(
				$orig_width,
				$orig_height,	
				$scaled_new_width,
				$tmp_name, 
				$new_width, 
				$new_height,
				$crop);*/
		
		return get_resized_image_from_existing_file(
				$tmp_name, 
				$new_width, 
				$new_height,
				false,
				$crop['x1'],
				$crop['y1'],
				$crop['x2'],
				$crop['y2'],
				true);
	}		
	
}
