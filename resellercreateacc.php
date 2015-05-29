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
          

	<!-- Register step 1 -->
	  <form  method="post" action="resellercreateaccstep2.php" name="userstep1">
			<fieldset>
				<legend>User details</legend>
				<div>
					<a href="management.php"><input type="button" value="Management"/></a>
					<div id ="ManagementPanel">
					<label for="firstname">First name*</label>
					<input name="firstname" type="text" required="required">
				</div>
				<div>
					<label for="lastname">Last name*</label>
					<input name="lastname" type="text" required="required">
				</div>
				<div>
					<label for="username">Username*</label>
					<input name="username" type="text" required="required">
				</div>
				<div>
					<label for="password">Password*</label>
					<input name="password" type="password" required="required">
				</div>
               	<div>
					<label for="email">Email*</label>
					<input name="email" type="text" required="required">
				</div>
				<div>
				
						<?php
						
						include('dbcon.php');
						
						$query = "SELECT * FROM user_extra_details WHERE account_id = '$_SESSION[account_id]'";
						$mysqlquery = mysql_query($query);
						$row = mysql_fetch_array($mysqlquery);

						// Check if reseller has bought the backup option


						if($row[10] == 'Yes')
						{
					  ?>
            		<label for="backup">Backup</label>
            		<select name="backup" id="backup">
                   		 <option value="No">No</option>
                   		 <option value="Yes">Yes</option>
            		</select>
				</div>
                </fieldset>
                	 <?php

						}
						?>
	
	         <input type="submit" class="submit" value="Continue" onclick="$('#loading').show();"/ />
     </form><div id="loading" style="display:none;"><img src="loading.gif" alt="" />Please wait...</div>
      </div>
    <div class="portalmenu">Copyright 2013 Plaintech inc.</div>
</section>
</body>
</html>
