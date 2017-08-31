<?php require_once('../../Connections/dbconfig.php'); 
session_start();

$n_id = $_GET['n_id'];

$updateSQL = "UPDATE news SET status=2 WHERE n_id='".$n_id."'";

  mysql_select_db($database_dbconfig, $dbconfig);
  $Result1 = mysql_query($updateSQL, $dbconfig) or die(mysql_error());

echo '<script> document.location = "view_news.php"; </script>'; 

?>
