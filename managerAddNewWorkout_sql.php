<?php
include("menu.php");
?>

<p> Hey <?=$name?>, we have successfully added new workout : <br>
<?=insertNewWorkout()?>
</body>
</html>

<?php
function insertNewWorkout(){
	global $id;
	global $db;
	$sql = "";
	$maxNum = $_GET["maxNum"];
	for($i = 0; $i <= $maxNum; $i++){
		$name = $_GET["txtName".$i];
		$muscle = $_GET["txtMuscle".$i];
		$cal = $_GET["txtCal".$i];
		$pro = $_GET["txtProtein".$i];
		$fat = $_GET["txtFat".$i];
		$carb = $_GET["txtCarb".$i];
		$part = $_GET["cmbPart".$i];
		$sql .= "Select @Max_Id := MAX(Workout_id)+1 FROM workout_method WHERE Working_part=" .$part.";";
		$sql .= "INSERT INTO Workout_method VALUES "
				."(@Max_Id, '".$name."', " .$muscle. ", " .$cal.", ".$pro.", ".$fat.", ".$carb.", " .$part. ");";
	}
	//echo $sql;
		try{
			$db->exec($sql);
			echo "It has been submitted successfully!";
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
	
}
?>