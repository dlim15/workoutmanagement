<?php
include("menuHead.html");
include("db_info.php");
session_start();

if($_SESSION['status']!="Active")
{
    header("location:index.php");
}
global $db;
$id = $_GET["id"];
$name = $_GET["name"];
?>