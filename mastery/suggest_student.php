<?php

include '../../letters_connect.php';
include ("../../teachersession.php"); 

if ( !isset($_REQUEST['term']) )
    exit;


$rs = mysql_query('SELECT StudentID, FirstName, LastName, GradeLevel FROM customreport307 where (lastname like "'. mysql_real_escape_string($_REQUEST['term']) .'%") OR (firstname like "'. mysql_real_escape_string($_REQUEST['term']) .'%") OR (studentID like "'. mysql_real_escape_string($_REQUEST['term']) .'%") order by lastname asc limit 0,10', $conn);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['StudentID'] .', '. $row['LastName'] .' '. $row['FirstName'].' ('. $row['GradeLevel'].')'  ,
            'value' => $row['StudentID'] .', '. $row['LastName'] .' '. $row['FirstName'].' ('. $row['GradeLevel'].')'  ,
        );
    }
}

echo json_encode($data);
flush();

