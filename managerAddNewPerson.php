<?php
include("menu.php");
?>

<form action="managerAddNewPerson_sql.php" method="get">
<table>
	<tr>
		<td><input type="radio" name="person_type" value="customer" checked="checked"> Customer </input></td>
		<td><input type="radio" name="person_type" value="trainer"> Trainer </input></td>
		<td><input type="radio" name="person_type" value="manager"> Manager </input></td>
	</tr>
	<tr>
		<td>First Name :</td>
		<td>Last Name :</td>
		<td>Phone number :</td>
		<td>Age :</td>
		<td>Gender :</td>
	</tr>
	<tr>
		<td><input type="text" name="fName" class="boxes" required></td>
		<td><input type="text" name="lName" class="boxes" required></td>
		<td><input type="phone" name="phone" id="numOnly0" class="boxes" size="10" maxlength="10" required></td>
		<td><input type="text" name="age" id="numOnly1" class="boxes"  required></td>
		<td><input type="text" name="gender" class="boxes"  required></td>
	</tr>
	<tr>
		<td>Street :</td>
		<td>City :</td>
		<td>State :</td>
		<td>Zipcode :</td>
		<td>Ssn :</td>
	</tr>
	<tr>
		<td><input type="text" name="street" class="boxes" required ></td>
		<td><input type="text" name="city" class="boxes" required ></td>
		<td><input type="text" name="state" class="boxes" required ></td>
		<td><input type="text" name="zipcode" id="numOnly2" class="boxes" required size="5" maxlength="5"></td>
		<td><input type="text" name="ssn" id="numOnly3" class="boxes" size="9" maxlength="9" required ></td>
	</tr>
	<tr class="cust">
		<td>workout period :</td>
		<td>muscle :</td>
		<td>fat :</td>
		<td>weight :</td>
		<td>assignTrainer :</td>
	</tr>
	<tr class="cust">
		<td><input type="text" name="period" id="numOnly4" class="custom" required ></td>
		<td><input type="text" name="muscle" id="floatOnly0" class="custom" required ></td>
		<td><input type="text" name="fat" id="floatOnly1" class="custom" required ></td>
		<td><input type="text" name="weight" id="floatOnly2" class="custom" required ></td>
		<td><select name="by" class="custom" required >
			<option value=""></option>
			<?php
				$sql = "SELECT p.Personal_id, p.Fname, p.Lname 
				FROM (SELECT Personal_id, Fname, Lname 
				FROM fitness_member) AS p 
				JOIN (SELECT Personal_id 
				FROM trainer) t 
				ON p.Personal_id=t.Personal_id;";
				$query = $db->prepare($sql);
				$query->execute();
				$rows = $query->fetchAll();
				foreach($rows as $row){
					
			?>
			<option value="<?=$row["Personal_id"]?>" > <?=$row["Fname"]?> <?=$row["Lname"]?> </option>
			<?php
			}
			?>
		</select>
		</td>
	</tr>
	<tr class="cust">
		<td>Shoulder muscle:</td>
		<td>Shoulder Fat :</td>
		<td>Bicept muscle :</td>
		<td>Bicept fat :</td>
	</tr>
	<tr class="cust">
		<td><input type="text" name="shoulderM" id="floatOnly3" class="custom" required ></td>
		<td><input type="text" name="shoulderF"id="floatOnly4" class="custom" required ></td>
		<td><input type="text" name="BiceptM" id="floatOnly5" class="custom" required ></td>
		<td><input type="text" name="BiceptF" id="floatOnly6" class="custom" required ></td>
	</tr>
	<tr class="cust">
		<td>Tricep muscle:</td>
		<td>Tricep Fat :</td>
		<td>Chest muscle :</td>
		<td>Chest fat :</td>
	</tr>
	<tr class="cust">
		<td><input type="text" name="TricepM" id="floatOnly7" class="custom" required ></td>
		<td><input type="text" name="TricepF" id="floatOnly8" class="custom" required ></td>
		<td><input type="text" name="ChestM" id="floatOnly9" class="custom" required ></td>
		<td><input type="text" name="ChestF" id="floatOnly10" class="custom" required ></td>
	</tr>
	<tr class="cust">
		<td>Abs muscle:</td>
		<td>Abs Fat :</td>
		<td>Back muscle :</td>
		<td>Back fat :</td>
	</tr>
	<tr class="cust">
		<td><input type="text" name="AbsM" id="floatOnly11" class="custom" required ></td>
		<td><input type="text" name="AbsF" id="floatOnly12" class="custom" required ></td>
		<td><input type="text" name="BackM" id="floatOnly13" class="custom" required ></td>
		<td><input type="text" name="BackF" id="floatOnly14" class="custom" required ></td>
	</tr>
	<tr class="cust">
		<td>Leg muscle:</td>
		<td>Leg Fat :</td>
	</tr>
	<tr class="cust">
		<td><input type="text" name="LegM" id="floatOnly15" class="custom" required ></td>
		<td><input type="text" name="LegF" id="floatOnly16" class="custom" required ></td>
	</tr>
	<tr class="trai">
		<td>salary :</td>
		<td>numCustomer :</td>
	</tr>
	<tr class="trai">
		<td><input type="text" name="salary" id="floatOnly17" class="train" required ></td>
		<td><input type="text" name="numCust" id="numOnly5" class="train" required ></td>
	</tr>
	<tr class="mng">
		<td>Year as manager :</td>
	</tr>
	<tr class="mng">
		<td><input type="text" name="yearMng" id="numOnly6" class="mana" required ></td>
	</tr>
</table>
<input name="id" value="<?=$id?>" class="hiddenField"/>
<input name="name" value="<?=$name?>" class="hiddenField"/>
<input type="submit" value="Add" class="boxes">
</form>
<script>
$(document).ready(function(){
	$('.trai').hide();
	$('.mng').hide();
	$('.train').attr('required', false);
	$('.mana').attr('required', false);
	$('input:radio[name=person_type]').change(function(){
		if(this.value == 'customer'){
			$('.cust').show();
			$('.trai').hide();
			$('.mng').hide();
			$('.custom').attr('required', true);
			$('.train').attr('required', false);
			$('.mana').attr('required', false);
		}
		else if(this.value == 'trainer'){
			$('.cust').hide();
			$('.trai').show();
			$('.mng').hide();
			$('.custom').attr('required', false);
			$('.train').attr('required', true);
			$('.mana').attr('required', false);
		}
		else{
			$('.cust').hide();
			$('.trai').hide();
			$('.mng').show();
			$('.custom').attr('required', false);
			$('.train').attr('required', false);
			$('.mana').attr('required', true);
		}
	});
	numberOnlyCheck();
	floatOnlyCheck();
	function numberOnlyCheck(){
		for (var i=0; i<7; i++)
			numericCheck('#numOnly'+i,false);
	}
	
	function floatOnlyCheck(){
		for (var i=0; i<18; i++)
			numericCheck('#floatOnly'+i,true);
	}
	
	function numericCheck(id, isFloat){
		$(id).keypress(function(e){
			if(e.which != 0 && e.which != 8 && (isFloat? e.which != 46 : true) && (e.which < 48 || e.which > 57)){
				alert("Number only!");
				return false;
			}
				
		});
		 
	}
});
</script>
</body>
</html>