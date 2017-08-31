<?php require_once('../../Connections/dbconfig.php');

//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE );

$type = $_POST['type'];
$room = $_POST['room'];
$bath = $_POST['bath'];
$area = $_POST['area'];
$address = $_POST['location'];
$price = $_POST['price'];
$description = $_POST['description'];
$state = $_POST['state'];
$city = $_POST['city'];
$name = $_POST['pname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$purpose = $_POST['purpose'];
$unit = $_POST['unit'];
$p_id = $_POST['p_id'];

$updateSQL = "UPDATE property SET location='$address',p_type='$type',room='$room',bath='$bath',price='$price',area='$area',
description='$description',state='$state',name='$name',phone='$phone',email='$email',purpose='$purpose',unit='$unit'
WHERE p_id='".$p_id."'";
  mysql_select_db($database_dbconfig, $dbconfig);
  $Result1 = mysql_query($updateSQL, $dbconfig) or die(mysql_error());
//$qry = "INSERT INTO property(location)VALUES ('21122')";
//$result = mysql_query($qry);

if($Result1)
{
	//echo "Property Added";
	echo '<script type="text/javascript">
alert("Record Updated");
</script>';
	echo '<script type="text/javascript">
window.location = "edit_posts.php?p_id='.$p_id.'"
</script>';
}
else
{
	echo "Property Not Added";
	//echo $insertSQL;
}
?>
