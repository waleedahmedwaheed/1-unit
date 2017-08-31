<?php require_once('../../Connections/dbconfig.php'); 
session_start();

$p_id = $_GET['p_id'];

$updateSQL = "UPDATE property SET status=2 WHERE p_id='".$p_id."'";

  mysql_select_db($database_dbconfig, $dbconfig);
  $Result1 = mysql_query($updateSQL, $dbconfig) or die(mysql_error());

echo '<script> document.location = "view_posts.php"; </script>'; 

?>
