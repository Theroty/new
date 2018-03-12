<?php if(!isset($_GET['norender'])) { ?>
<DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="./public/css/dropzone.css" type="text/css" rel="stylesheet" />
      <link href="./public/css/user/main.css" type="text/css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="./public/js/dropzone.js"></script>
    </head>
<body>
  <div class="footer">
  <ul class="nav">
    <li id="li_c1"><span class="glyphicon glyphicon-envelope">kovaisilver.com</span></li>
    <li id="li_c1">ALL RIGHTS RESERVED © KOVAI SILVER PVT. LTD.</li>
  </ul>
  </div>
  <nav class="navbar">
    <ul class="nav navbar-nav">
      <li><img id="logo_1" src="public/img/logo.png."></li>
      <li><a id="li" href='/kovai_silvers'><b>HOME</b></a></li>
      <li><a id="li" href='?controller=client&action=about'><b>ABOUT</b></a></li>
      <li><a id="li" href='#'><b>GALLERY</b></a></li>
      <li><a id="li" href='?controller=client&action=products'><b>PRODUCTS</b></a></li>
      <li><a id="li" href="?controller=posts&action=contact"><b>CONTACT</b></a></li>
      <li><img id="logo_2" src="public/img/bis.png"></li>
    </ul>
  </nav>

<?php } ?>
    <?php require_once('routes.php'); ?>
<?php if(!isset($_GET['norender'])) { ?>

</body>
</html>
<?php } ?>
