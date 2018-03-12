<?php
  class PagesController {
    public function home() {
      require_once('views/pages/main.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
