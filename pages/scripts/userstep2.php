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

<html>
<head>

<title>Plaintech Order Portal</title>

<link href="style.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

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
          

	<!-- Register step 1 -->
	  <form  method="post" action="checkorderdetailsuser.php" name="userstep2">
			
	<fieldset>
    <legend>VM Options</legend>
        <div>
            <label for="vmos">VM OS</label>
            <select name="vmos" id="vmos">
                    <option value=""></option>
                    <option value="202">Debian</option>
                    <option value="4">CentOS</option>
            </select>
        </div>

        <div>
            <label for="vmspecs">VM Config</label>
            <select name="vmspecs" id="vmspecs">
                    <option value=""></option>
                    <option value="1">CPU: 500mhz | Ram: 512MB</option>
                    <option value="10">CPU: 256mhz | Ram: 256MB</option>
            </select>
        </div>
        
        <div>
            <label for="vmstorage">VM Storage</label>
            <select name="vmstorage" id="vmstorage">
                    <option value=""></option>
                    <option value="3">5GB</option>
                    <option value="4">20GB</option>
                    <option value="5">100GB</option>
            </select>
        </div>
        
        <div>
            <label for="vmname">VM Name</label>
			<input name="vmname" type="text">
        </div>
       
         
        </fieldset>      
         <input type="submit" class="submit" value="Continue" onclick="$('#loading').show();"/ />
     </form><div id="loading" style="display:none;"><img src="loading.gif" alt="" />Please wait...</div>

    </div>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
