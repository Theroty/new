<?php
  class ClientController {
    public function home() {
      require_once('views/pages/home.php');
    }

    public function about() {
      require_once('views/client/about.php');
    }

    public function products(){
      $category = Client::category_list();
      require_once('views/client/products.php');
    }

    public function show_product(){
      if (!isset($_GET['Id']))
          $id = $_GET['id'];
      if (!isset($_GET['Name']))
        return call('pages', 'error');
        $Name = $_GET['Name'];
      $product = Client::find1($_GET['Name']);
        require_once('views/client/show_product.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>
