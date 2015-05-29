<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

header ("Location: no_authentication.php");

}
?>

<html>
<head>

<title>Management Menu</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

			
	<section id="ManagementMenu"> 
	
				<section id="contact">

		<header>
            
        <div class="portalmenu"><a href="logout.php">Log out</a> |
								<a href="contact.php">Contact</a></div>
 								<img src="images/plaintechmanagement.jpg" width="640" height="150">
		  </div>
		</header>

		
		
		<mark id="message"></mark>
		


					<div id="ManagementPanel">
					

				<fieldset>
					<legend>User Options</legend>
					<a>See the server status for an overview of your servers. The account overview is used to view the information of your account. </a><br><br>
						<a href="vmstatus.php"><input type="button" value="Server Status"/></a>
				
						<a href="accountoverview.php"><input type="button" value="Account Overview" /></a>
						</fieldset>
									
						<?php
						
						include('dbcon.php');
						
						$query = "SELECT * FROM user_extra_details WHERE account_id = '$_SESSION[account_id]'";
						$mysqlquery = mysql_query($query);
						$row = mysql_fetch_array($mysqlquery);

						// SLA OPTIONS


						if($row[10] == 'Yes')
						{
					  ?>
					<fieldset>
						<legend>Extra Options</legend>
						<a>To create a back-up press the 'create a backup'. To see an overview of your already excisting back-ups, press the 'backup list' </a><br><br>
										  <a href="snapshotoverview.php"><input type="button" value="Backup List" /></a>
			
						<a href="createbackup.php"><input type="button" value="Create a backup" /></a> 
						</fieldset><?php
						}
						?>
						
						<?php
						
						include('dbcon.php');
						
						$query2 = "SELECT * FROM reseller_resources WHERE account_id = '$_SESSION[account_id]'";
						$mysqlquery2 = mysql_query($query2);
						$row2 = mysql_fetch_array($mysqlquery2);
						
						// RESELLER OPTIONS
						
						if($row2[1] == !NULL && $row2[2] == !NULL)
						{
							?>
					<fieldset>
						<legend>Reseller Options</legend>
						<a>The reseller options allows you to create new virtual machines for users, create new accounts and see an overview of the accounts and servers </a><br><br>
							<a href="resellervm.php"><input type="button" value="Deploy new VMs" /></a>
							  <a href="vmresellerstatus.php"><input type="button" value="Domain Server(s)" /></a>
							  <a href="resellercreateacc.php"><input type="button" value="Create Account" /></a>
							  
							  <a href="resellerresourceoverview.php"><input type="button" value="Resources Overview" /></a>
							</fieldset>
						 <?php

						}
						?>
						
							<?php
						
						include('dbcon.php');
						
						$query3 = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'";
						$mysqlquery3 = mysql_query($query3);
						$row3 = mysql_fetch_array($mysqlquery3);
						
						// USER SPECIFIC OPTIONS
						
						if($row3[4] == "1")
						{


							?>
							<fieldset>
							<legend>Order</legend>
							<a>Click on 'order new server' to order a new server. </a><br><br>

							<a href="addvmstep1.php"><input type="button" value="Order New Server"/></a>
							</fieldset>
						 <?php

						}
						?>
						
				
					</div>

			
</form>

					
						



    Copyright 2013 Plaintech inc.
    <div id="portalmenu"></div>
</section>
</body>
</html>