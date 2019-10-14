#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$out = preg_replace('/ +/', ' ', $argv[1]);
		$out = preg_replace('/^ | $/', '', $out);
		echo $out."\n";
	}
?>
