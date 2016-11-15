<?php
include("menu.php");
?>
<?=updateCustBody()?>
</body>
</html>

<?php
function updateCustBody(){
	global $db;
	global $id;
	$dates = date('Y-m-d', strToTime($_GET["dates"]));
	$custIds = $_GET["custId"];
	$sql = "SELECT * FROM trainer_maintain_cust WHERE trainer_id=". $id ." AND dates='".$dates."';";
	$query = $db->prepare($sql);
	$query->execute();
	if($query->rowCount() != 0)
		echo 'You have already updated customers on ' .$dates . '. Please select other date.';
	else{
		$otherSql = "";
		foreach($custIds AS $custId){
			$sql = "SELECT G.Gained_protein, G.Gained_fat
					FROM (SELECT SUM(F.Protein_per_gram * E.Eating_amount) AS Gained_protein, SUM(F.Fat_per_gram * E.Eating_amount) AS Gained_fat
					 FROM (SELECT Food_id, Name, Calorie_per_gram, Protein_per_gram, Fat_per_gram, Carbohydrate_per_gram 
						   FROM food) F JOIN (SELECT Dates, Eating_amount, Food_id 
											  FROM cust_eats_food 
											  WHERE customer_id=".$custId." AND Dates ='".$dates."') E ON F.Food_id = E.Food_id
					 GROUP BY E.Dates) G;";
			$query = $db->prepare($sql);
			$query->execute();
			$rows = $query->fetchAll();
			$gainedPro = $rows[0]["Gained_protein"];
			$gainedFat = $rows[0]["Gained_fat"];
			$fatOnEach = $gainedFat / 7;
			$otherSql .= "UPDATE cust_body
					SET Fat=Fat+".$fatOnEach."
					WHERE Customer_id=".$custId.";";
					
			$spentPro = 0;
			$spentFat = 0;
			$gainedMuscle = 0;
			$sql = "SELECT P.Gained_muscle, P.Spent_protein, P.Spent_fat, P.Working_part
				FROM (SELECT SUM(M.Gain_muscle_per_each * S.Count) AS Gained_muscle, SUM(M.Suggested_protein_per_each * S.Count) AS Spent_protein, SUM(M.Suggested_fat_per_each * S.Count) AS Spent_fat, M.Working_part 
				FROM (SELECT Name, Gain_muscle_per_each, Spending_calorie_per_each, Suggested_protein_per_each, Suggested_fat_per_each, Suggested_carbohydrate_per_each, Workout_id, Working_part
				FROM workout_method) M 
				JOIN 
				(SELECT Workout_id, Dates, Count 
				FROM workout_session 
				WHERE Customer_id=".$custId." AND Dates='".$dates."') S ON M.Workout_id=S.Workout_id
                GROUP BY M.Working_part) P;";
			$query = $db->prepare($sql);
			$query->execute();
			$rows = $query->fetchAll();
			foreach($rows as $row){
				$muscle = $row["Gained_muscle"];
				$sPro = $row["Spent_protein"];
				$sFat = $row["Spent_fat"];
				$part = $row["Working_part"];
				
				$otherSql .= "UPDATE cust_body
					SET Fat=Fat-".$sFat.", 
						Muscle=Muscle+".$muscle." 
					WHERE Customer_id=".$custId." AND Body_num=".$part.";";
				
				$gainedMuscle += $muscle;
				$spentPro += $sPro;
				$spentFat += $sFat;
			}
			$finalFat = 0;
			$finalFat = $gainedFat - $spentFat;
			$finalPro = 0;
			$finalPro = $gainedPro - $spentPro;
			$gainedMuscle += ($finalPro >= 0 ? 0 : $finalPro);
			
			$otherSql .= "UPDATE customer 
						SET Muscle=Muscle+" .$gainedMuscle. ", 
						FAT=FAT+".$finalFat." 
						WHERE Personal_id=".$custId.";";
		}
		$otherSql .= "INSERT INTO trainer_maintain_cust 
					VALUES (".$id.", '".$dates."');";
		$db->prepare($otherSql);
		
		//echo $otherSql;
		try{
			$db->exec($otherSql);
			echo "It has been Updated successfully!";
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
		
					
		
		
	}
}
?>