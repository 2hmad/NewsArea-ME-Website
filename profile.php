<html>
<head>
<title>Profile | NewsArea ME</title>
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
$id = $_GET['id'];
$sql = "SELECT * FROM editors WHERE (id=$id AND ban = 0)";
$query = mysqli_query($connect, $sql);
$num = mysqli_num_rows($query);
    if($num > 0) {
        while($row = mysqli_fetch_array($query)){
        $name = $row['name'];
        $role = $row['role'];
        $about = $row['about'];
        $facebook_link = $row['facebook_url'];
        $twitter_link = $row['twitter_url'];
        $instagram_link = $row['instagram_url'];
        $profile_pic = $row['profile_pic'];  
        }
    } else {
        header("Location:index.php");
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
    <div class="social-links" style="font-size: 25px;">
        <a href="<?php if($facebook_link !== "") {echo "$facebook_link";} else {echo "#";}?>" target="_blank" style="color:#3b5998"><i class="fab fa-facebook-f"></i></a>
        <a href="<?php if($twitter_link !== "") {echo "$twitter_link";} else {echo "#";}?>" target="_blank" style="color:#00acee;margin-left: 1%;"><i class="fab fa-twitter"></i></a>
        <a href="<?php if($instagram_link !== "") {echo "$instagram_link";} else {echo "#";}?>" target="_blank" style="color:#8a3ab9;margin-left: 1%;"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank" style="color:#f26522;margin-left: 1%;"><i class="fas fa-rss"></i></a>
    </div>
    <div style="color:#4e4e4e;max-width: 85%;"><?php echo "$about"; ?></div>
    <br><br></br>
    <h5 style="font-weight:bold">Related Articles</h5>
    <div class='row'>
    <?php
    $sql = "SELECT * FROM articles WHERE (user_id = $id AND visible > 0) ORDER BY id DESC LIMIT 12";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $title = $row['title'];
        $short_desc = $row['short_desc'];
        $category = $row['category'];
      $pic_name = $row['pic_name'];
        echo "
        <div class='col-lg-4' style='margin-bottom:5%'>
        <a href='article.php?id=$id'>
          <div style='width: 100%;height: 262px;'><img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'></div>
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
<?php include('footer.php') ?>
</body>
</html>
