<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
<?php
session_start();

include('checkorderuser.php');


?>

<html>
<head>

<title>Payment Processing</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<meta http-equiv="refresh" content="20; URL=management.php">
</head>
<body>

	<section id="ManagementMenu"> 

		<header>
        
		  
		
		<img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		
		<mark id="message"></mark>
		<mark id="message"></mark>

		

			<fieldset>

				<legend>You're payment has been received succesfully. You will be tranferred to the Management Menu in 20 seconds. </legend>

				<div>
				<p> In the Management Menu you can manage your newly bought server. In the tab 'Server Status' you can see
					the status of your server. Your newly bought server will be ready in approximately 30 to 60 minutes.
					</p>
				</div>
		

			</fieldset>
</form>

					
						


    Copyright 2013 Plaintech inc.
    <div id="portalmenu"></div>
</section>
</body>
</html>