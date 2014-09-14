<?php

class TimeoptionsHelper extends AppHelper
{
	/*
	 * Returns an array with all the time options for published_time
	 */
	public function getTimeOptions(){
		$time_options = array();
		$tNow = strtotime('05:00');
		for ($i=5; $i<=23; $i++) {
			$time_options[$i] = date("H:00", $tNow);
			$tNow = strtotime('+1 hour', $tNow);
		}

		return $time_options;
	}

	/*
	 * This function will get an hour and then send all the 15 minute intervals for that hour
	 */
	public function getMinutesFromHour($hour){
		$minutes = array();
		for ($start = strtotime($hour.":00"), $end = strtotime($hour.':45'); $start <= $end; $start += 900) {
			$minutes[date("H:i", $start)] = date("H:i", $start);
		}

		return $minutes;
	}

	public function getTimeOptionsWithValue($value){
		$time_options = "";

		for ($i=0; $i<=23; $i++) {
			$time_options .= "<option value='".$i."' ";

			if ($value == $i){
				$time_options .= "selected='selected' ";
			}

			$time_options .= "'>".$i."</option>";
		}

		return $time_options;
	}
}