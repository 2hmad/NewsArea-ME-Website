<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | NewsArea ME</title>
    <?php include('links.php'); ?>
</head>
<body>
<?php include('navbar.php') ?>
<br>
<div id="main">
<br><br>
<div class="container">
<div class="row">

<div class="col-lg-4" style="margin-bottom:5%">
    <div class="card" style="display: inline-block;width: 100%;">
        <div style="background: #00c0ef;text-align: center;width: 120px;padding: 20px;float:left;margin-right:3%;height:100px"><img src="../pics/writer.png"></div>
        <span style="font-size: 1.4rem;font-weight: bold;display: block;margin-top: 5%;">Users</span>
<?php
if(empty($_SESSION['email'])){
  echo "<script type='text/javascript'>document.location.href='index.php';</script>";
}
$sql = "SELECT COUNT(*) AS total_users FROM editors";
$query = mysqli_query($connect, $sql);
$counter = mysqli_fetch_assoc($query);
echo "<span>$counter[total_users]</span>";
?>
        
    </div>
</div>

<div class="col-lg-4" style="margin-bottom:5%">
    <div class="card" style="display: inline-block;width: 100%;">
        <div style="background: #dd4b39;text-align: center;width: 120px;padding: 20px;float:left;margin-right:3%;height:100px"><img src="../pics/magazine.png"></div>
        <span style="font-size: 1.4rem;font-weight: bold;display: block;margin-top: 5%;">Articles</span>
<?php
$sql = "SELECT COUNT(*) AS total_article FROM articles WHERE visible = 1";
$query = mysqli_query($connect, $sql);
$counter = mysqli_fetch_assoc($query);
echo "<span>$counter[total_article]</span>";
?>
    </div>
</div>

<div class="col-lg-4" style="margin-bottom:5%">
    <div class="card" style="display: inline-block;width: 100%;">
        <div style="background: #00a65a;text-align: center;width: 120px;padding: 20px;float:left;margin-right:3%;height:100px"><img src="../pics/magazine.png"></div>
        <span style="font-size: 1.4rem;font-weight: bold;display: block;margin-top: 5%;">Magazine</span>
        <span><?php
        $sql = "SELECT COUNT(*) AS total_magazines FROM magazine";
        $query = mysqli_query($connect, $sql);
        $counter = mysqli_fetch_assoc($query);
        echo "<span>$counter[total_magazines]</span>";
        ?></span>
    </div>
</div>

</div>
<br><br>
<div class="row">

<div class="col-lg">
    <div class="card">
        <h3 class="card-header" style="font-size: 1.2rem;font-weight: bold;color:white;background:#dd4b39">Latest Member</h3>
        <div class="card-body">
        <ul style="text-align: center;">
        <?php
        $sql = "SELECT * FROM editors ORDER BY id DESC LIMIT 12";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            $profile_pic = $row['profile_pic'];
            echo "
            <li style='float: left;margin-right: 3%;margin-top:3%'>
                <a href='../profile.php?id=$id' target='_blank'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' style='width: 120px;height: 120px;border-radius: 50%;object-fit: cover'></a>
            </li>
            ";
        }
        ?>
        </ul>
        </div>
    </div>
</div>

<div class="col-lg">
    <div class="card">
        <h3 class="card-header" style="font-size: 1.2rem;font-weight: bold;color:white;background:#dd4b39">Latest Articles</h3>
        <div class="card-body">
        <ul>
        <?php
        $sql = "SELECT * FROM articles WHERE visible > 0 ORDER BY id DESC LIMIT 5";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            $title = $row['title'];
            $date = $row['date'];
            echo "
            <li style='margin-top:3%;border-bottom:1px solid #ececec'>
                <a href='../article.php?id=$id' target='_blank' style='color:black'><h4 style='font-size: 1.3em;font-weight: bold;line-height:1em'>$title</h4></a>
                <p style='color:#808080'>Date : $date</p>
            </li>
            ";
        }
        ?>
        </ul>
        </div>
    </div>
</div>

</div>
</div>
</div>
<br><br>
<?php include('scripts.php') ?>
</body>
</html>