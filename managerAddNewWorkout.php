<?php
include("menu.php");
?>
<script>
$(document).ready(function () {
	var add = 0;
	numericCheck(0);
	
	$("#addLine").on('click', function () {
		add++;
		var $clone = $('table.addWork tr.cloneLine:last').clone();
		$clone.find('input').val('');
		$clone.find('td').each(function(){
			var el = $(this).find(':first-child');
			var id = el.attr('id') || null;
			var name = el.attr('name');
			var classD = 'digitOnly'+add;
			if(id){
				var prefix = id.substr(0,(findDigit(id)));
				var namePrefix = name.substr(0,(findDigit(name)));
				el.attr('id', prefix+add);
				el.attr('name', namePrefix+add);
				if(el.attr('class') == ('digitOnly'+(add-1))){
					el.attr('class', classD);
				}
			}
		});
		$clone.insertAfter('table.addWork tr.cloneLine:last');
		$("#maxNum").val(add);
		numericCheck(add);
	});
	
	$('#delLine').on('click', function() {
		if(add > 0){
			$('table.addWork tr.cloneLine:last').remove();
			add--;
			$("#maxNum").val(add);
		}
	});
	
	function findDigit(str){
		for(var i=0; i<str.length; i++){
			if(str.charAt(i) <='9' && str.charAt(i) >='0')
				return i;
		}
		return -1;
	}
	
	function numericCheck(num){
		$('.digitOnly'+num).keypress(function(e){
			if(e.which != 0 && e.which != 8 && e.which != 46 && (e.which < 48 || e.which > 57)){
				$('#errMsg'+num).html("Numbers only!").show().fadeOut("slow");
				return false;
			}
				
		});
		 
	}
});	
</script>
<form action="managerAddNewWorkout_sql.php" method="get">
<table class="addWork">
	<tr>
		<th> Name </th>
		<th> Gain muscle per each </th>
		<th> Spending Calorie per each </th>
		<th> Protein per each </th>
		<th> Fat per each </th>
		<th> Carbohydrate per each </th>
		<th> Working Part </th>
		
	</tr>
	<tr class="cloneLine">
		<td> <input type="text" name="txtName0" id="txtName0" required/> </td>
		<td> <input type="text" name="txtMuscle0" id="txtMuscle0" class="digitOnly0"  /> </td>
		<td> <input type="text" name="txtCal0" id="txtCal0" class="digitOnly0" required /> </td>
		<td> <input type="text" name="txtProtein0" id="txtProtein0" class="digitOnly0" required /> </td>
		<td> <input type="text" name="txtFat0" id="txtFat0" class="digitOnly0" required /> </td>
		<td> <input type="text" name="txtCarb0" id="txtCarb0" class="digitOnly0" required /> </td>
		<td> <select name="cmbPart0" id="cmbPart0" required>
				<option value=""> </option>
				<option value="1"> Shoulder </option>
				<option value="2"> Bicep </option>
				<option value="3"> Tricep </option>
				<option value="4"> Chest </option>
				<option value="5"> Abs </option>
				<option value="6"> Back </option>
				<option value="7"> Leg </option>
			 </select>
		</td>
		<td> <span name="errMsg0" id="errMsg0" class="errMsg"></span> </td>
	</tr>
	<tr>
			<td> <input type="button" id="addLine" value="Add another workout"/> </td>
			<td> <input type="button" id="delLine" value="Remove last line"/> </td>
		</tr>
</table>
<input name="maxNum" id="maxNum" value="0" class="hiddenField"/>
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="submit"/>
</form>
</body>
</html>