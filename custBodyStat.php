<?php
include("menu.php");
?>
<p> Your body : <br></p>
<table>
	<tr>
		<td>
			Total Muscle on your body
		</td>
		<td>
			Total Fat on your body
		</td>
		<td>
			Total Weight on your body
		</td>
	</tr>
	<?php
		$sql = "SELECT FAT, Muscle, WEIGHT 
				FROM customer 
				where Personal_id=".$id.";";
		$query = $db->prepare($sql);
		$query->execute();
			$rows = $query->fetchAll();
			$row = $rows[0];
			$mus = number_format($row["Muscle"] / 1000, 2,'.','');
			$fat = number_format($row["FAT"] / 1000, 2,'.','');
			$weight = number_format($row["WEIGHT"] / 1000, 2,'.','');
	?>
	<tr>
		<td>
			<input type="text" value="<?=$mus?>kg" readonly />
		</td>
		<td>
			<input type="text" value="<?=$fat?>kg" readonly />
		</td>
		<td>
			<input type="text" value="<?=$weight?>kg" readonly />
		</td>
	</tr>
</table>
<p> Your body part : <br></p>
<table>
	<tr>
		<td>
			Body part
		</td>
		<td>
			Muscle
		</td>
		<td>
			Fat
		</td>
	</tr>
	<?php
		$sql = "SELECT P.Part_name, B.Fat, B.Muscle 
				FROM (SELECT Body_num, Fat, Muscle 
				FROM cust_body 
				WHERE Customer_id=".$id.") B JOIN (SELECT Part_num, Part_name 
				FROM body_part) P ON B.Body_num = P.Part_num;";
		$query = $db->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();
		foreach($rows as $row){
			
			$muscle = number_format($row["Muscle"] / 1000, 2,'.','');
			$fat = number_format($row["Fat"] / 1000, 2,'.','');
		?>
	<tr>
		<td>
			<input type="text" value="<?=$row["Part_name"]?>" readonly />
		</td>
		<td>
			<input type="text" value="<?=$muscle?>kg" readonly />
		</td>
		<td>
			<input type="text" value="<?=$fat?>kg" readonly />
		</td>
	</tr>
	<?php
		}
	?>
</table>
</body>
</html>