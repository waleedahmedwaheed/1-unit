<?php require_once('Connections/dbconfig.php'); ?>

<!DOCTYPE html>
<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Property Categories</title>
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

<style>

a
{
	color: rgb(0, 143, 207);
}
</style>

</head>

<body>

	<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Property Categories</h1>
   
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start recent properties -->
<section class="properties">
    <div class="container">
    	
        <div class="row">
	
            <div class="col-lg-3 col-md-3 col-sm-6">
                        <center>
						<a href="listing_row2.php?type=1" class="propertyImgLink"><img class="propertyImgRow" src="images/2.png" alt="" /></a>
                        </center>
						<h4 style="text-align: center;"><a href="listing_row2.php?type=1">Houses</a></h4>
                        <div class="divider thin"></div>
                        
                
            </div>
			
			<div class="col-lg-3 col-md-3 col-sm-6">
                        <center>
						<a href="listing_row2.php?type=2" class="propertyImgLink"><img class="propertyImgRow" src="images/8.png" alt="" /></a>
                        </center>
						<h4 style="text-align: center;"><a href="listing_row2.php?type=2">Plots</a></h4>
                        <div class="divider thin"></div>
                        
                
            </div>
			
			<div class="col-lg-3 col-md-3 col-sm-6">
                        <center>
						<a href="listing_row2.php?type=3" class="propertyImgLink"><img class="propertyImgRow" src="images/1.png" alt="" /></a>
                        </center>
						<h4 style="text-align: center;"><a href="listing_row2.php?type=3">Flats</a></h4>
                        <div class="divider thin"></div>
                        
                
            </div>
			
			<div class="col-lg-3 col-md-3 col-sm-6">
						<center>
                        <a href="listing_row2.php?type=4" class="propertyImgLink"><img class="propertyImgRow" src="images/3.png" alt="" /></a>
                        </center>
						<h4 style="text-align: center;"><a href="listing_row2.php?type=4">Apartments</a></h4>
                        <div class="divider thin"></div>
                        
                
            </div>
	

         
        </div><!-- end row -->
	
	
	
       
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