<?php

/********************************/
/* Code at http://legend.ws/blog/tips-tricks/csv-php-mysql-import/
/* Edit the entries below to reflect the appropriate values
/********************************/
include("../../session.php");
include("../../letters_connect.php");

ini_set("memory_limit","80M");
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

$fieldseparator = ",";
$lineseparator = "\n";

$save = 1;
$outputfile = "output.sql";

if(!file_exists($csvfile)) {
	echo "File not found. Make sure you specified the correct path.\n";
	exit;
}

$file = fopen($csvfile,"r");

if(!$file) {
	echo "Error opening data file.\n";
	exit;
}

$size = filesize($csvfile);

if(!$size) {
	echo "File is empty.\n";
	exit;
}

$csvcontent = fread($file,$size);

fclose($file);

$lines = 0;
$queries = "";
$linearray = array();



foreach(split($lineseparator,$csvcontent) as $line) {

	$line = trim($line," \t");
	
	$line = str_replace("\r","",$line);
	
	$linearray = explode($fieldseparator,$line);
	
	$linemysql = implode("','",$linearray);
	
	echo 'LINEMYSQL: '.$linemysql.'<br>';
	
	echo 'LINEARRAY: '.$linearray.'<br>';

	$query = "INSERT into $databasetable values('$linemysql');";

	$queries .= $query . "\n";

	$lines++;
}
@mysql_query($queries);
@mysql_close($con);

if($save) {
	
	if(!is_writable($outputfile)) {
		echo "File is not writable, check permissions.\n";
	}
	
	else {
		$file2 = fopen($outputfile,"w");
		
		if(!$file2) {
			echo "Error writing to the output file.\n";
		}
		else {
			fwrite($file2,$queries);
			fclose($file2);
		}
	}
	
}
#     //delete csv file  
unlink($csvfile); 
echo "Found a total of $lines records in this csv file.\n.<br></br>";
echo "<a href = '../main.php'>Back to main page</a>";


?>
