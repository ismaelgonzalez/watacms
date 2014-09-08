<?php
if ($get_parent_id) {
	$section_name = '';

	if ($section_id) {
		$section_name = $this->requestAction('/sections/getNameById/' . $section_id);
	}


	echo $section_name;
}