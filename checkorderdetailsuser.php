<?php
session_start();
$_SESSION['vmos']= $_POST['vmos'];
$_SESSION['vmspecs']= $_POST['vmspecs'];
$_SESSION['vmstorage']= $_POST['vmstorage'];
$_SESSION['vmname']= $_POST['vmname'];

include ('dbcon.php');

$query = "SELECT * FROM vm_template WHERE id = '$_SESSION[vmos]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);
$vmos_name = $row[2];

$query2 = "SELECT * FROM service_offering WHERE id = '$_SESSION[vmspecs]'";
$mysqlquery2 = mysql_query($query2);
$row2 = mysql_fetch_row($mysqlquery2);
$vmspecs_CPU = $row2[2];
$vmspecs_mem = $row2[3];

$query3 = "SELECT * FROM disk_offering WHERE id = '$_SESSION[vmstorage]'";
$mysqlquery3 = mysql_query($query3);
$row3 = mysql_fetch_row($mysqlquery3);
$storage = $row3[4];

//  if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//  header ("Location: regstep1.php");
//  }

?>

<html>
<head>

<title>Plaintech Order Portal</title>

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
    
    		<fieldset>
				<legend>Overview</legend>
				<h2>Thank you for choosing Plaintech! Please check your details.</h2>
				
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
                     <h2>  The server details:<div id="orderdetail"></div></br /> </h2>
						Operating System: <div id="orderdetail"><?php echo $vmos_name; ?></div></br />
						Specifications: <div id="orderdetail"><?php echo "CPU ", $vmspecs_CPU, " mHz", " and your memory is ", $vmspecs_mem, " MB"; ?></div></br />
						Your extra storage: <div id="orderdetail"><?php echo $storage; ?></div></br />
						The name of your server is: <div id="orderdetail"><?php echo $_SESSION['vmname']; ?></div></br />
						                           
                        </div>
                       
				</fieldset>
           
	  		<input class="submit" value="Continue" onClick="location.href='payment.php'" /></div>
           
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
