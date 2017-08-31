<?php require_once('../../Connections/dbconfig.php'); 

session_start();

if(isset($_GET["p_id"]))
{
	$p_id = $_GET["p_id"];
}

$query_Recordset1 = "SELECT * FROM property where p_id='".$p_id."'";
mysql_select_db($database_dbconfig, $dbconfig);
$Recordset1 = mysql_query($query_Recordset1, $dbconfig) or die(mysql_error());
$row = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="../../dataTables/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../dataTables/jquery.dataTables.min.js"></script>
<link type="text/css" href="../../dataTables/jquery.dataTables.css" rel="stylesheet">
<link type="text/css" href="../../dataTables/dataTables.tableTools.css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="../../dataTables/dataTables.tableTools.js"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	
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
$('.test-xlarge,#description').unbind('keyup change input paste').bind('keyup change input paste',function(e){
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

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
    
    <?php include ('header.php'); ?>


    
    <?php include ('sidemenu.php'); ?>
    
    
    <div class="content" style="overflow: scroll;">
        
        <div class="header">
          <h1 class="page-title">Admin Panel</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li><a href="view_posts.php">Posts</a> <span class="divider">/</span></li>
	    <li><a href="approved.php">Approved</a> <span class="divider">/</span></li>
	    <li><a href="deleted.php">Deleted</a> <span class="divider">/</span></li>
        </ul>
        
      
	  <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Property</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
   <form method="post" id="userForm" enctype="multipart/form-data" action="edit_posts_save.php">
   
   <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" >   
   
<!-- start my properties list -->

            <!-- start property info -->
           
                                <label for="address">Address *</label><br/>
                                <input type="text" name="location" id="address" value="<?php echo $row["location"]; ?>" class="test-input" maxlength="50" required />
                             
                                <label for="city">City *</label><br/>
                                
				<select name="city" class="input-xlarge"  >
								<option> </option><option>Abbottabad</option><option>Astore</option><option>Attock</option><option>Awaran</option><option>Badin</option><option>Bagh</option><option>Bahawalnagar</option><option>Bahawalpur</option><option>Bannu</option><option>Bhakkar</option><option>Bhimber</option><option >Burewala</option><option>Chaghi</option><option>Chakwal</option><option>Chiniot</option><option>Chitral</option><option >Chunian</option><option>Dadu</option><option >Daska</option><option>Dera Ghazi Khan</option><option>Dera Ismail Khan</option><option>Duniya Pur</option><option>FATA</option><option>Faisalabad</option><option>Fateh Jang</option><option>Galyat</option><option >Ghotki</option><option>Gilgit</option><option>Gujar Khan</option><option>Gujranwala</option><option >Gujrat</option><option>Gwadar</option><option>Hafizabad</option><option >Haripur</option><option>Haroonabad</option><option>Hasan Abdal</option><option>Hunza</option><option >Hyderabad</option><option>Islamabad</option><option>Jacobabad</option><option>Jauharabad</option><option>Jhang</option><option>Jhelum</option><option>Kala Shah Kaku</option><option >Kalat</option><option>Karachi</option><option>Kasur</option><option >Khairpur</option><option>Khanewal</option><option >Kharian</option><option >Khushab</option><option>Khuzdar</option><option >Kohat</option><option>Kotli</option><option>Lahore</option><option>Larkana</option><option>Lasbela</option><option>Layyah</option><option>Loralai</option><option>Makran</option><option>Malakand</option><option>Mandi Bahauddin</option><option>Mansehra</option><option >Mardan</option><option >Matiari</option><option >Mianwali</option><option>Mingora</option><option>Mirpur</option><option>Mirpur Khas</option><option>Multan</option><option>Murree</option><option>Muzaffarabad</option><option>Muzaffargarh</option><option>Nankana Sahib </option><option>Naran</option><option>Narowal</option><option>Nasirabad</option><option >Naushahro Feroze</option><option >Nawabshah</option><option>Neelum</option><option>Nowshera</option><option >Okara</option><option>Others</option><option>Others Azad Kashmir</option><option>Others Balochistan</option><option >Others Gilgit Baltistan</option><option>Others Khyber Pakhtunkhwa</option><option>Others Punjab</option><option>Others Sindh</option><option>Pakpattan</option><option>Peshawar</option><option>Quetta</option><option >Rahim Yar Khan</option><option>Rawalakot</option><option>Rawalpindi</option><option>Rohri</option><option>Sahiwal</option><option >Sanghar</option><option>Sargodha</option><option >Sehwan</option><option>Sheikhupura</option><option >Shikarpur</option><option >Sialkot</option><option>Sibi</option><option>Skardu</option><option>Sudhnoti</option><option>Sukkur</option><option >Swabi</option><option >Swat</option><option>Taxila</option><option>Thatta</option><option>Toba Tek Singh</option><option>Vehari</option><option>Wah</option><option>Wazirabad</option><option>Waziristan</option><option>Zhob</option>				</select>
				
                                <label for="state">State *</label><br/>
                                <select name="state" id="state" class="input-xlarge" required>                                   
									<option value="Azad Kashmir" <?php if($row["state"]=="Azad Kashmir") echo "selected"; ?>>Azad Kashmir</option>
                                    <option value="Balochistan" <?php if($row["state"]=="Balochistan") echo "selected"; ?>>Balochistan</option>
                                    <option value="Federally Administered Tribal Areas" <?php if($row["state"]=="Federally Administered Tribal Areas") echo "selected"; ?>>Federally Administered Tribal Areas</option>
                                    <option value="Islamabad Capital Territory" <?php if($row["state"]=="Islamabad Capital Territory") echo "selected"; ?>>Islamabad Capital Territory</option>
                                    <option value="Khyber Pakhtunkhwa" <?php if($row["state"]=="Khyber Pakhtunkhwa") echo "selected"; ?>>Khyber Pakhtunkhwa</option>
                                    <option value="Northern Areas" <?php if($row["state"]=="Northern Areas") echo "selected"; ?>>Northern Areas</option>
                                    <option value="Punjab" <?php if($row["state"]=="Punjab") echo "selected"; ?>>Punjab</option>
                                    <option value="Sindh" <?php if($row["state"]=="Sindh") echo "selected"; ?>>Sindh</option>
                                   
                                </select>
                                
                                <label for="description">Description</label><br/>
                                <textarea name="description" id="description" rows="3" class="input-xlarge" maxlength="200" style="resize:none">
									<?php echo $row["description"]; ?>
									</textarea>
                                
                           


                                <label for="propertyPurpose">Property Type *</label><br/>
                                <select name="type" id="propertyType" class="input-xlarge" required>
											 
								<option value="1"  <?php if($row["p_type"]==1) echo "selected"; ?>> House </option>
								<option value="2"  <?php if($row["p_type"]==2) echo "selected"; ?>> Plot </option>
								<option value="3"  <?php if($row["p_type"]==3) echo "selected"; ?>> Flat </option>
								<option value="4"  <?php if($row["p_type"]==4) echo "selected"; ?>> Apartment </option>
                                </select>
                                
                                <label for="price">Price (Rs) *</label>
                                <input name="price" id="price" value="<?php echo $row["price"]; ?>" class="test-xlarge" maxlength="14" required />
                                
                                <label for="propertyType">Property Purpose *</label><br/>
                                <select name="purpose" id="propertyType" class="input-xlarge" required>
                                 
									<option value="1" <?php if($row["purpose"]==1) echo "selected"; ?>> Sale </option>
									<option value="2" <?php if($row["purpose"]==2) echo "selected"; ?>> Rent </option>
                                </select>
                                
                                <label for="price">Rooms *</label>
                                <input name="room" id="room" value="<?php echo $row["room"]; ?>" class="test-xlarge" maxlength="2" required />
                                
                                <label for="price">Bath *</label>
                                <input name="bath" id="bath" value="<?php echo $row["bath"]; ?>" class="test-xlarge" maxlength="2" required />
                                
                                <label for="price">Area *</label>
                                <input name="area" id="area" value="<?php echo $row["area"]; ?>" class="test-xlarge" maxlength="14" required />
                                
                                <label for="price">Area Unit *</label>
                                <select name="unit" id="propertyType" class="input-xlarge" required>
									  <option value="Square Feet" <?php if($row["unit"]=="Square Feet") echo "selected"; ?>>Square Feet</option>
									  <option value="Square Yards" <?php if($row["unit"]=="Square Yards") echo "selected"; ?>>Square Yards</option>
									  <option value="Square Meters" <?php if($row["unit"]=="Square Meters") echo "selected"; ?>>Square Meters</option>
									  <option value="Marla" <?php if($row["unit"]=="Marla") echo "selected"; ?>>Marla</option>
									  <option value="Kanal" <?php if($row["unit"]=="Kanal") echo "selected"; ?>>Kanal</option>

                                </select>
                               
	    
         
			    
			   
                                <label for="person">Person Name *</label>
                                <input type="text" name="pname" id="pname" value="<?php echo $row["name"]; ?>" class="test-xlarge" maxlength="20" required />
                               
			     <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="phone">Phone *</label>
                                <input name="phone" id="phone" value="<?php echo $row["phone"]; ?>" class="test-xlarge" maxlength="11" required />
                                
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo $row["email"]; ?>" id="email" class="test-xlarge" maxlength="40" />
                                
	   
	    <div class="col-lg-4 col-lg-offset-4 col-md-4" style="margin-bottom: 10px;font-weight: bold;>
                <div class="formBlock">
                    <div> <center id="response">  </center> </div>
                </div>
            </div>
	   

                   <button class="btn btn-primary" type="submit"><i class="icon-save"></i> Update</button>
       
 </form>
      </div>
     
	 
  </div>

</div>
	   
  
    </div>
	
	<script>
$(document).ready(function(){
		$("#faxd").hide();
		//$("#faxs").hide();
    });
</script>
<script>
$(document).ready( function () {
    $('#example').dataTable( {
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "/dataTables/copy_csv_xls_pdf.swf"
        }
    } );
} );
</script>
    


  <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>
<?php
mysql_free_result($Recordset1);
?>
