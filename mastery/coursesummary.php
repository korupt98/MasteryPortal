<?php 
include ("../../letters_connect.php"); // Connect to the database.
include ("../../teachersession.php"); // Connect to the database.

// Set the page title and include the HTML header.
$page_title = 'Course Overall Performance';


$fouravg='3.5';

$coursename=$_POST['coursename'];
$includetype=$_POST['includetype'];
if($includetype=='Yes'){
$assessmentfilter = " AND assessmenttitle LIKE '**%'";
}else{ $assessmentfilter = '';}

?>
<table width="1000" border="1" style="border-collapse: collapse" align="center" bgcolor="white">

	<tr>	<td align="left" valign="top">
	<table width="1000" border="1" style="border-collapse: collapse">
	<span class="style3"><?php  echo $name; ?>  </span>
	</tr>

	<tr bgcolor="lightblue"> 
     <th><font face="Arial, Helvetica, sans-serif" size="2">CourseName</font></th>
     <th><font face="Arial, Helvetica, sans-serif" size="2">Standard</font></th>
	<th><font face="Arial, Helvetica, sans-serif" size="2">Total Attempts</font></th>
	<th><font face="Arial, Helvetica, sans-serif" size="2">Total Scores 3 or above</font></th>
	<th><font face="Arial, Helvetica, sans-serif" size="2">Average Score</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Number of Students with attempts</font></th>
	<th><font face="Arial, Helvetica, sans-serif" size="2">Number of Students with More than 3 attempts</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level0</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level1</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level2</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level3</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level4</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Level5</font></th>
		<th><font face="Arial, Helvetica, sans-serif" size="2">Standard Unlocked?</font></th>
  </tr>
<?php
$query = "SELECT coursename,learningoutcomeid,learningoutcomename,count(RecordID) as assessmentcount, 
count(if(outcomescore >= 3,outcomescore, NULL)) as over3,
avg(outcomescore) as scoreavg
from canvas 
WHERE coursename='$coursename' $assessmentfilter
Group by coursename, learningoutcomeid";

$result=mysql_query($query);
$num=mysql_numrows($result);

$a=0;
$b=0;
$c=0;
$i=0;

while ($row = mysql_fetch_assoc($result)) {
    $coursename = $row['coursename'];
	$learningoutcomename = $row['learningoutcomename'];
    $learningoutcomeid = (int)$row['learningoutcomeid'];
    $assessmentcount = (int)$row['assessmentcount'];
    $scoreavg = (int)number_format($row['scoreavg'], 1);
    $over3 = $row['over3'];
	

$query2 = "SELECT  studentsisid,count(RecordID) as studentcount, 
avg(outcomescore) as studentscoreavg
from canvas 
WHERE coursename='$coursename' AND learningoutcomeid='$learningoutcomeid' $assessmentfilter Group by coursename, learningoutcomeid,studentsisid";

$result2=mysql_query($query2);
$num2=mysql_numrows($result2);

$level0=0;
$level1=0;
$level2=0;
$level3=0;
$level4=0;
$level5=0;
$attemptsover3=0;
$attempts=0;

while ($row2 = mysql_fetch_assoc($result2)) {
    $studentcount = $row2['studentcount'];
	$studentscoreavg = $row2['studentscoreavg'];


if($studentcount>="3"){
$attemptsover3++;
}



if($studentscoreavg<"1"){
$level0++;
$attempts++;
}
else if(($studentscoreavg>="1") AND ($studentscoreavg<"2")){
$level1++;
$attempts++;
}
else if(($studentscoreavg>="2") AND ($studentscoreavg<"3")){
$level2++;
$attempts++;
}
else if(($studentscoreavg>="3") AND ($studentscoreavg<"4")){
$level3++;
$attempts++;
}
else if(($studentscoreavg>="4") AND ($studentscoreavg<"5")){
$level4++;
$attempts++;
}
else if($studentscoreavg>="5"){
$level5++;
$attempts++;
}

?>
<?php
  ++$j;
}

  
$percentover3=($attemptsover3/$attempts)*100;
if($percentover3>="50"){
$classstandardunlocked='YES';
}else{
$classstandardunlocked='NO';
}

if($classstandardunlocked=="YES"){
echo '<tr align="top" bgcolor="#CEF6CE">';
}
else{
echo ' <tr align="top">';
}

?>
 <td align="center"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$coursename"; ?>&nbsp;</font></td>
    <td align="center"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$learningoutcomename"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$assessmentcount"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$over3"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$scoreavg"; ?>&nbsp;</font></td>
		<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$attempts"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$attemptsover3"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level0"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level1"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level2"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level3"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level4"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$level5"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$classstandardunlocked"; ?>&nbsp;</font></td>
  </tr>

<?php

++$i;
}


$percentover3=($a/$b)*100;
$percentover4=($c/$b)*100;

$percentover3 = number_format($percentover3, 1);
$percentover4 = number_format($percentover4, 1);

?>


  </table>
