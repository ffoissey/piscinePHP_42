#!/usr/bin/php
<?php
function epur_str($str)
{
	$out = preg_replace('/ +/', ' ', $str);
	$out = preg_replace('/^ | $/', '', $out);
	return ($str);
}

$str = implode(' ', array_slice($argv, 1));
$out = explode(' ', epur_str($str));
sort($out);
foreach($out as $elem)
	echo $elem."\n";
?>
