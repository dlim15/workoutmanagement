<?php 
include("menu.php");

?>

<form action="managerFoodManage_sql.php" method="get">
<table>
	<tr>
		<th> Remove </th>
		<th> Update </th>
		<th> Name </th>
		<th> Calorie per gram </th>
		<th> Protein per gram </th>
		<th> Fat per gram </th>
		<th> Carbohydrate per gram </th>
		
	</tr>
	
	<?php
		$sql = "SELECT * 
				FROM food;";
		$query = $db->prepare($sql);
		$query->execute();
		$rows = $query->fetchAll();
		$count = 0;
		foreach($rows as $row){
			$fid = $row["Food_id"];
			$Name = $row["Name"];
			$cal = $row["Calorie_per_gram"];
			$pro = $row["Protein_per_gram"];
			$fat = $row["Fat_per_gram"];
			$car = $row["Carbohydrate_per_gram"];
			
		?>
		<tr>
			<td> <input type="checkbox" name="chkRemove<?=$count?>" id="remove<?=$count?>" /> </td>
			<td> <input type="checkbox" name="chkUpdate<?=$count?>" id="update<?=$count?>" /> </td>
			<td> <input type="text" name="txtFood[]" class="food<?=$count?>" value="<?=$Name?>" readonly /> </td>
			<td> <input type="text" name="txtCal[]" class="food<?=$count?>" value="<?=$cal?>" readonly /> </td>
			<td> <input type="text" name="txtProtein[]" class="food<?=$count?>" value="<?=$pro?>" readonly /> </td>
			<td> <input type="text" name="txtFat[]" class="food<?=$count?>" value="<?=$fat?>" readonly /> </td>
			<td> <input type="text" name="txtCarb[]" class="food<?=$count?>" value="<?=$car?>" readonly /> </td>
			<td> <span id="errMsg<?=$count?>" class="errMsg"> </span></td>
			<td> <input type="text" name="txtFoodId[]" value="<?=$fid?>" readonly class="hiddenField"/> </td>
			
			
			
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
		$('#update'+i).on('change', {value:i}, function(event){
			if($(this).prop('checked')){
				$("#remove"+event.data.value).attr("checked", false);
				$(".food"+event.data.value).attr("readonly", false);
				
			}else{
				$(".food"+event.data.value).attr("readonly", true);
				
			}
		});
		$('#remove'+i).on('change', {value:i}, function(event){
			if($(this).prop('checked')){
				$("#update"+event.data.value).attr("checked", false);
				$(".food"+event.data.value).attr("readonly", true);
			}
		});
		numericCheck(i);
	}
	
	
	function numericCheck(num){
		$('.food'+num).keypress(function(e){
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