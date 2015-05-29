<html>
<head>

<title>Plaintech Account Overview</title>

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
				  <div class="portalmenu"><a href="logout.php">Log out</a> |
								<a href="contact.php">Contact</a></div>
		<header>
	 
			  
		 <img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		<mark id="message"></mark>
<mark id="message"></mark>

			<fieldset>

				<legend>This is the overview of your account</legend>
					<a href="management.php"><input type="button" value="Management"/></a>
					<div id ="ManagementPanel">

					<?php
								

session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

header ("Location: no_authentication.php");

}

include('dbcon.php');
						// controleren of het een reseller is of gewone gebruiker
						// reseller moet allea accounts zien binnen domain, user alleen ze eigen
						$queryfetch = "SELECT * FROM reseller_resources WHERE account_id = '$_SESSION[account_id]'";
						$mysqlfetch = mysql_query($queryfetch);
						$resellerfetch = mysql_fetch_array($mysqlfetch);
						
						
						// controlleer of reseller is
						if($resellerfetch[1] == !NULL && $resellerfetch[2] == !NULL)
						{

										include('dbcon.php'); // open db connection

										// query domainID op te halen van reseller
										$query3 = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'";
										$mysqlquery3 = mysql_query($query3);
										$row3 = mysql_fetch_row($mysqlquery3);
										// domain id in variable zetten
										$domain_id= $row3[4];

										// query om alle accounts te geven van domain
										$query = "SELECT * FROM account WHERE domain_id = '$domain_id'";
										$mysqlquery = mysql_query($query);
										
										?>
														<!-- mee posten van account, voor query later--> 
														<form  method="post">
														<!-- select form starten -->
													    <select name="account_name" id="account_name">
										<?php
														// option laten vullen door query
														while($result=mysql_fetch_array($mysqlquery))
														{	

															echo "<option value=$result[id]>$result[account_name]</option>";

														}

														echo "</select>";
										?>	
														<!-- posten van variable -->
													    <input type="submit" name="go" value="sort" /> 
																									  
										<?php

										
										 			// opvangen van post
													$value = $_POST['account_name']; // post value van geselecteerd veld
										 
													// query om gegeven op te halen
													$query = "SELECT * FROM user WHERE  id = '$value'";
													$execquery = mysql_query($query);
						}

						// uitvoeren wanneer geen reseller is maar user
					    else
						{

										// open db connection
										include('dbcon.php');

										// query gegevens ophalen voor users
										$query = "SELECT * FROM user WHERE account_id = '$_SESSION[account_id]'";
										$mysqlquery = mysql_query($query);
										
										?>
																		<!-- mee posten van account, voor query later--> 
																		<form  method="post">
																		<!-- select form starten -->	
																	    <select name="username" id="username">
										<?php 							
																		// option laten vullen door query
																		while($result=mysql_fetch_array($mysqlquery))
																	{
																	    echo "<option value=$result[id]>$result[username]</option>";
																
																	}
																	echo "</select>";
										?>		
																	<!-- posten van variable -->
																	<input type="submit" name="go" value="sort" /> 
										<?php

													// opvangen van post
													$value = $_POST['username']; 
													
													// query om gegeven op te halen
													$query = "SELECT * FROM user WHERE  id = '$value'";
													$execquery = mysql_query($query);
							}

					// query om gegevens op te halen, gebaseeerd op welke mysqluery wordt uitgevoerd.
					while($result = mysql_fetch_array($execquery))			
					{

// wegschrijven van opgehaalde gegevens in een tabel
echo "<table >
		<tr>
				<th>Id</th>
						<td>" . $result['id'] . "</td>

						</tr>
		<tr>
				<th>Username</th>
						 <td>" . $result['username'] . "</td>
						
						</tr>
		<tr>
				<th>First Name</th>
						 <td>" . $result['firstname'] . "</td>
						
						</tr>
		<tr>
				<th>Last name</th>
						 <td>" . $result['lastname'] . "</td>
						
						</tr>					
		<tr>
				<th>Email Address</th>
						 <td>" . $result['email'] . "</td>
						
						</tr>
		<tr>
				<th>State</th>					
						 <td>" . $result['state'] . "</td>
						
						</tr>
		<tr>
				<th>Created on</th>
						 <td>" . $result['created'] . "</td>			
						</tr>
		</table>";	
	
}

?>
			
