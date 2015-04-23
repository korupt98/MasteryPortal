<?
include '../../letters_connect.php';// database connection details stored here
session_start();
$currentuser = $_SESSION['currentuser'];

$password=$_POST['password'];
$password2=$_POST['password2'];
$oldpasswordentered=$_POST['oldpassword'];
//encrypt password
$oldpassword=md5($oldpasswordentered);
?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head><title>Change password</title></head>

<body bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
<?

$query_user="SELECT * from users where userid='$currentuser'";
//@mysql_select_db($dbname) or die( "Unable to select database");

// Collects data from "friends" table
//$data = mysql_query("SELECT * from plus_signup where userid='$currentuser'")
$data = mysql_query($query_user)
or die(mysql_error());

// puts the "friends" info into the $info array 
$info = mysql_fetch_array( $data );

// Print out the contents of the entry
$pw= $info['password']; 

$status = "OK";
$msg="";

if ( strlen($password) < 6){
$msg=$msg."Password must be more than 3 characters in length<BR>";
$status= "NOTOK";}					

if ( $pw <> $oldpassword ){
$msg=$msg."Old password does not match<BR>";
$status= "NOTOK";}

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
$status= "NOTOK";}					

//encrypt password
$encrypted_mypassword=md5($password);

if($status<>"OK"){ 
echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
}else{ // if all validations are passed.
$query="update users set password='$encrypted_mypassword' where userid='$currentuser'";
@mysql_select_db($dbname) or die( "Unable to select database");
mysql_query($query);
echo "<font face='Verdana' size='2' ><center>Thanks <br> Your password changed successfully. Please keep changing your password for better security</font></center>";
}
echo "<center><font face='Verdana' size='2' ><br><br><a href=./logout.php>Log in to Account</a> &nbsp;<br></center></font>";

?>

</body>

</html>
