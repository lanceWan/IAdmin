<?php
use Carbon\Carbon;
if(!function_exists('getTime')){
	function getTime($time, $status = True){
		$newTime = new Carbon($time);

		if($status){
			return $newTime->startOfDay();
		}
		return $newTime->endOfDay();
	}
}