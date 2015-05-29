<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
//<!DOCTYPE html>

<?php

session_start();

$_SESSION['s_id']= $_POST['resid'];
$_SESSION['v_id']= $_POST['volid'];
$postid= $_SESSION['s_id'];
$postid= $_SESSION['v_id'];

//echo $postid;

include('dbcon.php');

$query = "SELECT * FROM user WHERE username = '$_SESSION[username] ' AND password = '$_SESSION[password]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_array($mysqlquery);

$query2 = "SELECT * FROM volumes WHERE account_id = '$_SESSION[account_id] ' AND id = '$_SESSION[v_id]'";
$mysqlquery2 = mysql_query($query2);
$row2 = mysql_fetch_array($mysqlquery2);

$query3 = "SELECT * FROM account WHERE id = '$_SESSION[account_id]'";
$mysqlquery3 = mysql_query($query3);
$row3 = mysql_fetch_array($mysqlquery3);

$_SESSION['api_key']= $row[9];
$_SESSION['secret_key']= $row[10];
$_SESSION['s_id']= $_POST['resid'];
$_SESSION['v_name']=$row2[7];
$_SESSION['account_name']=$row3[1];
$_SESSION['domain_id']=$row3[4];
//echo $_SESSION['$.SESSION[username]'];
echo "Template_ID:";
echo $_SESSION['s_id'];
echo "</br>";
echo "Volume_ID:";
echo $_SESSION['v_id'];

echo "<td>" . $_SESSION['domain_id'] . "</td>";


$apikey= strtolower($_SESSION['api_key']);
$volume_name= strtolower($_SESSION['v_name']);
$query="apikey=".$apikey."&command=createvolume&name=".$volume_name."&snapshotid=".$_SESSION['s_id']."&account=".$_SESSION['account_name']."&domainid=".$_SESSION['domain_id'];



$secretkey= $_SESSION['secret_key'];
$input ="java -classpath /usr/share/java/cloud-jasypt-1.8.jar org.jasypt.intf.cli.JasyptPBEStringDecryptionCLI decrypt.sh input=".$_SESSION['secret_key']." password=password verbose=false";
$output = exec($input);



$hashedRequest = urlencode(base64_encode(hash_hmac('sha1', $query, $output, TRUE)));

$basicurl ="http://24.132.150.212:8080/client/api?command=createVolume&name=";

$http =$basicurl.$_SESSION['v_name']."&snapshotid=".$_SESSION['s_id']."&account=".$_SESSION['account_name']."&domainid=".$_SESSION['domain_id']."&apiKey=".$_SESSION['api_key']."&signature=".$hashedRequest;

//$ch = curl_init();


//curl_setopt($ch, CURLOPT_URL, $http);
//curl_setopt($ch, CURLOPT_HEADER, 0);


//curl_exec($ch);

echo $query;
	echo "<br />";
	echo "<br />";
echo $http;


//{
//header('location: management.php');
//} 


?>

						