<?php
include("menu.php");
?>
<p>Hello <?=$name?>, ON Date <?=$_GET["dateOn"]?> : <br></p>
	<?=showFood()?>
	<?=showWorkout()?>	
	<br><br>
	<?=result()?>	
</body>
</html>
<?php
	$addedCal = 0;
	$addedPro = 0;
	$addedFat = 0;
	$addedCar = 0;
	$spentCal = 0;
	$spentPro = 0;
	$spentFat = 0;
	$spentCar = 0;
	$addedMuscles = 0;

function showFood(){
		global $id;
		global $db;
		$date = date('Y-m-d', strToTime($_GET["dateOn"]));
		$sql = "SELECT F.Name, F.Calorie_per_gram, F.Protein_per_gram, F.Fat_per_gram, F.Carbohydrate_per_gram, E.Eating_amount 
				FROM (SELECT Food_id, Name, Calorie_per_gram, Protein_per_gram, Fat_per_gram, Carbohydrate_per_gram 
				FROM food) F JOIN (SELECT Dates, Eating_amount, Food_id 
				FROM cust_eats_food 
				WHERE customer_id=".$id." AND Dates ='".$date."') E ON F.Food_id = E.Food_id;";
		$query = $db->prepare($sql);
		$query->execute();
		if($query->rowCount() == 0)
			echo 'Nothing is available! select different date!';
		else{
			
	?>
<table>
	<tr>
		<td>
			Taken Food:
		</td>
		<td>
			Total Calorie :
		</td>
		<td>
			Total Protein:
		</td>
		<td>
			Total Fat :
		</td>
		<td>
			Total Carbohydrate :
		</td>
		<td>
			Eat Amount(g) :
		</td>
	</tr>
	<?php
		$rows = $query->fetchAll();
		global $addedCal;
		global $addedPro;
		global $addedFat;
		global $addedCar;
		$addedAmount = 0;
		foreach($rows as $row){
			$name = $row["Name"];
			$eatAmount = $row["Eating_amount"];
			$totCal = $row["Calorie_per_gram"] * $eatAmount;
			$totPro = $row["Protein_per_gram"] * $eatAmount;
			$totFat = $row["Fat_per_gram"] * $eatAmount;
			$totCar = $row["Carbohydrate_per_gram"] * $eatAmount;
			$addedCal += $totCal;
			$addedPro += $totPro;
			$addedFat += $totFat;
			$addedCar += $totCar;
			$addedAmount += $eatAmount;
	?>
	<tr>
		<td>
			<input type="text" value="<?=$name?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totCal?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totPro?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totFat?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totCar?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$eatAmount?>" readonly/>
		</td>
	</tr>
	<?php
		}
	?>
	<tr>
		<td>
			Total :
		</td>
		<td>
			<input type="text" id="FoodCal" value="<?=$addedCal?>" readonly/>
		</td>
		<td>
			<input type="text" id="FoodPro" value="<?=$addedPro?>" readonly/>
		</td>
		<td>
			<input type="text" id="FoodFat" value="<?=$addedFat?>" readonly/>
		</td>
		<td>
			<input type="text" id="FoodCar" value="<?=$addedCar?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$addedAmount?>" readonly/>
		</td>
	</tr>
</table>
<br>
<br>

<?php

		}
}
?>

<?php

