<?php 
session_start();
session_destroy();
?>


<?php  # Script 12.5 - index.php
// This is the main page for the site.

// Include the configuration file for error management and such.
require_once ('includes/config.inc'); 

// Set the page title and include the HTML header.
$page_title = 'Sign in page';
include_once ('includes/header1.html');
?>
<h1>Welcome</h1>
<br>
<table width="300" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr><td>
<form name="form1" method="post" action="checklogin.php">
<table width="300" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Login </strong></td>
</tr>
<tr>
<br><br>
<td width="50">Username</td>
<td width="6">:</td>

<td width="300"><input name="myusername" type="text" id="myusername" size="30" style="font-size:20px;"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"  size="30" style="font-size:20px;"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</form>

<br><br>
</td></tr></table>

<p align = "left"><i>Copyright kadion.net 2014 (All rights reserved)</i></p>
