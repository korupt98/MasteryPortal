 <?php 
include ("../../letters_connect.php"); // Connect to the database.
include ("../../teachersession.php"); // Connect to the database.

// Set the page title and include the HTML header.
$page_title = 'Course Progress Reports All Assignments';


$fouravg='3.5';


$student =$_POST['people'];
$studentid =substr($student,0,9);
$coursename=$_POST['coursename'];

$goal=$_POST['unlockednumber'];

$includetype=$_POST['includetype'];
if($includetype=='Yes'){
$assessmentfilter = " AND assessmenttitle LIKE '**%'";
}else{ $assessmentfilter = '';}

if(empty($studentid)){
$studentid='%%';
}
else
{$studentid==$studentid;}

$a=0;
$b=0;
$c=0;
$passed=0;
$failed=0;

?>

<table width="1000" border="1" style="border-collapse: collapse" align="center" bgcolor="white">

<tr>
<td>
<img src="./images/header.png">
</td>
</tr>


<tr>
<td>
<span class="style3"><?php  echo 'COURSE: '. $coursename; ?>  </span>
</td>
</tr>

<tr>
<td>
<table width="1000" border="1" style="border-collapse: collapse" align="center" bgcolor="white">
	<tr bgcolor="LightBlue"> 
	<th width="300"><font face="Arial, Helvetica, sans-serif" size="2">StudentName</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Student Standards 3 and over</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Student Standards 4 and over</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Student Total Standards attempted</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Current Course Standards Unlocked</font></th>
   <th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Student Percent Over 3</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Student Percent Over 4</font></th>
	<th width="100"><font face="Arial, Helvetica, sans-serif" size="2">Converted Grade</font></th>
  </tr>

<?php


$query5 = "SELECT studentsisid,studentname,coursename
from canvas 
WHERE studentsisid LIKE '$studentid' AND coursename LIKE '$coursename' $assessmentfilter GROUP BY studentsisid,coursename ORDER BY studentname";

$result5=mysql_query($query5);
$num5=mysql_numrows($result5);

while ($row5 = mysql_fetch_assoc($result5)) {
	$studentid = $row5['studentsisid'];
	$name = $row5['studentname'];
    $coursename = $row5['coursename'];

	
$query4 ="SELECT  studentsisid,coursename,learningoutcomeid,learningoutcomename,count(RecordID) as assessmentcount, 
count(if(outcomescore >= 3,outcomescore, NULL)) as over3,
avg(outcomescore) as scoreavg
from canvas 
WHERE studentsisid LIKE '$studentid' AND coursename='$coursename' $assessmentfilter
Group by studentsisid,coursename, learningoutcomeid  ORDER BY studentname, learningoutcomename";

$result4=mysql_query($query4);

$attemptsover3=0;
$attempts=0;

while ($row4 = mysql_fetch_assoc($result4)) {
	$coursename = $row4['coursename'];
	$learningoutcomeid = (int)$row4['learningoutcomeid'];
	$studentcount = $row4['studentcount'];
	$studentscoreavg = $row4['studentscoreavg'];
	$studentid = $row4['studentsisid'];
	$learningoutcomename = $row4['learningoutcomename'];
    $assessmentcount = (int)$row4['assessmentcount'];
    $scoreavg = number_format($row4['scoreavg'], 1);
    $over3 = $row4['over3'];
	$coursename = $row4['coursename'];
	$learningoutcomeid = (int)$row4['learningoutcomeid'];
	

if($studentcount>="3"){
$attemptsover3++;
}
$attempts++;



    if( $assessmentcount < 3 || $scoreavg < $threeavg ){
        $b++;
    } else {
        if( ($scoreavg >= $fouravg) ){
            $c++;
            $b++;
            $a++;
        } else if( ($scoreavg >= $threeavg) && ($scoreavg < $fouravg) ){
            $a++;
            $b++;
        }
    }


$percentover3=($a/$goal)*100;
$percentover4=($c/$goal)*100;

include ("convertgrade.php"); // Convertgrade

$percentover3 = number_format($percentover3, 1);
$percentover4 = number_format($percentover4, 1);

$attemptsover3=0;
$attempts=0;
}
if($convertedgrade>='65'){
	$passed++;
}else if($convertedgrade<='55'){
	$failed++;
}

?>


<tr align="top" bgcolor="#CECEF6">
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $name; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $a; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $c; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $b; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $goal; ?>&nbsp;</font></td>
   <td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $percentover3; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $percentover4; ?>&nbsp;</font></td>
	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo $convertedgrade; ?>&nbsp;</font></td>
</tr>


<?php
$a=0;
$b=0;
$c=0;
$convertedgrade='';


?>




<?php
}
$totalstudents=$passed+$failed;
$passrate=($passed/$totalstudents)*100;
$passrate = number_format($passrate, 1);

?>
<tr align="top" bgcolor="#81F7F3">
<td align="left"><font face="Arial, Helvetica, sans-serif" size="4">
STUDENTS PASSING: <?php  echo $passed; ?><br>
STUDENTS FAILING: <?php  echo $failed; ?><br>
CLASS PASS RATE: <?php  echo $passrate; ?> %<br>
</font></td>
</tr>

</table>
</td>
</tr>

</table>