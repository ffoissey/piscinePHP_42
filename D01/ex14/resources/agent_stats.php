#!/usr/bin/php
<?php
if ($argc == 1)
	exit();
$option = $argv[1];
$human = array();
$moulinette = array();
while (($line = fgets(STDIN)))
{
	$line = preg_replace("/\n$/", "", $line);
	$cur = explode(";", $line);
	if (empty($cur[1]) === true || is_numeric($cur[1]) === false)
		continue;
	$nb = 0;
	$value = 0;
	if ($cur[2] == "moulinette")
	{
		if (empty($moulinette[$cur[0]]) === false)
		{
			$value = $moulinette[$cur[0]][0];
			$nb = $moulinette[$cur[0]][1];
		}
		$moulinette[$cur[0]] = array($value + $cur[1], $nb + 1);
	}
	else if ($cur[1])
	{
		if (empty($human[$cur[0]]) === false)
		{
			$value = $human[$cur[0]][0];
			$nb = $human[$cur[0]][1];
		}
		$human[$cur[0]] = array($value + $cur[1], $nb + 1);
	}
}
if ($option == "moyenne")
{
	$moy = 0;
	$i = 0;
	foreach ($human as $user => $mark)
	{
		$moy += ($mark[0] / $mark[1]);
		$i++;
	}
	if ($i !== 0)
		$moy /= $i;
	echo $moy."\n";
	exit();
}
else if ($option == "moyenne_user")
{
	$final = array();
	foreach ($human as $user => $mark)
		$final[$user] = $mark[0] / $mark[1];
	foreach ($moulinette as $user => $mark)
	{
		$moy = $mark[0] / $mark[1];
		if (empty($final[$user]) === true)
			$final[$user] = $moy;
		else
			$final[$user] = ($final[$user] + $moy) / 2;
	}
	ksort($final);
	foreach ($final as $user => $moy)
		echo "$user:$moy\n";
}
?>
