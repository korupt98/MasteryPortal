<?php 
include '../../../letters_connect.php';
include ("../../../teachersession.php"); 
$student =$_POST['people'];
$studentid =substr($student,0,9);
if(($studentid == NULL) || (!is_numeric($studentid)) || (strlen($studentid)!=9)) {
?>
 <script type="text/javascript">
    alert("You must choose choose the student from the filtered list.\n Please try a new search for a student using last name, first name or student ID and select the appropriate student record from the list.");
    history.back();
  </script>
 
 <?php
	}else{
header("location:mastery.php?sid=$studentid");
}
?>