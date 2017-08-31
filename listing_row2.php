<?php require_once('Connections/dbconfig.php'); 
//error_reporting(0);

$type = $_GET["type"];

?>

<!DOCTYPE html>
<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Property Listing Row</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#price_min,#price_max,#area").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>

<script>
$('.test-input,#price_min,#price_max,#area').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = $this.attr('maxlength');
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
}); 
</script>

</head>

<body>

<!-- Start Header -->
<?php include('header.php'); ?>
<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	
    </div><!-- end subheader container -->
</section><!-- end subheader section -->


<section class="filter">
    <div class="container">
        <div class="filterHeader">
            <ul class="filterNav tabs">
                <li><a class="current triangle">ALL PROPERTIES</a></li>
                </ul>
            </div>
        <div class="filterContent defaultTab" id="tab1">
            <form method="get" action="listing_row2.php?type=<?php echo $type; ?>">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6" style="width: 220px;">
                        <div class="formBlock select">
                        <label for="propertyType">Property Type</label><br/>
                        <select name="purpose" id="propertyType" class="formDropdown">
                            <option></option>
                            <option value="1">Sale</option>
                            <option value="2">Rent</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock select">
                        <label for="city">City</label><br/>
                        <select name="city" id="city" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                   
                   
                    
                    <div class="col-lg-3 col-md-3 col-sm-6" style="width: 240px;">
                        <div class="formBlock select">
                        <label for="area">Area (Sq Ft)</label><br/>
                        <input name="area" id="area" class="test-input" maxlength="14" oncopy="return false;" onpaste="return false;" oncut="return false;" />
						</div>
					</div>
					
					 <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
						<label for="area">Unit</label><br/>
                        <select name="unit" id="propertyType" class="formDropdown">
				  <option> </option>		
                  <option value="Square Feet">Square Feet</option>
				  <option value="Square Yards">Square Yards</option>
				  <option value="Square Meters">Square Meters</option>
				  <option value="Marla">Marla</option>
				  <option value="Kanal">Kanal</option>

                                </select>
						</div>
                    </div>
					
					
					
					<div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
                        <label for="area">Price Range</label><br/>
                        <input name="price_min" id="price_min" class="test-input" maxlength="14" oncopy="return false;" onpaste="return false;" oncut="return false;" />
                        </div>
                    </div>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
                        <label for="area">--</label><br/>
                        <input name="price_max" id="price_max" class="test-input" maxlength="14" oncopy="return false;" onpaste="return false;" oncut="return false;" />
                        </div>
                    </div>
					
					<input type="hidden" name="type" value="<?php echo $_GET["type"]; ?>" />
					
					
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                            <input class="buttonColor" type="submit" name="search" value="FIND PROPERTIES" style="margin-top: 30px;" >
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div><!-- END TAB1 -->
</section>


<?php
if(isset($_GET["search"]))
{
$purpose	= $_GET["purpose"];
$city		= $_GET["city"];
$price_min 	= $_GET["price_min"];
$price_max 	= $_GET["price_max"];
$area	=$_GET["area"];
$unit	=$_GET["unit"];
$type = $_GET["type"];

$where1 = array();

if($purpose!='')
{
		$where1[] = "purpose='$purpose'";
}
if($city!='')
{
		$where1[] = "city='$city'";
}
if(($price_min!='') and ($price_max!=''))
{
		$where1[] = "price between '$price_min' and '$price_max'";
}
if($area!='')
{
		$where1[] = "area <= '$area'";
}

if($unit!=''){
		$where1[] = "unit='$unit'";
}

if($type!=''){
		$where1[] = "p_type='$type'";
}

}
	?>

