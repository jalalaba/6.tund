<?php
	require_once("functions.php");
	
	//k�ivitan funktsiooni
	$array_of_cars = getCarData(); 
	//tr�kin v�lja esimese auto
	echo $array_of_cars[0]->id." ".$array_of_cars[0]->plate;
?>