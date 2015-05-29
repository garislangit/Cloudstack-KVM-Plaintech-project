<?php



$host="localhost"; // Host name 
$username="cloud"; // Mysql username 
$password="Cloud001#"; // Mysql password 
$db_name="cloud"; // Database name 


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


?>
