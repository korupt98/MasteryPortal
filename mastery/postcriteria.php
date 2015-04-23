<?php 
include '../../../letters_connect.php';
include ("../../../teachersession.php");
 

$goal =$_POST['goal'];
$courseid=$_POST['courseid'];
$cbid=$_POST['checkbox'];
for($j = 0; $j < count($cbid); $j++) {
$recordid=$cbid[$j];

$query1 = "SELECT * FROM gradecriteria where recordid='$recordid'";
$result1 = mysql_query ($query1);
$num1=mysql_numrows($result1);

if($num1>0){
$query = "UPDATE gradecriteria SET goal='$goal' WHERE recordid=$recordid";
}else{
$query = "INSERT INTO gradecriteria (courseid,goal) VALUES ('$course','$goal')";
}


mysql_query($query);


 //return to main page
header("location:./updategradecriteria.php");
}

?>