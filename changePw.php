<?php
include("Menu.php");
?>
<?php
	$sql = "SELECT Web_pw FROM Fitness_member WHERE Personal_id=".$id.";";
	$query = $db->prepare($sql);
	$query->execute();
	$rows = $query->fetchAll();
	$pw = $rows[0]["Web_pw"];
	/*if (isset($_GET['changeP']) && !empty($_GET['cPw']) && !empty($_GET['nPw']) && !empty($_GET['nPw2'])){
		if(is_null($rows[0]) || $pw !== $_GET['cPw']){
						
			echo '<script language="javascript">';
			echo 'alert("Your current password is not correct.")';
			echo '</script>';
			header('URL = index.php');
		}
	}*/
?>

<form id="change" action="changePw_sql.php" method="get">
<table>
	<tr>
		<td>Current password :</td>
		<td><input type="password" name="cPw" id="cPw" class="boxes" required></td>
	</tr>
	<tr>
		<td>New password :</td>
		<td><input type="password" name="nPw" id="nPw" class="boxes" required></td>
	</tr>
	<tr>
		<td>Type New password again:</td>
		<td><input type="password" name="nPw2" id="nPw2" class="boxes" required></td>
	</tr>
</table>
<input name="id" value="<?=$id?>" class="hiddenField" />
<input name="name" value="<?=$name?>" class="hiddenField" />
<input type="submit" name="changeP" value="Update" class="boxes" onSubmit="return submit();">
</form>
<script>
$(document).ready(function (){
	$('#change').on('submit', function(){
		
		if(<?=$pw?> != $('#cPw').val()){
			alert("Your current password is not correct.");
			return false;
		}
		else if($('#nPw').val() != $('#nPw2').val()){
			alert("Your new password are not matched.");
			return false;
		}
		else if($('#cPw').val() == $('#nPw').val()){
			alert("Your new password should be different than the current password.");
			return false;
		}
		return true;
	});
});
	
</script>
</body>
</html>