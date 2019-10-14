#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$out = preg_replace('/ +/', ' ', $argv[1]);
	$out = preg_replace('/^ | $/', '', $out);
	$tab = explode(' ', $out);
	/* A LENVERS NORMALEMENT*/
	foreach ($out as $element)
	{
		if ($element != $out[0])
			echo " ";
		echo $element;
	}
	echo "\n";
	
?>
