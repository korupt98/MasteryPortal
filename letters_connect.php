<?
$dbhost = 'localhost';
$dbuser = 'DB USER HERE';
$dbpass = 'DB PW HERE';
$dbname = 'DB NAME HERE';
// Connect to server and select databse.
$conn=mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");
?>