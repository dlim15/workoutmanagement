<?php
include("menuBase.php");
?>

	<ul><a  href="#" id="opt2"> Food </a>
		<li class="list2"><a href="custFood.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Add food </a></li>
	</ul>
	<ul><a href="#" id="opt3"> Progress </a>
		<li class="list3"><a href="custFitnessAnalysis.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Fitness Analysis </a></li>
		<li class="list3"><a href="custBodyStat.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Body status </a></li>
	</ul>
		
</div>
<iframe id="section" src="dashboard.php?id=<?=$id?>&name=<?=$name?>" name="sectionFrame"> </iframe>
</body>
</html>
