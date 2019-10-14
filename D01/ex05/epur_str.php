#!/usr/bin/php
<?php
	if ($argc > 1)
		echo preg_replace('/ +/', ' ', $argv[1])."\n";
?>
