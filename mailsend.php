<?php
session_start();

include ('dbcon.php');

$query = "SELECT * FROM vm_template WHERE id = '$_SESSION[vmos]'";
$mysqlquery = mysql_query($query);
$row = mysql_fetch_row($mysqlquery);
$vmos_name = $row[2];

$query2 = "SELECT * FROM service_offering WHERE id = '$_SESSION[vmspecs]'";
$mysqlquery2 = mysql_query($query2);
$row2 = mysql_fetch_row($mysqlquery2);
$vmspecs_CPU = $row2[2];
$vmspecs_mem = $row2[3];

$query3 = "SELECT * FROM disk_offering WHERE id = '$_SESSION[vmstorage]'";
$mysqlquery3 = mysql_query($query3);
$row3 = mysql_fetch_row($mysqlquery3);
$storage = $row3[4];

$to = $_SESSION['email'];
$subject = "Your order has been received succesfully!";

$txt = "Dear " .$_SESSION['firstname']." ".$_SESSION['lastname'].","
 . "\r\n".
 ""  . "\r\n".
"Thank you for ordering your server(s) by Plaintech !"
 . "\r\n".
 ""  . "\r\n".
"See the overview below for more information of your order"
 . "\r\n".
 ""  . "\r\n".
"Operating System or Package  " .$vmos_name.
 "" . "\r\n".
"Hardware Specification CPU: " .$vmspecs_CPU." and Memory " .$vmspecs_mem.
 "" . "\r\n".
"Extra Storage  " .$$storage.
 "" . "\r\n".
"Server Name  " .$_SESSION['vmname'].
 "" 
  . "\r\n".
 ""  . "\r\n".
 "This is the overview of your account:"
   . "\r\n".
  ""  . "\r\n".
  "Firstname  " .$_SESSION['firstname'].
  "" . "\r\n".
"Lastname  " .$_SESSION['lastname'].
 "" . "\r\n".
"Username  " .$_SESSION['username'].
 "" . "\r\n".
"Password  " .$_SESSION['password'].
 "" . "\r\n".
"Email Address  " .$_SESSION['email'].
 "" 
;

$headers = "From: no-reply@plaintech.com" . "\r\n" ;

mail($to,$subject,$txt,$headers);


  echo $to;
  echo $subject;
  echo $headers;
  
?>