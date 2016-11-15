<?php 
include("menu.php");

?>

<H3>Hey <?=$name?>, It has been submitted. Thank you!</H3><br>
<?= insertWorkout() ?>
</body>
</html>

<?php
function insertWorkout(){
	$numRows = $_GET["maxNum"];
	global $db;
	global $id;
	global $name;
	$sql = "INSERT INTO Workout_session VALUES";
	for($i=0; $i<=$numRows; $i++){
		$workoutCount = $_GET["txtWorkoutCount".$i];
		$dateWorkout = date('Y-m-d', strToTime($_GET["dateWorkout".$i]));
		$workoutNum = $_GET["cmbWorkout".$i];
		$customerId= $_GET["cmbCustId".$i];
		echo $customerId;
		$sql .= "(" .$id. ", " .$customerId. ", " .$workoutNum. ", " .$workoutCount. ", '" .$dateWorkout. "')";
		$sql .= ($i+1 > $numRows) ? ";" : ", ";
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