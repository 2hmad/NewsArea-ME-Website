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
<!-- TradingView Widget END -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news" style="background:#131313">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center" style="font-weight: bold;">&nbsp;Breaking</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                  <?php
                  $sql = "SELECT * FROM articles WHERE visible = '1' ORDER BY id DESC";
                  $query = mysqli_query($connect, $sql);
                  while($row = mysqli_fetch_array($query)){
                    $id = $row['id'];
                    $user_id = $row['user_id'];
                    $title = $row['title'];
                    $short_desc = $row['short_desc'];
                    $category = $row['category'];
                    echo "<a href='article.php?id=$id' style='color:white'>$title</a> <span class='dot'></span>";
                  }
                  ?>
                </marquee>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top:5%">
    <a href="latest.php"><h3 style="color:#030633;font-weight:bold">Recently Added <img src="pics/right-arrow.png" style="max-width: 30px;"></h3></a>
    <br>
    <div class="row">
    <?php
  $sql = "SELECT * FROM articles WHERE visible > 0 ORDER BY id DESC LIMIT 1";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
        <img src='uploads/$pic_name' alt='$title' class='animated animatedFadeInUp fadeInUp' style='width:100%'>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
    }
  ?>
<div class="col-lg">
<?php
  $sql = "SELECT * FROM articles WHERE visible > 0 ORDER BY id DESC LIMIT 3";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id'";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
  }
  echo "
  <div class='row' style='margin-bottom:5%'>
  <a href='article.php?id=$id' style='color:black'>
    <div class='card' style='border: none'>
    <div class='row g-0'>
      <div class='col-md-5'>
        <img src='uploads/$pic_name' alt='$title' class='animated animatedFadeInUp fadeInUp' style='width:100%;display: block;'>
      </div>
      <div class='col'>
        <div class='card-body'>
          <p class='card-text' style='font-size: 1rem;display: inherit;margin: 0 0 0.4rem 0;'>$category</p>
            <h3 class='card-title' style='font-weight: bold;font-size: 1.1875rem'>$title</h3>
          
          <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
        </div>
      </div>
    </div>
    </div>
    </a>
  </div>
";

    }
  ?>
  </div>
    </div>

<script type="text/javascript">
	atOptions = {
		'key' : '4578c8378a4c3fe30e2ec8e45f3345b2',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformat.com/4578c8378a4c3fe30e2ec8e45f3345b2/invoke.js"></scr' + 'ipt>');
</script>

<a href="business.php"><h3 style="color:#030633;font-weight:bold">Business <img src="pics/right-arrow.png" style="max-width: 30px;"></h3></a>
    <br>
    <div class="row">
    <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Business' AND visible > 0) ORDER BY id DESC LIMIT 1";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];

  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%'>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        <p style='color: #6c757d!important;line-height: 135%;font-size: 1rem;'>$short_desc</p>
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
  }
  ?>
<div class="col-lg">
<?php
  $sql = "SELECT * FROM articles WHERE (category = 'Business' AND visible > 0) ORDER BY id DESC LIMIT 3";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id'";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
  }
  echo "
  <div class='row' style='margin-bottom:5%'>
  <a href='article.php?id=$id' style='color:black'>
    <div class='card' style='border: none'>
    <div class='row g-0'>
      <div class='col-md-5'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;display: block;'>
      </div>
      <div class='col'>
        <div class='card-body'>
          <p class='card-text' style='font-size: 1rem;display: inherit;margin: 0 0 0.4rem 0;'>$category</p>
            <h3 class='card-title' style='font-weight: bold;font-size: 1.1875rem'>$title</h3>
          
          <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
        </div>
      </div>
    </div>
    </div>
    </a>
  </div>
";

    }
  ?>
  </div>
    </div>

    

<a href="#"><h3 style="color:#030633;font-weight:bold">Innovation <img src="pics/right-arrow.png" style="max-width: 30px;"></h3></a>
    <br>
    <div class="row">
    <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Innovation' AND visible > 0 ) ORDER BY id DESC LIMIT 1";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];

  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%'>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        <p style='color: #6c757d!important;line-height: 135%;font-size: 1rem;'>$short_desc</p>
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
  }
  ?>
