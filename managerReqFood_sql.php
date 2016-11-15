<?php
include("menu.php");
?>

<?=addFood()?>
</body>
</html>
<?php
function addFood(){
	global $db;
	global $id;
	
	$cids = $_GET["txtCid"];
	$index=0;
	$rids = $_GET["txtRid"];
	$foodName = $_GET["txtFood"];
	$gram = $_GET["txtGram"];
	
	$cal = $_GET["txtCal"];
	$pro = $_GET["txtProtein"];
	$fat = $_GET["txtFat"];
	$carb = $_GET["txtCarb"];
	$addFoodSql = "";
	$getJustAddedFoodSql = "SELECT @Just_Added := MAX(Food_id) FROM food ";
	$addAddedFoodCustSql = "";
	$addFoodCustSql = "";
	$delReqFoodSql = "";
	foreach($rids as $rid){
		$existFood = $_GET["cmbFood".$index];
		$date = date('Y-m-d', strToTime($_GET["txtDate"][$index]));
		if(isset($_GET["chkReqFood".$index])){
			$delReqFoodSql .= (strlen($delReqFoodSql) == 0 ?  
			"Delete FROM food_req WHERE " : " OR ") . "req_id=" . $rid;
			if(!isset($_GET["chkHasFood".$index])){
				$addFoodSql .= (strlen($addFoodSql) == 0 ? "INSERT INTO Food(Name, Calorie_per_gram, Protein_per_gram, Fat_per_gram, Carbohydrate_per_gram, Updatedby) 
				VALUES " : ", ") . "('".$foodName[$index]."', ".$cal[$index].", ".$pro[$index] .", "
				.$fat[$index]. ", " . $carb[$index] . ", " . $id .")";
				$addAddedFoodCustSql .= $getJustAddedFoodSql ."WHERE name='". $foodName[$index] ."';INSERT INTO cust_eats_food VALUES" 
				."(" . $cids[$index]. ", @Just_Added, ". $gram[$index] .", '" .$date ."');";
			}
			else{
				$addFoodCustSql .= (strlen($addFoodCustSql) == 0 ? "INSERT INTO cust_eats_food VALUES" : 
			", ") . "(" . $cids[$index]. ", " .$existFood. ", ". $gram[$index] .", '" .$date ."')";
			}
				
		}
		$index++;
	}
	$sql= "";
	$sql .= (strlen($delReqFoodSql) > 0 ? $delReqFoodSql .";" : "");
	$sql .= (strlen($addFoodSql) > 0 ? $addFoodSql .";" : "");
	$sql .= (strlen($addAddedFoodCustSql) > 0 ? $addAddedFoodCustSql : "");
	$sql .= (strlen($addFoodCustSql) > 0 ? $addFoodCustSql .";" : "");
	
	//echo $sql;
	try{
		$db->exec($sql);
		echo "It has been submitted successfully!";
	}catch(PDOException $e){
		echo $sql. "<br>" .$e->getMessage();
	}
}