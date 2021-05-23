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
    .formFooter {
      display: none!important;
    }
    iframe[src*="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d218359.68446570143!2d30.09462878113923!3d31.224328918288357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c49126710fd3%3A0xb4e0cda629ee6bb9!2z2KfZhNil2LPZg9mG2K_YsdmK2Kk!5e0!3m2!1sar!2seg!4v1610121131686!5m2!1sar!2seg"] {
      display: block!important;
      max-width: 100%;
    }
    </style>
</head>
<body>
<?php include('navbar.php') ?>
<br>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php" style="color:black">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
  </ol>
</nav>
<br><br>
<div class="row">
    <div class="col-lg-5" style="margin-bottom: 5%;">
        <form method="post">
            <input type="text" name="name-contacter" placeholder="Full Name" style="width: 100%;border: 1px solid #CCC;padding: 10px;border-radius: 5px;outline: none;display:block;margin-bottom:5%" required>
            <input type="text" name="email-contacter" placeholder="Email Address" style="width: 100%;border: 1px solid #CCC;padding: 10px;border-radius: 5px;outline: none;display:block;margin-bottom:5%" required>
            <input type="text" name="phone-contacter" placeholder="Your Phone" style="width: 100%;border: 1px solid #CCC;padding: 10px;border-radius: 5px;outline: none;display:block;margin-bottom:5%" required>
            <select name="subject-contacter" placeholder="Choose" style="width: 100%;border: 1px solid #CCC;padding: 10px;border-radius: 5px;outline: none;display:block;margin-bottom:5%" required>
            <option value="" disabled selected hidden>Choose a topic</option>
              <option>Problem</option>
              <option>Questions</option>
            </select>
            <textarea name="message" placeholder="Your Message" style="height: 150px;width: 100%;border: 1px solid #CCC;padding: 10px;border-radius: 5px;outline: none;display:block;margin-bottom:5%" required></textarea>
            <div class="g-recaptcha" data-sitekey="6Ldq6SUaAAAAAFm6-M9vbWNeytjIxPpdo9p2s9H4"></div>
            <br/>
            <input type="submit" name="submit-ticket" value="Submit" id="submit-ticket">
        </form>
    </div>
    <div class="col-lg">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d218359.68446570143!2d30.09462878113923!3d31.224328918288357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c49126710fd3%3A0xb4e0cda629ee6bb9!2z2KfZhNil2LPZg9mG2K_YsdmK2Kk!5e0!3m2!1sar!2seg!4v1610121131686!5m2!1sar!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <br>
      <h3 style="font-weight: bold;font-size: 1.5rem;margin-top: 4%;line-height: 2em;">Egypt</h3>
      <p style="color: #545454;font-size: 1.1rem;">Alexandria Government - Egypt</p>
    </div>
</div>
<br><br>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php include('footer.php') ?>
<?php include('scripts.php') ?>
</body>
</html>