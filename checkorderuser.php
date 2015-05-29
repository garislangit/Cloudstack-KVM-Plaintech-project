<?php

session_start();

// Opgevangen password hashen naar MD5 voor gebruik later in de API URL en opslag in de database
$pswdmd5 = md5($_SESSION['password']);

$address = $_SESSION['address'];
$city = $_SESSION['city'];
$postalcode = $_SESSION['postalcode'];
$email = $_SESSION['email'];
$country = $_SESSION['country'];
$backup = $_SESSION['backup'];
$sla = $_SESSION['sla'];




// Hier maken we de API URL voor het registreren van de gebruiker
$basicurl ="http://localhost:8096/client/api?";
$command1 = "command=createAccount";
$command2 = "command=deployVirtualMachine";
$accounttype = "&accounttype=0";

// Opbouwen van het CreateAccount API Command
$httpacc = $basicurl.$command1.$accounttype."&firstname=".$_SESSION['firstname']."&lastname=".$_SESSION['lastname']."&email=".$_SESSION['email']."&username=".$_SESSION['username']."&password=".$pswdmd5;

// Opbouwen van het DeployVM API Command
$httpvm = $basicurl.$command2."&serviceofferingid=".$_SESSION['vmspecs']."&templateid=".$_SESSION['vmos']."&zoneid=1"."&account=".$_SESSION['username']."&diskofferingid=".$_SESSION['vmstorage']."&displayname=".$_SESSION['vmname']."&domainid=1"."&name=".$_SESSION['vmname'];


// Het verzenden van de API URL's
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpacc);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);

sleep(10);


include('dbcon.php');

$query = "SELECT * FROM user WHERE username = '$_SESSION[username]' AND password = '$pswdmd5'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);

$accountid = $row[4];


 mysql_query("INSERT INTO user_extra_details (address, city, postalcode, email, country, backup, sla, account_id) 
              VALUES ('$address', '$city', '$postalcode', '$email', '$country', '$backup', '$sla', '$accountid')");
   

include('mailsend.php');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpvm);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);


?>