function showWorkout(){
		global $id;
		global $db;
		$date = date('Y-m-d', strToTime($_GET["dateOn"]));
		$sql = "SELECT M.Name, M.Gain_muscle_per_each, M.Spending_calorie_per_each, M.Suggested_protein_per_each, M.Suggested_fat_per_each, M.Suggested_carbohydrate_per_each, S.Count 
				FROM (SELECT Name, Gain_muscle_per_each, Spending_calorie_per_each, Suggested_protein_per_each, Suggested_fat_per_each, Suggested_carbohydrate_per_each, Workout_id 
				FROM workout_method) M 
				JOIN 
				(SELECT Workout_id, Dates, Count 
				FROM workout_session 
				WHERE Customer_id=".$id." AND Dates='".$date."') S ON M.Workout_id=S.Workout_id;";
		$query = $db->prepare($sql);
		$query->execute();
		if($query->rowCount() == 0)
			echo 'Nothing is available! select different date!';
		else{
?>
<table>
	<tr>
		<td>
			Workout name:
		</td>
		<td>
			Calorie spending:
		</td>
		<td>
			Protein Spending :
		</td>
		<td>
			Fat Spending :
		</td>
		<td>
			Carbohydrate Spending :
		</td>
		<td>
			Gained muscle :
		</td>
		<td>
			Number Executed :
		</td>
	</tr>
	<?php
		$rows = $query->fetchAll();
		
		global $addedMuscles;
		global $spentCal;
		global $spentPro;
		global $spentFat;
		global $spentCar;
		$addedNums = 0;
		foreach($rows as $row){
			$name = $row["Name"];
			$count = $row["Count"];
			$totMuscle = $row["Gain_muscle_per_each"] * $count;
			$totCal = $row["Spending_calorie_per_each"] * $count;
			$totPro = $row["Suggested_protein_per_each"] * $count;
			$totFat = $row["Suggested_fat_per_each"] * $count;
			$totCar = $row["Suggested_carbohydrate_per_each"] * $count;
			$addedMuscles += $totMuscle;
			$spentCal += $totCal;
			$spentPro += $totPro;
			$spentFat += $totFat;
			$spentCar += $totCar;
			$addedNums += $count;
	?>
	<tr>
		<td>
			<input type="text" value="<?=$name?>" readonly/>
		</td>		
		<td>
			<input type="text" value="<?=$totCal?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totPro?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totFat?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totCar?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$totMuscle?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$count?>" readonly/>
		</td>
	</tr>
	<?php
		}
	?>
	<tr>
		<td>
			Total :
		</td>
		<td>
			<input type="text" id="WorkCal" value="<?=$spentCal?>" readonly/>
		</td>
		<td>
			<input type="text" id="WorkPro" value="<?=$spentPro?>" readonly/>
		</td>
		<td>
			<input type="text" id="WorkFat" value="<?=$spentFat?>" readonly/>
		</td>
		<td>
			<input type="text" id="WorkCar" value="<?=$spentCar?>" readonly/>
		</td>
		<td>
			<input type="text" id="WorkMuscle" value="<?=$addedMuscles?>" readonly/>
		</td>
		<td>
			<input type="text" value="<?=$addedNums?>" readonly/>
		</td>
	</tr>
</table>
<?php
		}
}
function result(){
	global $addedCal;
	global $addedPro;
	global $addedFat;
	global $addedCar;
	global $spentCal;
	global $spentPro;
	global $spentFat;
	global $spentCar;
	global $addedMuscles;
	showResult("Calorie", $addedCal, $spentCal);
	showResult("Protein", $addedPro, $spentPro);
	showResult("Fat", $addedFat, $spentFat);
	showResult("Carbohydrate", $addedCar, $spentCar);
	echo '<br>';
	fatAndMuslce($addedMuscles, $addedPro, $spentPro, $addedFat, $spentFat);
}
function showResult($Name, $gain, $spend){
	$difference;
	if($gain == $spend){
		echo 'You did a perfect balance on gaining and spending'.$Name.'!';
	}else if($gain > $spend){
		$difference = $gain-$spend;
		echo 'You gained more than you spent! Try to spend '.$difference. ' more on '.$Name.'!';
	}else{
		$difference = $spend-$gain;
		echo 'You spent more than you gained! Try to gain '.$difference. ' more on '.$Name.'!';
	}
	echo '<br>';
}
function fatAndMuslce($muscle, $gainedPro, $spentPro, $gainedFat, $spentFat){
	$protein = $gainedPro - $spentPro;
	$totalMuscle = $protein >= 0 ? $muscle : $muscle + $protein;
	$fat = $gainedFat - $spentFat;
	echo 'You have gained ' .$totalMuscle. 'g of muscle, <br>
		  You have '.($fat >= 0 ? 'gained ' : 'lose '). $fat .'g on fat.';
}
?>