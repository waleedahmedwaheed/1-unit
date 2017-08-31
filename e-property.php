<?php require_once('Connections/dbconfig.php'); ?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Blog Classic</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
</head>

<body>

	<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Blog Classic</h1>
    
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
            <div class="row">
	    <?php
	if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 4; 
        $insertSQL = "SELECT * FROM property order by p_id desc Limit $start_from, 4";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{
	?>	
                <div class="col-lg-12 col-md-12">
                    <div class="blogPost">
                        <a href="property_single.php?p=<?php echo $row['p_id']; ?>" class="propertyImgLink">
			<?php if($row['image']!='') {  ?>
			<img class="propertyImgRow" src="<?php echo $row['image']; ?>" alt="" />
			<?php } else { ?>
			<img class="propertyImgRow" src="images/banner4.jpg" alt="" />
			<?php } ?>
			</a>
                        <div class="propertyContent row">
                            <div class="col-lg-12 rowText">
                            <table border="1" class="blogDetails">
                              <tr>
                        <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo number_format($row['area']); ?>m Area</td>
                        <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row['room']; ?> Rooms</td>
                        <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row['bath']; ?> Baths</td>
                        </tr>
                            </table>
			    <p>House for <?php if($row['p_type']==1){ echo 'SALE';} else { echo 'RENT';} ?></p><br>
                            <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4>
			     <h4 style="float: right;"><a href="property_single.php?p=<?php echo $row['p_id']; ?>">Rs <?php echo number_format($row['price']); ?></a></h4><br/>
                            <span><?php echo $row['city']; ?>,<?php echo $row['state']; ?></span>
                           
			   <br/>
                            <a class="buttonGrey" href="property_single.php?p=<?php echo $row['p_id']; ?>">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
	<?php } ?>	
              
               
              
                <ul class="pageList">
 
	    <?php 
$sql = "SELECT COUNT(p_id) FROM property"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 4); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <li><a href="blog_classic.php?view=<?php echo $prev = ($page - 1);?>"> < </a></li>
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
    <li><a href="blog_classic.php?view=<?php echo $next = ($page + 1); ?>">></a></li>
   
    <?php
}
?>
        </ul>
            </div><!-- end row -->
            </div><!-- end col -->
        
            <!-- START SIDEBAR -->
            <div class="col-lg-3 col-md-3">
                <!-- start quick search widget -->
                <h3>QUICK SEARCH</h3>
                <div class="divider"></div>
                <div class="filterContent defaultTab sidebarWidget">
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="propertyType">Property Type</label><br/>
                                <select name="property type" id="propertyType" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Family Home</option>
                                    <option value="Country3">Apartment</option>
                                    <option value="Country4">Condo</option>
                                    <option value="Country5">Villa</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="location">Location</label><br/>
                                <select name="location" id="location" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Option 1</option>
                                    <option value="Country3">Option 2</option>
                                    <option value="Country4">Option 3</option>
                                    <option value="Country5">Option 4</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="price">Price Range</label><br/>
                                <select name="price" id="price" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Option 1</option>
                                    <option value="Country3">Option 2</option>
                                    <option value="Country4">Option 3</option>
                                    <option value="Country5">Option 4</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                    <input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                    </form><!-- end form -->
                </div><!-- end quick search widget -->

                <!-- start recent posts widget -->
                <h3>RECENT POSTS</h3>
                <div class="divider"></div>
                <div class="recentPosts sidebarWidget">
		    
	<?php	     $insertSQL = "SELECT * FROM property order by p_id desc Limit 4";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{		?>
                    <h4><a href="property_single.php?p=<?php echo $row['p_id']; ?>"><?php echo $row['location']; ?></a></h4></br>
                    <a href="property_single.php?p=<?php echo $row['p_id']; ?>">READ MORE</a>
                    <p class="date">Feb 5, 2014</p>
                    <div style="clear:both;"></div>
                    <div class="divider thin"></div>
                  
	<?php } ?>	    
                </div>
                <!-- end recent posts widget -->

                <!-- start property types widget -->
                <h3>PROPERTY TYPES</h3>
                <div class="divider"></div>
                <div class="propertyTypesWidget sidebarWidget">
                    <ul>
                        <li><h4><a href="#">FAMILY HOUSE</a></h4></li>
                        <li><h4><a href="#">SINGLE HOUSE</a></h4></li>
                        <li><h4><a href="#">APARTMENT</a></h4></li>
                        <li><h4><a href="#">CONDO</a></h4></li>
                        <li><h4><a href="#">VILLA</a></h4></li>
                        <li><h4><a href="#">OFFICE BUILDING</a></h4></li>
                    </ul>
                </div>
                <!-- end property types widget -->

            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end main content -->


		<?php include('footer.php'); ?>

<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="js/respond.js"></script>

</body>

</html>