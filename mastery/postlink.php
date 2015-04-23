<?php 
include '../../letters_connect.php';
include ("../../teachersession.php");
 

$unlockednumber =$_POST['teacher'];
$id=$_POST['checkbox'];
for($j = 0; $j < count($id); $j++) {
$courseid=$id[$j];


$query1 = "SELECT courseid,goal FROM gradecriteria where courseid='$id'";
$result1 = mysql_query ($query1);
$num1=mysql_numrows($result1);

if($num1>0){
$query = "UPDATE gradecriteria SET courseid='$id',goal='$unlockednumber'";
}else{
$query = "INSERT INTO gradecriteria (courseid,goal) VALUES ('$id','$unlockednumber')";
}

  
$query = "INSERT INTO teacherlink (teacherid,staffid,submitby) VALUES ('$teacherid','$staffid','$currentuser')";
mysql_query($query);



 //return to main page
header("location:./updategradecriteria.php");
}

?>