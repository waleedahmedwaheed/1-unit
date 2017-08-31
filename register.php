<?php require_once('Connections/dbconfig.php'); ?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Pak Property - Responsive Real Estate Template">
<meta name="keywords" content="Themes, real estate, responsive, themeforest, Templates">
<meta name="author" content="Rype Pixel [Chris Gipple]">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pak Property | Register Form</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>

<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();

$.ajax({
url: "register-exec.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//$('#loading').hide();
//$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


</script>


<script language="javascript">

	function checkNum(e)
	{		
		if(isNaN(e.value))
		{
			alert("Please! Enter only numeric value");
			e.select();				
			e.focus();
		}
	}
	
	function checkChar(e)
	{
		for(i=0; i<e.value.length; i++)
		{
			if(e.value.charAt(i) != ' ' )
			if(!isNaN(e.value.charAt(i)))
			{
				alert("Please Enter only character value.");
				e.select();
				e.focus();
				break;
			}
		}
	}
	
	function checkPassword(e, length)
	{
		if(e.value.length==0)
			return;
		if(e.value.length < length)
		{
			alert("Please! Enter minimum "+length+" password length field." );
			e.select();
			e.focus();		
		}		
	}

	function checkConfirmPassword(e, length)
	{
		if(e.value.length==0)
			return;
		if(e.value.length < length)
		{
			alert("Your password does not match.");
			e.select();
			e.focus();		
		}		
	}
	
		 
	
	 
	function submitForm(f)
	{	
		var userpass = f.password.value;
		var confirmPass = f.confirmPassword.value;
			

		var showError ="";

		if( f.password.value =="" )
			showError +="- User Password Name field is required.\n";	
		if( f.confirmPassword.value =="" )
			showError +="- Confirm Password Name field is required.\n";	
		if ( userpass != confirmPass )
			showError +="- Confirm Password is incorrect.\n";
		if( f.firstName.value =="" )
			showError +="- First Name field is required.\n";	
		if( f.lastName.value =="" )
			showError +="- Last Name field is required.\n";	
		if( f.eMail.value =="" )
			showError +="- Email field is required.\n";	
		if( f.country.value =="" )
			showError +="- Country field is required.\n"; 
		if( f.answer.value =="" )
			showError +="- Your  Secrit Answer Require.\n";	
		if ( showError != "" ){
			alert("The following Error(s) occurred \n\n"+showError);
			return false;
		}
		else  
					return true;
		
	}

	
	function checkEmail(e)
	{
		email = e.value;		
		if(email=="")
		   return;
		
		count=0;
		for(i=0; i<email.length; i++)
		{
 			if(email.charAt(i)=='@')
			{
				count++;
				atPos=i;
			}
			if(email.charAt(i)=='@' && i==0)
			{
				wrongEmail(e);			
				return;
			}

		}

		if(count!=1)
		{
			wrongEmail(e);
			return;
		}

		right=0;
		for(j=0; j<atPos; j++)
		{
			if(email.charAt(j)!=' ')
			{
				right=1;
			}
		}

		
		if(right==0)
		{
			wrongEmail(e);
			return;
		}
		right2=0;		
		for(i=atPos+1; i<email.length; i++)
		{
			if(email.charAt(i)=='.')
				right2=1;			
		}

		
		if(right2==0)
		{
			wrongEmail(e);
			return;			
		}

		
		for(i=atPos+1; i<email.length; i++)
		{
			c = email.charAt(i);
			c_ascii = c.charCodeAt(0);

			if(c=='.' || (c_ascii>=48 && c_ascii<=57) ||
			 (c_ascii>=65 && c_ascii<=90) || (c_ascii>=97 && c_ascii<=122) )
			{
				
			}
			
			else
			{		
			wrongEmail(e);
			return;
			}
		}

		for(firstDot=atPos+1; firstDot<email.length; firstDot++)
		{
			if(email.charAt(firstDot)=='.')
			  break;
		}
		if(firstDot==((email.length)-1))
		{	
			wrongEmail(e);
			return;
		}		

		getDot = 1;
		for(i=atPos+1; i<email.length; i++)
		{
			if(email.charAt(i)=='.')
			{
				if(getDot==1)
				{
					wrongEmail(e);
					return;	
				}
				else
				   getDot=1;
			}
			else
			    getDot = 0;
		}	
		
		
	}

	function wrongEmail(e)
	{
		alert("Please! enter valid Email address.");
		e.select();				
		e.focus();
	}
	
	function checkNames(e)
	{
		if(e.value.length==0)
		  return;
		  validname=1;
		for(i=0; i<e.value.length; i++)
		{
			if(e.value.charAt(i)!=' ')
			if(!isNaN(e.value.charAt(i)))
			{
				alert("Please! enter only character value.");
				e.select();
				e.focus();
				validname=0;
				break;	
			}
		}

		if(validname==1)
		{
		   	nam = e.value;
		   	for(j=0; j<nam.length; j++)
		   {	
				charE = nam.charAt(j);
				ascii = charE.charCodeAt(0);

      		     if(charE=='-' || charE==' ' || (ascii>=65 && ascii<=90) || (ascii>=97 && ascii<=122))
		     	{
		     	}
		      else
					{
						alert("Please! enter valid name.");
						e.select();
						e.focus();
						break;
			 		}
		  	 }
	        }   
	}
</script> 

<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "email-check.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

</head>

<body>

	<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Register Form</h1>
    	
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-lg-offset-4">
                <h3>REGISTER</h3>
                <div class="divider"></div>
                <p style="font-size:13px;">Already have an account? <a href="login.php">Login here!</a></p>
                <!-- start login form -->
                <div class="filterContent defaultTab sidebarWidget">
                    <form method="post" action="" id="userForm">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                               
                                <input type="email" name="email" id="email" placeholder="Email" onBlur="checkAvailability();" required />
                                  <span id="user-availability-status" style="font-weight: bold;margin-bottom: 15px;"></span>
                            </div>
                          
                            <div class="col-lg-12 col-md-12 col-sm-6">
                               
				
<input class="span6" type="password" name="password" id="pwd" size="20" placeholder="Password" onBlur="checkPassword(this,6)" value="" required /> 

<input class="span6" name="confirmPassword" size="20" maxLength="16" onBlur="checkConfirmPassword(this,6)" type="password" id="confirm_pwd" placeholder="Confirm Password"  value="" required />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                    <input class="buttonColor" type="submit" value="REGISTER" style="margin-top:24px;">
                                </div>
                            </div>
			    
			    <span id="response"> </span>
			    
                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                    </form><!-- end form -->
                </div><!-- end login form -->
            </div><!-- end col -->
            
        </div>
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