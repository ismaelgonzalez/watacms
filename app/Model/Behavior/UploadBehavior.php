<?php
class UploadBehavior extends ModelBehavior {
	public function uploadPic(Model $Model, $destination, $resize_override = null){
		if (!$destination) {
			$destination = 'posts';
		}
		$pics = $Model->data[$Model->alias];

		$pics_dir = WWW_ROOT.'files'.DS.$destination;

		$allowed_types = array('image/gif','image/jpeg','image/pjpeg','image/png', 'application/x-shockwave-flash', 'application/vnd.adobe.flash.movie');

		$filename = false; //in case there is no file to be uploaded we return false.

		if ($pics['pic']['name'] != '' && $pics['pic']['error'] == 0) {     //make sure there is a file to upload and there is no error
			$new_file = pathinfo($pics['pic']['name']);

			if (empty($new_file['extension'])) {
				return false;
			}

			$new_name = $new_file['filename'] . '_' . date('dmHis') . '.' . $new_file['extension'];
			$filename = str_replace(' ', '_', $new_name);

			$typeOK = false;

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$file_type = finfo_file($finfo, $pics['pic']['tmp_name']);

			foreach ($allowed_types as $type) {     //check to make sure file type is allowed
				if ($type == $file_type) {
					$typeOK = true;
					break;
				}
			}

			if ($typeOK) {  //upload
				if(move_uploaded_file($pics['pic']['tmp_name'], $pics_dir.DS.$filename)) {
					if($this->resize_image($filename, $options=array('files_dir' => $pics_dir, 'ext' => $new_file['extension'], 'resize_override' => $resize_override))) {
						return $filename;
					}
				}
			}
		}

		return false;
	}

	public function resize_image($filename, $options=array())
	{
		if ($options['resize_override']) {
			return true;
		}

		$thumbs_width = isset($options['width']) ? intval($options['width']) : 600;
		$thumbs_height = isset($options['height']) ? intval($options['height']) : 450;
		$files_dir = $options['files_dir'];

		if (is_file($files_dir . DS . $filename)) {
			list($width, $height) = getimagesize($files_dir . DS . $filename);

			if ($width > 600) {
				$v_fact = $thumbs_height / $height;
				$h_fact = $thumbs_width / $width;
				$im_fact = min($v_fact, $h_fact);
				$new_height = $height * $im_fact;
				$new_width = $width * $im_fact;

				$canvas = imagecreatetruecolor($new_width, $new_height);

				switch ($options['ext']) {
					case 'jpg':
					case 'jpeg':
						$image = imagecreatefromjpeg($files_dir . DS . $filename);
						break;
					case 'bmp':
						$image = imagecreatefromwbmp($files_dir . DS . $filename);
						break;
					case 'png':
						$image = imagecreatefrompng($files_dir . DS . $filename);
						break;
					case 'gif':
						$image = imagecreatefromgif($files_dir . DS . $filename);
						break;
				}

				imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

				if (imagejpeg($canvas, $files_dir . DS . $filename, 100) || imagepng($canvas, $files_dir . DS . $filename, 100)
					|| imagewbmp($canvas, $files_dir . DS . $filename, 100)  || imagegif($canvas, $files_dir . DS . $filename, 100) ) {
					return true;
				}

				//small image, nothing to do
				return true;
			}
		}

		return false;
	}
}
