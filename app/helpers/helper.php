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

/**
 * 判断是否为多维数组
 */
if(!function_exists('isDoubleArray')){
	function isDoubleArray($array){
		if (is_array($array)) {
			foreach ($array as $v) {
				if (is_array($v)) {
					return true;
					break;
				}
			}
			return false;
		}
		return false;
	}
}