<?php require_once('Connections/dbconfig.php'); ?>
<?php
	

	
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
	$email = clean($_POST['email']);
	
	if($email != '') {
		$qry = "SELECT * FROM register WHERE email='$email'";
		mysql_select_db($database_dbconfig, $dbconfig);
		$result = mysql_query($qry, $dbconfig) or die(mysql_error());
		if($result) {
			if(mysql_num_rows($result) > 0) {
				echo 'Email is already in use';
				
			}
			else
			{
				echo 'Email available';
			}
		}
	}
	
	
	
	
?>