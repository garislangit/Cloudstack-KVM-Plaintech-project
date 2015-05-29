<!DOCTYPE html>
<html>
<head>

<title>Resource Overview</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>

 <!-- Load Ajax --> <!-- Load general animation settings -->
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>

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
        <h1>Resource Overview</h1>
			  
		 <img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		<mark id="message"></mark>
<mark id="message"></mark>


		

			<fieldset>

				<legend>You currently have the following resources:</legend>
				<a href="management.php"><input type="button" value="Management Menu"/></a>

					<div id ="ManagementPanel">

<?php
session_start(); 

include('dbcon.php'); 

//domain_id ophalen voor gebruik ik queries
$query_GET_domain_id = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'"; 
$mysqlquery4 = mysql_query($query_GET_domain_id);
$row4 = mysql_fetch_row($mysqlquery4);
$domain_id = $row4[4];

//Array stop je in variabelen
$count_cpu = array("speed");
//Gebrukt loop om door de row heen te loopen.
foreach ($count_cpu as $value)
{
//SELECT SUM wordt gebruikt voor het optellen
  $sql_count_cpu = ("SELECT SUM(service_offering.speed)
FROM service_offering
INNER JOIN vm_instance ON vm_instance.service_offering_id = service_offering.id
INNER JOIN domain ON domain.id = vm_instance.domain_id
WHERE domain.id = '$domain_id'");
//Voer je $sql_count_cpu voer je nu uit
  $query = mysql_query($sql_count_cpu) or die("QUERY FAILED<br />\n" . mysql_error());
  //result stop je in een variabel. Dit herhaalt zich totdat de betreffende row geen waardes meer heeft gelijkwaardig aan de mysql query
  $cpu_used = mysql_result($query, 0);

}  

$count_mem = array("memory");
foreach ($count_mem as $value2)
{
  $sql_count_mem = ("SELECT SUM(service_offering.ram_size)
FROM service_offering
INNER JOIN vm_instance ON vm_instance.service_offering_id = service_offering.id
INNER JOIN domain ON domain.id = vm_instance.domain_id
WHERE domain.id = '$domain_id'");
  $query2 = mysql_query($sql_count_mem) or die("QUERY FAILED<br />\n" . mysql_error());
  $mem_used = mysql_result($query2, 0);

}  	
//nodig om de totale resources te echo'en 
$query3= "SELECT * FROM reseller_resources WHERE account_id = '$_SESSION[account_id]'";
$result3 = mysql_query($query3);


echo "<table>
<tr>
<th>CPU Resources total (in MB)</th>
<th>CPU Resources in use (in MB)</th>
<th>CPU Resources free (in MB)</th>
<th>Memory Resources total (in MB)</th>
<th>Memory Resources in use (in MB)</th>
<th>Memory Resources free (in MB)</th>
<th>Add resources</th>
</tr>";

//loopt door reseller_resources, zie query3
while($row = mysql_fetch_array($result3)) 

{

$cpu_free = $row['resources_cpu'] - $cpu_used;
$mem_free = $row['resources_mem'] - $mem_used;


	echo "<td>" . $row['resources_cpu'] . "</td>";
	echo "<td>" . $cpu_used . "</td>";
	echo "<td>" . $cpu_free . "</td>";
	echo "<td>" . $row['resources_mem'] . "</td>";
	echo "<td>" . $mem_used . "</td>";
	echo "<td>" . $mem_free . "</td>";
	echo "<td>";	
	

	
?>		

 		<form name="input" method="POST" action="reselleraddresources.php">
		<input type="submit" value="Buy"> 
   </form>

<?php
"</td>";
	echo "</tr>";

}

mysql_close('dbcon.php');
?>


	</div>										
			</fieldset>
</form>
  <!--  Copyright 2013 Plaintech inc. -->
    <div id="portalmenu"></div>
</section>
</body>
</html>