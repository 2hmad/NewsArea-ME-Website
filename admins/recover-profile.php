<?php
include('../connection.php');
$id = $_GET['id'];
$sql = "UPDATE editors SET ban = 0 WHERE id = $id";
$query = mysqli_query($connect, $sql);
echo "<script>window.history.back();</script>";
?>