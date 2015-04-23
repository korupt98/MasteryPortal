<?php 
include '../../letters_connect.php';

$tbl_name="users"; // Table name

// username and password sent from signup form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

//encrypt password
$encrypted_mypassword=md5($mypassword);

//run query
$sql="SELECT * FROM $tbl_name WHERE userid='$myusername' and password='$encrypted_mypassword'";
$result=mysql_query($sql) or die(mysql_error());

// puts the "friends" info into the $info array 
$info = mysql_fetch_array( $result);

// Print out the contents of the entry
$pw= $info['password']; 
$teacher= $info['teacher']; 
$student= $info['student']; 


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
		if($pw =="9a31962b953d38f5702495fdf5b44ad0"){
			session_start();
			$_SESSION['currentuser']=$myusername;
			$_SESSION['access'] = 0;
			header("location:change-password.php");
		}
	else{
			// Register $myusername, $mypassword and redirect to file "main.php"
			//session_register("myusername");
			if($teacher==1){
			$qry="INSERT INTO userlog (username) VALUES ('$myusername')";
			mysql_query($qry);	
			$first=mysql_result($result,0,"firstname");
			session_start();
			$_SESSION['first']=$first;
			$_SESSION['currentuser']=$myusername;
			$_SESSION['access'] = 1;
			$_SESSION['isTeacher'] = 1;
			header("location:main.php");
			}
			else if ($student==1){
			$qry="INSERT INTO userlog (username) VALUES ('$myusername')";
			mysql_query($qry);	
			$first=mysql_result($result,0,"firstname");
			$qry2="select user_id from students where login_id='$myusername'";
			$result2=mysql_query($qry2) or die(mysql_error());
			// puts the "friends" info into the $info array 
			$sinfo = mysql_fetch_array( $result2);
			$sid= $sinfo['user_id']; 
			
			session_start();
			$_SESSION['first']=$first;
			$_SESSION['currentuser']=$myusername;
			$_SESSION['access'] = 1;
			$_SESSION['sid'] = $sid;
   	
		header("location:./mastery/spr.php");
	
			}
		}
}

else{
echo "Wrong Username or Password. Please try to <a href='index.php'>Login</a> again.";
}
?>