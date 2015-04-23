<?php
include ("../../../letters_connect.php"); // Connect to the database.
include ("../../../teachersession.php"); // Connect to the database.

// Set the page title and include the HTML header.
$page_title = 'Update Grade Criteria';


// Include the configuration file for error management and such.
require_once ('../includes/config.inc'); 

// Set the page title and include the HTML header.
include_once ('../includes/header2.html');


$query = "SELECT DISTINCT coursename as coursename,gradecriteria.CourseID,gradecriteria.recordid,gradecriteria.goal FROM canvas 
LEFT JOIN gradecriteria
ON canvas.coursename=gradecriteria.courseid
ORDER BY coursename ASC";
$result = mysql_query ($query);
$num=mysql_numrows($result);
?>
<form action="postcriteria.php" method="post">
<font size=2 face="Arial, Helvetica, sans-serif"><u><b>Instructions</b></u></font><br><br>
<font size=2 face="Arial, Helvetica, sans-serif"> You can use this page to update the current unlock number for a particular course.<br>
 Enter the new number you want to use in the text box below then<br>
click the checkbox next to the course(s) to be updated then click the Update button.

</font><br><br>
<font size=2 face="Arial, Helvetica, sans-serif">Updated Goal:
<input type="text" name="goal" id="goal" size=10 maxlength=25 value="<?php  echo "$goal"; ?>">
</font><br><br>

<table border="1" cellspacing="0" cellpadding="3" rules="all">

<tr><th align="left"><font size=2 face="Arial, Helvetica, sans-serif"></font></th>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">Course</font></th>
    <th align="left"><font size=2 face="Arial, Helvetica, sans-serif">Unlocked Number</font></th>
</tr>

<?php
$i=0;
while ($i < $num) {
$coursename=mysql_result($result,$i,"coursename");
$courseid =mysql_result($result,$i,"courseid");
$goal =mysql_result($result,$i,"goal");
$recordid =mysql_result($result,$i,"recordid");

?>
<tr>
<td>
<input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php  echo $recordid;?>" />
<input type="hidden" readonly name="courseid[]" id="courseid" maxlength=25 value="<?php  echo $coursename;?>">
</td>
<td width=300><font size=2 face="Arial, Helvetica, sans-serif"><?php echo $coursename;?></font></td>
<td>
<?php
if($goal==NULL){
	
	$query1 = "INSERT INTO gradecriteria (courseid,goal) VALUES ('$coursename','0')";
	$result1 = mysql_query ($query1);
}else{
	
echo "$goal"; 
}

?>
</td>
</tr>


<?php
++$i;
}
?>
</table>
<input type="submit" value="Update" name="add"></td>
</body>
<?php  include_once ('../includes/footer.html');?>
</html>
