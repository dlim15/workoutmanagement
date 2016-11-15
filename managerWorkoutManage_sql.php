<?php
include("menu.php");
?>

<p>Hey <?=$name?>, Workout methods have been updated/removed. </p><br>
<?= updateRemoveWorkout()?>
</body>
</html>

<?php
function updateRemoveWorkout(){
	global $id;
	global $db;
	
	$workouts = $_GET["txtWorkoutId"];
	$names = $_GET["txtName"];
	$muscles = $_GET["txtMuscle"];
	$cals = $_GET["txtCal"];
	$proteins = $_GET["txtProtein"];
	$fats = $_GET["txtFat"];
	$carbs = $_GET["txtCarb"];
	
	$index = 0;
	
	$removeSql = "DELETE FROM workout_method WHERE ";
	$updateSql ="";
	$initialRemoveLen = strlen($removeSql);
	$initialUpdateLen = strlen($updateSql);
	
	foreach($workouts as $workout){
		
		if(isset($_GET["chkRemove".$index])){
			$removeSql .= (strlen($removeSql) == $initialRemoveLen) ? "" : " OR ";
			$removeSql .= "Workout_id=". $workout;
			
		}
		else if(isset($_GET["chkUpdate".$index])){
			$part = $_GET["cmbPart".$index];
			$updateSql .= "UPDATE workout_method SET name='" .$names[$index]. "', Gain_muscle_per_each=" .$muscles[$index]. 
			", Spending_calorie_per_each=" .$cals[$index]. ", Suggested_protein_per_each=" .$proteins[$index]. 
			", Suggested_fat_per_each=" .$fats[$index]. ", Suggested_carbohydrate_per_each=" .$carbs[$index]. 
			", Working_part=" .$part. " WHERE Workout_id=" .$workout. ";";
		}
		$index++;
	}
	
	$sql ="";
	
	if(strlen($removeSql) > $initialRemoveLen){
		$removeSql .= ";";
		$sql .= $removeSql;
	}
	if(strlen($updateSql) > $initialUpdateLen){
		$sql .= $updateSql;
	}
	
	if(strlen($sql) != 0){
		try{
			//echo $sql;
			$db->exec($sql);
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
	}
}
?>