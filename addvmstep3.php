<?php

session_start();

// Opgevangen password hashen naar MD5 voor gebruik later in de API URL en opslag in de database
$pswdmd5 = md5($_SESSION['password']);
$_SESSION['username'];
include('dbcon.php');

$query = "SELECT * FROM user WHERE username = '$_SESSION[username]' AND password = '$pswdmd5'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);

$accountname = $row[2];


// Hier maken we de API URL voor het registreren van de gebruiker
$basicurl ="http://localhost:8096/client/api?";
$command1 = "command=deployVirtualMachine";

// Opbouwen van het DeployVM API Command
$httpvm = $basicurl.$command1."&serviceofferingid=".$_SESSION['vmspecs']."&templateid=".$_SESSION['vmos']."&zoneid=1"."&account=".$_SESSION['username']."&diskofferingid=".$_SESSION['vmstorage']."&displayname=".$_SESSION['vmname']."&domainid=1"."&name=".$_SESSION['vmname'];

//echo $_SESSION['username'];
//echo $accountname;
//echo $httpvm;



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpvm);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);



?>