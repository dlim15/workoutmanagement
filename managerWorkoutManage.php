<?php
include("menu.php");
?>
<form action="managerWorkoutManage_sql.php" method="get">
<table>
	<tr>
		<th> Remove </th>
		<th> Update </th>
		<th> Name </th>
		<th> Gain muscle per each </th>
		<th> Spending Calorie per each </th>
		<th> Protein per each </th>
		<th> Fat per each </th>
		<th> Carbohydrate per each </th>
		<th> Working Part </th>
		
	</tr>
	
	<?php
		$sql = "SELECT * 
				FROM workout_method;";
		$query = $db->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();
		$count = 0;
		foreach($rows as $row){
			$wid = $row["Workout_id"];
			$names = $row["Name"];
			$muscle = $row["Gain_muscle_per_each"];
			$cal = $row["Spending_calorie_per_each"];
			$pro = $row["Suggested_protein_per_each"];
			$fat = $row["Suggested_fat_per_each"];
			$car = $row["Suggested_carbohydrate_per_each"];
			$part = $row["Working_part"];
			
		?>
		<tr>
			<td> <input type="checkbox" name="chkRemove<?=$count?>" id="remove<?=$count?>" /> </td>
			<td> <input type="checkbox" name="chkUpdate<?=$count?>" id="update<?=$count?>" /> </td>
			<td> <input type="text" name="txtName[]" class="work<?=$count?>" value="<?=$names?>" readonly /> </td>
			<td> <input type="text" name="txtMuscle[]" class="work<?=$count?>" value="<?=$muscle?>" readonly /> </td>
			<td> <input type="text" name="txtCal[]" class="work<?=$count?>" value="<?=$cal?>" readonly /> </td>
			<td> <input type="text" name="txtProtein[]" class="work<?=$count?>" value="<?=$pro?>" readonly /> </td>
			<td> <input type="text" name="txtFat[]" class="work<?=$count?>" value="<?=$fat?>" readonly /> </td>
			<td> <input type="text" name="txtCarb[]" class="work<?=$count?>" value="<?=$car?>" readonly /> </td>
			<td> <select name="cmbPart<?=$count?>" class="part<?=$count?>" disabled>
					<option value="1"> Shoulder </option>
					<option value="2"> Bicep </option>
					<option value="3"> Tricep </option>
					<option value="4"> Chest </option>
					<option value="5"> Abs </option>
					<option value="6"> Back </option>
					<option value="7"> Leg </option>
				 </select>
			</td>
			<td> <span id="errMsg<?=$count?>" class="errMsg"> </span></td>
			<td> <input id="part<?=$count?>" value="<?=$part?>" class="hiddenField"></div></td>
			<td> <input type="text" name="txtWorkoutId[]" value="<?=$wid?>" readonly class="hiddenField"/> </td>
			
			
			
		</tr>
			<?php
			$count++;
		}
		?>
</table>
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="submit"/>
</form>
<script>
$(document).ready(function() {
	for(var i=0; i< <?=$count?>; i++){
		$(".part"+i).val($('#part'+i).val());
		$('#update'+i).on('change', {value:i}, function(event){
			if($(this).prop('checked')){
				$("#remove"+event.data.value).attr("checked", false);
				$(".work"+event.data.value).attr("readonly", false);
				$(".part"+event.data.value).attr("disabled", false);
			}else{
				$(".work"+event.data.value).attr("readonly", true);
				$(".part"+event.data.value).attr("disabled", true);
			}
		});
		$('#remove'+i).on('change', {value:i}, function(event){
			if($(this).prop('checked')){
				$("#update"+event.data.value).attr("checked", false);
				$(".work"+event.data.value).attr("readonly", true);
				$(".part"+event.data.value).attr("disabled", true);
			}
		});
		numericCheck(i);
		
	}
	
	function numericCheck(num){
		$('.work'+num).keypress(function(e){
			if(e.which != 0 && e.which != 8 && e.which != 46 && (e.which < 48 || e.which > 57)){
				$('#errMsg'+num).html("Numbers only!").show().fadeOut("slow");
				return false;
			}
				
		});
		 
	}
});
</script>
</body>
</html>