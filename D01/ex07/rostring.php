#!/usr/bin/php
<?php
function get_filter_array($input)
{
	$out = preg_replace('/ +/', ' ', $input);
	$out = preg_replace('/^ | $/', '', $out);
	$tab = explode(' ', $out);
	return ($tab);
}

if ($argc == 1)
	exit();
$tab = get_filter_array($argv[1]);
$first = array_shift($tab);
foreach ($tab as $element)
	echo "$element ";
if (empty($first) == false)
	echo "$first\n";
?>
