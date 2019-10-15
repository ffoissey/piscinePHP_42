#!/usr/bin/php
<?php
if ($argc > 1)
	echo preg_replace("/( |\t)+/", " ", $argv[1])."\n";
?>
