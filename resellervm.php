<?php
session_start();

?>

<html>
<head>

<title>Plaintech Reseller Portal</title>

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
          

					
	<!-- Register step 1 -->
	  <form  method="post" action="resellervmdeploy.php" name="resstep2">
			
	<fieldset>
    <legend>Server Options</legend>
        <div>
        	<a href="management.php"><input type="button" value="Management"/></a>
					<div id ="ManagementPanel">
            <label for="vmos">Server OS*</label>
            <select name="vmos" id="vmos" required="required">
                    <option value=""></option>
                    <option value="202">Debian</option>
                    <option value="4">CentOS</option>
					<option value="205">Webserver(CentOS)</option>
					<option value="206">Mysql Server(CentOS)</option>
            </select>
        </div>

        <div>
            <label for="vmspecs">Server Config*</label>
            <select name="vmspecs" id="vmspecs" required="required">
                    <option value=""></option>
					<option value="2">CPU: 1000mhz | Ram: 1024MB</option>
                    <option value="1">CPU: 500mhz | Ram: 512MB</option>
                    <option value="10">CPU: 256mhz | Ram: 256MB</option>
					<option value="11">CPU: 128mhz | Ram: 128MB</option>
                  
            </select>
        </div>
                
        <div>
            <label for="vmname">Server Name*</label>
			<input name="vmname" type="text" required="required">
        </div>
		<div>
		<?php		
include('dbcon.php');
//domain id opgehaald
$querydomain = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'";
$mysqlquerydomain = mysql_query($querydomain);
$rowdomain = mysql_fetch_row($mysqlquerydomain);
$domain_id= $rowdomain[4];

//je hebt domain_id nodig omdat je alle users van het domain wil weergeven.
$query = "SELECT * FROM account WHERE domain_id = '$domain_id'";
$mysqlquery = mysql_query($query);

										
										?>
										 <label for="accountname">For User</label>
										<form  method="post">
									<select name="accountname" id="accountname">
								<?php

									while($detailsuser=mysql_fetch_array($mysqlquery)){
								
									echo "<option value=$detailsuser[id]>$detailsuser[account_name]</option>";
								
									}
									
								//echo "</select>";
									?>	
								<!-- Register step 1 		<input type="submit" name="go" value="select" /> -->
			
</form>
    </div>  	   
        </fieldset>      
         <input type="submit" name='go' class="submit" value="Continue" onclick="$('#loading').show();"/ />
     </form><div id="loading" style="display:none;"><img src="loading.gif" alt="" />Please wait...</div>
						 <?php								
												 

?>
	 
    </div>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>