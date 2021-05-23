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
if(empty($_SESSION['email'])){
  echo "<script type='text/javascript'>document.location.href='index.php';</script>";
}
?>
<br>
<div id="main">
<br><br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php" style="color:black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Magazine</li>
  </ol>
</nav>
<br><br>
<div class="add-user" style="margin-bottom:5%;width: 800px;max-width: 100%;border: 1px solid #e6e6e6;padding: 15px;margin-left: auto;margin-right: auto;display: block;background:white">
<h3 style="text-align: center;font-weight:bold;margin-bottom:3%;margin-top:3%">Add Magazine</h3>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="title-magazine" placeholder="Title" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%">
    <div class="file-upload" style="display:block;margin-bottom:2%;margin-top:2%">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Choose Thumbnail</div>
            <div class="file-select-name" id="noFile">No file chosen...</div> 
            <input type="file" name="thumbnail-add" id="chooseFile" accept="image/jpeg,image/png">
        </div>
    </div>
    <div class="magazine-upload" style="display:block;margin-bottom:2%;margin-top:2%">
        <div class="magazine-select">
            <div class="magazine-select-button" id="fileName">Choose Magazine</div>
            <div class="magazine-select-name" id="noPdf">No file chosen...</div> 
            <input type="file" name="magazine-add" id="choosePdf" accept="application/pdf">
        </div>
    </div>
    <button type="submit" name="upload-magazine" style="display: block;
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
        margin-bottom: 5%;">Upload Magazine</button>
</form>
<?php
if(isset($_POST['upload-magazine'])){
  $title = $_POST['title-magazine'];
  $thumbnail = addslashes(file_get_contents($_FILES['thumbnail-add']['tmp_name']));
  $filename = $_FILES['magazine-add']['name'];
  $destination = 'uploads/' . $filename;
  $file = $_FILES['magazine-add']['tmp_name'];
  $size = $_FILES['magazine-add']['size'];
  $file_folder = "../magazines/";
  $date = date("j F Y");
  if(move_uploaded_file($file, $file_folder.$filename)){
  if($title !== "" && $thumbnail !== "" && $file !== ""){
      $sql = "INSERT INTO magazine (title, thumbnail, file_name, size, date_publish) VALUES ('$title', '$thumbnail', '$filename', '$size', '$date')";
      $query = mysqli_query($connect, $sql);
      echo "<div class='alert alert-success'>Magazine has been added successfully</div>";  
    } else {
        echo "<div class='alert alert-danger'>Fill in all inputs</div>";
      }
      
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

$('#choosePdf').bind('change', function () {
  var filename = $("#choosePdf").val();
  if (/^\s*$/.test(filename)) {
    $(".magazine-upload").removeClass('active');
    $("#noPdf").text("No file chosen..."); 
  } else {
    $(".magazine-upload").addClass('active');
    $("#noPdf").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
</body>
</html>