<?php if(!isset($_GET['norender'])) { ?>
<DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="./public/css/dropzone.css" type="text/css" rel="stylesheet" />
      <link href="./public/css/admin/main.css" type="text/css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="dist/simplePagination.css" />
      <script src="dist/jquery.simplePagination.js"></script>
      <script src="./public/js/dropzone.js"></script>
    </head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href='?controller=posts&action=category'>Category</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href='?controller=posts&action=user_detail'><span class="glyphicon glyphicon-user"></span> user</a></li>
          <li><a href = "logout.php">Sign Out</a></li>
        </ul>
      </div>
    </nav>
<?php } ?>
    <?php require_once('routes.php'); ?>
<?php if(!isset($_GET['norender'])) { ?>

    <div class="footer">
      Copyright
    </div>
  </body>
</html>
<?php } ?>
