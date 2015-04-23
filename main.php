<?php 
header('P3P: CP="CAO PSA OUR"');
include ("../../teachersession.php"); // Connect to the database.
include ("../../letters_connect.php"); // Connect to the database.

$page_title = 'UA Maker Mastery Portal Main Page';
require_once ('includes/config.inc'); 
include_once ('includes/header.html');

?>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
<script src="./includes/clmenu.js" type="text/javascript"></script>
<link href="./includes/clmenu.css" type="text/css" rel="stylesheet" /> 
<title></title>
</head>


<table bgcolor="#ffffff" border="1" cellpadding="0" cellspacing"0" width="950">

<tr><td bgcolor="#ffca50" border="0" cellpadding="0" cellspacing"0" valign="top" width="250">

<table>
<tr><th>

<?php  include_once ('includes/menuuam.php');?>

<br></br>

</th>
			
			
</table>
</td>

<td align="left" valign="top" width="600">
<div align="left">
	  
<table>
<tr>
<td align="left" valign="top"  width="500"> 

<br>

<img src="./Pics/uamaker2.jpg" alt="UA Maker" /> 


</td>



</div>


</td>

</table>


</div>
</table>
</body>

<?php  include_once ('includes/footer.html');?>

</html>