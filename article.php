<html>

<head>
  <title><?php
          include('connection.php');
          $id = $_GET['id'];
          $sql = "SELECT * FROM articles WHERE (id = $id AND visible > 0)";
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $title = mysqli_real_escape_string($connect, $row['title']);
            $cover = $row['article_pic'];
            $pic_name = $row['pic_name'];
            $short_desc = mysqli_real_escape_string($connect, $row['short_desc']);
            $long_desc = mysqli_real_escape_string($connect, $row['long_desc']);
            echo $title;
          }
          ?></title>
  <meta property="og:image" content="<?php echo 'uploads/' . $pic_name ?>" />
  <meta name="robots" content="all">
  <meta name="author" content="<?php echo $title; ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="application-name" content="">
  <meta name="generator" content="Codux">
  <meta name="rating" content="General">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#131313">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
  <meta name="apple-mobile-web-app-title" content="">
  <meta name="msapplication-tooltip" content="">
  <meta name="msapplication-starturl" content="/">
  <meta name="msapplication-TileColor" content="#fff">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta name="full-screen" content="yes">
  <meta name="title" content="<?php echo $title; ?>">
  <meta name="twitter:title" content="<?php echo $title; ?>">
  <meta property="og:title" content="<?php echo $title; ?>">
  <meta name="keywords" content="newsarea,newsarea middle east,middle east">
  <meta name="description" content="<?php echo "$short_desc"; ?>">
  <meta name="twitter:description" content="<?php echo $short_desc; ?>">
  <meta property="og:description" content="<?php echo $short_desc; ?>">
  <meta property="og:site_name" content="NewsArea ME">
  <meta itemprop="image" content="<?php echo 'https://newsarea-me.com/uploads/' . $pic_name ?>">
  <meta name="twitter:image:src" content="<?php echo 'https://newsarea-me.com/uploads/' . $pic_name ?>">
  <meta property="og:image" content="<?php echo 'https://newsarea-me.com/uploads/' . $pic_name ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:type" content="article">
  <meta property="article:section" content="news">
  <meta name="twitter:data1" content="news">
  <meta name="twitter:label1" content="section">
  <meta property="og:url" content="<?php echo 'https://newsarea-me.com/article.php?id=' . $id ?>">
  <meta name="theme-color" content="#fff">
  <link rel="stylesheet" href="css/style.scss">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="pics/icon-name.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://www.jqueryscript.net/demo/Mobile-friendly-News-Ticker-with-jQuery-CSS3-Responsive-Ticker/ticker.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <?php include('connection.php') ?>
  <link rel="stylesheet" href="css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=PT+Serif&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
  <meta charset="ISO-8859-1">
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ffbaa2d4c4dcc0018f144e9&product=inline-share-buttons" async="async"></script>
</head>

