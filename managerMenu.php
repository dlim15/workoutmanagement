<?php
include("menuBase.php");
?>

	<ul><a href="#" id="opt2"> Food </a>
		<li class="list2">
			<a href="managerReqFood.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Requested Food </a>
		</li>
		<li class="list2">
			<a href="managerFoodManage.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Manage Food </a>
		</li>
		<li class="list2">
			<a href="managerAddNewFood.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Add new Food </a>
		</li>
	</ul>
	<ul><a href="#" id="opt3"> Workout </a>
		<li class="list3">
			<a href="managerWorkoutManage.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Manage workout </a>
		</li>
		<li class="list3">
			<a href="managerAddNewWorkout.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Add new workout </a>
		</li>
	</ul>
	<ul> <a href="#" id="opt4"> Fitness member </a>
		<li class="list4">
			<a href="managerAddnewPerson.php?id=<?=$id?>&name=<?=$name?>" target="sectionFrame"> Add new Member </a>
		</li>
	</ul>
	
</div>
<iframe id="section" src="dashboard.php?id=<?=$id?>&name=<?=$name?>" name="sectionFrame"> </iframe>
</body>
</html>
