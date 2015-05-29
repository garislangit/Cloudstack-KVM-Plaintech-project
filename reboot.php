<?php

session_start();

include('dbcon.php');


$query = "SELECT * FROM user WHERE username = '$_SESSION[username] ' AND password = '$_SESSION[password]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_array($mysqlquery);


$_SESSION['api_key']= $row[9];
$_SESSION['secret_key']= $row[10];
$_SESSION['id']= $_POST['vmid'];

$apikey= strtolower($_SESSION['api_key']);
$query="apikey=".$apikey."&command=rebootvirtualmachine&id=".$_SESSION['id'];



$secretkey= $_SESSION['secret_key'];
$input ="java -classpath /usr/share/java/cloud-jasypt-1.8.jar org.jasypt.intf.cli.JasyptPBEStringDecryptionCLI decrypt.sh input=".$_SESSION['secret_key']." password=password verbose=false";
$output = exec($input);



$hashedRequest = urlencode(base64_encode(hash_hmac('sha1', $query, $output, TRUE)));

$basicurl ="http://24.132.150.212:8080/client/api?command=rebootVirtualMachine&id=";

$http =$basicurl.$_SESSION['id']."&apiKey=".$_SESSION['api_key']."&signature=".$hashedRequest;


$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $http);
curl_setopt($ch, CURLOPT_HEADER, 0);


curl_exec($ch);


{
header('location: management.php');
} 



?>