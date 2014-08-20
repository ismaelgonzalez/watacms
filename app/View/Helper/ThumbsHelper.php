<?php
class ThumbsHelper extends AppHelper {
	public function user_thumbnail($user, $thumb_size){
		$div = "<div class='thumbnail col-md-2' style='margin-left:10px'>
			<img src='/files/users/".$user['Author']['pic']."' alt='".$user['Author']['name']."' width='".$thumb_size."' class='img-thumbnail'>
			</div>";

		echo $div;
	}
}
