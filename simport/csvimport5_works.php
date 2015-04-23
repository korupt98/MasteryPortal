<?php

/********************************/
/* Code at http://legend.ws/blog/tips-tricks/csv-php-mysql-import/
/* Edit the entries below to reflect the appropriate values
/********************************/
include("../../session.php");
include("../../letters_connect.php");
?>

 <?php 
$target = "csv_dir/"; 
$databasetable =$_POST['dbname'];

echo 'DatabaseName: '.$databasetable.'<br></br>';

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

$fieldseparator = ",";
$lineseparator = "\n";

$lines = 0;
$queries = "";

$query1 = "TRUNCATE TABLE $databasetable";
@mysql_query($query1);

while (!feof($file)) {
$csvline = fgets($file,$chunksize);

$lines++;
if($lines < 2) continue;

$line = trim($csvline," \t");

$line = str_replace("\r","",$line);

/************************************************************************************************************
This line escapes the special character. remove it if entries are already escaped in the csv file
************************************************************************************************************/
$line = str_replace("'","\'",$line);
/***********************************************************************************************************/

$linearray = explode($fieldseparator,$line);

$linemysql = implode("','",$linearray);

$query = "insert into $databasetable values('$linemysql');";

//if($save) $queries .= $query . "\n";

@mysql_query($query);
}
fclose($file);

$lines -= 3;

@mysql_close($con);

#     //delete csv file  
unlink($csvfile); 
echo "Found a total of $lines records in this csv file.\n.<br></br>";
echo "<a href = '../main.php'>Back to main page</a>";


?>
