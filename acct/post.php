<?php 
include '../../letters_connect.php';
include ("../../session.php"); 
$userid =$_POST['userid'];
//encrypt password
$password=$_POST['password'];
$encrypted_mypassword=md5($password);

$query=mysql_query("UPDATE users set password='$encrypted_mypassword' WHERE userid='$userid'");
echo "<font face='Verdana' size='2' color=green>The password was successfully reset for $userid<br><br>";

?>