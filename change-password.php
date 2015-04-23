<?
//include ("../../session.php"); // Connect to the database.
session_start();
$currentuser = $_SESSION['currentuser'];

echo "<form action='change-passwordck.php' method=post><input type=hidden name=todo value=change-password>
<table border='0' cellspacing='0' cellpadding='0' align=center>
<tr bgcolor='#f1f1f1' > <td colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'>&nbsp;Welcome <b>$currentuser.</b> </font><br></br></td></tr><br>
<tr bgcolor='#f1f1f1' > <td colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'>&nbsp;For security reasons, please change your password from the default password.</font><br></br></td></tr><br>
<tr bgcolor='#f1f1f1' > <td colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'>&nbsp;Please choose a password that is at least <b>six</b> characters long.</font><br></br></td></tr><br>
<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >User name</td><td >&nbsp;<font face='Verdana' size='2'><input type=text name=username value=$currentuser><br></br></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >Old Password</td><td >&nbsp;<font face='Verdana' size='2'><input type=password name=oldpassword><br></br></td></tr>
<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >Password</td><td >&nbsp;<font face='Verdana' size='2'><input type=password name=password><br></br></td></tr>
<tr ><td >&nbsp;<font face='Verdana' size='2' >Re-enter Password</td><td >&nbsp;<font face='Verdana' size='2'><input type=password name=password2><br></br></td></tr>
<tr bgcolor='#ffffff' > <td colspan=2 align=center><input type=submit value='Change Password'>&nbsp;&nbsp;<input type=reset value=Reset></font></td></tr>
";
echo "</table>";

echo "<br></br><center><font face='Verdana' size='2' >Click <a href=./logout.php>here to logout</a><br></center></font>";

?>

