<?php
session_start();

$_SESSION['backup'] = '1';


echo "test = ".$_SESSION['backup'];

$_SESSION['backup'] = '2';

echo "test = ".$_SESSION['backup'];
?>