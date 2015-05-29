<?php

session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$usernamepost = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$backup = $_POST['backup'];

$pswdmd5 = md5($password);

include('dbcon.php');
$query = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_array($mysqlquery);

$domain = $row[4];

// Hier maken we de API URL voor het registreren van de gebruiker
$basicurl ="http://localhost:8096/client/api?";
$command1 = "command=createAccount";
$accounttype = "&accounttype=0";

// Opbouwen van het CreateAccount API Command
$httpacc = $basicurl.$command1.$accounttype."&firstname=".$firstname."&lastname=".$lastname."&email=".$email."&username=".$usernamepost."&password=".$pswdmd5."&domainid=".$domain;


// Het verzenden van de API URL's

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $httpacc);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);

//include('mailsend.php');

sleep(3);

include('dbcon.php');

$queryfetch = "SELECT * FROM user WHERE username = '$usernamepost' AND password = '$pswdmd5'";
$mysqlqueryfetch = mysql_query($queryfetch);
$rowfetch = mysql_fetch_row($mysqlqueryfetch);

$accountid = $rowfetch[4];

mysql_query("INSERT INTO user_extra_details (backup, account_id) 
             VALUES ('$backup', '$accountid')");


{

	header('location: accountoverview.php');
}

?>