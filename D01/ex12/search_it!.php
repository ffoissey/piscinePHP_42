#!/usr/bin/php
<?php
if ($argc < 2)
	exit();
array_shift($argv);
$ref = array_shift($argv);
$result = NULL;
foreach($argv as $elem)
{
	$local = explode(":", $elem);
	if (count($local) > 1 && $local[0] == $ref)
		$result = $local[1];
}
if (empty($result) == false)
	echo "$result\n";
?>
