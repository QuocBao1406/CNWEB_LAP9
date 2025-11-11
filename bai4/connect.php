<?php
$server="localhost";
$user="root";
$password="";
$db = "udn";
$connect = mysqli_connect($server, $user, $password, $db);
mysqli_query($connect, "set names 'utf8' ");
?>