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

<!-- start recent properties -->
<section class="properties">
    <div class="container">
    	
        <div class="row">
	
	<?php
	if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 8; 
        $insertSQL = "SELECT * FROM property order by p_id desc Limit $start_from, 8";
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
                        <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo number_format($row['area']); ?>m</td>
                        <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> Rooms</td>
                        <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> Baths</td>
                        </tr>
                    </table> 
                </div>
            </div>
	<?php } ?>
	

         
        </div><!-- end row -->
	
	
	
        <ul class="pageList">
 
	    <?php 
$sql = "SELECT COUNT(p_id) FROM property"; 
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