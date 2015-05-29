<!DOCTYPE html>
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
<meta http-equiv="refresh" content="5; URL=management.php">
</head>
<body>

	<section id="ManagementMenu"> 

		<header>
        
		  
		
		<img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		
		<mark id="message"></mark>
		<mark id="message"></mark>

		

			<fieldset>

				<div>
<?php
session_start();

include('dbcon.php');
/*
$query = "SELECT * FROM account WHERE id = '$_SESSION[accountnameid]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);

$domain_iduser = $row[4];
*/

$query_get_domainid= "SELECT * FROM account WHERE id = '$_SESSION[account_id]'"; 
$mysqlquery4 = mysql_query($query_get_domainid);
$row4 = mysql_fetch_row($mysqlquery4);
$domain_id = $row4[4];


$count_cpu = array("speed");
foreach ($count_cpu as $value)
{
  $sql = ("SELECT SUM(service_offering.speed)
FROM service_offering
INNER JOIN vm_instance ON vm_instance.service_offering_id = service_offering.id
INNER JOIN domain ON domain.id = vm_instance.domain_id
WHERE domain.id = '$domain_id'");
  $query = mysql_query($sql) or die("QUERY FAILED CPU<br />\n" . mysql_error());
  $used_cpu = mysql_result($query, 0);

}  
		
$count_mem = array("memory");
foreach ($count_mem as $value2)
{
  $sql2 = ("SELECT SUM(service_offering.ram_size)
FROM service_offering
INNER JOIN vm_instance ON vm_instance.service_offering_id = service_offering.id
INNER JOIN domain ON domain.id = vm_instance.domain_id
WHERE domain.id = '$_SESSION[domain_id]'");
  $query2 = mysql_query($sql2) or die("QUERY FAILED MEM<br />\n" . mysql_error());
  $used_mem = mysql_result($query2, 0);

}  	
//haal totale resources op
include('dbcon.php');
$query_get_total= "SELECT * FROM reseller_resources WHERE account_id = '$_SESSION[account_id]'";
$mysqlquery3 = mysql_query($query_get_total);
$row3 = mysql_fetch_row($mysqlquery3);
$total_cpu = $row3[1];
$total_mem = $row3[2];

//je haalt de offering id op (dat is namelijk de specifcations van de nieuwe bestelde server)
$queryspecs = "SELECT * FROM service_offering WHERE id = '$_SESSION[vmspecs]'";
$mysqlquery_specs = mysql_query($queryspecs);
$row_specs = mysql_fetch_row($mysqlquery_specs);

$new_cpu = $row_specs[2];
$new_mem = $row_specs[3];

//check de aangevraagde resources en checkt of t kleiner is dan het max 
if ($used_cpu + $new_cpu < $total_cpu && $used_mem + $new_mem < $total_mem)
{


// Hier maken we de API URL voor het registreren van de gebruiker
$basicurl ="http://localhost:8096/client/api?";
$command2 = "command=deployVirtualMachine";

// Opbouwen van het DeployVM API Command
$httpvm = $basicurl.$command2."&serviceofferingid=".$_SESSION['vmspecs']."&templateid=".$_SESSION['vmos']."&zoneid=1"."&account=".$_SESSION['accountnamenewvm']."&displayname=".$_SESSION['vmname']."&domainid=".$domain_id."&name=".$_SESSION['vmname'];

//hier voer je de http
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpvm);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);

echo "The virtual machine is currently being created. You will be returned to the management menu where you can use your server in approximately two minutes";

}
//heb je niet genoeg resources, krijg je deze melding 
else
{
echo "You dont have enough resources available, please you will be returned to the Management Menu. Here you can buy new resources";

}

?>
	</div>										
			</fieldset>
</form>
  <!--  Copyright 2013 Plaintech inc. -->
    <div id="portalmenu"></div>
</section>
</body>
</html>