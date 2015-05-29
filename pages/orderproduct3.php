<?php
session_start();
$_SESSION['vmos']= $_POST['vmos'];
$_SESSION['vmspecs']= $_POST['vmspecs'];
$_SESSION['vmstorage']= $_POST['vmstorage'];
$_SESSION['vmname']= $_POST['vmname'];

//  if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//  header ("Location: regstep1.php");
//  }

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Plaintech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A virtualisation platform created for . Copyright 2013 Hogeschool van Amsterdam & .">
    <meta name="author" content="Team VIRT6, ITopia">

    <!-- Stylesheets -->
    <link href="../page_files/bootstrap/css//bootstrap.css" rel="stylesheet">
    <link href="../page_files/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../page_files/more.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

  <body style="padding-top: 60px;">

    <!-- NAVBAR
    ================================================== -->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="../index.html"><img src="../page_files/logo.png"></a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="../index.html">Home</a></li>
                <li><a href="../pages/productinfowebhosting.php">Webhosting</a></li>
                <li><a href="../pages/productinfoservers.php">Servers</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Plaintech<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="../pages/login.php">Login</a></li>
                    <li><a href="../pages/serveruptime.php">Current server status</a></li>
                  </ul>
                </li>
                
                <li><a href="../pages/loginorregister.php">Order</a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="../pages/contact.php">Contact form</a></li>
                    <li><a href="../pages/faq.php">FAQ</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->


    <div class="container">

      <h1Order overview. step 3/3</h1>
      
    <form  method="post" action="checkorderuser.php" name="regstep1" class="ajaxform">
 		<div class="row">
           <div class="span4">
    		<fieldset>
				<legend>User details</legend>
				
						Firstname: <div style="color:#F60;"><?php echo $_SESSION['firstname']; ?></div></br />
						Lastname: <div style="color:#F60;"><?php  echo $_SESSION['lastname']; ?></div></br />
						Username: <div style="color:#F60;"><?php echo $_SESSION['username']; ?></div></br />
						Password: <div style="color:#F60;"><?php echo $_SESSION['password']; ?></div></br />
                        Email: <div style="color:#F60;"><?php echo $_SESSION['email']; ?></div></br />
                        Address: <div style="color:#F60;"><?php echo $_SESSION['address']; ?></div></br />
                        City: <div style="color:#F60;"><?php echo $_SESSION['city']; ?></div></br />
                        Postal Code: <div style="color:#F60;"><?php echo $_SESSION['postalcode']; ?></div></br />
                        Country: <div style="color:#F60;"><?php echo $_SESSION['country']; ?></div></br />
     		           </div> <!-- This div closes the first colom -->
            		    <div class="span4"> <!-- This div starts the second colom -->
                        <legend>Product details</legend>
                        Back Up: <div style="color:#F60;"><?php echo $_SESSION['backup']; ?></div></br />
                        SLA: <div style="color:#F60;"><?php echo $_SESSION['sla']; ?></div></br />
                        These are the Virtual Machine details:<div style="color:#F60;">
							<?php echo $_SESSION['vmos']; ?></br />
							<?php echo $_SESSION['vmspecs']; ?></br />
                        	<?php echo $_SESSION['vmstorage']; ?></br />
							<?php echo $_SESSION['vmname']; ?></br /> 
                        </div>
                        </div> <!-- This div closes the first colom -->
               			 <div class="span4"> <!-- This div starts the third colom -->  
                                           
                       
				</fieldset>
           <input type="button" class="btn btn-warning" value="Correct details" onclick="location.href='orderproduct1.php'" />
           <input type="submit" class="btn btn-success" value="Continue" />
           </div> <!-- This div closes the 3th colom -->
            </form>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../page_files/jquery.js"></script>
    <script src="../page_files/bootstrap-transition.js"></script>
    <script src="../page_files/bootstrap-alert.js"></script>
    <script src="../page_files/bootstrap-modal.js"></script>
    <script src="../page_files/bootstrap-dropdown.js"></script>
    <script src="../page_files/bootstrap-scrollspy.js"></script>
    <script src="../page_files/bootstrap-tab.js"></script>
    <script src="../page_files/bootstrap-tooltip.js"></script>
    <script src="../page_files/bootstrap-popover.js"></script>
    <script src="../page_files/bootstrap-button.js"></script>
    <script src="../page_files/bootstrap-collapse.js"></script>
    <script src="../page_files/bootstrap-carousel.js"></script>
    <script src="../page_files/bootstrap-typeahead.js"></script>

  

</body></html>