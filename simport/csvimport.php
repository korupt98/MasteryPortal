<?php


/********************************/
/* Code at http://legend.ws/blog/tips-tricks/csv-php-mysql-import/
/* Edit the entries below to reflect the appropriate values
/********************************/
include("../../session.php");
include("../../letters_connect.php");

function quote_all_array(&$ar)
{
  foreach ($ar as $k => $v)
  {
    $ar[$k] = "'" . mysql_real_escape_string($v) . "'";
  }
  return $ar;
}

function csv_file_to_mysql_table($source_file, $target_table, $max_line_length=10000) {
    if (($handle = fopen("$source_file", "r")) !== FALSE) {
        $columns = fgetcsv($handle, $max_line_length, ",");
        foreach ($columns as &$column) {
            $column = str_replace(".","",$column);
        }
        $insert_query_prefix = "INSERT INTO $target_table (".join(",",$columns).")\nVALUES";
        while (($data = fgetcsv($handle, $max_line_length, ",")) !== FALSE) {
            while (count($data)<count($columns))
                array_push($data, NULL);
            $query = "$insert_query_prefix (".join(",",quote_all_array($data)).");";
            mysql_query($query);
			echo mysql_error();
        }
        fclose($handle);
    }
}


?>

 <?php 
$target = "csv_dir"; 
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

$query1 = "TRUNCATE TABLE $databasetable";
@mysql_query($query1);

csv_file_to_mysql_table($csvfile, $databasetable);

unlink($csvfile); 
echo "<a href = '../main.php'>Back to main page</a>";
?>
