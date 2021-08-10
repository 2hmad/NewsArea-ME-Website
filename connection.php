<?php
//$host = "localhost";
//$user = "xkshetzj_newsarea-admins";
//$pass = "NewsAreaMiddleEast1";
//$db = "xkshetzj_newsarea";
$host = "us-cdbr-east-04.cleardb.com";
$user = "b31560f908280d";
$pass = "5ed34ffc";
$db = "heroku_a92d341879b202a";
$connect = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($connect, 'utf8');
ob_start();
session_start();
?>