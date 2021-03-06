<?php require_once('../../Connections/dbconfig.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_dbconfig, $dbconfig);
$query_Recordset1 = "SELECT * FROM property where status=1";
$Recordset1 = mysql_query($query_Recordset1, $dbconfig) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin <?php echo $_SESSION['MM_Username']; ?></title>
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
        
      
	    <table id="example" class="display dataTable" cellspacing="0" role="grid" aria-describedby="example_info" style="width: 90%;background-color: white;">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending">Location</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Status</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Room: activate to sort column ascending">Room</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Bath: activate to sort column ascending">Bath</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" >Price</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Area: activate to sort column ascending">Area</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending">State</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending">City</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Name</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Phone</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"></th>
	        </tr>
			</thead>
<tfoot>
<tr>
<th rowspan="1" colspan="1">ID</th>
<th rowspan="1" colspan="1">Location</th>
<th rowspan="1" colspan="1">Status</th>
<th rowspan="1" colspan="1">Type</th>
<th rowspan="1" colspan="1">Room</th>
<th rowspan="1" colspan="1">Bath</th>
<th rowspan="1" colspan="1">Price</th>
<th rowspan="1" colspan="1">Area</th>
<th rowspan="1" colspan="1">Description</th>
<th rowspan="1" colspan="1">State</th>
<th rowspan="1" colspan="1">City</th>
<th rowspan="1" colspan="1">Name</th>
<th rowspan="1" colspan="1">Phone</th>
<th rowspan="1" colspan="1">Email</th>
<th rowspan="1" colspan="1"></th>
</tr>
</tfoot>
<tbody>
            <?php do { ?>
              <tr>
                <td class="sorting_1"><?php echo $row_Recordset1['p_id']; ?></td>
                <td><?php echo $row_Recordset1['location']; ?></td>
                <td><?php echo $row_Recordset1['status']; ?></td>
                <td><?php if($row_Recordset1['p_type']==1){ echo 'SALE';}else{ echo 'RENT';} ?></td>
                <td><?php echo $row_Recordset1['room']; ?></td>
		<td><?php echo $row_Recordset1['bath']; ?></td>
                <td><?php echo $row_Recordset1['price']; ?></td>
                <td><?php echo $row_Recordset1['area']; ?></td>
                <td><?php echo $row_Recordset1['description']; ?></td>
                <td><?php echo $row_Recordset1['state']; ?></td>
                <td><?php echo $row_Recordset1['city']; ?></td>
                <td><?php echo $row_Recordset1['name']; ?></td>
                <td><?php echo $row_Recordset1['phone']; ?></td>
                <td><?php echo $row_Recordset1['email']; ?></td>
                <td> <a href="delete_posts.php?p_id=<?php echo $row_Recordset1['p_id']; ?>" onClick="return confirm('Are you sure to want to delete?')">delete</a></td>
              </tr>
              <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
			  
          </tbody></table>
  
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
