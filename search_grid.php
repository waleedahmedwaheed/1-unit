<?php require_once('Connections/dbconfig.php'); ?>

<!DOCTYPE html>
<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Property Listing Grid</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("img").hover(function(){
      //alert('abc');  
      //var divsToHide = document.getElementsByClassName("fo-compare-btn fo-close-xyz sgsefvhuedc");
	
     
    });
});
</script>
</head>

<body>

	<?php include('header.php'); ?>

	
	
<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Property Listing Grid</h1>
   
    </div><!-- end subheader container -->
</section><!-- end subheader section -->


<!-- start horizontal filter -->
<section class="filter">
    <div class="container">
        <div class="filterHeader">
            <ul class="filterNav tabs">
                <li><a class="current triangle" href="#tab1">ALL PROPERTIES</a></li>
                <li><a href="#tab2">FOR SALE</a></li>
                <li><a href="#tab3">FOR RENT</a></li>
            </ul>
            <div class="filterHeadButton"><a class="buttonGrey" href="#">VIEW ALL LISTINGS</a></div>
        </div>
        <div class="filterContent defaultTab" id="tab1">
            <form method="post" action="search_grid.php">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock select">
                        <label for="propertyType">Property Type</label><br/>
                        <select name="type" id="propertyType" class="formDropdown">
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
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                            <label for="price-min">Price Range</label><br/>
                            <div style="float:right; margin-top:-25px;">
                                <div class="priceInput"><input type="number" name="price_min" id="price-min" class="priceInput" /></div>
                                <span style="float:left; margin-right:10px; margin-left:10px;">-</span>
                                <div class="priceInput"><input type="number" name="price_max" id="price-max" class="priceInput" /></div>
                            </div><br/>
                            <div class="priceSlider"></div>
                            <div class="priceSliderLabel"><span>0</span><span style="float:right;">800,000</span></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
                        <label for="beds">Beds</label><br/>
                        <select name="beds" id="beds" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
                        <label for="baths">Baths</label><br/>
                        <select name="baths" id="baths" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock select">
                        <label for="area">Area (Sq Ft)</label><br/>
                        <select name="area" id="area" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                            <input class="buttonColor" type="submit" name="search" value="FIND PROPERTIES" style="margin-top:24px;">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div><!-- END TAB1 -->
       
</section>
<!-- end horizontal filter -->



<!-- start recent properties -->
<section class="properties">
    <div class="container">
    	
        <div class="row">
	
	<?php
	
	if(isset($_POST['search']))
	{
	
	$type = $_POST['type'];
	$city = $_POST['city'];
	$price_min = $_POST['price_min'];
	$price_max = $_POST['price_max'];
	
	if ((isset($_POST['type'])) and ($_POST['type']!='')) 	
	{
	
	
	if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
        $insertSQL = "SELECT * FROM property where p_type='".$type."' order by p_id desc Limit $start_from, 8";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{
	?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a href="property_single.php?p=<?php echo $row['p_id']; ?>" class="propertyImgLink"><img class="propertyImgRow" src="images/home1.jpg" alt="" /></a>
                        <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4>
                        <p><?php echo $row['city']; ?>,<?php echo $row['state']; ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale"><?php if($row['p_type']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
                        <p class="price">Rs.<?php echo $row['price']; ?></p>
                    </div>
                    <table border="1" class="propertyDetails">
                        <tr>
                        <td title="Area"><img  src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo $row['area']; ?> <?php echo $row['unit']; ?></td>
                        <td title="Rooms"><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> </td>
                        <td title="Baths"><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> </td>
                        </tr>
                    </table> 
                </div>
            </div>
	<?php } ?>
	

         
        </div><!-- end row -->
	
	
	
        <ul class="pageList">
 
	    <?php 
$sql = "SELECT COUNT(p_id) FROM property where p_type='".$type."'"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 8); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <li><a href="listing_grid.php?view=<?php echo $prev = ($page - 1);?>"> < </a></li>
    <?php
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
  
	?>
    <li><a href="listing_grid.php?view=<?php echo $next = ($page + 1); ?>">></a></li>
   
    <?php
}
	
?>
        </ul>

	<!-- location -->
	
	<?php } 
	
	else if((isset($_POST['city'])) and ($_POST['type']!='')) 	
	{
	
	
	if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
        $insertSQL = "SELECT * FROM property where city='".$city."' order by p_id desc Limit $start_from, 8";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{
	?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a href="property_single.php?p=<?php echo $row['p_id']; ?>" class="propertyImgLink"><img class="propertyImgRow" src="images/home1.jpg" alt="" /></a>
                        <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4>
                        <p><?php echo $row['city']; ?>,<?php echo $row['state']; ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale"><?php if($row['p_type']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
                        <p class="price">Rs.<?php echo $row['price']; ?></p>
                    </div>
                    <table border="1" class="propertyDetails">
                        <tr>
                        <td title="Area"><img  src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo $row['area']; ?> <?php echo $row['unit']; ?></td>
                        <td title="Rooms"><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> </td>
                        <td title="Baths"><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> </td>
                        </tr>
                    </table> 
                </div>
            </div>
	<?php } ?>
	

         
        </div><!-- end row -->
	
	
	
        <ul class="pageList">
 
	    <?php 
$sql = "SELECT COUNT(p_id) FROM property where city='".$city."'"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 8); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <li><a href="listing_grid.php?view=<?php echo $prev = ($page - 1);?>"> < </a></li>
    <?php
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
  
	?>
    <li><a href="listing_grid.php?view=<?php echo $next = ($page + 1); ?>">></a></li>
   
    <?php
}
	
?>
        </ul>
	
	<!-- location -->
	
	<?php } 
	
	else if((isset($_POST['price_min'])) and ($_POST['price_min']!='') and (isset($_POST['price_max'])) and ($_POST['price_max']!=''))
	{
	
	
	if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
        $insertSQL = "SELECT * FROM property where price > '".$price_min."' and price < '".$price_max."' order by p_id desc Limit $start_from, 8";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{
	?>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a href="property_single.php?p=<?php echo $row['p_id']; ?>" class="propertyImgLink"><img class="propertyImgRow" src="images/home1.jpg" alt="" /></a>
                        <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4>
                        <p><?php echo $row['city']; ?>,<?php echo $row['state']; ?></p>
                        <div class="divider thin"></div>
                        <p class="forSale"><?php if($row['p_type']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
                        <p class="price">Rs.<?php echo $row['price']; ?></p>
                    </div>
                    <table border="1" class="propertyDetails">
                        <tr>
                        <td title="Area"><img  src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo $row['area']; ?> <?php echo $row['unit']; ?></td>
                        <td title="Rooms"><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> </td>
                        <td title="Baths"><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> </td>
                        </tr>
                    </table> 
                </div>
            </div>
	<?php } ?>
	

         
        </div><!-- end row -->
	
	
	
        <ul class="pageList">
 
	    <?php 
$sql = "SELECT COUNT(p_id) FROM property where price > '".$price_min."' and price < '".$price_max."'"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 8); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <li><a href="listing_grid.php?view=<?php echo $prev = ($page - 1);?>"> < </a></li>
    <?php
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
  
	?>
    <li><a href="listing_grid.php?view=<?php echo $next = ($page + 1); ?>">></a></li>
   
    <?php
}
	
?>
        </ul>
	
	<?php } 
	else {}
	}
	?>	
	
	
	
	
	
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