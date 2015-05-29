<?php

$apitest="claHEsCDZZo7TTq-sTkMasJB1JT8zLook17ONIMju5-8JXjmfJbcnH1IWkMNvatDSg5dA7hwytdEEj0XQLDPjw";

$apikey= strtolower("claHEsCDZZo7TTq-sTkMasJB1JT8zLook17ONIMju5-8JXjmfJbcnH1IWkMNvatDSg5dA7hwytdEEj0XQLDPjw");
$query="apikey=".$apikey."&command=createaccount&accounttype=0&email=testattestpuntnl&firstname=anton&lastname=kees&password=password&username=anton";



$secretkey= "sREMN69UxubpOLCkyt4gMPBKKLD3J_9vTte_zj1Ig7hOEiDhPTYUJvOhWRF3scZx3rkAFQiNY7F04CC3j_7OpQ";
//$input ="java -classpath /usr/share/java/cloud-jasypt-1.8.jar org.jasypt.intf.cli.JasyptPBEStringDecryptionCLI decrypt.sh input=".$_SESSION['secret_key']." password=password verbose=false";
//$output = exec($input);



$hashedRequest = urlencode(base64_encode(hash_hmac('sha1', $query, $secretkey, TRUE)));

$basicurl ="http://24.132.150.212:8080/client/api?command=createAccount&accounttype=0&email=testattestpuntnl&firstname=anton&lastname=kees&password=password&username=anton";

$http =$basicurl."&apiKey=".$apitest."&signature=".$hashedRequest;


//$ch = curl_init();


//curl_setopt($ch, CURLOPT_URL, $http);
//curl_setopt($ch, CURLOPT_HEADER, 0);


//curl_exec($ch);


//{
//header('location: vmstatus.php');
//} 

echo $http;

?>