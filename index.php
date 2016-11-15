<?php
include("upper.html");
include("db_info.php");
session_start();
?>

<form method="get">

	<div>
			<?php
			
			  if (isset($_GET['login']) && !empty($_GET['id']) && !empty($_GET['pw'])){
				global $db;
				$sql = 'SELECT personal_id, Fname, Lname, web_pw FROM fitness_member WHERE web_id = \'' .$_GET['id'] .'\'';
				
				$query = $db->prepare($sql);
				$query->execute();
				$rows = $query->fetchAll();
				$pw;
				$p_id;
				$name;
				foreach ($rows as $row){
					$pw = $row['web_pw'];
					$p_id = $row['personal_id'];
					$name = $row['Fname'] . ' ' .$row['Lname'];
				}
				echo "<p> $pw </p>" ;
				
				
				if(is_null($rows[0]) || $pw !== $_GET['pw']){
					
						echo '<script language="javascript">';
						echo 'alert("INVALID ID OR UNMATCHED PW.")';
						echo '</script>';
						header('URL = index.php');
					
					}
					else{
						echo '<script language="javascript">';
						echo 'alert("Welcome.")';
						echo '</script>';
						$_SESSION['status']="Active";
						switch (floor($p_id / 10000)){
							case 1 : header("location:custMenu.php?id=$p_id&name=$name");
							break;
							case 4 : header("location:trainerMenu.php?id=$p_id&name=$name");
							break;
							case 7 : header("location:managerMenu.php?id=$p_id&name=$name");
							break;
						}
						
						exit;
					} 
			   }
			
			?>
	</div>
	<div class="login">
		<p>
		Welcome to fitness management system. 
		</p>
		<p>
		Please enter your assigned userid and password.
		</p>
		
		<input type="text" class="form-pos" name="id" placeholder="User ID" required autofocus>
		<input type="password" class="form-pos" name="pw" placeholder="Password" required>
		<button type="submit" name="login">login</button>
	</div>
</form>
</body>
</html>	