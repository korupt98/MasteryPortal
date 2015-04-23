<?php 
include ("../../adminsession.php"); // Connect to the database.
include ("../../letters_connect.php"); // Connect to the database.

$recordid =$_GET['rid'];
//$today = date('Y-m-d',mktime()+86400); 
$query = "DELETE from teacherabsence WHERE recordid='$recordid'";
mysql_query($query);
//return to admin page
header("location:../main.php");
?>

