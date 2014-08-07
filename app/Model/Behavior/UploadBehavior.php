<?php
class UploadBehavior extends ModelBehavior {
	public function uploadPic(Model $Model, $destination){
		if (!$destination) {
			$destination = 'posts';
		}
		$pics = $Model->data[$Model->alias];

		$pics_dir = WWW_ROOT.'files'.DS.$destination;

		$allowed_types = array('image/gif','image/jpeg','image/pjpeg','image/png', 'application/x-shockwave-flash');

		$filename = false; //in case there is no file to be uploaded we return false.

		if ($pics['image']['name'] != '' && $pics['image']['error'] == 0) {     //make sure there is a file to upload and there is no error
			$new_file = pathinfo($pics['image']['name']);
			$new_name = $new_file['filename'] . '_' . date('His') . '.' . $new_file['extension'];
			$filename = str_replace(' ', '_', $new_name);

			$typeOK = false;

			foreach ($allowed_types as $type) {     //check to make sure file type is allowed
				if ($type == $pics['image']['type']) {
					$typeOK = true;
					break;
				}
			}

			if ($typeOK) {  //upload
				if(!move_uploaded_file($pics['image']['tmp_name'], $pics_dir.DS.$filename)) {
					return false;
				}
			}
		}

		return $filename;
	}
}