<!-- start recent properties -->
<section class="properties">
    <div class="container">
    	
    	<ul class="propertySort_list">
    		<li><div style="width:1px; height:45px; margin-top:-12px; background-color:#c5c5c5;"></div></li>
    	</ul>
         <div class="row">
		
		<?php
 
	
	if(isset($_GET["search"]))
{
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; 
		 }; 
	$start_from = ($page-1) * 8;
	
    $insertSQL = "SELECT * FROM property where p_type='$type' and ".implode(' and ', $where1)." order by p_id desc Limit $start_from, 8";
}
else
{	
		if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8;
	 $insertSQL = "SELECT * FROM property where p_type='$type' order by p_id desc Limit $start_from, 8";
}
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{
	?>
		
            <div class="col-lg-12">
                <div class="propertyItem">
                    <div class="propertyContent row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <a class="propertyType" href="#"> <?php 
switch($row['p_type']) {
	case "1":	echo 'HOUSE'; 
	break; 
	case "2":	echo 'PLOT'; 
	break; 
	case "3":	echo 'FLAT'; 
	break; 
	case "4":	echo 'APARTMENT'; 
	break;
}
?> for 
<?php switch($row['purpose']) {
	case "1":	echo 'SALE'; 
	break; 
	case "2":	echo 'RENT'; 
	break; 
} ?>
</a>
                        <a href="property_single.php?p=<?php echo $row['p_id']; ?>" class="propertyImgLink"><img class="propertyImgRow" src="images/home1.jpg" alt="" /></a>
                        </div>
                        <div class="col-lg-8 rowText">
                        <p class="price" style="background-color: #ffee7e;">Rs <?php echo number_format($row['price']); ?></p>
                        <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4><br/>
                        <p><?php echo $row['city']; ?>,<?php echo $row['state']; ?></p>
                        <p style="min-height: 88px;"><?php echo $row['description']; ?></p><br/>
                        <table border="1" class="propertyDetails">
                            <tr>
                              <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo number_format($row['area']); ?> <?php echo $row['unit']; ?></td>
                        <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> Rooms</td>
                        <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> Baths</td>
                            </tr>
                        </table> 
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
        
           
              
                     
                    </div>
                </div>
            </div>
        </div><!-- end row -->
        <ul class="pageList">
            <?php 
			if(isset($_GET["search"]))
{
 $sql = "SELECT COUNT(p_id) as records FROM property where " . implode(' AND ', $where1 ).""; 
}
else
{
 $sql = "SELECT COUNT(p_id) as records FROM property where p_type='$type'"; 	
}
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 8); 

//echo $total_records; 

//echo $page;

if($page > 1){
    
	if(isset($_GET["search"]))
{
	?>
        <li><a href="listing_row2.php?purpose=<?php echo $purpose; ?>&city=<?php echo $city; ?>&area=<?php echo $area; ?>&unit<?php echo $unit; ?>=&price_min=<?php echo $price_min; ?>&price_max=<?php echo $price_max; ?>&type=<?php echo $type; ?>&search=FIND+PROPERTIES&view=<?php echo $prev = ($page - 1);?>"> < </a></li>
<?php } else { ?>	
    <li><a href="listing_row2.php?type=<?php echo $type; ?>&view=<?php echo $prev = ($page - 1);?>"> < </a></li>
    <?php
}
}
 
for ($i=1; $i<=$total_pages; $i++) {  
      
	 if($page == $i){
		 ?>
<li><a><?php echo $page;?> </a></li>
     
      <?php  }
	else {		
            }
      
	?>

<?php
}; 

if($page < $total_pages){
  
  	if(isset($_GET["search"]))
{
	?>
	        <li><a href="listing_row2.php?purpose=<?php echo $purpose; ?>&city=<?php echo $city; ?>&area=<?php echo $area; ?>&unit<?php echo $unit; ?>=&price_min=<?php echo $price_min; ?>&price_max=<?php echo $price_max; ?>&type=<?php echo $type; ?>&search=FIND+PROPERTIES&view=<?php echo $next = ($page + 1); ?>"> > </a></li>
    <?php } else { ?>	
    <li><a href="listing_row2.php?type=<?php echo $type; ?>&view=<?php echo $next = ($page + 1); ?>">></a></li>
    <?php
}

}
?>
        </ul>
    </div><!-- end container -->
</section>
<!-- end recent properties -->


	<?php include('footer.php'); ?>
  
  
<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="js/respond.js"></script>

</body>
</html>