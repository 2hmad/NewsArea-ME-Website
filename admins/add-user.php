<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | NewsArea ME</title>
    <?php include('links.php') ?>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
</head>
<body>
<style>
.fr-box.fr-basic .fr-element {
  min-height: 250px;
}
#container {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
#container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}
#container:hover input ~ .checkmark {
  background-color: #ccc;
}
#container input:checked ~ .checkmark {
  background-color: #2196F3;
}
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
#container input:checked ~ .checkmark:after {
  display: block;
}
#container .checkmark:after {
  left: 7px;
  top: 4px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>

</style>
<?php
include('navbar.php');
?>
<br>
<div id="main">
<br><br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php" style="color:black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
  </ol>
</nav>
<br><br>
<div class="add-user" style="margin-bottom:5%;width: 800px;max-width: 100%;border: 1px solid #e6e6e6;padding: 15px;margin-left: auto;margin-right: auto;display: block;background:white">
<h3 style="text-align: center;font-weight:bold;margin-bottom:3%;margin-top:3%">Add User</h3>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="name-add" placeholder="Full Name" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%">
    <input type="email" name="email-add" placeholder="Email Address" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%">
    <textarea type="text" name="role-add" id="text01" placeholder="Role" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%"></textarea>
    <textarea id="froala-editor" name="desc-add" style="margin-bottom:2%;display:block;"></textarea>
    <div class="file-upload" style="display:block;margin-bottom:2%;margin-top:2%">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Choose User Pic</div>
            <div class="file-select-name" id="noFile">No file chosen...</div> 
            <input type="file" name="pic-add" id="chooseFile">
        </div>
    </div>
<button type="submit" name="create-user" style="display: block;
    width: 200px;
    height: 40px;
    background: #dce4ec;
    color: #34495e;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5%;
    margin-bottom: 5%;">Create User</button>
</form>
<?php
if(empty($_SESSION['email'])){
  echo "<script type='text/javascript'>document.location.href='index.php';</script>";
}
if(isset($_POST['create-user'])){
  $name = $_POST['name-add'];
  $email = $_POST['email-add'];
  $role = $_POST['role-add'];
  $desc = $_POST['desc-add'];
  $pic = addslashes(file_get_contents($_FILES['pic-add']['tmp_name']));
  if($name !== "" && $role !== "" && $desc !== "" && $pic !== ""){
      $sql = "INSERT INTO editors (name, role, email, about, profile_pic) VALUES ('$name', '$role', '$email', '$desc', '$pic')";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>Account has been added successfully</div>";  
    }
  }
?>
</div>
</div>
</div>
<br><br>
<?php include('scripts.php') ?>
<script>
 new FroalaEditor('textarea#froala-editor', {
   placeholderText: 'About User'
 })
</script>
<script>
  function myFunction() {
  var x = document.getElementById("password-input");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
  $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  } else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
</body>
</html>