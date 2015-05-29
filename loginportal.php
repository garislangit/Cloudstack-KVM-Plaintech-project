<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
<html>
<head>

<title>Plaintech Login Portal</title>

<link href="style.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

	<section id="contact"> 

		<header>
        <div id="portalmenu"><a href="index.html">Home</a> | <a href="contact.php">Contact</a></div>
			<img src="images/plaintechlogin.jpg" width="640" height="150" alt="test">

		  
		</header>
		<mark id="message"></mark>
        
  
        <!-- Start of the Login form -->
		<div id="loginstep"><br />

				<form name="form1" method="POST" action="checklogin.php">
			<fieldset>
				<legend>Please enter your login details</legend>
					<div>
						<label for="username">Username</label>
						<input name="username" type="text" placeholder="Enter your username" required />
				</div>
				<div>
					<label for="password">Password</label>
					<input name="password" type="password" placeholder="Enter your password" required />
				</div>
			
                <div>
                <input type="submit" class="submit" value="Login" />
				</div>
			</fieldset>
		</div>
	  </form>

    </div>
    Copyright 2013 Plaintech inc.
    <div id="portalmenu">Order portal | Login portal</div>
</section>
</body>
</html>
