<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {



header ("Location: no_authentication.php");


}
else
{

						include('dbcon.php');
						
						$query = "SELECT * FROM user_extra_details WHERE account_id = '$_SESSION[account_id]'";
						$mysqlquery = mysql_query($query);
						$row = mysql_fetch_array($mysqlquery);
						
						if($row[10] == 'Yes')
						{
	
	

?>

<html>
<head>

<title>Create a back-up</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->

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

				<legend>Please select the server you want to back-up </legend>
				<a href="management.php"><input type="button" value="Management"/></a>
		<div id ="ManagementPanel">

		   </form>
		<?php

session_start();

include('dbcon.php');

$query = ("
SELECT vm_instance.name AS vm_name, vm_instance.state, volumes.name AS v_name, volumes.size, volumes.volume_type, volumes.created, volumes.updated, volumes.state, volumes.id
FROM vm_instance
INNER JOIN volumes ON vm_instance.id = volumes.instance_id
WHERE vm_instance.account_id = '$_SESSION[account_id]'
AND volumes.state = 'Ready'
ORDER BY vm_name");

$result = mysql_query($query);

echo "<table>
<tr>
<th>Server Name</th>
<th>Volume Name</th>
<th>Volume State</th>
<th>Create</th>
</tr>";
	
while($row = mysql_fetch_array($result))

{

	echo "<td>" . $row['vm_name'] . "</td>";
	echo "<td>" . $row['v_name'] . "</td>";
	echo "<td>" . $row['state'] . "</td>";
	echo "<td>";
		
	
	
?>		

 		<form name="input" method="POST" action="createsnapshot.php">
		<input type="hidden" name="volid" value="<?php echo $row["id"]; ?>" type="submit"/>
		<input type="submit" value="Create"> 
   </form>



<?php
"</td>";
	echo "</tr>";
}
}
else
{
header ("Location: no_authentication.php");
}
}

?>



    			
	</div>	

			</fieldset>
</form>


    Copyright 2013 Plaintech inc.
    <div id="portalmenu"></div>
</section>
</body>
</html>