<!DOCTYPE html>
<html>
<head>
    <title>NewsArea Middle East</title>
    <?php include('links.php') ?>
    <style>
    ol {
      list-style-type: upper-roman;
    }
    li::marker {
      font-size: 2rem;
      color: #e0e0e0;
      line-height: 135%;
      font-style: italic
    }
    </style>
</head>
<body>
<?php include('navbar.php') ?>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Quotes</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
  {
  "symbols": [
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "BTC/USD"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "ETH/USD"
    },
    {
      "description": "EGP/USD",
      "proName": "USD/FX_IDC:EGPUSD"
    }
  ],
  "colorTheme": "dark",
  "isTransparent": false,
  "showSymbolLogo": false,
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END --><br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php" style="color:black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Arab Entrepreneurs</li>
  </ol>
</nav>
<div class="row">
    <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Arab Entrepreneurs' AND visible > 0) ORDER BY id DESC LIMIT 1";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$article_pic = $row['article_pic'];
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
      <div class='big-card-article' style='width: 775px;height: 422px;'><img src='uploads/$article_pic' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'></div>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
    }
  ?>
        <div class="col-lg">
            <ul class="latest-articles">
                <h3>Recent Articles</h3><br>
                <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Arab Entrepreneurs' AND visible > 0) ORDER BY id DESC LIMIT 4";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $title = $row['title'];
    echo "
    <li style='border-bottom: 1px solid #CCC;padding: 10px;'><a href='article.php?id=$id' style='color:black;'><h3 style='font-weight:bold;font-size: 1.3rem;font-weight: bold;'>$title</h3></a></li>
    ";
    }
  ?>

            </ul>
        </div>
    </div>
    <br><br>
    <div class="row">
    <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Arab Entrepreneurs' AND visible > 0) ORDER BY id DESC";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$article_pic = $row['article_pic'];
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg-4' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
      <div style='width: 100%;height: 262px;'><img src='uploads/$article_pic' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'></div>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
    }
  ?>

    </div>
</div>
<?php include('scripts.php') ?>
<?php include('footer.php') ?>
</body>
</html>