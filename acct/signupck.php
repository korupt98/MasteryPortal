<?php 
include '../../../letters_connect.php';
include ("../../../session.php"); 

$userid=$_POST['userid'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$status = "OK";

$davidquery="select email from users where userid='dortiz'";
$davidresult = mysql_query ($davidquery);
$emaildavid=mysql_result($davidresult,0,"email");

$kadionquery="select email from users where userid='kphillips'";
$kadionresult = mysql_query ($kadionquery);
$emailkadion=mysql_result($kadionresult,0,"email");

if(isset($todo) and $todo=="post"){
$status = "OK";
$msg="";
}

// if userid is less than 3 char then status is not ok
if(!isset($userid) or strlen($userid) <3){
$msg=$msg."User id should be =3 or more than 3 char length<BR>";
$status= "NOTOK";}					

//does userid exist?
if(mysql_numrows(mysql_query("SELECT userid FROM users WHERE userid = '$userid'"))){
$msg=$msg."Userid already exists. Please try another one<BR>";
$status= "NOTOK";}					

if ( strlen($password) < 3 ){
$msg=$msg."Password must be more than 3 char legth<BR>";
$status= "NOTOK";}					

if ( $password <> $password2 ){
$msg=$msg."Both passwords are not matching<BR>";
$status= "NOTOK";}					


//encrypt password
$encrypted_mypassword=md5($password);	

if($status<>"OK"){ 

/**
$to  = 	$email . ', '; // note the comma
		$to .= $emaildavid;
		$subject = "Bxletters login";
		$message = 'Hi '.$firstname.'<br></br>'.'An account was created for you for the letters staff portal at http://www.bxletters.org.<br></br><br></br>Your login is:<br></br><br></br>username: <b>'.$userid.'</b><br>'.'password: <b>letters</b>'.'<br></br>'. 'You will be required to change your password when you log in for the first time. Please keep this password secure because this website will contain sensitive student information.<br></br><br></br>Please test out the website as soon as you get a chance and tell me if you have any problems.<br></br><br></br>Thank you,<br></br><br></br>Kadion';
		
//		echo 'SUBJECT: '.$subject.'<br></br>';
//		echo 'MESSAGE: '.$message.'<br></br>';
$headers = "From: $kadionemail";
//$headers .= "\r\nCc: $emailanna";
//$headers .= "\r\nBcc: $emailkadion\r\n\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n" .
			"MIME-Version: 1.0\r\n" .
			"Content-Type: text/html; charset=utf-8\r\n" .
			"Content-Transfer-Encoding: 8bit\r\n\r\n";
		
		mail($to, $subject, $message, $headers);

**/
		/**
$message = 'Hi '.$firstname<br></br>.'An account was created for you for the letters staff portal at'.<a href="https://www.bxletters.org">.'http://www.bxletters.org.'.<br></br>.'Your login is:'.'<br></br>'.'username: '.<br>$userid.</b><br>.'password: '.<b>.'letters'.</b><br></br>. 'You will be required to change your password when you log in for the first time. Please keep this password secure because this website will contain sensitive student information.'.<br></br>.'Please test out the website as soon as you get a chance and tell me if you have any problems.'.<br></br>.'Thank you,'.<br></br>.'Kadion';

**/
echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button' value='Retry' onClick='history.go(-1)'>";
}else{ // if all validations are passed.
$query=mysql_query("insert into users(userid,password,email,firstname,lastname) values('$userid','$encrypted_mypassword','$email','$firstname','$lastname')");
echo "<font face='Verdana' size='2' color=green>You have successfully created an account<br><br><a href='../logout.php'>Click here to login</a><br></font>";
}



?>
