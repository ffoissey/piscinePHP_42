#!/usr/bin/php
<?php
$question = "mais pourquoi cette demo ?";
$answer = "Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo..\n";
if ($argc == 2 && $argv[1] == $question)
	echo $answer;
?>
