<?php
include("Menu.php");
?>
<script>
$(document).ready(function (){
	var today = new Date();
	$("#dateOn").val(getFormattedDate(today));
	function getFormattedDate (date) {
		return date.getFullYear()
			+ "-"
			+ ("0" + (date.getMonth() + 1)).slice(-2)
			+ "-"
			+ ("0" + date.getDate()).slice(-2);
	}
	
});
</script>
<form action="custFitnessAnalysis_sql.php" method="get">
<div>
	<input type="date" name="dateOn" id="dateOn" required/>
	<input name="id" value="<?=$id?>" class="hiddenField"/>
	<input name="name" value="<?=$name?>" class="hiddenField"/>	
	<input type="submit" value="Look them up"/> 
</div>
</form>
	

</body>
</html>