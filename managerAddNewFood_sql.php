<?php
include("menu.php");
?>

<p> Hey <?=$name?>, we have successfully added new food!<br>
<?=insertNewFood()?>
</body>
</html>

<?php
function insertNewFood(){
	global $id;
	global $db;
	$sql = "INSERT INTO Food (Name, Calorie_per_gram, Protein_per_gram, Fat_per_gram, Carbohydrate_per_gram, Updatedby) VALUES ";
	$maxNum = $_GET["maxNum"];
	for($i = 0; $i <= $maxNum; $i++){
		$name = $_GET["txtFood".$i];
		$cal = $_GET["txtCal".$i];
		$pro = $_GET["txtProtein".$i];
		$fat = $_GET["txtFat".$i];
		$carb = $_GET["txtCarb".$i];
		$sql .= "('".$name."', ".$cal.", ".$pro.", ".$fat.", ".$carb.", ".$id.")";
		$sql .= ($i == $maxNum) ? ";" : ", ";
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