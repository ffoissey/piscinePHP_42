#!/usr/bin/php
<?php

function	transform_string($str)
{
	$str = preg_replace_callback("/(title=\")([^\"]+\")/",
				function ($var){
					return ($var[1].strtoupper($var[2]));
				},
				$str);
	$str = preg_replace_callback("/(>[^<]+)/",
				function ($var){
					return (strtoupper($var[0]));
				},
				$str);
	return ($str);
}

if ($argc == 1 || is_readable($argv[1]) === false)
	exit();
$full_page = NULL;
$handle = fopen($argv[1], "r");
while (($line = fgets($handle)))
	$full_page .= $line;
fclose($handle);
$tab = preg_split("/(<a )|(\/a>)/", $full_page, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
$link = array();
$i = 0;
foreach ($tab as $elem)
{
	if ($i === 0)
		$link[$i][1] = 0;
	$link[$i + 1][1] = $elem == "<a" ? 0 : 1;
	$link[$i][0] = $elem;
	$i++;
}
$link[$i] = NULL;
$i = 0;
while (empty($link[$i]) === false)
{
	if ($link[$i][1] === 0)
		echo $link[$i][0];
	else
		echo (transform_string($link[$i][0]));
	$i++;
}
?>
