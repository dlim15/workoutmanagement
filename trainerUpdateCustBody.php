<?php
include("menu.php");
?>

<form action="trainerUpdateCustBody_sql.php" method="get">
<div>
<input type="date" name="dates" required />
<input type="submit" value="submit"/>
</div>
<table>
	<tr>
		<td>
			Customer ID
		</td>
		<td>
			Customer name
		</td>
		<td>
			Customer muscle
		</td>
		<td>
			Customer fat
		</td>
	</tr>
	<?php
		$sql = "SELECT C.Personal_id, C.Muscle, C.FAT, F.Fname, F.Lname 
				FROM (SELECT Personal_id, Muscle, FAT 
				FROM customer 
				WHERE Trainer_id=".$id.") C JOIN 
				(SELECT Fname, Lname, Personal_id 
				FROM fitness_member) F ON C.Personal_id = F.Personal_id;";
		$query = $db->prepare($sql);
		$query->execute();
		if($query->rowCount() == 0)
			echo 'You have no customer.';
		else{
			$rows = $query->fetchAll();
			foreach($rows as $row){
				$custName = $row["Lname"] .", ".$row["Fname"];
			
		?>
	<tr>
		<td>
			<input type="text" name="custId[]" value="<?=$row["Personal_id"]?>"/>
		</td>
		<td>
			<input type="text" value="<?=$custName?>"/>
		</td>
		<td>
			<input type="text" value="<?=$row["Muscle"]?>"/>
		</td>
		<td>
			<input type="text" value="<?=$row["FAT"]?>"/>
		</td>
	</tr>
	<?php
			}
		}
			?>
</table>
<input name="id" value="<?=$id?>" class="hiddenField" />
<input name="name" value="<?=$name?>" class="hiddenField" />
</form>
</body>
</html>