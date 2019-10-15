#!/usr/bin/php
<?php

function epur_str($str)
{
	$out = preg_replace('/ +/', ' ', $str);
	$out = preg_replace('/^ | $/', '', $out);
	return ($str);
}

function sort_and_print($array)
{
	if (empty($array) == false)
	{
		sort($array, SORT_STRING | SORT_FLAG_CASE);
		foreach($array as $elem)
			echo $elem."\n";
	}
}
$str = implode(' ', array_slice($argv, 1));
$out = explode(' ', epur_str($str));
$alpha = array();
$num = array();
$other = array();
foreach($out as $elem)
{
	if (ctype_alpha($elem[0]) == true)
		array_push($alpha, $elem);
	else if (ctype_digit($elem[0]) == true)
		array_push($num, $elem);
	else
		array_push($other, $elem);
}
sort_and_print($alpha);
sort_and_print($num);
sort_and_print($other);
?>
