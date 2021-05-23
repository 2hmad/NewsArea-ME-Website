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
    <li class="breadcrumb-item"><a href="manage-users.php" style="color:black">Manage Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Search Users</li>
  </ol>
</nav>
<br><br>
<div class="row">
<?php
        $name = $_GET['user'];
        if(empty($_SESSION['email'])){
          echo "<script type='text/javascript'>document.location.href='index.php';</script>";
        }
        $sql = "SELECT * FROM editors WHERE name LIKE '%".$name."%' ORDER BY id DESC";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            $name = $row['name'];
            $profile_pic = $row['profile_pic'];
            echo "
            <div class='col-lg-2' style='margin-bottom:2%'>
            <div class='card' style='padding: 15px;text-align:center;min-height: 380px;'>
                <img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' class='card-img-top'>
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