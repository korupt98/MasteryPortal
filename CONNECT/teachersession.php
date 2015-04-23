<?php 
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
session_cache_expire(1440);
session_start();
$currentuser = $_SESSION['currentuser'];
$stafffirst = $_SESSION['first'];
$access=$_SESSION['access'];
$sid=$_SESSION['sid'];
$isTeacher=$_SESSION['isTeacher'];

$threeavg='2.5';
$fouravg='3.5';


if ((!$access) OR (!$isTeacher))
{
header("location:http://uam.kadion.net/index.php");
}


?>