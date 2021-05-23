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
    <li class="breadcrumb-item active" aria-current="page">Manage Articles</li>
  </ol>

<form method="POST">
  <div class="input-group" style="max-width: 300px;margin-right: auto;margin-left: auto;">    
    <input type="text" name="article-search" class="form-control" placeholder="Article Name" aria-label="Input group example" aria-describedby="btnGroupAddon">
    <button type="submit" name="article-search-button" class="input-group-text" id="btnGroupAddon" style="background:white;outline:none" target="_blank"><img src="../pics/search.png" style="max-width: 25px;"></button>
  </div>
</form>
<?php
if(isset($_POST['article-search-button'])) {
  $article_search = $_POST['article-search'];
  if($article_search !== "") {
    echo "<script type='text/javascript'>document.location.href='search-articles.php?title=$article_search'</script>";
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
        $sql = "SELECT * FROM articles WHERE visible = 1 ORDER BY id DESC";
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            $title = $row['title'];
            $date = $row['date'];
          $article_pic = $row['article_pic'];
            echo "
            <div class='col-lg-3' style='margin-bottom:2%'>
            <div class='card' style='padding: 15px;min-height: 408px'>
                <img src='../uploads/$article_pic' class='card-img-top' style='margin-bottom: 3%;'>
                <a href='../article.php?id=$id' target='_blank' style='color:black;'><h3 style='font-size: 1.1rem;display:block;'>$title</h3></a>
                <p style='color:#585858;margin-bottom:10%'>$date</p>
                <a href='edit-article.php?id=$id'><button class='btn btn-outline-dark' style='width: 100%;'>Edit</button></a>
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