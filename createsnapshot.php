<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
//<?php
//session_start();
//if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

//header ("Location: no_authentication.php");

//}
//?>

<html>
<head>

<title>Snapshot Creation Menu</title>

<link href="styleManagement.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

	<section id="ManagementMenu"> 

		<header>
        
		  
		
		<img src="images/plaintechlogo.jpg" width="640" height="150">
		</header>
		
		<mark id="message"></mark>
		<mark id="message"></mark>

		<form method="post" action="ManagementMenu.php" name="ManagementMenuform" id="ManagementMenuform" autocomplete="on">

			<fieldset>

				<legend>You're back-up is being made. Please wait 1 minute. You will be automaticelly returned to the management menu </legend>

					

			</fieldset>
</form>


<?php

session_start();

$_SESSION['id']= $_POST['volid'];
$postid= $_SESSION['id'];

echo $postid;



include('dbcon.php');

$query = "SELECT * FROM user WHERE username = '$_SESSION[username] ' AND password = '$_SESSION[password]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_array($mysqlquery);


$_SESSION['api_key']= $row[9];
$_SESSION['secret_key']= $row[10];
$_SESSION['id']= $_POST['volid'];


$apikey= strtolower($_SESSION['api_key']);
$query="apikey=".$apikey."&command=createsnapshot&volumeid=".$_SESSION['id'];


$secretkey= $_SESSION['secret_key'];
$input ="java -classpath /usr/share/java/cloud-jasypt-1.8.jar org.jasypt.intf.cli.JasyptPBEStringDecryptionCLI decrypt.sh input=".$_SESSION['secret_key']." password=password verbose=false";
$output = exec($input);



$hashedRequest = urlencode(base64_encode(hash_hmac('sha1', $query, $output, TRUE)));

$basicurl ="http://24.132.150.212:8080/client/api?command=createSnapshot&volumeid=";

$http =$basicurl.$_SESSION['id']."&apiKey=".$_SESSION['api_key']."&signature=".$hashedRequest;

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $http);
curl_setopt($ch, CURLOPT_HEADER, 0);


curl_exec($ch);

	echo "<br />";
	echo "<br />";
echo $http;




{
header('location: creatingbackup.php');
} 

?>

						


    Copyright 2013 Plaintech inc.
    <div id="portalmenu"></div>
</section>
</body>
</html>