<?php 
include("menu.php");

?>

<?= insertCustFood() ?>
</body>
</html>

<?php
function insertCustFood(){
	$numRows = $_GET["maxNum"];
	global $db;
	global $id;
	global $name;

	for($i=0; $i<=$numRows; $i++){
		$eatAmount = $_GET["txtEatAmount".$i];
		$dateEat = date('Y-m-d', strToTime($_GET["dateFood".$i]));
		$sql = "INSERT INTO ";
		if(isset($_GET["chkNew".$i]))
		{
			$foodName = $_GET["txtNewFood".$i];
			$sql = $sql. "food_req (Customer_id, Manager_id, Food_name, Gram, Dates) 
					VALUES (" .$id. ", 70000, '" .$foodName. "', ";
		}
		else{
			$foodNum = $_GET["cmbFood".$i];
			$sql = $sql. "cust_eats_food
					VALUES (" .$id. ", " .$foodNum. ", ";
		}
		$sql = $sql .$eatAmount. ", '" .$dateEat. "');";
		//echo $sql;
		try{
			$db->exec($sql);
			echo "It has been submitted successfully!";
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
	}
}
?>