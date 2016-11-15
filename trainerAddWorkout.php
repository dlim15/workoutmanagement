<?php 
include("menu.php");

?>
<script>
$(document).ready(function () {
	var add = 0;
	numericCheck(0);
	$("#addLine").on('click', function () {
		add++;
		var $clone = $('table.addWorkout tr.cloneLinee:first').clone();
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
		$clone.insertAfter('table.addWorkout tr.cloneLinee:last');
		$("#maxNum").val(add);
		numericCheck(add);
	});
	
	$('#delLine').on('click', function() {
		if(add > 0){
			$('table.addWorkout tr.cloneLinee:last').remove();
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
		$('#txtWorkoutCount'+num).keypress(function(e){
			if(e.which != 0 && e.which != 8 && (e.which < 48 || e.which > 57)){
				$('#errMsg'+num).html("Numbers only").show().fadeOut("slow");
				return false;
			}
				
		});
		 
	}
});
</script>
<form action="trainerAddWorkout_sql.php" method="get">
<table class="addWorkout">
	<tr>
		<th>
			Date
		</th>
		<th>
			[Customer Id]Name
		</th>
		<th>
			Workout method
		</th>
		<th>
			Number executed
		</th>
	</tr>
	<tr class="cloneLinee">
		<td>
			<input type="date" name="dateWorkout0" id="dateWorkout0" required/>
		</td>
		<td>
			<select name="cmbCustId0" id="cmbCustId0" required>
				<option value=""></option>
				<?php
					$sql = "SELECT C.Personal_id AS id, CONCAT_WS(\" \", F.Fname, F.Lname) AS name 
							FROM fitness_member F, customer C, trainer T 
							WHERE F.Personal_id = C.Personal_id 
							AND C.Trainer_id = T.Personal_id AND T.Personal_id=" . $id . ";";
					$query = $db->prepare($sql);
					$query->execute();
					$rows = $query->fetchAll();
					foreach($rows as $row){
						$cid = $row["id"];
						$cname = $row["name"];
						?>
						<option value="<?=$cid?>">[<?=$cid?>]<?=$cname?></option> 
						<?php
					}
				?>
			</select>
		</td>
		<td>
			<select name="cmbWorkout0" id="cmbWorkout0" required>
				<option value=""></option>
				<?php
					$sql = "SELECT Workout_id, Name 
							FROM workout_method 
							ORDER BY Name;";
					$query = $db->prepare($sql);
					$query->execute();
					$rows = $query->fetchAll();
					foreach($rows as $row){
						$wid = $row["Workout_id"];
						$wname = $row["Name"];
				?>
				<option value="<?=$wid?>"><?=$wname?></option>
				<?php
					}
				?>
			</select>
		</td>
		<td>
			<input type="text" name="txtWorkoutCount0" id="txtWorkoutCount0" size="4" required/>
		</td>
		<td>
			<span name="errMsg0" id="errMsg0" class="errMsg"></span>
		</td>
	</tr>
	<tr>
		<td>
			<input type="button" id="addLine" Value="Click to add another workout"/>
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