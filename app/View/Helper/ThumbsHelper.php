<?php
class ThumbsHelper extends AppHelper {
	public function user_thumbnail($user, $thumb_size){
		$div = "<div class='thumbnail col-md-6' style='margin-left:10px'>
			<img src='/files/users/".$user['Author']['pic']."' alt='".$user['Author']['name']."' width='".$thumb_size."' class='img-thumbnail'>
			</div>";

		echo $div;
	}

	public function banner_thumbnail($banner, $thumb_size){
		$div = "<div class='thumbnail pull-right'>
			<img src='/files/banners/".$banner['Banner']['pic']."' alt='".$banner['Banner']['name']."' width='".$thumb_size."' class='img-thumbnail'>
			</div>";

		echo $div;
	}
}
