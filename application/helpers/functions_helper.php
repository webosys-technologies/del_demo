<?php

function custom_encode($string) {
	$key = "cYbErClINicAdItYa";
	$string = base64_encode($string);
	$string = str_replace('=', '', $string);
	$main_arr = str_split($string);
	$output = array();
	$count = 0;
	for ($i = 0; $i < strlen($string); $i++) {
		$output[] = $main_arr[$i];
		if ($i % 2 == 1) {
			$output[] = substr($key, $count, 1);
			$count++;
		}
	}
	$string = implode('', $output);
	return $string;
}

function custom_decode($string) {
	$key = "cYbErClINicAdItYa";
	$arr = str_split($string);
	$count = 0;
	for ($i = 0; $i < strlen($string); $i++) {
		if ($count < strlen($key)) {
			if ($i % 3 == 2) {
				unset($arr[$i]);
				$count++;
			}
		}
	}
	$string = implode('', $arr);
	$string = base64_decode($string);
	return $string;
}


?>

