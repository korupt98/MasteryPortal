<?php 
include '../../letters_connect.php';
include ("../../session.php"); 

$page_title = 'Import files';

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

<title>Choose File</title>
</head>

<body>

<table border="1" cellpadding="0" cellspacing="0" width="784">
<tr bgcolor="#ffca50" ><td>
<p style="text-align: center;"><font face="Arial" size="5"><br>Choose File</font></p>
</td></tr>


<table bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="1" width="784">
<tr>
<td align="left" valign="top" width="613">&nbsp;  
<br></br>
<table width="550" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr><td>


<form enctype="multipart/form-data" action="csvimport.php" method="POST">
Database to update:
<select name="dbname">
	<option value='canvas'>CANVAS</option>
	<option value='customreport'>Custom Report 101</option>
	<option value='customreport115'>Custom Report 115</option>
	<option value='customreport141'>Custom Report 141</option>
	<option value='customreport307'>Custom Report 307</option>
	<option value='customreport327'>Custom Report 327</option>
		<option value='customreport416'>Custom Report 416</option>
	<option value='rcon'>RCON</option>
	<option value='rlat'>RLAT</option>
	<option value='rsnc'>RSNC</option>
</select><br></br>

<b>Select File:</b>
<input name="userfile" size="50" type="file"> <br>
<input type="submit" value="Upload file" name="choose">

</td>
</tr>
<tr>
</form>

</td></tr></table>
<br></br>
</td></tr></table>

</table>
</body>
<?
}
else {
echo "<br></br>You do not have permission to view this page. Please click on the link below to return to main page.<br><br/><a href='../main.php'>Back to to main page</a>";
}
?>

<?php  include_once ('../includes/footer.html');?>
</html>