<?php
error_reporting(0);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbconfig = "localhost";
$database_dbconfig = "estates";
$username_dbconfig = "root";
$password_dbconfig = "";
$dbconfig = mysql_pconnect($hostname_dbconfig, $username_dbconfig, $password_dbconfig) or trigger_error(mysql_error(),E_USER_ERROR); 
?>