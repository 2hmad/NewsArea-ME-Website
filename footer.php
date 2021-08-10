<footer style="background-color: #e6e6e6;line-height: 1em;">
<div class="container" style="padding-top:5%">
<div class="row">

<div class="col-lg-4">
<span style="font-size:17px;font-weight:bold;display:block">Commercial Enquiries</span>
<p style="color:#181716;font-size:14px;padding-top:1rem;display:block">For all commercial enquiries related to NewsArea Middle East, please contact support@newsarea-me.com</p>
<span style="font-size:17px;font-weight:bold;display:block;margin-top: 10%;">Contact US</span>
<p style="color:#181716;font-size:14px;display:block;padding-top:1rem">Phone +20 12 75457 924</p>
<p style="color:#181716;font-size:14px;display:block">Alexandria Governorate, Egypt</p>
</div>

<div class="col-lg-4">
<span style="font-size:17px;font-weight:bold;display:block;">Company</span>
<a href="careers.php"><p style="color:#181716;font-size:14px;padding-top:1rem;display:block">Careers</p></a>
<a href="contact-us.php"><p style="color:#181716;font-size:14px;display:block">Contact Us</p></a>
<a href="mailto:support@newsarea-me.com"><p style="color:#181716;font-size:14px;display:block">Send Us Feedback</p></a>
<a href="#"><p style="color:#181716;font-size:14px;display:block">Staff</p></a>
<span style="font-size:17px;font-weight:bold;display:block;margin-top: 10%;">NewsArea Middle East Lists</span>
<a href="billionaires.php"><p style="color:#181716;font-size:14px;padding-top:1rem;display:block">Billionaires</p></a>
<a href="innovation.php"><p style="color:#181716;font-size:14px;display:block">Innovation</p></a>
<a href="leadership.php"><p style="color:#181716;font-size:14px;display:block">Leadership</p></a>
<a href="entrepreuner.php"><p style="color:#181716;font-size:14px;display:block">Entrepreneurs</p></a>
<a href="money.php"><p style="color:#181716;font-size:14px;display:block">Money</p></a>
<a href="business.php"><p style="color:#181716;font-size:14px;display:block">Business</p></a>
<a href="lifestyle.php"><p style="color:#181716;font-size:14px;display:block">Lifestyle</p></a>
<a href="events.php"><p style="color:#181716;font-size:14px;display:block">Events</p></a>
</div>

<div class="col-lg">
<span style="font-size:17px;font-weight:bold;display:block;margin-bottom:1rem">Get the magazine</span>
<?php
$sql = "SELECT * FROM magazine ORDER BY id DESC LIMIT 2";
$query = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_array($query)){
    $thumbnail = $row['thumbnail'];
    $filename = $row['file_name'];
    $size = $row['size'];
  echo "
  <div class='magazine-image'>
    <img src='data:image/jpeg;base64,".base64_encode($thumbnail)."' style='max-width:150px;height:200px;margin-right:5%'>
    <div class='overlay'><a href='magazines/$filename' style='position: relative;top: 40%;'><button class='btn btn-light'>View</button></a></div>
  </div>
  ";
}
?>
<span style="font-size:17px;font-weight:bold;display:block;margin-top: 10%;">NewsArea Global Sites</span>
<a href="#"><p style="color:#181716;font-size:14px;padding-top:1rem;display:block">NewsArea USA</p></a>
<a href="#"><p style="color:#181716;font-size:14px;display:block">NewsArea China</p></a>
<a href="#"><p style="color:#181716;font-size:14px;display:block">NewsArea France</p></a>
<a href="#"><p style="color:#181716;font-size:14px;display:block">NewsArea Japan</p></a>
<a href="#"><p style="color:#181716;font-size:14px;display:block">NewsArea Italy</p></a>
</div>

</div>
<br>
<div id="social-icons">
<a href="https://www.facebook.com/NewsAreaME" style="margin: 0px 0px 0px 10px;"><img src="pics/facebook-icon.png" style="max-width: 30px;"></a>
<a href="https://twitter.com/NewsAreaMe" style="margin: 0px 0px 0px 10px;"><img src="pics/twitter-icon.png" style="max-width: 30px;"></a>
<a href="#" style="margin: 0px 0px 0px 10px;"><img src="pics/linkedin-icon.png" style="max-width: 30px;"></a>
<a href="#" style="margin: 0px 0px 0px 10px;"><img src="pics/instagram-icon.png" style="max-width: 30px;"></a>
</div>
<p style="font-size: 13px;margin-top: 2%;">&copy; 2021 NewsArea Middle East. All Rights Reserved</p>
<p style="font-size: 13px;padding-bottom: 2%;">Designed & Developed By <a href="https://itgo-solutions.com" target="_blank">ITGO</a></p>
</div>
</footer>