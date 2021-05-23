<!DOCTYPE html>
<html>
<head>
    <title>NewsArea Middle East</title>
    <?php include('links.php') ?>
    <style>
    ol {
      list-style-type: upper-roman;
    }
    li::marker {
      font-size: 2rem;
      color: #e0e0e0;
      line-height: 135%;
      font-style: italic
    }
    </style>
</head>
<body>
<?php include('navbar.php') ?>
<br>
<div class="container">
<br><br>
<h3 style="text-align: center;font-weight: bold;">Login to NewsArea Staff Panel</h3>
<p style="text-align: center;font-size: 1.4rem;">NewsArea editors get access to publish, edit and events</p>
<div style="max-width: 700px;text-align: center;margin-left: auto;margin-right: auto;margin-top: 4%;margin-bottom: 5%;">
    <form method="post" style="display: block;padding: 10px;">
        <input type="email" name="email-editor" placeholder="Email Address" style="margin-top: 5%;display: block;margin-bottom: 3%;width: 100%;height: 50px;padding: 10px;border: 1px solid #dedede;margin-left: auto;margin-right: auto;">
        <input type="password" name="password-editor" placeholder="Password" style="display: block;margin-bottom: 3%;width: 100%;height: 50px;padding: 10px;border: 1px solid #dedede;margin-left: auto;margin-right: auto;">
        <input type="submit" name="login-editor" value="Login" style="width: 200px;height: 50px;background: #131313;color: white;font-weight: bold;font-size: 1.1rem;border: none;border-radius: 7px;outline: none;margin-bottom: 5%;">
    </form>
<?php
if(isset($_POST['login-editor'])) {
  $email = $_POST['email-editor'];
  $password = sha1($_POST['password-editor']);
  $sql = "SELECT * FROM editors WHERE email='$email' AND password='$password'";
  $query = mysqli_query($connect, $sql);
  $num = mysqli_num_rows($query);
  if($num > 0) {
    $row = mysqli_fetch_array($query);
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    echo "<script type='text/javascript'>document.location.href='dashboard.php';</script>";
    ob_end_flush();
  } else {
    echo "No data match your inputs";
  }
}
?>
</div>
<br><br>
</div>
<?php include('scripts.php') ?>
<?php include('footer.php') ?>
</body>
</html>