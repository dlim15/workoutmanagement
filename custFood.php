<?php 
include("menu.php");

?>

<script>
$(document).ready(function() {
	replaceField(0);
	var add = 0;
	numericCheck(0);
	$("#addLine").on('click', function () {
		add++;
		var $clone = $('table.addFood tr.cloneLine:first').clone();
		$clone.find('input').val('');
		$clone.find('td').each(function(){
			var el = $(this).find(':first-child');
			var id = el.attr('id') || null;
			var name = el.attr('name');
			if(id){
				
				var prefix = id.substr(0,findDigit(id));
				var namePrefix = name.substr(0,findDigit(name));
				
				el.attr('id', prefix+add);
				el.attr('name', namePrefix+add);
			}
		});
		$clone.insertAfter('table.addFood tr.cloneLine:last');
		$("#maxNum").val(add);
		numericCheck(add);
		replaceField(add);
	});
	
	$('#delLine').on('click', function() {
		if(add > 0){
			$('table.addFood tr.cloneLine:last').remove();
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
	
	function replaceField(num){
		$('#addNew'+num).on('change',function(){
		if($(this).prop('checked')){
			document.getElementById('food'+num).value="";
			$('#food'+num).hide();
			$('#food'+num).prop('required',false);
			$('#newFood'+num).show();
			$('#newFood'+num).prop('required',true);
		}else{
			document.getElementById('newFood'+num).value="";
			$('#newFood'+num).hide();
			$('#newFood'+num).prop('required',false);
			$('#food'+num).show();
			$('#food'+num).prop('required',true);
		}
		});
	}

	function numericCheck(num){
		$('#amount'+num).keypress(function(e){
			if(e.which != 0 && e.which != 8 && e.which != 46 && (e.which < 48 || e.which > 57)){
				$('#errMsg'+num).html("Numbers only").show().fadeOut("slow");
				return false;
			}
				
		});
		 
	}
	
	
	
});
</script>
<form action="custAddFood_sql.php" method="get">
<table class="addFood">
	<tr>
		<th>
			Date:
		</th>
		<th colspan="3">
			Food Name:
		</th>
		<th>
			Amount ate (in gram):
		</th>
	</tr>
	<tr class="cloneLine">
		<td>
			<input type="date" name="dateFood0" id="fDate0" required/>
		</td>
		<td>
			<select name="cmbFood0" id="food0" required>
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
			
		</td>
		<td>
			<input type="text" name="txtNewFood0" id="newFood0" class="hiddenField"/>
		</td>
		<td>
			<input type="checkbox" name="chkNew0" id="addNew0">Check if not on list</input>
		</td>
		<td>
			<input type="text" name="txtEatAmount0" id="amount0" size="4" required/>
		</td>
		<td>
			<span name="errMsg0" id="errMsg0" class="errMsg"></span>
		</td>
	</tr>
	<tr>
		<td>
			<input type="button" id="addLine" Value="Click to add another food"/>
		</td>
		<td>
			<input type="button" id="delLine" Value="Click to delete last row"/>
		</td>
	</tr>
</table>
<input name="maxNum" id="maxNum" value="0" class="hiddenField" />
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="submit"/>
</form>
</body>
</html> 