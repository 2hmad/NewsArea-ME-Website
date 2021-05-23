<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | NewsArea ME</title>
    <?php include('links.php') ?>
</head>
<body>
<?php include('navbar.php') ?>
<br>
<div id="main">
<br><br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php" style="color:black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Editors</li>
  </ol>
  <form method="POST">
  <div class="input-group" style="max-width: 300px;margin-right: auto;margin-left: auto;">    
    <input type="text" name="user-search" class="form-control" placeholder="Name" aria-label="Input group example" aria-describedby="btnGroupAddon">
    <button type="submit" name="user-search-button" class="input-group-text" id="btnGroupAddon" style="background:white;outline:none" target="_blank"><img src="../pics/search.png" style="max-width: 25px;"></button>
  </div>
</form>
<?php
if(isset($_POST['user-search-button'])) {
  $user_search = $_POST['user-search'];
  if($user_search !== "") {
    echo "<script type='text/javascript'>document.location.href='search-users.php?user=$user_search'</script>";
  }
}
?>
</nav>
<br><br>
<div class="row">
<?php
if(empty($_SESSION['email'])){
    echo "<script type='text/javascript'>document.location.href='index.php';</script>";
}
    $sql = "SELECT * FROM editors WHERE ban = 0 ORDER BY id DESC";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $name = $row['name'];
    $profile = $row['profile_pic'];
    echo "
    <div class='col-lg-2' style='margin-bottom:2%'>
    <div class='card' style='padding: 15px;text-align:center;min-height: 380px;'>
        <img src='data:image/jpeg;base64,".base64_encode($profile)."' class='card-img-top'>
        <a href='../profile.php?id=$id' target='_blank' style='color:black;margin-top:10%;margin-bottom:5%'><h3 style='font-size: 1.2rem;font-weight:bold;display:block;'>$name</h3></a>
        <a href='preview-profile.php?id=$id' target='_blank'><button type='submit' class='btn btn-outline-dark'>Delete User</button></a>
    </div>
    </div>
    ";
    
}
?>
    
</div>

</div>
</div>
<br><br>
<?php include('scripts.php') ?>
</body>
</html>