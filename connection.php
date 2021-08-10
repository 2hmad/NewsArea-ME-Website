<?php
$host = "localhost";
$user = "xkshetzj_newsarea-admins";
$pass = "NewsAreaMiddleEast1";
$db = "xkshetzj_newsarea";
//$host = "localhost";
//$user = "root";
//$pass = "";
//$db = "newsarea";
$connect = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($connect, 'utf8');
ob_start();
session_start();
?>