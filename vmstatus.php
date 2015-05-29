<!DOCTYPE html>
<html>
<head>

<title>Plaintech Server Status</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>
<body>

	<section id="ManagementMenu"> 
			
		<header>
			  <div class="portalmenu"><a href="logout.php">Log out</a> |
								<a href="contact.php">Contact</a></div>

        <h1>Server Status</h1>
        
	
			
		 <img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		<mark id="message"></mark>
<mark id="message"></mark>


		
			<fieldset>

				<legend>This is the status of your server(s)</legend>
 						<a href="management.php"><input type="button" value="Management Menu"/></a>
					<div id ="ManagementPanel">

					<?php

		
						

session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {




header ("Location: no_authentication.php");

}

echo "Welcome ".$_SESSION['username'];
echo "<br>";
echo "<br>";
echo "This in an overview of the servers you currently have";
echo "<br>";
echo "<br>";

$_SESSION['domainid']= "5";

include('dbcon.php');
$query = "SELECT * FROM vm_instance WHERE account_id = '$_SESSION[account_id]' AND state = 'RUNNING' OR account_id = '$_SESSION[account_id]' AND state = 'STOPPED' 
OR account_id = '$_SESSION[account_id]' AND state = 'STOPPING' OR account_id = '$_SESSION[account_id]' AND state = 'STARTING'";

$mysqlquery = mysql_query($query);

echo "<table>
<tr>
<th>Name</th>
<th>IP Address</th>
<th>State</th>
<th>Advanced</th>

</tr>";


while($result = mysql_fetch_array($mysqlquery))

{
	//echo "Running Vm's of ".$_SESSION['username']; 

	echo "<td>" . $result['name'] . "</td>";
	echo "<td>" . $result['private_ip_address'] . "</td>";
	echo "<td>" . $result['state'] . "</td>";
	echo "<td>"
	?>
	
		<form name="input" method="POST" action="vmstatusadvanced.php">
		<input type="hidden" name="vmid" value="<?php echo $result["id"]; ?>" type="submit"/>
		<input type="submit" value="Advanced"> 
    </form>

<?php
"</td>";
	echo "</tr>";

	
}
echo "</table>";
?>				
					</div>										
			</fieldset>
</form>


    Copyright 2013 Plaintech inc.
    <div id="portalmenu"></div>
</section>
</body>
</html>


