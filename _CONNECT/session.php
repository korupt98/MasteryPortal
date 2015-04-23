<?php 
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
session_cache_expire(1440);
session_start();
$currentuser = $_SESSION['currentuser'];
$stafffirst = $_SESSION['first'];
$access=$_SESSION['access'];
$sid=$_SESSION['sid'];
$filterdate = '2012-09-01';
$threeavg='2.5';
$fourvg='3.5';

if(!$access)
{
header("location:http://uam.kadion.net/index.php");
}

?>