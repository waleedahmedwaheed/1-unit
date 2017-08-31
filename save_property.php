<?php require_once('Connections/dbconfig.php'); 

//error_reporting(0);
error_reporting(E_ERROR | E_PARSE );

$type = $_POST['type'];
$status = $_POST['status'];
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

$uploadOk = 1;
$size = 10*1024*1024;

if (!isset($_FILES['image1']['tmp_name'])) {
	$location1 = "";
	}else{
	if($_FILES["image1"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image1']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name= addslashes($_FILES['image1']['name']);
	$image_size= getimagesize($_FILES['image1']['tmp_name']);

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"uploaded_files/" . $_FILES["image1"]["name"]);
			
			$location1="uploaded_files/" . $_FILES["image1"]["name"];
		}
	}
	
	if (!isset($_FILES['image2']['tmp_name'])) {
	$location2 = "";
	}else{
	if($_FILES["image2"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image2']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image2']['tmp_name']));
	$image_name= addslashes($_FILES['image2']['name']);
	$image_size= getimagesize($_FILES['image2']['tmp_name']);

	
			
			move_uploaded_file($_FILES["image2"]["tmp_name"],"uploaded_files/" . $_FILES["image2"]["name"]);
			
			$location2="uploaded_files/" . $_FILES["image2"]["name"];
		}
	}
	
	if (!isset($_FILES['image3']['tmp_name'])) {
	$location3 = "";
	}else{
	if($_FILES["image3"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image3']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image3']['tmp_name']));
	$image_name= addslashes($_FILES['image3']['name']);
	$image_size= getimagesize($_FILES['image3']['tmp_name']);

	
			
			move_uploaded_file($_FILES["image3"]["tmp_name"],"uploaded_files/" . $_FILES["image3"]["name"]);
			
			$location3="uploaded_files/" . $_FILES["image3"]["name"];
			
		}
	}
	
	if (!isset($_FILES['image4']['tmp_name'])) {
	$location3 = "";
	}else{
	if($_FILES["image4"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image4']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image4']['tmp_name']));
	$image_name= addslashes($_FILES['image4']['name']);
	$image_size= getimagesize($_FILES['image4']['tmp_name']);

	
			move_uploaded_file($_FILES["image4"]["tmp_name"],"uploaded_files/" . $_FILES["image4"]["name"]);
			
			$location4="uploaded_files/" . $_FILES["image4"]["name"];
		}
	}
	
$insertSQL = "INSERT INTO property (location, status, p_type, room, bath, price, area, description, state, city,image,image2,image3,image4,name,phone,email,purpose,unit) VALUES ('".$address."','0','".$type."','".$room."','".$bath."', '".$price."','".$area."','".$description."', '".$state."','".$city."','".$location1."','".$location2."','".$location3."','".$location4."','".$name."','".$phone."','".$email."','".$purpose."','".$unit."')";
  mysql_select_db($database_dbconfig, $dbconfig);
  $Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
//$qry = "INSERT INTO property(location)VALUES ('21122')";
//$result = mysql_query($qry);

if($Result1)
{
	echo "Property Added";
}
else
{
	echo "Property Not Added";
	//echo $insertSQL;

}
?>
