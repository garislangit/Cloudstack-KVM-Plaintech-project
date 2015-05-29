<?php 
session_start();

$instance = $_SESSION['instance_name'];

exec("sudo rm /var/www/html/webpanel/text.txt");
exec("sudo bash /var/www/html/webpanel/run.sh");



$array = file('/var/www/html/webpanel/text.txt');

$count = count($array);




for ($i=0; $i <= $count; $i++) { 


    if (strstr($array[$i] , $instance)) {

        $vncport = ($array[$i]);
}



}

$port = explode(" " ,$vncport);

$_SESSION['port']= $port[1];

//echo "PORT: ".$_SESSION['port'];


{
header('location: VNC/console.php');
} 

?>


