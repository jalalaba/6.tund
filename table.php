<?php
	require_once("functions.php");
	
	//kas kustutame
	//?delete=vastav id mida kustutada on aadressireal
	if(isset($_GET["delete"])){
		echo "kustutame id ".$_GET["delete"];
		//käivitan funktsiooni,saadan kaasa id
		deleteCar($_GET["delete"]);
	}
	
	//salvestan andmebaasi
	if(isset($_POST["save"])){
		updateCar($_POST["id"],$_POST["plate_number"],$_POST["color"]);
		
	}
	
	//k�ivitan funktsiooni
	$array_of_cars = getCarData(); 
	//tr�kin v�lja esimese auto
	//echo $array_of_cars[0]->id." ".$array_of_cars[0]->plate;
?>

<h2>Tabel</h2>
<table>
	<tr>
		<th>id</th>
		<th>Kasutaja id</th>
		<th>numbrimärk</th>
		<th>Värv</th>
		<th>Kustuta</th>
		<th>Redigeeri</th>
	</tr>
	<?php
		//tr�kime v�lja read
		//massiivi pikkus count()
		for($i=0;$i<count($array_of_cars);$i++){
			//echo $array_of_cars[$i]->id;
			
			if(isset($_GET["edit"])&&$array_of_cars[$i]->id==$_GET["edit"]){
				
				echo "<tr>";
				echo "<form action='table.php' method='post'>";
				echo "<input type='hidden' name='id' value='".$array_of_cars[$i]->id."'>";
				echo "<td>".$array_of_cars[$i]->id."</td>";
				echo "<td>".$array_of_cars[$i]->user_id."</td>";
				echo "<td><input name='plate_number' value='".$array_of_cars[$i]->plate."'></td>";
				echo "<td><input name='color' value='".$array_of_cars[$i]->color."'></td>";
				echo "<td><a href='table.php'>Cancel</a></td>";
				echo "<td><input type='submit' name='salvesta'></td>";
				echo "</form>";
				echo "</tr>";
				
			}else{
			
				echo "<tr>";
				echo "<td>".$array_of_cars[$i]->id."</td>";
				echo "<td>".$array_of_cars[$i]->user_id."</td>";
				echo "<td>".$array_of_cars[$i]->plate."</td>";
				echo "<td>".$array_of_cars[$i]->color."</td>";
				echo "<td><a href='?delete=".$array_of_cars[$i]->id."'>X</a></td>";
				echo "<td><a href='?edit=".$array_of_cars[$i]->id."'>edit</a></td>";
				echo "</tr>";
			}
		}
		
	?>	
</table>
