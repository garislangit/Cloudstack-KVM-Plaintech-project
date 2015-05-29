<?php
session_start();
$_SESSION['resources_cpu']= $_POST['resources_cpu'];
$_SESSION['resources_mem']= $_POST['resources_mem'];


//  if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//  header ("Location: regstep1.php");
//  }

?>

<html>
<head>

<title>Plaintech Reseller Order Overview</title>

<link href="style.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/dynamicform.js"></script>

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

	<section id="contact">

		<header>            
        <div class="portalmenu"><a href="orderportal.php">Order portal</a> | <a href="loginportal.php">Login portal</a></div>
<img src="images/plaintechorder.jpg" width="640" height="150">
		  
		</header>
		<mark id="message"></mark>
          

	<!-- Register step 3 -->
    <form  method="post" action="paymentreseller.php" name="regstep1" class="ajaxform">
    		<fieldset>
				<legend>Overview</legend>
				<h3>Thank you for choosing Plaintech! Please check your details.</h3>
				
						Firstname: <div id="orderdetail"><?php echo $_SESSION['firstname']; ?></div></br />
						Lastname: <div id="orderdetail"><?php  echo $_SESSION['lastname']; ?></div></br />
						Username: <div id="orderdetail"><?php echo $_SESSION['username']; ?></div></br />
						Password: <div id="orderdetail"><?php echo $_SESSION['password']; ?></div></br />
                        Email: <div id="orderdetail"><?php echo $_SESSION['email']; ?></div></br />
                        Address: <div id="orderdetail"><?php echo $_SESSION['address']; ?></div></br />
                        City: <div id="orderdetail"><?php echo $_SESSION['city']; ?></div></br />
                        Postal Code: <div id="orderdetail"><?php echo $_SESSION['postalcode']; ?></div></br />
                        Country: <div id="orderdetail"><?php echo $_SESSION['country']; ?></div></br />
                        Back Up: <div id="orderdetail"><?php echo $_SESSION['backup']; ?></div></br />
                        SLA: <div id="orderdetail"><?php echo $_SESSION['sla']; ?></div></br />
						Company Name: <div id="orderdetail"><?php echo $_SESSION['companyname']; ?></div></br />
                        Chamber of Commerce: <div id="orderdetail"><?php echo $_SESSION['ccc']; ?></div></br />
                        Phone Number: <div id="orderdetail"><?php echo $_SESSION['phone']; ?></div></br />
						Fax: <div id="orderdetail"><?php echo $_SESSION['fax']; ?></div></br />
                        Corporate Email <div id="orderdetail"><?php echo $_SESSION['cmail']; ?></div></br />
                        These are the Virtual Machine details:<div id="orderdetail">
						CPU Resources <div id="orderdetail"><?php echo $_SESSION['resources_cpu'].' mHz'; ?></br />
						Memory Resources <div id="orderdetail">	<?php echo $_SESSION['resources_mem'] .' MB RAM'; ?></br />
                        
                        </div>
                       
				</fieldset>
           
	  		<input class="submit" value="Continue" onClick="location.href='paymentreseller.php'" /></div>
            </form>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
