<?php
include("menu.php");
?>

<p> Hey <?=$name?>, we have successfully updated your info!<br>
<?=updateInfo()?>
</body>
</html>

<?php
function updateInfo(){
	global $id;
	global $db;
	$sql = "UPDATE Fitness_member 
			SET Phone='".$_GET["phone"]."', 
			Street ='".$_GET["street"]."', 
			City ='".$_GET["city"]."', 
			State ='".$_GET["state"]."',
			Zip_code ='".$_GET["zipcode"]."'
			WHERE Personal_id=".$id.";";
	echo $sql;
		try{
			$db->exec($sql);
			echo "It has been submitted successfully!";
		}catch(PDOException $e){
			echo $sql. "<br>" .$e->getMessage();
		}
	
}
?>