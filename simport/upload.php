<?php
include '../../letters_connect.php';
include ("../../session.php"); 

$page_title = 'Import files';

require_once ('../includes/config.inc'); 
include_once ('../includes/header2.html');

//check if user has admin access
$query  = "SELECT * FROM  users WHERE userid='$currentuser'";
$result=mysql_query($query) or die(mysql_error());
$addusers=mysql_result($result,0,"addusers");
$addcategories=mysql_result($result,0,"addcategories");
$adddiscipline=mysql_result($result,0,"adddiscipline");
$viewprivate=mysql_result($result,0,"viewprivate");
$fulladmin=mysql_result($result,0,"fulladmin");

if(($addusers) OR ($fulladmin)){


include '../../letters_connect.php';
include ("../../session.php"); 

$page_title = 'Import files';



//Upload File
if (isset($_POST['submit'])) {
$deleterecords = "TRUNCATE TABLE canvas"; //empty the table of its current records
mysql_query($deleterecords);

	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1><br><br>";
			echo "<a href='http://uam.kadion.net/main.php'><h2>Click here to Return to main page</h2></a><br><br><br><br><br>";
	//	echo "<h2>Displaying contents:</h2>";
	//	readfile($_FILES['filename']['tmp_name']);
}



	
//Import uploaded file to Database
$handle = fopen($_FILES['filename']['tmp_name'], "r");

fgetcsv($handle, 1000, ","); //Delete the first record

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	$import="INSERT into canvas (studentname,studentid,studentsisid,assessmenttitle,assessmentid,assessmenttype,submissiondate,submissionscore,
  learningoutcomename,learningoutcomeid,attempt,outcomescore,assessmentquestion,assessmentquestionid,coursename,courseid,coursesisid) values
  (
  '".mysql_real_escape_string($data[0])."',
  '".mysql_real_escape_string($data[1])."',
  '".mysql_real_escape_string($data[2])."',
  '".mysql_real_escape_string($data[3])."',
  '".mysql_real_escape_string($data[4])."',
  '".mysql_real_escape_string($data[5])."',
  '".mysql_real_escape_string($data[6])."',
  '".mysql_real_escape_string($data[7])."',
  '".mysql_real_escape_string($data[8])."',
  '".mysql_real_escape_string($data[9])."',
  '".mysql_real_escape_string($data[10])."',
  '".mysql_real_escape_string($data[11])."',
  '".mysql_real_escape_string($data[12])."',
  '".mysql_real_escape_string($data[13])."',
  '".mysql_real_escape_string($data[14])."',
  '".mysql_real_escape_string($data[15])."',
  '".mysql_real_escape_string($data[16])."'
  )"
;

		mysql_query($import) or die(mysql_error());
	}

	fclose($handle);

	print "Import done";

	//view upload form
}else {

	print "<h2>Upload and updated Canvas file by choosing file then click on Submit File<br />\n</h2>";

	print "<form enctype='multipart/form-data' action='upload.php' method='post'>";

	print "<h3>File name to import:<br />\n</h3>";

	print "<input size='50' type='file' name='filename'><br><br><br><br />\n";

	print "<input type='submit' name='submit' value='Submit File'></form>";
	
	echo "<br><br><br><br><br>";

}


}
else {
echo "<br></br>You do not have permission to view this page. Please click on the link below to return to main page.<br><br/><a href='../main.php'>Back to to main page</a>";
}

include_once ('../includes/footer.html');

?>
