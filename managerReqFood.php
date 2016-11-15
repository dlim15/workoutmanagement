<?php 
include("menu.php");

?>

<?php
		$sql = "SELECT * 
				FROM food_req 
				WHERE Manager_id = " . $id . ";";
		$result = $db->query($sql);
		$query = $db->prepare($sql);
		$query->execute();
		if($query->rowCount() == 0){
			echo 'Currently, there are no requested food!';
		}
		else{
		$rows = $query->fetchAll();
		$count = 0;
		?>
<form action="managerReqFood_sql.php" method="get">

<table>
	<tr>
		<th> Add </th>
		<th> Name </th>
		<th> Exist(?)</th>
		<th> Amount </th>
		<th> Date </th>
		<th> Calorie per gram </th>
		<th> Protein per gram </th>
		<th> Fat per gram </th>
		<th> Carbohydrate per gram </th>
	</tr>
	
	
		
	<?php
		foreach($rows as $row){
			$rid = $row["req_id"];
			$cid = $row["Customer_id"];
			$Food = $row["Food_name"];
			$Gram = $row["Gram"];
			$Dates = $row["Dates"];
		?>
		<tr>
			<td> <input type="checkbox" name="chkReqFood<?=$count?>" id="chkReqFood<?=$count?>"/> </td>
			<td> <select name="cmbFood<?=$count?>" id="exFood<?=$count?>" class="hiddenField">
				<option value=""></option>
			<?php
				$sql = "SELECT Food_id, Name FROM Food ORDER BY Name;";
				
				$query = $db->prepare($sql);
				$query->execute();
				$rows = $query->fetchAll();
				foreach($rows as $row){
					$fid = $row["Food_id"];
					$choice = $row["Name"];
			?>
				<option value="<?= $fid?>"> <?= $choice?> </option>
				<?php 
				}
				?>
			</select>
			<input type="text" name="txtFood[]" id="newFood<?=$count?>" value="<?=$Food?>" /> </td>
			<td> <input type="checkbox" name="chkHasFood<?=$count?>" id="chkFood<?=$count?>" />   </td>
			<td> <input type="text" name="txtGram[]" value="<?=$Gram?>" readonly /> </td>
			<td> <input type="date" name="txtDate[]" value="<?=$Dates?>" readonly /> </td>
			<td> <input type="text" name="txtCal[]" class="willUsed<?=$count?>" required /> </td>
			<td> <input type="text" name="txtProtein[]" class="willUsed<?=$count?>" required/> </td>
			<td> <input type="text" name="txtFat[]" class="willUsed<?=$count?>" required /> </td>
			<td> <input type="text" name="txtCarb[]" class="willUsed<?=$count?>"  required /> </td>
			<td> <span id="errMsg<?=$count?>" class="errMsg"> </span> </td>
			<td> <input name="txtCid[]" value="<?=$cid ?>" class="hiddenField" /></td> 
			<td> <input name="txtRid[]" value="<?=$rid ?>" class="hiddenField" /></td> 
		</tr>
			<?php
			$count++;
		}
		?>
		
	
</table>
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="Add"/>
</form>
<?php
		}
	?>
<script>
$(document).ready(function (){

	for(var i=0; i<<?=$count?>; i++){
		requiredFieldOnCheck(i);
		replaceField(i);
		numericCheck(i);
		$('#chkReqFood'+i).prop('checked', true);
	}
	
	function requiredFieldOnCheck(num){
		$('#chkReqFood'+num).on('change',function(){
		if($(this).prop('checked')){
			$('.willUsed'+num).prop('required',true);
		}else{
			$('.willUsed'+num).prop('required',false);
		}
		});
	}
	
	function replaceField(num){
		$('#chkFood'+num).on('change',function(){
		if($(this).prop('checked')){
			$('#newFood'+num).hide();
			$('#newFood'+num).prop('required',false);
			$('.willUsed'+num).hide();
			$('.willUsed'+num).prop('required',false);
			$('#exFood'+num).show();
			$('#exFood'+num).prop('required',true);
		}else{
			document.getElementById('exFood'+num).value="";
			$('#exFood'+num).hide();
			$('#exFood'+num).prop('required',false);
			$('#newFood'+num).show();
			$('#newFood'+num).prop('required',true);
			$('.willUsed'+num).show();
			$('.willUsed'+num).prop('required',true);
		}
		});
	}
	
	function numericCheck(num){
		$('.willUsed'+num).keypress(function(e){
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