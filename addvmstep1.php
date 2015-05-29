<?php
session_start();

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
            
        <div class="portalmenu"><a href="logout.php">Log out</a> |
                                <a href="contact.php">Contact</a></div>
<img src="images/plaintechorder.jpg" width="640" height="150">
		  
		</header>
		<mark id="message"></mark>
          </div>


	<!-- Register step 1 -->
	  <form  method="post" action="addvmstep2.php" name="userstep2">
			
	<fieldset>
    <legend>VM Options</legend>
    <div id ="ManagementPanel">
        <a href="management.php"><input type="button" value="Management Menu"/></a>
    <fieldset>
        <div>
            <label for="vmos">VM OS*</label>
            <select name="vmos" id="vmos" required="required">
                    <option value=""></option>
                    <option value="202">Debian</option>
                    <option value="4">CentOS</option>
					<option value="205">Webserver(CentOS)</option>
					<option value="206">Mysql Server(CentOS)</option>
            </select>
        </div>

        <div>
            <label for="vmspecs">VM Config*</label>
            <select name="vmspecs" id="vmspecs" required="required">
                    <option value=""></option>
					<option value="2">CPU: 1000mhz | Ram: 1024MB</option>
                    <option value="1">CPU: 500mhz | Ram: 512MB</option>
                    <option value="10">CPU: 256mhz | Ram: 256MB</option>
					<option value="11">CPU: 128mhz | Ram: 128MB</option>
            </select>
        </div>
        
        <div>
            <label for="vmstorage">VM Storage</label>
            <select name="vmstorage" id="vmstorage" >
                    <option value=""></option>
                    <option value="3">5GB</option>
                    <option value="4">20GB</option>
                    <option value="5">100GB</option>
            </select>
        </div>
        
        <div>
            <label for="vmname">VM Name*</label>
			<input name="vmname" type="text" required="required">
        </div>
       
         
        </fieldset>      
         <input type="submit" class="submit" value="Continue" onclick="$('#loading').show();"/ />
     </form><div id="loading" style="display:none;"><img src="loading.gif" alt="" />Please wait...</div>

    </div>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
