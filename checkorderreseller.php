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
$companyname = $_SESSION['companyname'];
$ccc = $_SESSION['ccc'];
$cmail = $_SESSION['cmail'];
$phone = $_SESSION['phone'];
$fax = $_SESSION['fax'];
$resources_cpu = $_SESSION['resources_cpu'];
$resources_mem = $_SESSION['resources_mem'];

// Hier maken we de API URL voor het registreren van de gebruiker
$basicurl ="http://localhost:8096/client/api?";
$command1 = "command=createDomain";
$command2 = "command=createAccount";
$accounttype = "&accounttype=2";


// Opbouwen van het CreateDomain API Command
$httpdo = $basicurl.$command1."&name=".$companyname;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpdo);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);

sleep(10);


include('dbcon.php');
$query2 = "SELECT * FROM domain WHERE name = '$_SESSION[companyname]'";
$mysqlquery2 = mysql_query($query2);
$row2 = mysql_fetch_row($mysqlquery2);

$domain= $row2[0];

// Opbouwen van het CreateAccount API Command
$httpacc = $basicurl.$command2.$accounttype."&firstname=".$_SESSION['firstname']."&lastname=".$_SESSION['lastname']."&email=".$_SESSION['email']."&username=".$_SESSION['username']."&password=".$pswdmd5."&domainid=".$domain;


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


mysql_query("INSERT INTO user_extra_details (companyname, address, city, postalcode, chamberofcommerce, phonenumber, email, fax, country, backup, sla, account_id) 
              VALUES ('$companyname', '$address', '$city', '$postalcode', '$ccc', '$phone', '$cmail', '$fax', '$country', '$backup', '$sla', '$accountid')");
   

mysql_query("INSERT INTO reseller_resources (resources_cpu, resources_mem, account_id)
			VALUES ('$resources_cpu', '$resources_mem', '$accountid')");
  
include('mailsend.php');





?>