
<?php
  header('Content-type: application/xml');
  $host = "us-cdbr-east-04.cleardb.com";
  $user = "b31560f908280d";
  $pass = "5ed34ffc";
  $db = "heroku_a92d341879b202a";
  $connect = mysqli_connect($host, $user, $pass, $db);
    
  $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
  echo $output;
?>
<url>
<loc>https://newsarea-me.com/</loc>
</url>
<url>
<loc>https://newsarea-me.com/index</loc>
</url>
<url>
<loc>https://newsarea-me.com/arab-entrepreuners</loc>
</url>
<url>
<loc>https://newsarea-me.com/world-entrepreuners</loc>
</url>
<url>
<loc>https://newsarea-me.com/innovation</loc>
</url>
<url>
<loc>https://newsarea-me.com/billionaires</loc>
</url>
<url>
<loc>https://newsarea-me.com/leadership</loc>
</url>
<url>
<loc>https://newsarea-me.com/money</loc>
</url>
<url>
<loc>https://newsarea-me.com/business</loc>
</url>
<url>
<loc>https://newsarea-me.com/lifestyle</loc>
</url>
<url>
<loc>https://newsarea-me.com/events</loc>
</url>
<url>
<loc>https://newsarea-me.com/articles</loc>
</url>
<url>
<loc>https://newsarea-me.com/latest</loc>
</url>
<url>
<loc>https://newsarea-me.com/careers</loc>
</url>
<url>
<loc>https://newsarea-me.com/contact-us</loc>
</url>
<url>
<loc>https://newsarea-me.com/entrepreuner</loc>
</url>

<?php
  $query = "SELECT title, id, date FROM articles";
    $result = mysqli_query($connect, $query);
    $res = array();
 
    while($resultSet = mysqli_fetch_assoc($result)) { 
 
 if(!empty($resultSet['title'])) {  
?>
<url>
  <loc><?php echo 'https://newsarea-me.com'.'/'.'article'.'?'.'id='.$resultSet['id']; ?></loc>
</url>
<?php }  } ?>
</urlset>