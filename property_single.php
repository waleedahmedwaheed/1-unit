<?php require_once('Connections/dbconfig.php'); ?>
<?php
	
        $insertSQL = "SELECT * FROM property where p_id='".$_GET['p']."'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	$row = mysql_fetch_assoc($Result1);
	
	?>
<!DOCTYPE html>
<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Property Single</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/jquery.bxslider.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<style>
.col-lg-8
{
	
	background: rgb(0, 143, 207);
    padding: 10px 15px 2px 15px;
    color: white;
    border-radius: 20px;
}
</style>	
	
</head>

<body>

<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Property Single
	<?php
	 $address	= trim(urlencode($row['location']));
	 $city 		= trim(urlencode($row['city']));
	 
	     $geocode	=	file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.',+'.$city.'&sensor=false');
    
    $output		= json_decode($geocode); //Store values in variable
    //print_r($output);
    
    if($output->status == 'OK'){ // Check if address is available or not
       /* echo "<br/>";
        echo "Latitude : ".$latitude = $output->results[0]->geometry->location->lat; //Returns Latitude */
        $latitude = $output->results[0]->geometry->location->lat;
        //echo "<br/>";
        //echo "Longitude : ".$longitude = $output->results[0]->geometry->location->lng; // Returns Longitude
	$longitude = $output->results[0]->geometry->location->lng;
    }
    else {
        //echo "Sorry we can't find this location.Check the details again!";
    }
	?>
	
	</h1>
    
    </div><!-- end subheader container -->
</section><!-- end subheader section -->
 <script type="text/javascript">
    $(document).ready(function () {
        // Define the latitude and longitude positions
        var latitude  = parseFloat("<?php echo $latitude; ?>"); // Latitude get from above variable
        var longitude = parseFloat("<?php echo $longitude; ?>"); // Longitude from same
        var latlngPos = new google.maps.LatLng(latitude, longitude);
        
        // Set up options for the Google map
        var myOptions = {
            zoom: 14,
            center: latlngPos,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControlOptions: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE
            }
        };
        
        // Define the map
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        
        // Add the marker
        var marker = new google.maps.Marker({
            position: latlngPos,
            map: map,
            title: "Your Location"
        });
        
    });
    </script>
<!-- start main content section -->



