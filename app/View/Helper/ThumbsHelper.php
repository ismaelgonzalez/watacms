<?php
class ThumbsHelper extends AppHelper {
	public function user_thumbnail($user, $thumb_size){
		$div = "<div class='thumbnail col-md-6' style='margin-left:10px'>
			<img src='/files/users/".$user['Author']['pic']."' alt='".$user['Author']['name']."' width='".$thumb_size."' class='img-thumbnail'>
			</div>";

		echo $div;
	}

	public function banner_thumbnail($banner, $thumb_size){
		$ext = pathinfo($banner['Banner']['pic'], PATHINFO_EXTENSION);

		if ($ext == 'swf') {
			$div = '<embed src="/files/banners/' . $banner['Banner']['pic'] . '">';
		} else {
			$div = "<div class='thumbnail pull-right'>
			<img src='/files/banners/".$banner['Banner']['pic']."' alt='".$banner['Banner']['name']."' width='".$thumb_size."' class='img-thumbnail'>
			</div>";
		}

		echo $div;
	}

	public function pic_thumbnail($pic, $thumb_size){
		$ext = pathinfo($pic['Pic']['pic'], PATHINFO_EXTENSION);

		$div = "<div class='pull-right'>
			<a class='thumbnail' href='/admin/pics/edit/".$pic['Pic']['id']."'>
				<img src='/files/pics/".$pic['Pic']['pic']."' alt='".$pic['Pic']['title']."' width='".$thumb_size."'>
			</a>
			</div>";

		echo $div;
	}

	public function post_thumbnail($post, $thumb_size){
		if ( !empty( $post['Post']['pic'] ) ) {
			$div = "<div class='pull-right'>
			<a class='thumbnail' href='/admin/posts/edit/".$post['Post']['id']."'>
				<img src='/files/posts/".$post['Post']['pic']."' alt='".$post['Post']['title']."' width='".$thumb_size."'>
			</a>
			</div>";

			echo $div;
		}
	}
}