<body>
  <?php include('navbar.php') ?>
  <!-- TradingView Widget BEGIN -->
  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Quotes</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
      {
        "symbols": [{
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
        <li class="breadcrumb-item active" aria-current="page">Article Preview</li>
      </ol>
    </nav>
    <div class="row">

      <div class="col-lg-8">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM articles WHERE (id = $id AND visible > 0)";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
          $id = $row['id'];
          $user_id = $row['user_id'];
          $title = $row['title'];
          $short_desc = $row['short_desc'];
          $long_desc = $row['long_desc'];
          $category = $row['category'];
          $pic_name = $row['pic_name'];
          $pic_name = $row['pic_name'];
          $views = $row['views'];
          $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
          $query_author = mysqli_query($connect, $sql_author);
          while ($row_author = mysqli_fetch_array($query_author)) {
            $author = $row_author['name'];
            $profile_pic = $row_author['profile_pic'];
            $role = $row_author['role'];
          }
          echo "
            <div class='big-card-article' style='height: 422px;'>
              <img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width: 100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'>
            </div>
            <span class='badge bg-dark' style='font-size: 14px;margin-top:3%;margin-bottom:2%'>$category</span>
            <h1 style='font-size: 1.7rem;font-weight: bold;'>$title</h1>
            <p style='color:#737373'>$short_desc</p>
            <a href='profile.php?id=$user_id' style='color:black'><p style='margin-top:2%;color:#424242'><img src='data:image/jpeg;base64," . base64_encode($profile_pic) . "' style='width: 50px;height:50px;object-fit: cover;border-radius:50%'> <strong>$author</strong> <span style='font-size: 12px;'>NewsArea ME Editor</span></p></a>
            <div class='sharethis-inline-share-buttons' style='margin-bottom:3%'></div>
            <div style='line-height: 2.1em;font-size: 18px;word-wrap: break-word;border-bottom:1px solid #CCC;margin-bottom:3%'>$long_desc</div>
              
              <div><a href='profile.php?id=$user_id' style='color:black;'>
                <img src='data:image/jpeg;base64," . base64_encode($profile_pic) . "' style='margin-right:2%;float:left;width: 90px;height:90px;object-fit: cover;border-radius:50%'> 
                <strong style='display:block;margin-top: 5%;font-size: 1.2em;'>$author</strong>
                <span style='font-size: 15px;'>$role</span>
              </a></div>
          ";
        }
        ?>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM articles WHERE id = $id";
        $query = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_array($query)) {
          $views = $row['views'] + 1;
        }
        $query_views = mysqli_query($connect, "UPDATE articles SET views = $views WHERE id = $id");
        ?>
      </div>
      <div class="col-lg">
        <ul class="latest-articles">
          <h3>Recent Articles</h3><br>
          <?php
          $sql = "SELECT * FROM articles WHERE category = '$category' ORDER BY id DESC LIMIT 4";
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $title = $row['title'];
            if ($row > 0) {
              echo "
                        <li style='border-bottom: 1px solid #CCC;padding: 10px;'>
                          <a href='article.php?id=$id' style='color:black;'>
                            <h3 style='font-weight:bold;font-size: 1.3rem;font-weight: bold;'>$title</h3>
                          </a>
                        </li>
                      ";
            } else {
              echo "No Recent Articles";
            }
          }
          ?>
        </ul>

        <script type="text/javascript">
          atOptions = {
            'key': '720872ddd164615db30af254fd62710c',
            'format': 'iframe',
            'height': 250,
            'width': 300,
            'params': {}
          };
          document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.effectivedisplayformat.com/720872ddd164615db30af254fd62710c/invoke.js"></scr' + 'ipt>');
        </script>
      </div>
    </div>
    <h4 style="margin-top: 11%;font-weight:bold">Releated Articles</h4>
    <div class="row">
      <?php
      $sql = "SELECT * FROM articles WHERE (category = '$category' AND visible > 0) ORDER BY id DESC LIMIT 3";
      $query = mysqli_query($connect, $sql);
      while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $user_id = $row['user_id'];
        $title = $row['title'];
        $short_desc = $row['short_desc'];
        $category = $row['category'];
        $pic_name = $row['pic_name'];
        $sql_author = "SELECT * FROM editors WHERE id = '$user_id' LIMIT 1";
        $query_author = mysqli_query($connect, $sql_author);
        while ($row_author = mysqli_fetch_array($query_author)) {
          $author = $row_author['name'];
          $profile_pic = $row_author['profile_pic'];
        }
        echo "
    <div class='col-lg-4' style='margin-bottom:5%'>
    <a href='article.php?id=$id'>
      <div style='width: 100%;height: 262px;'><img src='uploads/$pic_name' class='animated animatedFadeInUp fadeInUp' alt='$title' style='width:100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;'></div>
        <span class='badge bg-dark' style='font-size: 14px;margin-top:1%'>$category</span>
        <p style='color:black;font-weight:bold;font-size: 1.2rem;'>$title</p>
        <p class='card-text' style='color: #6c757d!important'><img src='data:image/jpeg;base64," . base64_encode($profile_pic) . "' alt='$author' style='width:40px;height:40px;object-fit: cover;object-fit: cover;border-radius:50%'> By <small class='text-muted' style='color:black !important;font-weight:bold'>$author</small></p>
    </a>
    </div>
    ";
      }
      ?>
    </div>
    <br><br>
  </div>
  <?php include('footer.php') ?>
  <?php include('scripts.php') ?>
</body>

</html>