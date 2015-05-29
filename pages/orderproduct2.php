<?php
session_start();

$_SESSION['firstname']= $_POST['firstname'];
$_SESSION['lastname']= $_POST['lastname'];
$_SESSION['username']= $_POST['username'];
$_SESSION['password']= $_POST['password'];
$_SESSION['email']= $_POST['email'];

$_SESSION['ccc']= $_POST['ccc'];
$_SESSION['companyname']= $_POST['companyname'];

$_SESSION['address']= $_POST['address'];
$_SESSION['city']= $_POST['city'];
$_SESSION['postalcode']= $_POST['postalcode'];
$_SESSION['country']= $_POST['country'];

$_SESSION['backup']= $_POST['backup'];
$_SESSION['sla']= $_POST['sla'];

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

      <h1>Register new user account step 2/3</h1>
      <p>Please fill the following form. Fields with an <strong>*</strong> symbol are required="required".</p><br />
      
	  <form  method="post" action="orderproduct3.php" name="userstep1">
			
	<fieldset>
    <legend>VM Options</legend>
        <div>
            <label for="vmos">VM OS</label>
            <select name="vmos" id="vmos" required="required">
                    <option value=""></option>
                    <option value="202">Debian</option>
                    <option value="4">CentOS</option>
            </select>
        </div>

        <div>
            <label for="vmspecs">VM Config</label>
            <select name="vmspecs" id="vmspecs" required="required">
                    <option value=""></option>
                    <option value="1">CPU: 500mhz | Ram: 512MB</option>
                    <option value="10">CPU: 256mhz | Ram: 256MB</option>
            </select>
        </div>
        
        <div>
            <label for="vmstorage">VM Storage</label>
            <select name="vmstorage" id="vmstorage" required="required">
                    <option value=""></option>
                    <option value="3">5GB</option>
                    <option value="4">20GB</option>
                    <option value="5">100GB</option>
            </select>
        </div>
        
        <div>
            <label for="vmname">VM Name</label>
			<input name="vmname" type="text" required>
        </div>
    
        </fieldset>      
	  <input type="submit" class="btn btn-success" value="Continue" />
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