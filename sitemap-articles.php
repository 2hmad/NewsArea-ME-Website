<?php
  header('Content-type: application/xml');
  $host = "localhost";
  $user = "xkshetzj_newsarea-admins";
  $pass = "NewsAreaMiddleEast1";
  $db = "xkshetzj_newsarea";
  $connect = mysqli_connect($host, $user, $pass, $db);
    
  $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";
  echo $output;
?>
  <?php
  $query = "SELECT title, id, date FROM articles";
    $result = mysqli_query($connect, $query);
    $res = array();
 
    while($resultSet = mysqli_fetch_assoc($result)) { 
 
 if(!empty($resultSet['title'])) {
  $originalDate = $resultSet['date'];
  $newDate = date("Y-m-d", strtotime($originalDate));
  
?>
 
<url>
  <loc><?php echo 'https://newsarea-me.com'.'/'.'article'.'?'.'id='.$resultSet['id']; ?></loc>
  <news:news>
        <news:publication>
           <news:name><?php echo $resultSet['title'] ?></news:name>
           <news:language>en</news:language>
        </news:publication>
        <news:publication_date><?php echo "$newDate" ?></news:publication_date>
        <news:title><?php echo $resultSet['title'] ?></news:title>
  </news:news>

</url>
<?php }  } ?>
</urlset>