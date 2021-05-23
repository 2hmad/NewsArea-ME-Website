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
    <li class="breadcrumb-item active" aria-current="page">Podcasts</li>
  </ol>
</nav>
    <div class="row">
        <div class="col-lg">
            <a href="#" style="color:black">
            <div class="big-card-article" style="width: 775px;height: 422px;"><img src="pics/test-billioners.jpeg" style="width: 100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;"></div>
            <p style="margin-top:2%;color:#424242">Billionaires</p>
            <h3 style="font-size: 1.7rem;font-weight: bold;">No, Musk Is Not The Richest Person In The World - Yet</h3>
            <p style="margin-top:2%;color:#424242">By <strong>Ahmed Mohamed Ibrahim</strong> <span style="font-size: 12px;">NewsArea ME Staff</span></p>
            </a>
        </div>
        <div class="col-lg">
            <ul class="latest-articles">
                <h3>Recent Articles</h3><br>
                <li style="border-bottom: 1px solid #CCC;padding: 10px;"><a href="#" style="color:black;"><h3 style="font-weight:bold;font-size: 1.3rem;font-weight: bold;">No, Musk Is Not The Richest Person In The World - Yet</h3></a></li>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-4">
            <a href="#" style="color:black">
            <div style="width: 100%;height: 262px;"><img src="pics/test-billioners.jpeg" style="width: 100%;height: 100%;object-fit: cover;object-position: center;transition: 1s all ease-in-out;"></div>
            <p style="margin-top:2%;color:#424242">Billionaires</p>
            <h3 style="font-size: 1.7rem;font-weight: bold;">No, Musk Is Not The Richest Person In The World - Yet</h3>
            <p style="margin-top:2%;color:#424242">By <strong>Ahmed Mohamed Ibrahim</strong> <span style="font-size: 12px;">NewsArea ME Staff</span></p>
            </a>
        </div>
    </div>
</div>
<?php include('scripts.php') ?>
<?php include('footer.php') ?>
</body>
</html>