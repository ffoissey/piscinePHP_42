#!/usr/bin/php
<?php
	while (1)
	{
		echo "Entrez un nombre: ";
		$nb = rtrim(fgets(STDIN));
		if (feof(STDIN) == true)
			break;
		if (is_numeric($nb) == true)
		{
			echo "Le chiffre $nb " ;
			if ($nb[strlen($nb) - 1] % 2 == true)
				echo "Impair\n"; 
			else
				echo "Pair\n"; 
		}
		else
			echo "'$nb' n'est pas un chiffre\n"; 
	}
?>
