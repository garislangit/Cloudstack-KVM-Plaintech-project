<?php
session_start();

//de variablelen uit de vorige pagina (gebruikt in de http command)
$_SESSION['vmos']= $_POST['vmos'];
$_SESSION['vmspecs']= $_POST['vmspecs'];
$_SESSION['vmname']= $_POST['vmname'];
$_SESSION['accountnameid']= $_POST['accountname'];

include('dbcon.php');

//opgehaald. Is nodig voor de account name in de query. In sessie nodig omdat t nodig is op next page
$query = "SELECT * FROM account WHERE id = '$_SESSION[accountnameid]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);
$accountnamenewvm= $row[1];
$_SESSION['accountnamenewvm'] = $accountnamenewvm;


//Vertaling van opgehaalde ID's in namen (wel zo vriendelijk voor de user)
$query4 = "SELECT * FROM vm_template WHERE id = '$_SESSION[vmos]'";
$mysqlquery4 = mysql_query($query4);
$row4 = mysql_fetch_row($mysqlquery4);
$vmos_name = $row4[2];

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

<title>Plaintech Reseller Order Confirmation</title>

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
    <form  method="post" action="paymentadduserreseller.php" name="regstep1" class="ajaxform">
    		<fieldset>
				<legend>Overview</legend>

                  <h1>     Thank you for your order! These are the Virtual Machine details </h1>:<div id="orderdetail">
							<?php echo 'Operating System: ', $vmos_name; ?></br />
							<?php echo 'Hardware Specifications: ',"CPU ", $vmspecs_CPU, " mHz", " and your memory is ", $vmspecs_mem, " MB"; ?></br />
							<?php echo 'Server Name: ', $_SESSION['vmname']; ?></br />
							<?php echo 'User:', $accountnamenewvm; ?> </br />  
									

					   </div>
                       
				</fieldset>
           
	  		<input class="submit" value="Continue" onClick="location.href='resellervmdeploy2.php'" /></div>
            </form>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
