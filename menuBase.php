<?php
include("menu.php");
?>
<script>
$(document).ready(function() {
	
	for (var i = 1; i<5; i++){
		$("#opt"+i).on("click", {value:i}, function(event){
			$('.list'+event.data.value).toggle();
		});
    
	}
});
</script>
<body>
	<div id="header">
		<h1> FITNESS MANAGEMENT SYSTEM </h1>
		<a href="logout.php?name=<?=$name?>" class="logout">Logout</a>
		</div>
	<div id="nav">
		<ul> <a href="#" id="opt1"> My account </a>
			<li class="list1"><a href="changePw.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Change password </a></li>
			<li class="list1"><a href="accountBase.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Change info</a></li>
		</ul>