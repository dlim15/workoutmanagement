<?php
include("menu.php");
?>
<p><?=updatePw()?></p>
</body>
</html>

<?php
function updatePw(){
	global $id;
	global $db;
	
	$sql = "UPDATE Fitness_member SET Web_pw ='" .$_GET["nPw"]. 
	"' WHERE Personal_id=" .$id . ";";
	
	//echo $sql;
		try{
			$db->exec($sql);
			echo "It has been updated successfully!";
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
	
}
?>