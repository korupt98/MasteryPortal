 <?php 
include ("../../letters_connect.php"); // Connect to the database.
include ("../../teachersession.php"); // Connect to the database.

// Set the page title and include the HTML header.
$page_title = 'Course Progress Reports';


$student =$_POST['people'];
$studentid =substr($student,0,9);
$coursename=$_POST['coursename'];

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
$goal=0;

$query5 = "SELECT studentsisid,coursename,studentname
from canvas 
WHERE studentsisid LIKE '$studentid' AND coursename LIKE '$coursename' $assessmentfilter GROUP BY studentsisid,coursename ORDER by studentname";

$result5=mysql_query($query5);

while ($row5 = mysql_fetch_assoc($result5)) {
	$studentid = $row5['studentsisid'];
	$name = $row5['studentname'];
    $coursename = $row5['coursename'];


?>

<table width="1000" border="1" style="border-collapse: collapse" align="center" bgcolor="white">
<tr>
<td>
<img src="./images/header.png">
</td>
</tr>
<tr>
<td>
<span class="style3"><?php  echo 'NAME: '. $name; ?>  </span>
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
    <th width="400"><font face="Arial, Helvetica, sans-serif" size="2">Standard</font></th>
	<th width="120"><font face="Arial, Helvetica, sans-serif" size="2">Class Standard Unlocked?</font></th>
	<th width="120"><font face="Arial, Helvetica, sans-serif" size="2">Average of last 3 attempts</font></th>
	<th width="120"><font face="Arial, Helvetica, sans-serif" size="2">Currently Mastered?</font></th>
  </tr>


<?php
$query4 ="SELECT  studentsisid,coursename,learningoutcomeid,learningoutcomename,count(RecordID) as assessmentcount, 
count(if(outcomescore >= 3,outcomescore, NULL)) as over3,
avg(outcomescore) as scoreavg
from canvas 
WHERE studentsisid = '$studentid' AND coursename='$coursename' $assessmentfilter
Group by studentsisid,coursename, learningoutcomeid  ORDER BY studentname, learningoutcomename";

$result4=mysql_query($query4);
$num4=mysql_numrows($result4);

$attemptsover3=0;
$attempts=0;

if (mysql_numrows($result4) == 0){
    die("No result.");
}


while ($row4 = mysql_fetch_assoc($result4)) {
    $coursename = $row4['coursename'];
	$studentid = $row4['studentsisid'];
	$learningoutcomename = $row4['learningoutcomename'];
    $learningoutcomeid = (int)$row4['learningoutcomeid'];
    $assessmentcount = (int)$row4['assessmentcount'];
    $scoreavg = number_format($row4['scoreavg'], 1);
    $over3 = $row4['over3'];
	
$query7 ="SELECT count(if(outcomescore >= 3,outcomescore, NULL)) as recentover3, 
        avg(outcomescore) as recentscoreavg 
		FROM 
		(SELECT outcomescore FROM `canvas` WHERE 
		studentsisid='$studentid' AND coursename='$coursename' AND learningoutcomeid='$learningoutcomeid' $assessmentfilter  
		ORDER BY AssessmentID DESC LIMIT 3) as r";
		
$result7=mysql_query($query7);

while ($row7 = mysql_fetch_assoc($result7)) {
	$recentscoreavg = number_format($row7['recentscoreavg'], 1);
    $recentover3 = $row7['recentover3'];

  
/**	If we want to revert to 50% having at least 3
if($assessmentcount>="3"){
$attemptsover3++;
}
$attempts++;
 
$classpercentover3=($attemptsover3/$attempts)*100;
if($classpercentover3>="50"){
$classstandardunlocked='YES';
}else{
$classstandardunlocked='NO';
}
**/
if($assessmentcount>="3"){
$attemptsover3++;
$classstandardunlocked='YES';
}else{
$classstandardunlocked='NO';
}
$attempts++;

if(($recentscoreavg>=$fouravg) AND ($assessmentcount>="3")){
$standardunlocked="YES";
}
else if(($recentscoreavg>=$threeavg) AND ($assessmentcount>="3") AND($recentscoreavg <$fouravg)){
$standardunlocked="YES";
} else{ 
$standardunlocked="NO";
}

if(($classstandardunlocked=="YES") AND ($standardunlocked=="NO")){
echo '<tr align="top" bgcolor="#F8E0E0">';
}
else if($standardunlocked=="YES"){
echo '<tr align="top" bgcolor="#CEF6CE">';
}
else{
echo ' <tr align="top" bgcolor="#B1B5B4">';
}
?>

   <td align="left" width="400"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$learningoutcomename"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$classstandardunlocked"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$recentscoreavg"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$standardunlocked"; ?>&nbsp;</font></td>
 </tr>

<?php
$query6 = "SELECT studentsisid,learningoutcomeid,assessmenttitle,outcomescore from canvas 
WHERE studentsisid LIKE '$studentid' AND coursename='$coursename' $assessmentfilter AND learningoutcomeid='$learningoutcomeid' Group by assessmentid ORDER by AssessmentID ASC"; 

$result6=mysql_query($query6);

while ($row6 = mysql_fetch_assoc($result6)) {
    $assessmenttitle = $row6['assessmenttitle'];
    $outcomescore = $row6['outcomescore'];
	

?>

 <tr align="top">
    <td width="400"><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "$assessmenttitle"; ?>&nbsp;</font></td>
	<td><font face="Arial, Helvetica, sans-serif" size="2"><?php  echo "Score: "."$outcomescore"; ?>&nbsp;</font></td>
  </tr>

  <?php

}

    if( $assessmentcount < 3 || $recentscoreavg < $threeavg ){
        $b++;
    } else {
        if( ($recentscoreavg >= $fouravg) ){
            $c++;
            $b++;
            $a++;
        } else if( ($recentscoreavg >= $threeavg) && ($recentscoreavg < $fouravg) ){
            $a++;
            $b++;
        }
    }
	
//GRADE CRITERIA
include ("gradecriteria.php"); // Calculate grade

$percentover3=$a/$goal;
$percentover4=$c/$goal;

$attemptsover3=0;
$attempts=0;

}

}

$percentover3 *= 100;
$percentover4 *= 100;

$percentover3 = number_format($percentover3, 1);
$percentover4 = number_format($percentover4, 1);

include ("convertgrade.php"); // Convertgrade

?>


<tr align="top" bgcolor="#CECEF6">
	<td align="left">
	<font face="Arial, Helvetica, sans-serif" size="2"><b><u><?php  echo 'SUMMARY'; ?>&nbsp;</u></b></font><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Student Standards 3 and over: <b>'.$a.'</b>'; ?>&nbsp;</font><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Student Standards 4 and over: <b>'.$c.'</b>'; ?>&nbsp;</font><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Student Total Standards attempted: <b>'.$b.'</b>'; ?>&nbsp;</font><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Current Course Standards Unlocked: <b>'.$goal.'</b>'; ?>&nbsp;</font><br>
   <font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Student Percent Over 3: <b>'.$percentover3.'</b>'; ?>&nbsp;</font><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Student Percent Over 4: <b>'.$percentover4.'</b>'; ?>&nbsp;</font><br><br>
	<font face="Arial, Helvetica, sans-serif" size="2"><?php  echo 'Converted Grade: <b>'.$convertedgrade.'</b>'; ?>&nbsp;</font><br>
	</td>
</tr>
<?php
$a=0;
$b=0;
$c=0;
$convertedgrade=0;


?>

</table>
</td>
</tr>

</table>
<p style="page-break-before: always">

<?php

}
?>