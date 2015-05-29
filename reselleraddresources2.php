<?php
session_start();

//de variabelen van reselleraddresources
$cpu_input = $_POST['newresources_cpu'];
$mem_input = $_POST['newresources_mem'];


//  if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//  header ("Location: regstep1.php");
//  }

include('dbcon.php');
//
$query_get_account_id = "SELECT * FROM reseller_resources WHERE account_id = '$_SESSION[account_id]'";
$mysqlquery = mysql_query($query_get_account_id);
$row = mysql_fetch_row($mysqlquery);

//stopt de waarde van de row passende bij de query_get_account_id in variabelen. 
$resellerid = $row[0];
$oldresources_cpu = $row[1];
$oldresources_mem = $row[2];

//Oud + ingevoerd = nieuw
$newresources_cpu = $cpu_input + $oldresources_cpu;
$newresources_mem = $mem_input + $oldresources_mem;

//Zet de nieuwe waardes op de juiste plek in de tabel
$query_update_resources = "UPDATE reseller_resources SET resources_cpu = '$newresources_cpu' , resources_mem = '$newresources_mem'
		WHERE id = '$resellerid' AND account_id = '$_SESSION[account_id]' ";
mysql_query($query_update_resources);




?>