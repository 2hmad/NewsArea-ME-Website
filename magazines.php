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
    <li class="breadcrumb-item active" aria-current="page">Magazines</li>
  </ol>
</nav>
<br><br>
    <div class="row">
<?php
$sql = "SELECT * FROM magazine ORDER BY id DESC";
$query = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($query)){
    $id = $row['id'];
    $title = $row['title'];
    $thumbnail = $row['thumbnail'];
    $filename = $row['file_name'];
    $size = $row['size'];
    $date = $row['date_publish'];
  echo "
  <div class='col-lg-2' style='text-align: center;margin-bottom:2%'>
  <div class='magazine-image'>
    <img src='data:image/jpeg;base64,".base64_encode($thumbnail)."' width='100%'>
    <div class='overlay'><a href='magazines/$filename' style='position: relative;top: 40%;'><button class='btn btn-light'>View Magazine</button></a></div>
  </div>
  <h4 style='font-weight:bold;font-size: 1.2em;margin-top: 10%;'>$title</h4>
  <p>$date</p>
  </div>
  ";
}
?>
    </div>
    <br><br>
</div>
<?php include('scripts.php') ?>
<?php include('footer.php') ?>
</body>
</html>