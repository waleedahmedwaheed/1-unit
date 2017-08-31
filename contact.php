<?php require_once('Connections/dbconfig.php'); ?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Contact</title>
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

<section class="subHeader page">
    <div class="container">
    	<h1>Contact Us</h1>
   
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">
        
            <!-- start left column -->
            <div class="col-lg-4 col-md-4">
                <div id="map-canvas-one-pin" class="mapSmall"></div>
                <p>The 1-Unit is the highest-ranking real estate in Rawalpindi. We are dedicated to protecting your rights and have assisted more than 1,000 clients, many of whom were referred to our organization by satisfied clients.</p><br/>
            </div><!-- end left column -->

            <!-- start contact form -->
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>GET IN TOUCH</h3>
                        <div class="divider"></div>
                        <ul class="contactDetails">
                            <li><img src="images/icon-mail.png" alt="" />asad@1-unit.com</li>
                            <li><img src="images/icon-phone.png" alt="" />0333 5950 225</li>
                           
                        </ul>
                        
                        <ul class="contactDetails">
                         
                    <li><img src="images/icon-pin.png" alt="" /> <b> Head Office : </b> Office # 2 & 3, Ground Floor, Deval Heights, Square Commercial Phase 7,
                    Bahria Town, Rawalpindi</li>
                        </ul>
                        
                         <ul class="contactDetails">
                         
                    <li><img src="images/icon-pin.png" alt="" /> <b> Branch Office : </b> Office # 1, 1st Floor, Al-Muqeet Heights Near UBL PWD, Islamabad</li>
                        </ul>
                        
                                                                        <form method="post" id="contact-us">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="contactName">Your Name</label><br/>
                                                                                <input type="text" name="contactName" id="contactName" class="requiredField" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="formBlock">
                                        <label for="email">Your Email</label><br/>
                                                                                <input type="text" name="email" id="email" class="requiredField email" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="formBlock">
                                        <label for="message">Your Message</label><br/>
                                                                                <textarea name="comments" id="message" class="requiredField formDropdown"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-lg-offset-9 col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8">
                                    <div class="formBlock">
                                        <input class="buttonColor" type="submit" value="SEND" />
                                        <input type="hidden" name="submitted" id="submitted" value="true" />
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </form><!-- end form -->
                                            </div><!-- col -->
                </div><!-- end row -->
            </div><!-- end contact form -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end main content -->


		<?php include('footer.php'); ?>

<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="js/respond.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqb3fT3SbMSDMggMEK7fJOIkvamccLrjA&amp;sensor=false"></script><!-- google maps -->
<script type="text/javascript" src="js/map-one-pin.js"></script> <!-- map script -->

<script type="text/javascript">
// AJAX CONTACT FORM
    <!--//--><![CDATA[//><!--
    $(document).ready(function() {
        $('form#contact-us').submit(function() {
            $('form#contact-us .error').remove();
            var hasError = false;
            $('.requiredField').each(function() {
                if($.trim($(this).val()) == '') {
                    var labelText = $(this).prev('label').text();
                    $(this).parent().append('<span class="error">This field is required!</span>');
                    $(this).addClass('inputError');
                    hasError = true;
                } else if($(this).hasClass('email')) {
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if(!emailReg.test($.trim($(this).val()))) {
                        var labelText = $(this).prev('label').text();
                        $(this).parent().append('<span class="error">Sorry! You\'ve entered an invalid email.</span>');
                        $(this).addClass('inputError');
                        hasError = true;
                    }
                }
            });
            if(!hasError) {
                var formInput = $(this).serialize();
                $.post($(this).attr('action'),formInput, function(data){
                    $('form#contact-us').slideUp("fast", function() {                  
                        $(this).before('<p class="tick"><strong>Thanks!</strong> Your email has been delivered!</p>');
                    });
                });
            }
            
            return false;   
        });
    });
    //-->!]]>
</script>

</body>
</html>