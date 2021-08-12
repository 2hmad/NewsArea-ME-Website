<?php
 header("Content-Type: application/rss+xml; charset=ISO-8859-1");
  include ('connection.php');    
  $output1 = '<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">' . "\n";
  echo $output1;
?>
<?php
  $output0 = '<channel>' . "\n";
  echo $output0;
?>
<title>
<![CDATA[ Latest News - NewsArea Middle East ]]>
</title>
<description>
<![CDATA[ NewsArea Middle East – a vital source for the region’s latest business and financial news and analysis, with a focus on investing, technology, entrepreneurship, leadership and lifestyle. ]]>
</description>
<link>https://ar.newsarea-me.com/latest</link>
<image>
<url>https://ar.newsarea-me.com/pics/icon-name.jpg</url>
<title>Latest News - NewsArea Middle East</title>
<link>https://ar.newsarea-me.com/latest</link>
</image>
<generator>https://newsarea-me.com</generator>
<lastBuildDate>Thu, 28 Jan 2021 20:46:14 GMT</lastBuildDate>
<language>
<![CDATA[ en ]]>
</language>

  <?php
  $query = "SELECT * FROM articles ORDER BY id DESC";
    $result = mysqli_query($connect, $query);
    $res = array();
 
    while($resultSet = mysqli_fetch_assoc($result)) { 
 
 if(!empty($resultSet['title'])) {
  $originalDate = $resultSet['date'];
  $newDate = date("Y-m-d", strtotime($originalDate));
  
?>

    <item>
      <title><?php echo $resultSet['title'] ?></title>
      <description>
        <![CDATA[ <div><img src="https://ar.newsarea-me.com/uploads/<?php echo $resultSet['pic_name'] ?>" style="width: 100%;"><div><?php echo $resultSet['short_desc'] ?></div></div> ]]>
      </description>
      <link><?php echo 'https://ar.newsarea-me.com'.'/'.'article'.'/'.$resultSet['id']; ?></link>
      <dc:creator>NewsArea Staff</dc:creator>
      <media:content medium="image" url="https://ar.newsarea-me.com/uploads/<?php echo $resultSet['pic_name'] ?>"/>
    </item>

<?php }  } ?>

<?php
echo "</channel>";
?>
</rss>