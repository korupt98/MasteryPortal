<?php 
include '../../letters_connect.php';
include '../../session.php';//admin session

$page_title = 'Edit users';

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

$query  = "SELECT * from users WHERE active=1 ORDER BY lastname ASC, firstname ASC";

$result = mysql_query ($query);
$num=mysql_numrows($result);
mysql_close();
?>

<tr>

      <td bgcolor="#ffca50">
    </td>
  <td height="3" bgcolor="#FFFFFF"><tr>
      <td><table border="1" cellspacing="0" cellpadding="3" rules="all">
  </h1>

  </h2>

  <tr>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">UserID</font></th>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">FirstName</font></th>
	<th align="left"><font size=2 face="Arial, Helvetica, sans-serif">LastName</font></th>
	<th align="left"><font size=2 face="Arial, Helvetica, sans-serif">Email</font></th>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">ResetPassword</font></th>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">Delete</font></th>
  </tr>
  <?php 
$i=0;
while ($i < $num) {
$userid=mysql_result($result,$i,"userid");
$first=mysql_result($result,$i,"firstname");
$last=mysql_result($result,$i,"lastname");
$email=mysql_result($result,$i,"email");

?>
  <tr>
	<td><font size=2 face="Arial, Helvetica, sans-serif"><?php  echo "$userid"; ?>&nbsp;</font></td>
    <td><font size=2 face="Arial, Helvetica, sans-serif"><?php  echo "$first"; ?>&nbsp;</font></td>
    <td><font size=2 face="Arial, Helvetica, sans-serif"><?php  echo "$last"; ?>&nbsp;</font></td>
    <td><font size=2 face="Arial, Helvetica, sans-serif"><?php  echo "$email"; ?>&nbsp</font></td>
	<td><font size=2 face="Arial, Helvetica, sans-serif"><a href="resetpassword.php?rid=<?php echo $userid;?>" onclick="return confirm('Are you sure you want to reset the password for <?php echo $first.' '.$last;?>?')">ResetPassword</a></font></td>
	<td><font size=2 face="Arial, Helvetica, sans-serif"><a href="deleteacct.php?did=<?php echo $userid;?>" onclick="return confirm('Are you sure you want to delete the account for <?php echo $first.' '.$last;?>?')">Delete</a></font></td>
  </tr>
  <?php 
++$i;
}
echo "</table>";


?>
  </td>

  </tr>
</table>
</body>
<?
}
else {
// Set the page title and include the HTML header.
$page_title = 'Add Users';
include_once ('../includes/header2.html');

echo "<br></br>You do not have permission to view this page. Please click on the link below to return to main page.<br><br/><a href='../main.php'>Back to to main page</a>";

}


?>
<?php  include_once ('../includes/footer.html');?>
</html>