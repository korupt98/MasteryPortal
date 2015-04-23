<?php 
include '../../../letters_connect.php';
include ("../../../teachersession.php"); 
?>
<?php  # Script 12.5 - index.php
// This is the main page for the site.

// Include the configuration file for error management and such.
require_once ('../includes/config.inc'); 

// Set the page title and include the HTML header.
$page_title = 'Course Progress Reports';
include_once ('../includes/header2.html');
?>
<html>
<head> 
<script type="text/javascript" src="../includes/jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="../includes/jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
jQuery(document).ready(function(){
			$('#people').autocomplete({source:'suggest_student.php', minLength:2});
		});
</script>

<link rel="stylesheet" href="../includes/jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 
	<style type="text/css"><!--
	
	        /* style the auto-complete response */
	        li.ui-menu-item { font-size:12px !important; }
	
	--></style> 
</head>

<body>
<table border="1" cellpadding="0" cellspacing="0" width="784">
<tr bgcolor="#ffca50" ><td>
<p style="text-align: center;"><font face="Arial" size="5"><br>Choose Course</font></p>
</td></tr>


<table bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="1" width="784">
<tr>
<td align="left" valign="top" width="650">&nbsp;  
<br></br>
<table width="550" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr><td>

<form action="coursereportcalc.php" method="post">

<b>Select Course:</b>
<?php 
$queryadvisor = mysql_query("SELECT DISTINCT coursename FROM canvas ORDER BY coursename ASC");
echo "<select name='coursename'>\n";
while ($data = mysql_fetch_array($queryadvisor, MYSQL_ASSOC))
{
    echo "    <option value='{$data['coursename']}'>{$data['coursename']}</option>\n";
}
echo "</select>\n";
?>&nbsp;&nbsp;
<br></br>
<b>Enter Student (Optional):</b>
<input size="40" id="people" name='people' type="text" /> 

&nbsp;&nbsp;
<br></br>

<b>Include only ** Assessments</b>
<select name="includetype">
<option>Yes</option>
<option>No</option>
</select>
<br></br>

<b>Unlocked Number</b>
<select name="unlockednumber">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
</select>
<br></br>


&nbsp;&nbsp;
<br></br>


<input type="submit" value="Select Course" name="add">

</form>

</td></tr></table>
</br></br>

</td></tr></table>

</table>
</body>
<?php  include_once ('../includes/footer.html');?>
</html>