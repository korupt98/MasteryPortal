<?php

include '../../../letters_connect.php';
include ("../../../teachersession.php");


$query1 = "SELECT * FROM gradecriteria where CourseID='$coursename'";
$result1 = mysql_query ($query1);
 
while ($row1 = mysql_fetch_assoc($result1)) {
	$goal = $row1['goal'];
}

?>