<?php  # Script 12.9 - forgot_password.php
// This page allows a user to reset their password, if forgotten.

// Include the configuration file for error management and such.
//include ('../letters_connect.php'); 
include '../../../letters_connect.php'; 

if (isset($_POST['submit'])) { // Handle the form.


	
	if (empty($_POST['myusername'])) { // Validate the username.
		$u = FALSE;
		echo '<p><font color="red" size="+1">You forgot to enter your username!</font></p>';
	} else {
		$u = $_POST['myusername'];

		// Check for the existence of that username.
		$query = "SELECT userid, email FROM users WHERE userid='$u'";		
		$result = @mysql_query ($query);
		$row = mysql_fetch_array ($result, MYSQL_NUM); 
		if ($row) {
			$uid = $row[0];
			$email = $row[1];
		} else {
			echo '<p><font color="red" size="+1">The submitted username does not match those on file!</font></p>';
			$u = FALSE;
		}
		
	}
	
	if ($u) { // If everything's OK.

		// Create default password.
		$p = "9a31962b953d38f5702495fdf5b44ad0";

		// Make the query.
		$query = "UPDATE users SET password='$p' WHERE userid='$userid'";	
		$result = @mysql_query ($query); // Run the query.
		if (mysql_affected_rows() == 1) { // If it ran OK.
		
			// Send an email.
			$body = "Your password to log into SITENAME has been temporarily changed to <b>letter$</b>. Please log-in using this password and your username. At that time you may change your password to something more familiar.";
			mail ($email, 'Your temporary password.', $body, 'From: admin@sitename.com');
			echo '<h3>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</h3>';
			exit();				
			
		} else { // If it did not run OK.
		
			// Send a message to the error log, if desired.
			$message = '<p><font color="red" size="+1">Your password could not be changed due to a system error. We apologize for any inconvenience.</font></p>'; 

		}		
		mysql_close(); // Close the database connection.

	} else { // Failed the validation test.
		echo '<p><font color="red" size="+1">Please try again.</font></p>';		
	}
header("location:../index.php");
} // End of the main Submit conditional.

?>

<h1>Reset Your Password</h1>
<p>Enter your username below and your password will be reset.</p> 
<form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset>
	<p><b>User Name:</b> <input type="text" name="myusername" size="10" maxlength="20" value="<?php  if (isset($_POST['myusername'])) echo $_POST['myusername']; ?>" /></p>
</fieldset>
<div align="center"><input type="submit" name="submit" value="Reset My Password" /></div>
</form><!-- End of Form -->