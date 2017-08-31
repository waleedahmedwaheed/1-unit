<?php require_once('Connections/dbconfig.php'); ?>

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit - News </title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/jquery.bxslider.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jquery.nouislider.min.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<style>
tr{
color: rgb(255, 254, 254);
font-size: 25px;
font-weight: bold;
font-family: -webkit-body;
}
</style>
<script src="js/jquery.min.js"></script>
  
</head>

<body>

<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>News</h1>
    	
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9" style="width: 100%;">
            <div class="row">
                <div class="col-lg-12 col-md-12">
			
		<?php
	$insertSQL = "SELECT * FROM news where status=0 order by n_id desc ";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row = mysql_fetch_assoc($Result1))
	{ 
	?>	
                    <!-- start post content -->
                    <div class="blogPost">
                         <div class="propertyContent row">
                            <div class="col-lg-12 rowText">
							<?php if($row["image"]!=""){ ?>
							 <div id="thumbnails" style="float:left;">
        <ul class="clearfix">
		 <li><a href="adminpanel/build/uploaded_files/<?php echo $row["image"]; ?>" title="1-Unit News">
<img src="adminpanel/build/uploaded_files/<?php echo $row["image"]; ?>" style="width: 200px;height: 150px;" alt="1-Unit" /> </a>
		</li>
		</ul>
      </div>
							<?php } ?>
							<div style="float:left;padding-left: 10px;" >
						   <?php echo $row["detail"]; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post content -->
			<?php } ?>


                </div><!-- col -->
            </div><!-- end row -->
            </div><!-- end col -->
        
            <!-- START SIDEBAR -->
                  </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end main content -->



<?php include('footer.php'); ?>

<!-- JavaScript file links -->

  <script type="text/javascript">
$(function() {
    $('#thumbnails a').lightBox();
});
</script>
 <link rel="stylesheet" type="text/css" media="all" href="lightbox-gallery/css/jquery.lightbox-0.5.css">
  <script type="text/javascript" src="lightbox-gallery/js/jquery.lightbox-0.5.min.js"></script>


</body>


</html>