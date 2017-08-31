<?php require_once('Connections/dbconfig.php'); ?>
<?php
	
session_start();
	
	//Select database
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$password = clean($_POST['password']);
	$email = clean($_POST['email']);
	
	
	
	
	
	//Check for duplicate login ID
	if($email != '') {
		$qry = "SELECT * FROM register WHERE email='$email'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$result = mysql_query($qry, $dbconfig) or die(mysql_error());
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$member = mysql_fetch_assoc($result);
				$_SESSION['SESS_NAME'] = $member['email'];
				session_write_close();
  				?>
			<script> document.location = "index.php"; </script>	
			<?php }
			else
			{
				
				echo 'Invalid Email or Password';
				    
			}
			//@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}	

	//Create INSERT query
	
	
	//Check whether the query was successful or not
/*	if($result) {
		if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: Research Institute <your email>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://researchanalyticsintl.org/confirmation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}

	$errmsg_arr[] = 'Success ';
		$errflag = true;
		if($errflag) {
		
		header("location: index.php");
		exit();
	}
		
		
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
		
			
		header("location: index.php");
		exit();
	}else {
		die("Query failed");
	}
	*/
?>