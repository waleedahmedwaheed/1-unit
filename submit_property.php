<?php require_once('Connections/dbconfig.php'); 
//error_reporting(0);
error_reporting(E_ERROR | E_PARSE );
?>
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="1-Unit - Responsive Real Estate Template">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>1-Unit | Submit Property</title>
<!-- html5 support in IE8 and later -->
<script src="../../html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/yamm.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>

<head>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
</head>

<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();

$.ajax({
url: "save_property.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//$('#loading').hide();
$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


</script>

<script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#price,#area,#bath,#room,#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>

<script>
$('.test-input,#description').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = $this.attr('maxlength');
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
}); 
</script>

</head>

<body>

	<?php include('header.php'); ?>

<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
        <h1>Submit Property</h1>
     
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

 <form method="post" id="userForm" enctype="multipart/form-data">
<!-- start my properties list -->
<section class="properties">
    <div class="container">
        <div class="row">
<input type="hidden" name="status" value="1" >   
            <!-- start property info -->
            <div class="col-lg-4 col-md-4">
                <h3>PROPERTY INFO</h3>
                <div class="divider"></div>
                <div class="sidebarWidget submission">
                   
                        <div class="row">
                           
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="address">Address *</label><br/>
                                <input type="text" name="location" id="address" class="test-input" maxlength="50" required />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="city">City *</label><br/>
                                
				<select name="city" class="formDropdown" required >
								<option> </option><option>Abbottabad</option><option>Astore</option><option>Attock</option><option>Awaran</option><option>Badin</option><option>Bagh</option><option>Bahawalnagar</option><option>Bahawalpur</option><option>Bannu</option><option>Bhakkar</option><option>Bhimber</option><option >Burewala</option><option>Chaghi</option><option>Chakwal</option><option>Chiniot</option><option>Chitral</option><option >Chunian</option><option>Dadu</option><option >Daska</option><option>Dera Ghazi Khan</option><option>Dera Ismail Khan</option><option>Duniya Pur</option><option>FATA</option><option>Faisalabad</option><option>Fateh Jang</option><option>Galyat</option><option >Ghotki</option><option>Gilgit</option><option>Gujar Khan</option><option>Gujranwala</option><option >Gujrat</option><option>Gwadar</option><option>Hafizabad</option><option >Haripur</option><option>Haroonabad</option><option>Hasan Abdal</option><option>Hunza</option><option >Hyderabad</option><option>Islamabad</option><option>Jacobabad</option><option>Jauharabad</option><option>Jhang</option><option>Jhelum</option><option>Kala Shah Kaku</option><option >Kalat</option><option>Karachi</option><option>Kasur</option><option >Khairpur</option><option>Khanewal</option><option >Kharian</option><option >Khushab</option><option>Khuzdar</option><option >Kohat</option><option>Kotli</option><option>Lahore</option><option>Larkana</option><option>Lasbela</option><option>Layyah</option><option>Loralai</option><option>Makran</option><option>Malakand</option><option>Mandi Bahauddin</option><option>Mansehra</option><option >Mardan</option><option >Matiari</option><option >Mianwali</option><option>Mingora</option><option>Mirpur</option><option>Mirpur Khas</option><option>Multan</option><option>Murree</option><option>Muzaffarabad</option><option>Muzaffargarh</option><option>Nankana Sahib </option><option>Naran</option><option>Narowal</option><option>Nasirabad</option><option >Naushahro Feroze</option><option >Nawabshah</option><option>Neelum</option><option>Nowshera</option><option >Okara</option><option>Others</option><option>Others Azad Kashmir</option><option>Others Balochistan</option><option >Others Gilgit Baltistan</option><option>Others Khyber Pakhtunkhwa</option><option>Others Punjab</option><option>Others Sindh</option><option>Pakpattan</option><option>Peshawar</option><option>Quetta</option><option >Rahim Yar Khan</option><option>Rawalakot</option><option>Rawalpindi</option><option>Rohri</option><option>Sahiwal</option><option >Sanghar</option><option>Sargodha</option><option >Sehwan</option><option>Sheikhupura</option><option >Shikarpur</option><option >Sialkot</option><option>Sibi</option><option>Skardu</option><option>Sudhnoti</option><option>Sukkur</option><option >Swabi</option><option >Swat</option><option>Taxila</option><option>Thatta</option><option>Toba Tek Singh</option><option>Vehari</option><option>Wah</option><option>Wazirabad</option><option>Waziristan</option><option>Zhob</option>				</select>
				
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="state">State *</label><br/>
                                <select name="state" id="state" class="formDropdown" required>
				<option></option>	                                   
				   <option value="Azad Kashmir">Azad Kashmir</option>
                                    <option value="Balochistan">Balochistan</option>
                                    <option value="Federally Administered Tribal Areas">Federally Administered Tribal Areas</option>
                                    <option value="Islamabad Capital Territory">Islamabad Capital Territory</option>
                                    <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                    <option value="Northern Areas">Northern Areas</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Sindh">Sindh</option>
                                   
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="description">Description</label><br/>
                                <textarea name="description" id="description" class="formDropdown" maxlength="200" style="resize:none"></textarea><br/><br/>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                   <!-- end form -->
                </div>
            </div>
            <!-- end property info -->

            <!-- start amenities -->
            <div class="col-lg-4 col-md-4">
                <h3>ADDITIONAL INFO</h3>
                <div class="divider"></div>
                <div class="sidebarWidget submission">
                        <div class="row">
			
			 <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="propertyPurpose">Property Type *</label><br/>
                                <select name="type" id="propertyType" class="formDropdown" required>
                                   <option> </option>
                <option value="1"> House </option>
                <option value="2"> Plot </option>
				<option value="3"> Flat </option>
				<option value="4"> Apartment </option>
                                </select>
                                </div>
                            </div>
			    
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Price (Rs) *</label><br/>
                                <input name="price" id="price" class="test-input" maxlength="14" required />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock select">
                                <label for="propertyType">Property Purpose *</label><br/>
                                <select name="purpose" id="propertyType" class="formDropdown" required>
                                   <option> </option>
                <option value="1"> Sale </option>
                <option value="2"> Rent </option>
                                </select>
                                </div>
                            </div>
                           <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Rooms *</label><br/>
                                <input name="room" id="room" class="test-input" maxlength="2" required />
                                </div>
                            </div>
			    
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Bath *</label><br/>
                                <input name="bath" id="bath" class="test-input" maxlength="2" required />
                                </div>
                            </div>
			    
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Area *</label><br/>
                                <input name="area" id="area" class="test-input" maxlength="14" required />
                                </div>
                            </div>
			    
			    <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Area Unit *</label><br/>
                                <select name="unit" id="propertyType" class="formDropdown" required>
                                    <option value="Square Feet">Square Feet</option>
				  <option value="Square Yards">Square Yards</option>
				  <option value="Square Meters">Square Meters</option>
				  <option value="Marla" selected="">Marla</option>
				  <option value="Kanal">Kanal</option>

                                </select>
                                </div>
                            </div>
			   

                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                  <!-- end form -->
                </div>
            </div>
            <!-- end additional info -->
	    
            <!-- start additional info -->
            <div class="col-lg-4 col-md-4">
                <h3>PROPERTY IMAGES</h3>
                <div class="divider"></div>
                <div class="sidebarWidget submission">
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="image">Image</label><br/>
                                <input id="file" type="file" name="image1" accept="image/jpg,image/png,image/jpeg,image/gif" >
                                </div>
                            </div>
				 <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="image">Image</label><br/>
                                <input id="file2" type="file" name="image2" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="image">Image</label><br/>
                                <input id="file3" type="file" name="image3" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="image">Image</label><br/>
                                <input id="file4" type="file" name="image4" accept="image/jpg,image/png,image/jpeg,image/gif">
                                </div>
                            </div>
			    
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="person">Person Name *</label><br/>
                                <input type="text" name="pname" id="pname" class="test-input" maxlength="20" required />
                                </div>
                            </div>
			    
			    
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="phone">Phone *</label><br/>
                                <input name="phone" id="phone" class="test-input" maxlength="11" required />
                                </div>
                            </div>
			    
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="email">Email</label><br/>
                                <input type="email" name="email" id="email" class="test-input" maxlength="40" />
                                </div>
                            </div>
                           
                       
                           
                            <div style="clear:both;"></div>
			    
			    
			      
                        </div><!-- end row -->
                  <!-- end form -->
                </div>
            </div>
            <!-- end additional info -->
	   
		  
	   
	    <div class="col-lg-4 col-lg-offset-4 col-md-4" style="margin-bottom: 10px;font-weight: bold;>
                <div class="formBlock">
                    <div> <center id="response">  </center> </div>
                </div>
            </div>
	   
            <div class="col-lg-4 col-lg-offset-4 col-md-4">
                <div class="formBlock">
                    <input class="buttonColor" type="submit" value="SUBMIT">
                </div>
            </div>

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end my properties list -->
 </form>

 
 	<?php include('footer.php'); ?>


<!-- JavaScript file links -->
<script src="js/jquery.js"></script>			<!-- Jquery -->
<script src="js/bootstrap.min.js"></script>  <!-- bootstrap 3.0 -->
<script src="js/respond.js"></script>
<script src="js/tabs.js"></script>       <!-- tabs -->

</body>


</html>
