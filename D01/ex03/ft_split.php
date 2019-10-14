#!/usr/bin/php
<?php

function ft_split($str)
{
	$out = preg_replace('/ +/', ' ', $str);
	$tab = explode(' ', $out);
	sort($tab);
	return ($tab);
}

?>