<section class="properties">
    <div class="container">
    	
        <div class="row">

            <!-- start content -->
            <div class="col-lg-9 col-md-9">
			<div style="background: rgba(225, 225, 225, 0.8);">
			<div style="float: left;width: 100%;background: rgb(0, 143, 207);padding: 10px 15px 2px 15px;color:white;">
			<h1 style="font-size: 18px;" title="location"><span><img src="images/location.png" alt="" style="height: 30px;margin-right: 10px;" /></span><?php echo $row['location']; ?></h1>
			<p class="forSale" style="float:right; margin-right:20px;margin-top: -35px;">FOR <?php if($row['purpose']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
			</div>
			<div style="display:none;">
			<p class="price" style="float:right;">Rs.<?php echo $row['price']; ?></p>
			</div>
			</div>
			 <div class="gallery">
                    <ul class="bxslider2">
		    <?php if($row['image']!='') {  ?>
                      <li><img src="<?php echo $row['image']; ?>" alt="" style="height: 365px;width: 100%;" /></li>
		     <?php } else { ?> 	
		     <li><img src="images/banner4.jpg" alt="" style="height: 365px;width: 100%;" /></li>
		     <?php } ?>
                      <?php if($row['image2']!='') {  ?>
                      <li><img src="<?php echo $row['image2']; ?>" style="height: 365px;width: 100%;" alt="" /></li>
		     <?php } else { ?> 
		 
		     <?php } ?>
		      <?php if($row['image3']!='') {  ?>
                      <li><img src="<?php echo $row['image3']; ?>" style="height: 365px;width: 100%;" alt="" /></li>
		     <?php } else { ?> 
		 
		     <?php } ?>
		     
		      <?php if($row['image4']!='') {  ?>
                      <li><img src="<?php echo $row['image4']; ?>" style="height: 365px;width: 100%;" alt="" /></li>
		     <?php } else { ?> 
		 
		     <?php } ?>
		     
                    </ul>

                    <div id="bx-pager">
		     <?php if($row['image']!='') {  ?>
                      <a data-slide-index="0" href="#"><img src="<?php echo $row['image']; ?>" style="height: 110px;width: 150px;" alt="" /></a>
		       <?php } else { ?> 
                      <a data-slide-index="1" href="#"><img src="images/blog-thumb3.jpg" alt=""/></a>
		       <?php } ?>
		        <?php if($row['image2']!='') {  ?>
                      <a data-slide-index="0" href="#"><img src="<?php echo $row['image2']; ?>" style="height: 110px;width: 150px;" alt="" /></a>
		       <?php } else { ?> 
                     
		       <?php } ?>
		       
		       <?php if($row['image3']!='') {  ?>
                      <a data-slide-index="0" href="#"><img src="<?php echo $row['image3']; ?>" style="height: 110px;width: 150px;" alt="" /></a>
		       <?php } else { ?> 
                     
		       <?php } ?>
		       
		        <?php if($row['image4']!='') {  ?>
                      <a data-slide-index="0" href="#"><img src="<?php echo $row['image4']; ?>" style="height: 110px;width: 150px;" alt="" /></a>
		       <?php } else { ?> 
                     
		       <?php } ?>
                      
                    </div>
                    <div class="sliderControls">
                        <span class="slider-prev"></span>
                        <span class="slider-next"></span>
                    </div>
                </div>
                <div class="row">
				
                    <div class="col-lg-4">
                       
			<div id="map" class="mapSmall"></div> 
                    </div>
                    <div class="col-lg-8">
                        
                        <p><?php echo $row['description']; ?></p>
                    <br/>
                       
                    </div><!-- end col -->
                </div><!-- end row -->
				
				
                <!-- start related properties -->
                <h4>RELATED PROPERTIES</h4>
                <div class="divider thin"></div>
                <div class="row">
		<?php 
		 $insertSQL = "SELECT * FROM property order by p_id desc Limit 3";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row2 = mysql_fetch_assoc($Result1))
	{
	?>	
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="propertyItem">
                            <div class="propertyContent">
                               
                                <a href="property_single.php?p=<?php echo $row2['p_id']; ?>" class="propertyImgLink">
				<?php if($row2['image']!='') {  ?>
				<img class="propertyImg" src="<?php echo $row2['image']; ?>" alt="" style="height: 180px;width:400px;" />
				<?php } else { ?>
				<img class="propertyImg" src="images/home3.jpg" alt="" style="height: 180px;width:400px;" />
				<?php } ?>
				</a>
                                <h4><a href="property_single.php?p=<?php echo $row2['p_id']; ?>"><?php echo $row2['location']; ?></a></h4>
                                <p><?php echo $row2['city']; ?>,<?php echo $row2['state']; ?></p>
                                <div class="divider thin"></div>
                                <p class="forSale"><?php if($row['purpose']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
                                <p class="price">Rs <?php echo number_format($row2['price']); ?></p>
                            </div>
                            <table border="1" class="propertyDetails">
                                <tr>
                        <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo number_format($row2['area']); ?> <?php echo $row2['unit']; ?></td>
                        <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row2['room']; ?> Rooms</td>
                        <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row2['bath']; ?> Baths</td>
                        </tr>
                            </table> 
                        </div>
                    </div>
	<?php } ?>	
	
                    
                </div><!-- end related properties row -->

            </div><!-- end content -->
        
            <!-- start sidebar -->
            <div class="col-lg-3 col-md-3">
                <!-- start quick search widget -->
              
                <!-- start property types widget -->
                <h3 style="background-color: #ffee7e;">Rs <?php echo number_format($row['price']); ?></h3>
                <div class="divider"></div>
                <div class="propertyTypesWidget sidebarWidget" style="background-color: rgb(0, 143, 207);">
				<div class="overview">
                        <h4>CONTACT DETAILS</h4>
                        <ul class="overviewList">
					   
						<li>Name <span><?php echo $row['name']; ?></span></li>
						<li>Phone <span><?php echo $row['phone']; ?></span></li>
						
                        </ul>
                        </div>
						
                     <div class="overview">
                        <h4>OVERVIEW</h4>
                        <ul class="overviewList">
                            <li>Property Type <span>
							
							                  <?php 
switch($row['p_type']) {
	case "1":	echo 'House'; 
	break; 
	case "2":	echo 'Plot'; 
	break; 
	case "3":	echo 'Flat'; 
	break; 
	case "4":	echo 'Apartments'; 
	break;
}
?>
							</span></li>
                           
                            <li>Location <span><?php echo $row['state']; ?>, <?php echo $row['city']; ?></span></li>
                            <li>Area <span><?php echo $row['area']; ?>-<?php echo $row['unit']; ?></span></li>
                            <li>Bedrooms <span><?php echo $row['room']; ?></span></li>
                            <li>Bathrooms <span><?php echo $row['bath']; ?></span></li>
                            
                        </ul>
                        </div>
						
						
						
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
<script src="js/jquery.bxslider.min.js"></script>           <!-- bxslider -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqb3fT3SbMSDMggMEK7fJOIkvamccLrjA&amp;sensor=false"></script><!-- google maps -->
<script type="text/javascript" src="js/map-one-pin.js"></script> <!-- map script -->
<script>
    $('.bxslider2').bxSlider({
      pagerCustom: '#bx-pager',
      nextSelector: '.slider-next',
      prevSelector: '.slider-prev',
      nextText: '<img src="images/slider-next2.png" alt="Next" />',
      prevText: '<img src="images/slider-prev2.png" alt="Previous" />'
    });
</script>

</body>

</html>