#!/usr/bin/php
<?php
function get_month_index($cur)
{
	$month = array("janvier" => "01", "fevrier" => "02", "mars" => "03", "avril" => "04",
					"mai" => "05", "juin" => "06", "juillet" => "07", "aout" => "08",
					"septembre" => "09", "octobre" => "10", "novembre" => "11", "decembre" => "12");

	return ($month[$cur]);
}

function check_day($real, $input)
{
	$fr = array("lundi" => 1, "mardi" => 2, "mercredi" => 3,
				"jeudi" => 4, "vendredi" => 5, "samedi" => 6, "dimanche" => 7);
	$en = array("monday" => 1, "tuesday" => 2, "wednesday" => 3,
				"thursday" => 4, "friday" => 5, "saturday" => 6, "sunday" => 7);

	return ($en[$real] === $fr[$input]);
}

function is_correct_format($input)
{
	$day="(([L|l]undi)|([M|m](ardi|ercredi))|([J|j]eudi)|([V|v]endredi)|([S|s]amedi)|([D|d]imanche))";
	$til_29 = "(([0]?[1-9])|([1-2][0-9]))";
	$til_30 = "($til_29|(30))";
	$til_31 = "($til_29|(30)|(31))";
	$fevrier = "($til_29 [F|f][e|é]vrier)";
	$month_30 = "($til_30 (([A|a]vril)|([J|j]uin)|([S|s]eptembre)|([N|n]ovembre)))";
	$month_31 = "($til_31 (([J|j]anvier)|([M|m]((ars)|(ai)))|([J|j]uillet)|([A|a]o[u|û]t)|([O|o]ctobre)|([D|d][é|e]cembre)))";
	$year = "([0-9]{4})";
	$hour = "((([0-1][0-9])|(2[0-3]))(:[0-5][0-9]){2})";
	return (preg_match("/^$day ($fevrier|$month_30|$month_31) $year $hour$/", $input));
}

function error()
{
	echo "Wrong Format\n";
	exit();
}

if ($argc == 1)
	exit();
if (strstr($argv[1], "évrier "))
	$input = str_replace("évrier ", "evrier ", $argv[1]);
else if (strstr($argv[1], "écembre "))
	$input = str_replace("écembre ", "ecembre ", $argv[1]);
else if (strstr($argv[1], "oût "))
	$input = str_replace("oût ", "out ", $argv[1]);
else
	$input = $argv[1];
if (is_correct_format($input) == false)
	error();
$tab = explode(' ', $input);
$month = get_month_index(strtolower($tab[2]));
if (checkdate($month, $tab[1], $tab[3]) === false
	|| ($timestamp = strtotime("$month/$tab[1]/$tab[3] $tab[4]")) === false
	|| check_day(strtolower(date("l", $timestamp)), strtolower($tab[0])) === false)
	error();
echo "$timestamp\n";
?>
