<?php


session_start();
session_unset();


$_SESSION['username']= $_POST['username'];

$md5 =$_POST['password'];

$_SESSION['password']=  md5 ($md5);


include('dbcon.php');


$query = "SELECT * FROM user WHERE username = '$_SESSION[username] ' AND password = '$_SESSION[password]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);


//$_SESSION['api_key']= $row[9];

$_SESSION['account_id']= $row[4];

$_SESSION['user_id']= $row[0];
if($row[2] == $_SESSION['username'] && $row[3] == $_SESSION['password'] && $row[12] == NULL )
																										{

if ($row[9] == NULL) 		{
	
$genkey = "http://localhost:8096/client/api?command=registerUserKeys&id=".$_SESSION['user_id'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $genkey);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);


header('location: management.php');
							}

elseif ($row[9] != "NULL" )
  						{
  header('location: management.php');
  						}



																										}
																										else	

	{
	
	header ('location: no_authentication.php');
	
	}
?>