<?php
include '../../../letters_connect.php';
include ("../../../teachersession.php"); 

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




if ($_FILES[csv][size] > 0) { 

$target = "csv_dir"; 
	
	//create file name  
$csvfile = $target . $_FILES['userfile']['name'];  

echo 'File: '.$csvfile.'<br></br>';

$target = $target . basename( $_FILES['userfile']['name']) ; 
$ok=1; 
if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['userfile']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 } 
	
 $chunksize = 1*(1024*1024);
$file = fopen($csvfile,"rb");
if(!$file) {
echo "Error opening data file.\n";
exit;
}

$size = filesize($csvfile);

if(!$size) {
echo "File is empty.\n";
exit;
}

//get the csv file 
//$csvfile = $_FILES[csv][tmp_name]; 
$handle = fopen($csvfile,"r"); 
	
 
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            mysql_query("INSERT INTO canvas (studentname,studentid,studentsisid,assessmenttitle,assessmentid,assessmenttype,submissiondate,submissionscore,
  learningoutcomename,learningoutcomeid,attempt,outcomescore,assessmentquestion,assessmentquestion id,coursename,courseid,course sisid) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."', 
                    '".addslashes($data[2])."',
					'".addslashes($data[3])."', 
                    '".addslashes($data[4])."', 
                    '".addslashes($data[5])."', 
					'".addslashes($data[6])."', 
                    '".addslashes($data[7])."', 
                    '".addslashes($data[8])."',
					'".addslashes($data[10])."', 
                    '".addslashes($data[11])."', 
                    '".addslashes($data[12])."', 
					'".addslashes($data[13])."', 
                    '".addslashes($data[14])."', 
					'".addslashes($data[15])."', 
					'".addslashes($data[16])."', 
                    '".addslashes($data[17])."'					
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: import.php?success=1'); die; 

}
 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 