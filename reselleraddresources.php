<?php
session_start();

?>

<html>
<head>

<title>Plaintech Reseller Adding Portal</title>

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
<img src="images/plaintechlogo.jpg" width="640" height="150">
		  
		</header>
		<mark id="message"></mark>
          

	<!-- Register step 1 -->
	  <form  method="post" action="paymentreseller_resources.php" name="addresources">
			
	<fieldset>
    <legend>Please input the extra amount of resources you want to buy</legend>
      
        <div>
                    <label for="newresources_cpu">CPU speed (in mHz)*</label>
                    <input name="newresources_cpu" type="text" required="required">       
        <div>
		        <div>
                    <label for="newresources_mem">Memory size (in MB)*</label>
                    <input name="newresources_mem" type="text" required="required">       
              
        </fieldset>      
         <input type="submit" class="submit" value="Continue" onclick="$('#loading').show();"/ />
     </form><div id="loading" style="display:none;"><img src="loading.gif" alt="" />Please wait...</div>

    </div>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
