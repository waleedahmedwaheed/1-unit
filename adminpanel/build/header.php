<?php error_reporting(0); ?>
<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
   <?php      if (!isset($_SESSION['MM_Username'])) {
     session_start();
	 header("location: sign-in.php");
	     }      ?>     
                    <li><a href="sign-in.php" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['MM_Username']; ?>
                            <i class="icon-caret-down"></i>
                        </a>

                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">1 - </span> <span class="second">Unit</span></a>
        </div>
    </div>