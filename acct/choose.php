<?php 
include '../../letters_connect.php';
include ("../../session.php"); 
?>
<html>
<head>

<title>Update Password</title>
</head>

<body leftmargin="0" topmargin="0" style="color: rgb(0, 0, 0); background-color: rgb(207, 199, 193);" link="#4c1e1e" marginheight="0" marginwidth="0" vlink="#663366">
<div align="center">
<table bgcolor="#ffca50" border="0" cellpadding="0" cellspacing="0" width="784">

<tbody>

    <tr bgcolor="#ffffff">

      <td><img alt="" src="../images/index_01.gif" align="left" height="89" width="504"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">
      <br>

The Bronx Academy of Letters<br>

339 Morris Ave., Bronx, NY 10451<br>

Joan Sullivan, principal <br>

info@bronxletters.net</font></td>

    </tr>

    <tr>

      <td>
      <p style="text-align: center;"><font face="Arial" size="5">Update Password</font></p>

      </td>

    </tr>

  </tbody>
</table>

<table bgcolor="#ffffff" border="0" width="784">

  <tbody>

    <tr>

      <td align="left" valign="top" width="613">&nbsp;
      <table width="450" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>


<form action="post.php" method="post">
<b>Select User:</b>
<?php 
$query = mysql_query("SELECT userid, firstname, lastname FROM users ORDER BY lastname ASC, firstname ASC");

echo "<select name='userid'>\n";

while ($data = mysql_fetch_array($query, MYSQL_ASSOC))
{
    echo "    <option value='{$data['userid']}'>{$data['lastname']}, {$data['firstname']}</option>\n";
}
echo "</select>\n";
?>&nbsp;&nbsp;
<tr bgcolor='#f1f1f1'><td >&nbsp;<font face='Verdana' size='2' >New Password</td><td ><font face='Verdana' size='2'><input type=password name=password></td></tr>
<input type="submit" onclick="return confirm('Are you sure you want to change the password for <?php echo $firstname.' '.$lastname;?>?') value="Submit"></td>
</tr>
<tr>



</form>
</tr>
</table>
      
      </td>
    </tr>

  </tbody>
</table>

<br>

<br>

<br>

</div>

</body>
</html>
