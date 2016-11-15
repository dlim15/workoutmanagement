<?php 
include("menu.php");

?>

<br>
<p>
	Foods have been deleted or updated.
	<br>
	<?= updateRemoveFood() ?>
</p>
</body>
</html>
<?php


function updateRemoveFood(){
	global $id;
	global $db;
	
	$foods = $_GET["txtFoodId"];
	$names = $_GET["txtFood"];
	$cals = $_GET["txtCal"];
	$proteins = $_GET["txtProtein"];
	$fats = $_GET["txtFat"];
	$carbs = $_GET["txtCarb"];
	$index = 0;
	
	$removeSql = "DELETE FROM Food WHERE ";
	$updateSql ="";
	$initialRemoveLen = strlen($removeSql);
	$initialUpdateLen = strlen($updateSql);
	
	foreach($foods as $food){
		
		if(isset($_GET["chkRemove".$index])){
			$removeSql .= (strlen($removeSql) == $initialRemoveLen) ? "" : " OR ";
			$removeSql .= "Food_id=". $foods[$index];
			
		}
		else if(isset($_GET["chkUpdate".$index])){
			$updateSql .= "UPDATE FOOD SET name='" .$names[$index]. "', Calorie_per_gram=" .$cals[$index].
			", Protein_per_gram=" .$proteins[$index]. ", Fat_per_gram=" .$fats[$index]. ", Carbohydrate_per_gram="
			.$carbs[$index]. " WHERE Food_id=" .$foods[$index]. ";";
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
