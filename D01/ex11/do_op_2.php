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
	if ($nb2 == 0)
		error();
	return ($nb1 / $nb2);
}

function mod($nb1, $nb2)
{
	if ($nb2 == 0)
		error();
	return ($nb1 % $nb2);
}

function error()
{
	echo "Syntax Error\n";
	exit();
}

function do_op($nb1, $sign, $nb2)
{
	$array = array(
			'+' => add($nb1, $nb2),
			'-' => minus($nb1, $nb2),
			'*' => mult($nb1, $nb2),
			'/' => div($nb1, $nb2),
			'%' => mod($nb1, $nb2),
			);

	foreach ($array as $elem => $func)
	{
		if ($elem === $sign)
		{
			$result = $func;
			if ($result !== "")
				echo "$result\n";
			exit();
		}
	}
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}
$all = preg_replace("/ +|\t+/", "", $argv[1]);
$tab = preg_split("/(\+)|(\-)|(\*)|(\/)|(\%)/", $all, -1,
		PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
if (count($tab) < 3)
	error();
$nb1 = array_shift($tab);
if ($nb1 == "-" && count($tab) > 2)
	$nb1 .= array_shift($tab);
$sign = array_shift($tab);
$nb2 = array_shift($tab);
if ($nb2 == "-" && count($tab) > 0)
	$nb2 .= array_shift($tab);
if (count($tab) > 0 || is_numeric($nb1) == false || is_numeric($nb2) == false
		|| strlen($sign) != 1 || strpos("+-*/%", $sign) == false)
	error();
do_op($nb1, $sign, $nb2);
?>
