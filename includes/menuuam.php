<html>
<head>
<script src="clmenu.js" type="text/javascript"></script>
<link href="clmenu.css" type="text/css" rel="stylesheet" /> 
</head>

<body>
<div class="mC">

<a href="./mastery/choosepr.php">Student Progress Report (Summary)</a><br></br>
<a href="./mastery/chooseprall.php">Student Progress Report (All Assignments)</a><br></br>
<a href="./mastery/choosecourse.php">Course Progress Report</a><br></br>
<a href="./mastery/choosecourseall.php">Course Progress Report (Class Summary)</a><br></br>
<a href="./mastery/choosecoursesummary.php">Course Summary Report (Count Assessments)</a><br></br>
<a href="./mastery/choosecoursecalc.php"><b>Calculate Student Course Grade (Based on your criteria)</b></a><br></br>
<a href="./mastery/choosestudentview.php">Student View PR (Summary)</a><br></br>
<a href="./mastery/choosesvprall.php">Student View PR (All Assignments)</a><br>

<?//check if user has admin access
$query  = "SELECT fulladmin FROM  users WHERE userid='$currentuser'";
$result=mysql_query($query);

$fulladmin=mysql_result($result,0,"fulladmin");

if(($addusers) OR ($fulladmin)){

?>
<br><br><br><br><br>
<u><b>ADMIN</b></u><br></br>

<a href="./mastery/choosecourseprall.php">All Students PR(TAKES A REALLY LONG TIME))</a><br>
<a href="./mastery/choosecourseprallsv.php">All Students PR(Student View))</a><br>
<a href="./simport/upload.php"><b>Import File</b></a><br>
<a href="./mastery/updategradecriteria.php"><b>Update Grade Criteria</b></a><br>
<a href="./acct/add.php"><b>Add user</b></a><br>
<a href="./acct/viewnew.php"><b>Edit users</b></a><br>

<?
}
else {}


?>