<?php
 session_start();
 $host = "localhost";
 $username = "sarathi";
 $password = "sarathi";
 $database = "php_mvc";
 $message = "";
 try
 {
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["login"]))
      {
           if(empty($_POST["username"]) || empty($_POST["password"]))
           {
                $message = '<div class="alert alert-info">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Info!</strong> All fields are required.
                            </div>';
           }
           else
           {
                $query = "SELECT * FROM login WHERE username = :username AND password = :password";
                $statement = $connect->prepare($query);
                $statement->execute(
                     array(
                          'username'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["username"] = $_POST["username"];
                     header("location:index1.php");
                }
                else
                {
                     $message = '<div class="alert alert-warning alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Warning!</strong> User Name or Password or Invalied.
                                 </div>';
                }
           }
      }
 }
 catch(PDOException $error)
 {
      $message = $error->getMessage();
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Admin Kovai silvers </title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <style>
      .form{
        margin-top: 100px;
        width: 700px;
        background-color: #F5F5F5;
        box-shadow: 0 9px 20px 0 rgba(0, 0, 0, 0.5), 0 9px 40px 0 rgba(0, 0, 0, 0.5);
        padding-bottom: 10px;
        border-radius: 6px;
      }
      </style>
      <body>

           <div class="container form" style="width:500px;">
                <?php
                if(isset($message))
                {
                     echo '<label class="text-danger">'.$message.'</label>';
                }
                ?>
                <h3 align="center">Admin Login</h3><hr>
                <form method="post">
                     <label>Username</label>
                     <input type="text" name="username" class="form-control" />
                     <br />
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" />
                     <br />
                     <input type="submit" name="login" class="btn btn-info form-control" value="Login" />
                </form>
           </div>
           <br />
      </body>
 </html>
