<!DOCTYPE html>
<html>
<head>

<title>Back-up Overview</title>

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
        <h1>Back-up Overview</h1>
			  
		 <img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		<mark id="message"></mark>
<mark id="message"></mark>


		

			<fieldset>

				<legend>You currently have the following back-ups:</legend>
				<a href="management.php"><input type="button" value="Management Menu"/></a>

					<div id ="ManagementPanel">

<?php
session_start();

include('dbcon.php');
$query= ("
SELECT vm_instance.name AS vm_name, vm_instance.state, snapshots.name AS s_name, snapshots.size, snapshots.status, snapshots.created, snapshots.id, volumes.id AS v_id
FROM vm_instance
INNER JOIN volumes ON vm_instance.id = volumes.instance_id
INNER JOIN snapshots ON volumes.id = snapshots.volume_id
WHERE vm_instance.account_id = '$_SESSION[account_id]'
AND snapshots.removed IS NULL
ORDER BY snapshots.created");
$result = mysql_query($query);


echo "<table>
<tr>
<th>Name</th>
<th>VM Name</th>
<th>Date Created (GMT)</th>
<th>Status</th>
<!-- <th>Restore</th> -->

</tr>";


while($row = mysql_fetch_array($result)) 

{
	echo "<td>" . $row['s_name'] . "</td>";
	echo "<td>" . $row['vm_name'] . "</td>";
	echo "<td>" . $row['created'] . "</td>";
	echo "<td>" . $row['status'] . "</td>";
//	echo "<td>";
		
	
	
?>		
<!--
 		<form name="input" method="POST" action="restorebackup.php">
		<input type="hidden" name="resid" value="<?php echo $row["id"]; ?>" type="submit"/>
		<input type="hidden" name="volid" value="<?php echo $row["v_id"]; ?>" type="submit"/>
		<input type="submit" value="Restore"> 
-->

   </form>



<?php
"</td>";
	echo "</tr>";

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

