<html>
<head>
<title>Admin Dashboard | NewsArea ME</title>
<?php include('links.php') ?>
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
</head>
<body>
<style>
@media (max-width: 1024px) {
    .name-profile, .role-profile {
        text-align: center;
    }
}
@media (max-width: 576px) {
    .name-profile, .role-profile {
        text-align: center;
    }
}
@media (max-width: 768px) {
    .name-profile, .role-profile {
        text-align: center;
    }
}
@media (max-width: 991px) {
    .name-profile, .role-profile {
        text-align: center;
    }
}
</style>
<?php include('navbar.php') ?>
<br><br>
<?php
if(empty($_SESSION['email'])){
    echo "<script type='text/javascript'>document.location.href='index.php';</script>";
}          
$id = $_GET['id'];
$sql = "SELECT * FROM editors WHERE id = $id";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
    $name = $row['name'];
    $role = $row['role'];
    $about = $row['about'];
    $profile_pic = $row['profile_pic'];
}
?>
<div class="container" style="margin-bottom:5%;padding: 15px;margin-left: auto;margin-right: auto;display: block;">
<div class="cover" style="padding:50px;min-height: 300px;border-radius: 5px;">
    <div>
    <?php echo "<img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' style='float:left;border-radius:50%;margin-right: 2%;width: 100px;object-fit: cover;height: 100px;border-radius: 50%;margin: 0 20px 0 0;'>"; ?>
    <h4 class="name-profile" style="font-weight:bold;padding-top: 2%;display:block"><?php echo "$name" ?></h4>
    <span class="role-profile"><?php echo "$role" ?></span>
    </div>
    <br><br>
    <div style="color:#4e4e4e;max-width: 85%;"><?php echo "$about"; ?></div>
    <form method="POST">
        <button type="submit" name="delete-user" class="btn btn-outline-dark">Delete User Permanently</button>
    </form>
<?php
if(isset($_POST['delete-user'])){
    $sql_d = "DELETE FROM editors WHERE id=$id";
    $query_i = mysqli_query($connect, $sql_i);
    $query_d = mysqli_query($connect, $sql_d);
    echo "<script>window.close()</script>";
}
?>
    <br><br></br>
    <h5 style="font-weight:bold">Related Articles</h5>
    <div class='row'>
    <?php
    $sql = "SELECT * FROM articles WHERE (user_id = $id AND visible > 0) ORDER BY id DESC";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $title = $row['title'];
        $short_desc = $row['short_desc'];
        $category = $row['category'];
      $article_pic = $row['article_pic'];
        echo "
        <div class='col-lg-4' style='margin-bottom:5%'>
        <a href='article.php?id=$id'>
          <div style='width: 100%;height: 262px;'><img src='../uploads/$article_pic' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'></div>
            <span style='font-size: 14px;margin-top:1%;color:#000;font-size: .875rem;line-height: 2.14;font-weight: 300;margin: 0px 0px 7px;'>$category</span>
            <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
            <p style='color: #6c757d!important;line-height: 135%;font-size: 1rem;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;'>$short_desc</p>
        </a>
        </div>
        ";
    }      
    ?>
    </div>
</div>
</div>
<?php include('scripts.php') ?>
</body>
</html>
