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
 ?> 
 
 
 <?php

 /*** How to show contents of file
 $file = fopen($csvfile, "r");

//Output a line of the file until the end is reached
while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);
**/

?> 

<?


$fieldseparator = ",";
$lineseparator = "\n";

/********************************/
/* Would you like to add an ampty field at the beginning of these records?
/* This is useful if you have a table with the first field being an auto_increment integer
/* and the csv file does not have such as empty field before the records.
/* Set 1 for yes and 0 for no. ATTENTION: don't set to 1 if you are not sure.
/* This can dump data in the wrong fields if this extra field does not exist in the table
/********************************/
$addauto = 0;
/********************************/
/* Would you like to save the mysql queries in a file? If yes set $save to 1.
/* Permission on the file should be set to 777. Either upload a sample file through ftp and
/* change the permissions, or execute at the prompt: touch output.sql && chmod 777 output.sql
/********************************/
$save = 1;
$outputfile = "output.sql";
/********************************/

$chunksize = 1*(1024*1024);
$file = fopen($csvfile,"r");
$size = filesize($csvfile);
$csvcontent = fread($file,$size);

if(!file_exists($csvfile)) {
	echo "File not found. Make sure you specified the correct path.\n";
	exit;
}

if(!$file) {
	echo "Error opening data file.\n";
	exit;
}

if(!$size) {
	echo "File is empty.\n";
	exit;
}


$lines = 0;
$queries = "";
$linearray = array();


//$query1 = "TRUNCATE TABLE $databasetable";
//@mysql_query($query1);

$lines = 0;
$queries = "";

while (!feof($file)) {
$line=split($lineseparator,$csvcontent);

//$csvline = fgets($file,$chunksize);

$lines++;
//if($lines < 2) continue;

$line = trim($line," \t");

$line = str_replace("\r","",$line);

/************************************************************************************************************
This line escapes the special character. remove it if entries are already escaped in the csv file
************************************************************************************************************/
$line = str_replace("'","\'",$line);
/**********************************************************************************************/

$linearray = explode($fieldseparator,$line);

$linemysql = implode("','",$linearray);

$query = "insert into $databasetable values('$linemysql');";

$queries .= $query . "\n";

@mysql_query($query);
}
fclose($file);

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


//delete csv file  
unlink($csvfile); 
echo "Found a total of $lines records in this csv file.\n.<br></br>";
echo "<a href = '../main.php'>Back to main page</a>";


?>
