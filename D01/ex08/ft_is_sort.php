<?php

function ft_is_sort($array)
{
	$sort_array = $array;
	if (empty($array) == false)
		sort($sort_array);
	while (empty($array) == false)
	{
		if (array_shift($array) !== array_shift($sort_array))
			return false;
	}
	return true;
}

?>
