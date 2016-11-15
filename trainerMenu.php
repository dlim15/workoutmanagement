<?php
include("menuBase.php");
?>
	<ul><a href="#" id="opt2"> Workout </a>
		<li class="list2">
			<a href="trainerAddWorkout.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Add workout </a>
		</li>
	</ul>
	<ul> <a href="#" id="opt3"> Customer info </a>
		<li class="list3">
			<a href="trainerUpdateCustBody.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Maintain Customer </a>
		</li>
	</ul>
</div>
<iframe id="section" src="dashboard.php?id=<?=$id?>&name=<?=$name?>" name="sectionFrame"> </iframe>
</body>
</html>
