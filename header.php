<?php
require_once('Connections/dbconfig.php'); 

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
<!-- Start Header -->
<header class="navbar yamm navbar-default navbar-fixed-top" style="background:rgb(0, 143, 207);">
<div class="topBar">
    <div class="container">
        <p class="topBarText"><img class="icon" src="images/icon-phone.png" alt="" />0333 5950 225</p>
        <p class="topBarText"><img class="icon" src="images/icon-mail.png" alt="" />asad@1-unit.com</p>
        <ul class="socialIcons">
           
            <li><a href="#"><img src="images/icon-fb.png" alt="" /></a></li>
            <li><a href="#"><img src="images/icon-twitter.png" alt="" /></a></li>
            <li><a href="#"><img src="images/icon-google.png" alt="" /></a></li>
            <li><a href="#"><img src="images/icon-rss.png" alt="" /></a></li>
        </ul>
    </div>
</div>
<div class="container">
 <a class="navbar-brand" href="#" style="height: 72px;margin-left: -15px;margin-top: 0px;padding: 0 0 0 0;"><img style="height: 75px;" src="images/Logo-Final.jpeg" alt="1-unit" /></a>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       
    </div>
    <div class="navbar-collapse collapse">

        <!--  start login/register 
        <ul class="userButtons">  
	<?php if ( !isset($_SESSION['SESS_NAME']) ) {
 ?>
            <li class="userBtn"><a href="login.php" class="buttonGrey">LOGIN</a></li>
            <li class="userBtn"><a href="register.php" class="buttonGrey">REGISTER</a></li>
	<?php } else {
 ?>
            <li class="userBtn"><a href="logout.php" class="buttonGrey">LOGOUT</a></li>
	<?php } ?>
        </ul>
        <!-- end login/register -->

        <ul class="nav navbar-nav">
            <li class="dropdown menu-item-has-children">
                <a href="index.php">HOME</a>
                
            </li>
	    
			<li class="dropdown menu-item-has-children">
                <a href="listing_categories.php">LISTINGS</a>
            </li>
           
            <li class="dropdown menu-item-has-children">
                <a href="submit_property.php">SELL PROPERTY</a>
            </li>
	 
			
		 <li class="dropdown menu-item-has-children">
                <a href="news.php">NEWS</a>
            </li>
         
            <li class="dropdown menu-item-has-children">
                <a href="contact.php">CONTACT</a>
            </li>
        </ul>        
    </div><!--/.navbar-collapse -->
</div><!-- end header container -->
</header><!-- End Header -->