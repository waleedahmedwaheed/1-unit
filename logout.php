<?php require_once('Connections/dbconfig.php'); 

mysql_select_db($database_dbconfig, $dbconfig);

session_start();

unset($_SESSION['SESS_NAME']);

session_write_close();
 
echo '<script> document.location = "login.php"; </script>'; 

?>

