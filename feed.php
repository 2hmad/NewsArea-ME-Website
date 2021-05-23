<?php
 header("Content-Type: application/rss+xml; charset=ISO-8859-1");
  $host = "localhost";
  $user = "xkshetzj_newsarea-admins";
  $pass = "NewsAreaMiddleEast1";
  $db = "xkshetzj_newsarea";
  $connect = mysqli_connect($host, $user, $pass, $db);
    
  $output1 = '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"' . "\n";
  $output2 = '      xmlns:content="http://purl.org/rss/1.0/modules/content/"' . "\n";
  $output3 = '      xmlns:wfw="http://wellformedweb.org/CommentAPI/"' . "\n";
  $output4 = '      xmlns:dc="http://purl.org/dc/elements/1.1/"' . "\n";
  $output5 = '      xmlns:atom="http://www.w3.org/2005/Atom"' . "\n";
  $output6 = '      xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"' . "\n";
  $output7 = '      xmlns:slash="http://purl.org/rss/1.0/modules/slash/"' . "\n";
  $output8 = '      xmlns:georss="http://www.georss.org/georss"' . "\n";
  $output9 = '      xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#"' . "\n";
  $output10 = '     >' . "\n";
  echo $output1;
  echo $output2;
  echo $output3;
  echo $output4;
  echo $output5;
  echo $output6;
  echo $output7;
  echo $output8;
  echo $output9;
  echo $output10;
?>
<?php
  $output0 = '<channel>' . "\n";
  $output1 = '<title>Latest News</title>' . "\n";
  $output2 = '<atom:link href="https://newsarea-me.com/feed/" rel="self" type="application/rss+xml" />' . "\n";
  $output3 = '<link>https://newsarea-me.com</link>' . "\n";
  $output4 = '<description>This section contain all latest news in NewsArea Middle East</description>' . "\n";
  $output5 = '<language>en-US</language>' . "\n";
  $output6 = '<sy:updatePeriod>hourly</sy:updatePeriod>' . "\n";
  $output7 = '<sy:updateFrequency>1</sy:updateFrequency>' . "\n";
  $output8 = '<generator>https://newsarea-me.com</generator>';
  echo $output0;
  echo $output1;
  echo $output2;
  echo $output3;
  echo $output4;
  echo $output5;
  echo $output6;
  echo $output7;
  echo $output8;
?>

  <?php
  $query = "SELECT * FROM articles";
    $result = mysqli_query($connect, $query);
    $res = array();
 
    while($resultSet = mysqli_fetch_assoc($result)) { 
 
 if(!empty($resultSet['title'])) {
  $originalDate = $resultSet['date'];
  $newDate = date("Y-m-d", strtotime($originalDate));
  
?>

    <item>
      <title><?php echo $resultSet['title'] ?></title>
      <link><?php echo 'https://newsarea-me.com'.'/'.'article'.'?'.'id='.$resultSet['id']; ?></link>
      <pubDate><?php echo "$newDate" ?></pubDate>
      <dc:creator>NewsArea Staff</dc:creator>
      <category><![CDATA[World Entrepreneurs]]></category>
      <description>![CDATA[<img src="https://newsarea-me.com/uploads/<?php echo $resultSet['article_pic'] ?>" class="animated animatedFadeInUp fadeInUp" alt="<?php echo $resultSet['title'] ?>"><?php echo $resultSet['short_desc'] ?>]]></description>
    </item>

<?php }  } ?>

<?php
echo "</channel>";
?>
 </rss>