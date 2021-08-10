<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | NewsArea ME</title>
    <?php include('links.php') ?>
</head>
<body>
<nav style="background-color: #131313;padding:10px">
  <img src="../pics/logo.png" alt="NewsArea Logo" style="max-width: 200px;margin-left:auto;margin-right:auto;display:block;padding: 15px;">
</nav>
<br>
<div class="container" style="margin-top: 8%;">
<div style="max-width: 450px;text-align: center;margin-left: auto;margin-right: auto;margin-bottom: 5%;padding:15px">
    <h3 style="text-align: center;font-weight: bold;">Login into NewsArea Panel</h3>
    <form method="post" style="display: block;padding: 10px;">
        <input type="text" name="email" placeholder="Email Address" style="margin-top: 5%;display: block;margin-bottom: 3%;width: 100%;height: 50px;padding: 10px;border: none;border-bottom:1px solid #dedede;outline:none;margin-left: auto;margin-right: auto;">
        <input type="password" name="password" placeholder="Password" style="display: block;margin-bottom: 3%;width: 100%;height: 50px;padding: 10px;border: none;border-bottom:1px solid #dedede;outline:none;margin-left: auto;margin-right: auto;">
        <br>
        <input type="submit" name="login" value="Login" style="width: 100%;height: 50px;background: #131313;color: white;font-weight: bold;font-size: 1.1rem;border: none;border-radius: 7px;outline: none;margin-bottom: 5%;">
    </form>
<?php
session_start();
ob_start();
if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = sha1($_POST['password']);
  $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
  $query = mysqli_query($connect, $sql);
  $num = mysqli_num_rows($query);
  if($num > 0) {
    $row = mysqli_fetch_array($query);
    $_SESSION['email'] = $row['email'];
    echo "<script type='text/javascript'>document.location.href='dashboard.php';</script>";
    ob_end_flush();
  } else {
    echo "No data matches your input";
  }
}
?>
</div>
<br><br>
</div>
</body>
</html>