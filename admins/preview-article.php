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
    <li class="breadcrumb-item"><a href="review-article.php" style="color:black">Pending Articles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Preview Article</li>
  </ol>
</nav>
<br><br>
<div class="row">
    <div class="col-lg-8" style="margin-left: auto;margin-right: auto;">
        <div class="card" style="padding:10px">
        <?php
        if(empty($_SESSION['email'])){
          echo "<script type='text/javascript'>document.location.href='index.php';</script>";
        }        
          $id = $_GET['id'];
          $sql = "SELECT * FROM articles WHERE (id = $id AND visible = 0)";
          $query = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($query)) {
            $user_id = $row['user_id'];
            $title = $row['title'];
            $short_desc = $row['short_desc'];
            $long_desc = $row['long_desc'];
            $category = $row['category'];
            $article_pic = $row['article_pic'];
            $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
            $query_author = mysqli_query($connect, $sql_author);
            while ($row_author = mysqli_fetch_array($query_author)){
            $author = $row_author['name'];
            $profile_pic = $row_author['profile_pic'];
            $role = $row_author['role'];
              }
            echo "
            <div style='height: 570px;'>
              <img src='data:image/jpeg;base64,".base64_encode($article_pic)."' class='animated animatedFadeInUp fadeInUp card-img-top' alt='$title' style='width: 100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'>
            </div>
            <span class='badge bg-dark' style='font-size: 14px;margin-top:1%;width:113px'>$category</span>
            <h3 style='font-size: 1.7rem;font-weight: bold;'>$title</h3>
            <a href='../profile.php?id=$user_id' style='color:black'><p style='margin-top:2%;color:#424242'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' style='max-width: 50px;height:50px;border-radius:50%'> <strong>$author</strong> <span style='font-size: 12px;'>NewsArea ME Editor</span></p></a>
            <div class='sharethis-inline-share-buttons' style='margin-bottom:3%'></div>
            <div style='line-height: 2.1em;font-size: 18px;word-wrap: break-word;margin-bottom:3%'>$long_desc</div>
          ";
          }
            ?>
            <form method='POST' style="margin-left: auto;margin-right:auto">

                <input type='button' name='accept-article' class='btn btn-success' data-bs-toggle="modal" data-bs-target="#acceptModal" value='Accept Article'>

                <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="acceptModalLabel">Accept ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="confirm-accept" class="btn btn-primary">Confirm</button>
                    </div>
                    </div>
                </div>
                </div>

                <input type='button' name='refuse-article' class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#refuseModal" value='Reject Article'>

                <div class="modal fade" id="refuseModal" tabindex="-1" aria-labelledby="refuseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="refuseModalLabel">Refuse ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="confirm-accept" class="btn btn-primary">Confirm</button>
                    </div>
                    </div>
                </div>
                </div>
<?php
if(isset($_POST['confirm-accept'])){
    $sql = "DELETE FROM articles WHERE id=$id";
    $query = mysqli_query($connect, $sql);
    echo "<script>window.close();</script>";
}
?>
<?php
if(isset($_POST['refuse-accept'])){
    $sql = "UPDATE articles SET visible=1 WHERE id=$id";
    $query = mysqli_query($connect, $sql);
    echo "<script>window.close();</script>";
}

?>
            </form>
          <br><br>
        </div>
    </div>
</div>
</div>
</div>
<br><br>
<?php include('scripts.php') ?>
</body>
</html>