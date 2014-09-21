<?php
class TagsHelper extends AppHelper
{
	/*
	 * This function will return the list of tags as tag items.
	 * @params array tags
	 * @returns html code for the tags list
	 */
	public function getTags($tags) {
		$html = '';

		foreach ($tags as $t) {
			$html .= "<span id='tag".$t['Tag']['id']."' class='badge tag'>".$t['Tag']['tag']."<a onclick='deltag(".$t['Tag']['id'].")'>x</a></span>";
		}

		return $html;
	}

	/*
	 * This function will get a list of the tag id's for the tagged hidden field
	 * @params array tags
	 * @returns string tag_id's
	 */
	public function getTagsIds($tags) {
		$tag_id_string = '';

		//foreach ($tags as $t) {
		for ($i=0; $i< sizeof($tags); $i++) {
			$tag_id_string .= $tags[$i]['Tag']['id'];
			if ($i != sizeof($tags)-1) {
				$tag_id_string .= ',';
			}
		}

		return $tag_id_string;
	}
}
