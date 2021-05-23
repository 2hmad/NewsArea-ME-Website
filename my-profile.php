<html>
<head>
<title>Editors Panel | NewsArea ME</title>
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
<nav style="background-color: #131313;padding:10px">
<a href="logout.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>Logout</span></a>
<a href="my-profile.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>My Profile</span></a>
<a href="dashboard.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>Add Article</span></a>
</nav>
<br><br>
<?php
if(empty($_SESSION['email'])){
    echo "<script type='text/javascript'>document.location.href='login.php';</script>";
  }  
$email_session = $_SESSION['email'];
$sql = "SELECT * FROM editors WHERE email = '$email_session'";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)){
    $name = $row['name'];
    $role = $row['role'];
    $about = $row['about'];
    $facebook_link = $row['facebook_url'];
    $twitter_link = $row['twitter_url'];
    $instagram_link = $row['instagram_url'];
    $profile_pic = $row['profile_pic'];
}
?>
<div class="container" style="margin-bottom:5%;padding: 15px;margin-left: auto;margin-right: auto;display: block;">
<div class="cover" style="background:#212121;padding:50px;min-height: 300px;border-radius: 5px;">
    <?php echo "<img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' style='max-width:200px;height:200px;border-radius:50%;float: left;margin-right: 2%;'>"; ?>
    <h3 class="name-profile" style="color:white;font-weight:bold;margin-top: 5%;"><?php echo "$name" ?></h3>
    <p class="role-profile" style="color:white"><?php echo "$role" ?></p>
</div>
<form method="post">
    <h3 style="font-weight: bold;display:block;margin-top:3%">Personal Information</h3>
    <label style="display: block;margin-top: 2%;font-weight:bold">Name</label>
    <input type="text" value="<?php echo "$name" ?>" style="width: 500px;max-width: 100%;height: 40px;padding: 10px;" disabled>
    <label style="display: block;margin-top: 2%;font-weight:bold">Role</label>
    <input type="text" value="<?php echo "$role" ?>" style="width: 500px;max-width: 100%;height: 40px;padding: 10px;" disabled>
    <label style="display: block;margin-top: 2%;font-weight:bold">About you</label>
    <textarea name="about-edit" style="width: 500px;max-width: 100%;height: 150px;padding: 10px;"><?php echo "$about" ?></textarea>
    <label style="display: block;margin-top: 2%;font-weight:bold">Facebook Profile Link (optional)</label>
    <input type="url" name="facebook-link-edit" value="<?php echo "$facebook_link" ?>" style="width: 500px;max-width: 100%;height: 40px;padding: 10px;">
    <label style="display: block;margin-top: 2%;font-weight:bold">Twitter Profile Link (optional)</label>
    <input type="url" name="twitter-link-edit" value="<?php echo "$twitter_link" ?>" style="width: 500px;max-width: 100%;height: 40px;padding: 10px;">
    <label style="display: block;margin-top: 2%;font-weight:bold">Instagram Profile Link (optional)</label>
    <input type="url" name="instagram-link-edit" value="<?php echo "$instagram_link" ?>" style="width: 500px;max-width: 100%;height: 40px;padding: 10px;">
    <input type="submit" name="edit-data" value="Edit" style="display: block;width: 500px;max-width:100%;height: 50px;background: #dce4ec;color: #34495e;font-weight: bold;border: none;border-radius: 5px;margin-top: 5%;margin-bottom: 5%;">
</form>
<?php
if(isset($_POST['edit-data'])){
    $about_edit = $_POST['about-edit'];
    $facebook_link = $_POST['facebook-link-edit'];
    $twitter_link = $_POST['twitter-link-edit'];
    $instagram_link = $_POST['instagram-link-edit'];
    $sql = "UPDATE editors SET about = '$about_edit', facebook_url = '$facebook_link', twitter_url = '$twitter_link', instagram_url = '$instagram_link'";
    $query = mysqli_query($connect, $sql);
    echo "<div class='alert alert-success'>When you log back in, changes will appear</div>";
}
?>
</div>
<?php include('scripts.php') ?>
<?php include('footer.php') ?>
</body>
</html>
