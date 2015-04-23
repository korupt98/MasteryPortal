<?php 
include ("../../adminsession.php"); // Connect to the database.
include ("../../../letters_connect.php"); // Connect to the database.

$userid =$_GET['rid'];
//$today = date('Y-m-d',mktime()+86400); 
$p = "9a31962b953d38f5702495fdf5b44ad0";

// Make the query.
$query = "UPDATE users SET password='$p' WHERE userid='$userid'";		
mysql_query($query);
//return to admin page
header("location:viewnew.php");
?>

