<?php
include("menu.php");
?>

<p> Hey <?=$name?>, we have successfully added new member!<br>
<?=insertNewMember()?>
</body>
</html>

<?php
function insertNewMember(){
	global $id;
	global $db;
	$sql;
	$selected = $_GET["person_type"];
	if($selected == "customer"){
		$sql = "SELECT @MaxCust := (MAX(personal_id)+1) 
				FROM fitness_member 
				WHERE personal_id > 9999 
				AND personal_id < 40000;
				SELECT @WebId := FLOOR(@MaxCust / 1000) + @MaxCust % 1000;
				INSERT INTO Fitness_member 
				VALUES (@MaxCust, '".$_GET["lName"]."', '".$_GET["fName"]."', ".$_GET["age"].", '".$_GET["gender"]."', '".$_GET["phone"]."', '".$_GET["street"]."', '".$_GET["city"]."', '".$_GET["state"]."', '".$_GET["zipcode"]."', '".$_GET["ssn"]."', CONCAT('".strtolower($_GET["lName"][0])."_".strtolower($_GET["fName"])."_',@WebId), '".$_GET["phone"]."');
				INSERT INTO Customer 
				Values (@MaxCust, ".$_GET["period"].", ".$_GET["muscle"].", ".$_GET["fat"].", ".$_GET["weight"].", ".$_GET["by"].");
				UPDATE trainer 
				SET Num_customer=Num_customer+1 
				WHERE Personal_id=".$_GET["by"].";";
				"INSERT INTO Cust_body 
				VALUES (@MaxCust, 1, ".$_GET["shoulderM"].", ".$_GET["shoulderF"]."), 
				(@MaxCust, 2, ".$_GET["BiceptM"].", ".$_GET["BiceptF"]."), 
				(@MaxCust, 3, ".$_GET["TricepM"].", ".$_GET["TricepF"]."), 
				(@MaxCust, 4, ".$_GET["ChestM"].", ".$_GET["ChestF"]."), 
				(@MaxCust, 5, ".$_GET["AbsM"].", ".$_GET["AbsF"]."), 
				(@MaxCust, 6, ".$_GET["BackM"].", ".$_GET["BackF"]."), 
				(@MaxCust, 7, ".$_GET["LegM"].", ".$_GET["LegF"].");";
	}
	else if($selected == "trainer"){
		$sql = "SELECT @MaxTrainer := (MAX(personal_id)+1) 
				FROM fitness_member 
				WHERE Personal_id > 39999 
				AND Personal_id < 70000;
				SELECT @WebId := FLOOR(@MaxTrainer / 1000) + @MaxTrainer % 1000; 
				INSERT INTO Fitness_member 
				VALUES (@MaxTrainer, '".$_GET["lName"]."', '".$_GET["fName"]."', ".$_GET["age"].", '".$_GET["gender"]."', '".$_GET["phone"]."', '".$_GET["street"]."', '".$_GET["city"]."', '".$_GET["state"]."', '".$_GET["zipcode"]."', '".$_GET["ssn"]."', CONCAT('".strtolower($_GET["lName"][0])."_".strtolower($_GET["fName"])."_',@WebId), '".$_GET["phone"]."');
				INSERT INTO trainer
				VALUES (@MaxTrainer, ".$_GET["salary"].", ".$_GET["numCust"].");";
	}
	else if($selected == "manager"){
		$sql = "SELECT @MaxManager := (MAX(personal_id)+1) 
				FROM fitness_member 
				WHERE Personal_id > 70000;
				SELECT @WebId := FLOOR(@MaxManager / 1000) + @MaxManager % 1000; 
				INSERT INTO Fitness_member 
				VALUES (@MaxManager, '".$_GET["lName"]."', '".$_GET["fName"]."', ".$_GET["age"].", '".$_GET["gender"]."', '".$_GET["phone"]."', '".$_GET["street"]."', '".$_GET["city"]."', '".$_GET["state"]."', '".$_GET["zipcode"]."', '".$_GET["ssn"]."', CONCAT('".strtolower($_GET["lName"][0])."_".strtolower($_GET["fName"])."_',@WebId), '".$_GET["phone"]."');
				INSERT INTO manager
				VALUES (@MaxManager, ".$_GET["yearMng"].");";
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