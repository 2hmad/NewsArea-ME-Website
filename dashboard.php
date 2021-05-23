<html>
<head>
<title>Editors Panel | NewsArea ME</title>
<?php include('links.php') ?>
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
</head>
<body>
<style>
.fr-box.fr-basic .fr-element {
  min-height: 250px;
}
</style>
<nav style="background-color: #131313;padding:10px">
<a href="logout.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>Logout</span></a>
<a href="my-profile.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>My Profile</span></a>
<a href="dashboard.php" class="navbar-link" style="margin-right: 2%;color:white;font-size: 1.1em;font-weight: bold;"><span>Add Article</span></a>
</nav>
<br><br>
<div class="add-article" style="margin-bottom:5%;width: 800px;max-width: 100%;border: 1px solid #e6e6e6;padding: 15px;margin-left: auto;margin-right: auto;display: block;">
<h3 style="text-align: center;font-weight:bold;margin-bottom:3%;margin-top:3%">Add Article</h3>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="article-title" placeholder="Article Name" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%">
    <textarea type="text" name="short-desc" id="text01" placeholder="Short Description" style="padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%"></textarea>
    <span id="wordCount" style="color:red;display:block;margin-bottom:2%">65 Words remaining.</span>
    <select name="topic" style="background:white;padding: 10px;width: 100%;border: 1px solid #CCC;border-radius: 5px;outline: none;margin-bottom:2%">
        <option value="" hidden>Choose Related Tobic</option>
        <option>Arab Entrepreuners</option>
        <option>World Entrepreuners</option>
        <option>Innovation</option>
        <option>Billionaires</option>
        <option>Leadership</option>
        <option>Money</option>
        <option>Business</option>
        <option>Lifestyle</option>
        <option>Events</option>
        <option>Articles</option>
    </select>
    <textarea id="froala-editor" name="article-body" style="margin-bottom:2%;display:block;"></textarea>
    <span id="myWordCount" style="color:red;display:block;margin-bottom:2%">500 Words Minimum</span>
    <div class="file-upload" style="display:block;margin-bottom:2%">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Choose Article Pic</div>
            <div class="file-select-name" id="noFile">No file chosen...</div> 
            <input type="file" name="article-cover" id="chooseFile">
        </div>
    </div>
  <button type="submit" name="submit-article" style="display: block;
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
    margin-bottom: 5%;">Submit Article</button>
</form>
<?php
if(empty($_SESSION['email'])){
  echo "<script type='text/javascript'>document.location.href='login.php';</script>";
}
if(isset($_POST['submit-article'])){
  $user_id = $_SESSION['id'];
  $visible = "0";
  $title = $_POST['article-title'];
  $short_desc = mysqli_real_escape_string($connect, $_POST['short-desc']);
  $category = $_POST['topic'];
  $article_body = $_POST['article-body'];
  $cover= addslashes(file_get_contents($_FILES['article-cover']['tmp_name']));
  $views = "0";
  $date = date("j F Y");
  if($title !== "" && $short_desc !== "" && $category !== "" && $article_body !== "") {
    $sql = "INSERT INTO articles (user_id, visible, title, category, short_desc, long_desc, article_pic, views, date) VALUES ('$user_id', '$visible', '$title', '$category', '$short_desc', '$article_body', '$cover', '$views', '$date')";
    $query = mysqli_query($connect, $sql);
    echo "<div class='alert alert-success'>Your Article is Under Review</div>";
  } else {
    echo "<div class='alert alert-danger'>Please Fill All Inputs</div>";
  }
}
?>
</div>
<?php include('scripts.php') ?>
<script>
$(document).ready(function () {
var max_count = 65;
   $('#text01').on('input paste propertychange keydown', function () {
       if (!$("#text01").val()) {
         $(this).next('#wordCount').html(max_count + " Words remaining.");
       }
       var ta = $(this).val();
       var reg = /((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|))/gi;
       ta = ta.replace(reg, "");
       var words = ta.match(/[\w]+/gi).length;
       re2 = new RegExp("^\\s*\\S+(?:\\s+\\S+){0," + (max_count - 1) + "}");
       if (words > max_count) {
           var trimmed = $(this).val().match(re2);
           $(this).val(trimmed);
           $(this).next('#wordCount').html("0 Words remaining.");
       } else {
           $(this).next('#wordCount').html(max_count - words + " Words remaining.");
       }
   });
}).change();
</script>
<script>
 new FroalaEditor('textarea#froala-editor', {
   placeholderText: 'Article Content',
   wordCounter: true,
   wordCounterLabel: "words",
   wordCounterBbCode: false,
   wordCounterTimeout: 0,
 })
</script>
<script>
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

</script>
<?php include('footer.php') ?>
</body>
</html>
