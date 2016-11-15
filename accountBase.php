<?php
include("Menu.php");
?>
<form action="accountBase_sql.php" method="get">
<?php
	$sql = "SELECT * FROM fitness_member where Personal_id=" .$id .";";
	$query = $db->prepare($sql);
	$query->execute();
	$rows = $query->fetchAll();
	foreach($rows as $row){
?>
<table>
	<tr>
		<td>Personal ID :</td>
		<td>First Name :</td>
		<td>Last Name :</td>
	</tr>
	<tr>
		<td><input type="text" name="pId" value=<?=$id?> class="boxes" readonly ></td>
		<td><input type="text" name="fName" value=<?=$row["Fname"]?> class="boxes" readonly ></td>
		<td><input type="text" name="lName" value=<?=$row["Lname"]?> class="boxes" readonly ></td>
	</tr>
	<tr>
		<td>Phone number :</td>
		<td>Age :</td>
		<td>Gender :</td>
	</tr>
	<tr>
		<td><input type="phone" name="phone" value=<?=$row["Phone"]?> class="boxes" size="10" maxlength="10" required></td>
		<td><input type="text" name="age" value=<?=$row["Age"]?> class="boxes" readonly ></td>
		<td><input type="text" name="gender" value=<?=$row["Gender"]?> class="boxes" readonly ></td>
	</tr>
	<tr>
		<td>Street :</td>
		<td>City :</td>
		<td>State :</td>
		<td>Zipcode :</td>
	</tr>
	<tr>
		<td><input type="text" name="street" value=<?=$row["Street"]?> class="boxes" required ></td>
		<td><input type="text" name="city" value=<?=$row["City"]?> class="boxes" required ></td>
		<td><input type="text" name="state" value=<?=$row["State"]?> class="boxes" required ></td>
		<td><input type="text" name="zipcode" value=<?=$row["Zip_code"]?> class="boxes" required size="5" maxlength="5"></td>
	</tr>
</table>
<?php
	}
	?>
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="Update" class="boxes">
</form>
</body>
</html>