<?php
$name = $_GET['name'];
session_start();
session_destroy();
$_SESSION = array();
echo 'You have successfully logged out '. $name. '. Hope to see you soon!';
header('Refresh: 2; URL = index.php');
?>