#!/usr/bin/php
<?php
	$out = array_slice($argv, 1);
	sort($out);
	foreach($out as $elem)
		echo $elem."\n"

?>
