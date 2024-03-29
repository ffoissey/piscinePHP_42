#!/usr/bin/php
<?php

function add($nb1, $nb2)
{
	return ($nb1 + $nb2);
}

function minus($nb1, $nb2)
{
	return ($nb1 - $nb2);
}

function mult($nb1, $nb2)
{
	return ($nb1 * $nb2);
}

function div($nb1, $nb2)
{
	return ($nb2 == 0 ? "" : $nb1 / $nb2);
}

function mod($nb1, $nb2)
{
	return ($nb2 == 0 ? "" : $nb1 % $nb2);
}

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}
$nb1 = trim($argv[1], " \t");
$sign = trim($argv[2], " \t");
$nb2 = trim($argv[3], " \t");
$array = array(
			'+' => 'add',
			'-' => 'minus',
			'*' => 'mult',
			'/' => 'div',
			'%' => 'mod'
			);
foreach ($array as $elem => $func)
{
	if ($elem === $sign)
	{
		$result = $func($nb1, $nb2);
		if ($result !== "")
			echo "$result\n";
		exit();
	}
}
?>
