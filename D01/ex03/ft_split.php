<?php

function ft_split($str)
{
	$out = preg_replace('/ +/', ' ', $str);
	$out = preg_replace('/^ | $/', '', $out);
	$tab = explode(' ', $out);
	if (empty($tab) == false)
		sort($tab);
	return ($tab);
}
?>
