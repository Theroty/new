<div class="container" style="margin-top:70px">
  <center><div class="row">
<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
         echo '<div style="margin-top:50px; margin-left:30px;"><h4>Hi- '.$_SESSION["username"].'</h4>';

    }
    else
    {
         header("location:admin.php");
    }
   require_once('views/layout.php');
?>
  </div></center>
</div>
