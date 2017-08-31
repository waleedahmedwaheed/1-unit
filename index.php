<?php require_once('Connections/dbconfig.php'); 

session_start();

if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	$qry = "SELECT * FROM register WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_array($result);
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit  <?php //echo $user_arr['email']; ?> </title>
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
</head>

<body style="background:rgb(0, 143, 207);">

<!-- Start Header -->

<?php include('header.php'); ?>

<!-- start subheader -->
<section class="sliderControls">
    <div>
        <span class="slider-prev"></span>
        <span class="slider-next"></span>
    </div>
</section>

<section class="subHeader home headerMinimal bxslider" style="height:530px;">
    <div id="slide1" style="height:530px;">
        <div class="container">
            <div class="col-lg-6">
                
                <div class="sliderTextBox" style="height: 80px;">
                <p>1-Unit provides resources for real estate professionals to help navigate all stages of the home-buying cycle.
				 </p>
                
                </div>
            </div>
           
        </div>
    </div>
    <div id="slide2" style="height:530px;">
        <div class="container">
            <div class="col-lg-6">
                
                <div class="sliderTextBox" style="height: 80px;">
                <p>1-Unit objective is to help individuals in the property market to find their ideal home, land or commercial property.
				</p>

                </div>
            </div>
           
        </div>
    </div>
	
	<div id="slide3" style="height:530px;">
        <div class="container">
            <div class="col-lg-6">
                
                <div class="sliderTextBox" style="height: 80px;">
                <p>1-Unit Our aim is to empower consumers with the most detailed and dependable information in the market.
				</p>

                </div>
            </div>
           
        </div>
    </div>
	
	<div id="slide4" style="height:530px;">
        <div class="container">
            <div class="col-lg-6">
                
                <div class="sliderTextBox" style="height: 80px;">
                <p>1-Unit can help you contact the seller of your desired property directly via Phone or E-Mail.
				</p>

                </div>
            </div>
           
        </div>
    </div>
	
		<div id="slide5" style="height:530px;">
        <div class="container">
            <div class="col-lg-6">
                
                <div class="sliderTextBox" style="height: 80px;">
                <p>1-Unit can help you! Multiple search opportunities Wide range of property listings.
				</p>

                </div>
            </div>
           
        </div>
    </div>
   
</section>


<section class="topAgents" style="margin-top: 60px;height: 300px;">
    <div class="container">
        <div class="row">
				
						<div class="col-lg-3 col-md-3 col-sm-3" style="width: 200px;">
                <img class="agentImg" src="images/agent4.png" alt="" /><br/><br/>
                <h4>SERVICES</h4>
               
            </div>
			
			<table style="margin-left: 400px;margin-top: -30px;">
			<tr> <td> Real Estate Due Diligence </td> </tr>
			<tr> <td> Valuation for Property </td> </tr>
			<tr> <td> Property / Asset Management </td> </tr>
			<tr> <td> Efficiency Matching of Buyers & Sellers </td></tr>
			<tr> <td> Pre-Construction & Construction Management </td> </tr>
			<tr> <td> Interior Designing </td> </tr>			
			</table>
	
				
        </div>
    </div>
</section>

<!-- start recent properties -->
<section class="properties">
    <div class="container">
        <h3>RECENT PROPERTIES</h3>
        <div class="divider"></div>
	<div class="row">
		<?php 
		 $insertSQL = "SELECT * FROM property order by p_id desc Limit 4";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());	 
	while($row2 = mysql_fetch_assoc($Result1))
	{
	?>	
                   <div class="col-lg-3 col-md-3 col-sm-6">
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
                                <p class="forSale"><?php if($row2['purpose']==1){ echo 'SALE';} else { echo 'RENT';} ?></p>
                                <p class="price">Rs <?php echo number_format($row2['price']); ?></p>
                            </div>
                            <table border="1" class="propertyDetails">
                                <tr>
                        <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" /><?php echo number_format($row2['area']); ?>&nbsp;<?php echo $row2['unit']; ?></td>
                        <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" /><?php echo $row2['room']; ?> Rooms</td>
                        <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" /><?php echo $row2['bath']; ?> Baths</td>
                        </tr>
                            </table> 
                        </div>
                    </div>
	<?php } ?>	
	
                    
                </div><!-- end related properties row -->
        
    </div><!-- end container -->
</section>
<!-- end recent properties -->


	<?php include('footer.php'); ?>

<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="js/respond.js"></script>
<script src="js/jquery.bxslider.min.js"></script>           <!-- bxslider -->
<script src="js/tabs.js"></script>       <!-- tabs -->
<script src="js/jquery.nouislider.min.js"></script>  <!-- price slider -->
<script>
//call bxslider for sub header section
$(document).ready(function(){
    $('.bxslider').bxSlider({
        auto: true,
        pager: false,
        nextSelector: '.slider-next',
        prevSelector: '.slider-prev',
        nextText: '<img src="images/slider-next.png" alt="slider next" />',
        prevText: '<img src="images/slider-prev.png" alt="slider prev" />'
    });
});
</script>

<script>
//Setup price slider 
var Link = $.noUiSlider.Link;

$(".priceSlider").noUiSlider({
     range: {
      'min': 0,
      'max': 800000
    }
    ,start: [150000, 550000]
    ,step: 1000
    ,margin: 100000
    ,connect: true
    ,direction: 'ltr'
    ,orientation: 'horizontal'
    ,behaviour: 'tap-drag'
    ,serialization: {
        lower: [
            new Link({
                target: $("#price-min")
            })
        ],

        upper: [
            new Link({
                target: $("#price-max")
            })
        ],

        format: {
        // Set formatting
            decimals: 0,
            thousand: ',',
            prefix: '$'
        }
    }
});
</script>

</body>

</html>