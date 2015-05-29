<!DOCTYPE html>
<html>
<head>

<title>Plaintech Server Status</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<script>
function open_win()
{
window.open("ports.php")
}
</script>
<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>
<body>

	<section id="ManagementMenu"> 
				  <div class="portalmenu"><a href="logout.php">Log out</a> |
								<a href="contact.php">Contact</a></div>
		<header>
        <h1>Server Status</h1>
			  
		 <img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		<mark id="message"></mark>
<mark id="message"></mark>


	
			<fieldset>

				<legend>This is the status of your server(s)</legend>
					<a href="vmstatus.php"><input type="button" value="VM Overview"/></a>
					<div id ="ManagementPanel">

					<?php
						
						

session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

header ("Location: no_authentication.php");

}


echo "This in an advanced overview of your server";
$_SESSION['id']= $_POST['vmid'];


include('dbcon.php');
//include('ports.php');


$queryinstance = "SELECT * FROM vm_instance WHERE account_id = '$_SESSION[account_id]' AND state = 'RUNNING' AND id = '$_SESSION[id]' 
											   OR account_id = '$_SESSION[account_id]' AND state = 'STOPPED' AND id = '$_SESSION[id]' 
										   	   OR account_id = '$_SESSION[account_id]' AND state = 'STOPPING' AND id = '$_SESSION[id]' 
											   OR account_id = '$_SESSION[account_id]' AND state = 'STARTING' AND id = '$_SESSION[id]' ";
$mysqlinstance = mysql_query($queryinstance);

	while($vmdetails = mysql_fetch_array($mysqlinstance))
	{

$_SESSION['instance_name'] = $vmdetails['instance_name'];		

$input ="java -classpath /usr/share/java/cloud-jasypt-1.8.jar org.jasypt.intf.cli.JasyptPBEStringDecryptionCLI decrypt.sh input=".$vmdetails['vnc_password']." password=password verbose=false";
$output = exec($input);	
	

echo "<table >
		<tr>
				<th>Id</th>
						<td>" . $vmdetails['id'] . "</td>
						</tr>
		<tr>
				<th>Name</th>
						 <td>" . $vmdetails['name'] . "</td>
						</tr>
		<tr>
				<th>Uuid</th>
						 <td>" . $vmdetails['uuid'] . "</td>
						</tr>
		<tr>
				<th>Instance Name</th>
						 <td>" . $vmdetails['instance_name'] . "</td>
						</tr>					
		<tr>
				<th>State</th>
						 <td>" . $vmdetails['state'] . "</td>
						</tr>
		<tr>
				<th>private mac address</th>					
						 <td>" . $vmdetails['private_mac_address'] . "</td>
						</tr>
		<tr>
				<th>Private IP Address</th>
						 <td>" . $vmdetails['private_ip_address'] . "</td>
						</tr>
		<tr>
				<th>VNC Password</th>
						 <td>" .$output. "</td>
						</tr>
		<tr>
				<th>Uptime</th>
						 <td>" . $vmdetails['update_time'] . "</td>
						</tr>
		<tr>
				<th>Created</th>
						 <td>" . $vmdetails['created'] . "</td>
						</tr>
		<tr>
				<th>hypervisor</th>
						 <td>" . $vmdetails['hypervisor_type'] . "</td>	
		</tr>
		</table>";	
}

include('dbcon.php');
$queryinstance = "SELECT * FROM vm_instance WHERE account_id = '$_SESSION[account_id]' AND state = 'STOPPED' AND id = '$_SESSION[id]'";
$mysqlqueryinstance = mysql_query($queryinstance);

					while($resultstarted = mysql_fetch_array($mysqlqueryinstance))

					{


					?>
					    <form name='input' action="startvm.php" method="POST">

					    <input type="hidden" name="vmid" value="<?php echo $resultstarted["id"]; ?>" type="submit"/>
					    <input type="submit" value="Start">
					    </form>

					<?php

					}

$querystopped = "SELECT * FROM vm_instance WHERE account_id = '$_SESSION[account_id]' AND state = 'RUNNING' AND id = '$_SESSION[id]'";
$mysqlquerystopped = mysql_query($querystopped);

			while($resultstopped = mysql_fetch_array($mysqlquerystopped))

			{


			?>
			    <form name='input' action="stopvm.php" method="POST">
			    
			    
			    <input type="hidden" name="vmid" value="<?php echo $resultstopped["id"]; ?>" type="submit"/>
			    <input type="submit" value="Stop VM">
			    </form>

			    <form name='input' action="reboot.php" method="POST">
			     <input type="hidden" name="vmid" value="<?php echo $resultstopped["id"]; ?>" type="submit"/>
			    <input type="submit" value="Reboot VM">
			    </form>

			
		<form name='input' onclick="open_win()"	>
		<input type="submit" value="VNC Console">
		</form>
<?php
}
?>