<?php 
include '../../letters_connect.php';
include '../../session.php';//admin session

$page_title = 'Add users';

require_once ('../includes/config.inc'); 
include_once ('../includes/header2.html');

//check if user has admin access
$query  = "SELECT * FROM  users WHERE userid='$currentuser'";
$result=mysql_query($query) or die(mysql_error());
$addusers=mysql_result($result,0,"addusers");
$addcategories=mysql_result($result,0,"addcategories");
$adddiscipline=mysql_result($result,0,"adddiscipline");
$viewprivate=mysql_result($result,0,"viewprivate");
$fulladmin=mysql_result($result,0,"fulladmin");


if(($addusers) OR ($fulladmin)){

?>
<html>
<head>
<title>Add new user</title>
</head>

<body bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

<table border='0' width='50%' cellspacing='0' cellpadding='0' align=center><form name=form1 method=post action=signupck.php onsubmit='return validate(this)'><input type=hidden name=todo value=post>

<tr bgcolor='#f1f1f1'><td align=center colspan=2><font face='Verdana' size='2' ><b>Signup</b></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >User ID</td><td ><font face='Verdana' size='2'><input type=text name=userid></td></tr>

<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >Password</td><td ><font face='Verdana' size='2'><input type=password name=password></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >Re-enter Password</td><td ><font face='Verdana' size='2'><input type=password name=password2></td></tr>


<tr bgcolor='#f1f1f1'><td ><font face='Verdana' size='2' >&nbsp;Email</td><td  ><input type=text name=email></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='2' >First Name</td><td ><font face='Verdana' size='2'><input type=text name=firstname></td></tr>

<tr ><td >&nbsp;<font face='Verdana' size='2' >Last Name</td><td ><font face='Verdana' size='2'><input type=text name=lastname></td></tr>

<tr bgcolor='#f1f1f1'><td align=center colspan=2><input type=submit value=Signup></td></tr>
</table>

<center>
<br><br><font face='Verdana' size='2' ><a href='../login.php'>Already a member ? Please Login</a></font></center> 

</body>
<?
}
else {
echo "<br></br>You do not have permission to view this page. Please click on the link below to return to main page.<br><br/><a href='../main.php'>Back to to main page</a>";
}
?>

<?php  include_once ('../includes/footer.html');?>
</html>
