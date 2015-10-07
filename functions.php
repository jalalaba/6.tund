<?php
	//functions.php
	// siia tulevad funktsioonid, kõik mis seotud andmebaasiga
	
	//loon andmebaasi ühenduse
	require_once("../configglobal.php");
	$database = "if15_siim_3";
	
	function getCarData(){
		$mysqli = new mysqli($GLOBALS["server_name"],$GLOBALS["server_username"],$GLOBALS["server_password"],$GLOBALS["database"]);
		$stmt=$mysqli->prepare("SELECT id,user_id,number_plate,color FROM car_plates");
		$stmt->bind_result($id,$user_id_from_db,$number_plate,$color);
		$stmt->execute();
		
		//tekitan massiivi
		$car_array=array();
		
		//tee midagi seni kuni saame ab-st ühe rea anmdeid
		while($stmt->fetch()){
			//seda siin tehakse nii mitu korda kui on ridu
			
			//tekitan objekti,kus hakkan hoidma väärtust
			$car=new StdClass();
			$car->id=$id;
			$car->plate=$number_plate;
			//lisan massiivi
			array_push($car_array,$car);
			//echo "<pre>";
			//var_dump ($car_array);
			//echo"</pre><br>";
		}
		
		//tagastan massiivi,kus kõik read sees
		return $car_array;
		
		$stmt->close();
		$mysqli->close();
	}
	
	
?>