<div class="col-lg">
<?php
  $sql = "SELECT * FROM articles WHERE (category = 'Innovation' AND visible > 0) ORDER BY id DESC LIMIT 3";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];
  
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id'";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
  }
  echo "
  <div class='row' style='margin-bottom:5%'>
  <a href='article.php?id=$id' style='color:black'>
    <div class='card' style='border: none'>
    <div class='row g-0'>
      <div class='col-md-5'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;display: block;'>
      </div>
      <div class='col'>
        <div class='card-body'>
          <p class='card-text' style='font-size: 1rem;display: inherit;margin: 0 0 0.4rem 0;'>$category</p>
            <h3 class='card-title' style='font-weight: bold;font-size: 1.1875rem'>$title</h3>
          
          <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
        </div>
      </div>
    </div>
    </div>
    </a>
  </div>
";

    }
  ?>
  </div>
    </div>

    <a href="#"><h3 style="color:#030633;font-weight:bold;margin-top:7%">Most Popular <img src="pics/right-arrow.png" style="max-width: 30px;"></h3></a>
    <br>
    <div class="row">
        <div class="col-lg">
          <ol>
<?php
$sql = "SELECT * FROM articles WHERE visible > 0 ORDER BY views DESC LIMIT 5";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $title = $row['title'];
  $category = $row['category'];
  echo "<li style='border-bottom: 1px solid #CCC;padding: 15px;'><a href='article.php?id=$id' style='color:black'><h3 style='font-size: 1.375rem;font-weight:bold'>$title</h3></a><p style='color:#424242'>$category</p></li>";
}
?>
          </ol>
        </div>
    </div>

    

<a href="#"><h3 style="color:#030633;font-weight:bold">Money <img src="pics/right-arrow.png" style="max-width: 30px;"></h3></a>
    <br>
    <div class="row" style="margin-bottom:5%">
    <?php
  $sql = "SELECT * FROM articles WHERE (category = 'Money' AND visible > 0 ) ORDER BY id DESC LIMIT 1";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];

  $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
    }
    echo "
    <div class='col-lg' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%'>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        <p style='color: #6c757d!important;line-height: 135%;font-size: 1rem;'>$short_desc</p>
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
  }
  ?>
<div class="col-lg">
<?php
  $sql = "SELECT * FROM articles WHERE (category = 'Money' AND visible > 0) ORDER BY id DESC LIMIT 3";
  $query = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $user_id = $row['user_id'];
  $title = $row['title'];
  $short_desc = $row['short_desc'];
  $category = $row['category'];
$pic_name = $row['pic_name'];
  
  $sql_author = "SELECT * FROM editors WHERE id = '$user_id'";
  $query_author = mysqli_query($connect, $sql_author);
  while ($row_author = mysqli_fetch_array($query_author)){
  $author = $row_author['name'];
  $profile_pic = $row_author['profile_pic'];
  }
  echo "
  <div class='row' style='margin-bottom:5%'>
  <a href='article.php?id=$id' style='color:black'>
    <div class='card' style='border: none'>
    <div class='row g-0'>
      <div class='col-md-5'>
        <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;display: block;'>
      </div>
      <div class='col'>
        <div class='card-body'>
          <p class='card-text' style='font-size: 1rem;display: inherit;margin: 0 0 0.4rem 0;'>$category</p>
            <h3 class='card-title' style='font-weight: bold;font-size: 1.1875rem'>$title</h3>
          
          <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64,".base64_encode($profile_pic)."' alt='$author' style='width:40px;height:40px;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
        </div>
      </div>
    </div>
    </div>
    </a>
  </div>
";
    }
  ?>
  </div>
    </div>
</div>

<?php include('footer.php') ?>
<?php include('scripts.php') ?>
</body>
</html>