<?php
  class PostsController {

      public function user_detail(){
        $users = User::user_detail();
        require_once('views/posts/user_details.php');
      }

      public function adduser() {
        require_once('views/posts/adduser.php');
      }

      public function user(){
        if(isset($_POST['Submit'])) {
          $Name = $_POST['username'];
          $Password = $_POST['password'];
          $user = Post::user($_POST['username'], $_POST['password']);
      }
      require_once('views/posts/add_result.php');
    }

    public function delete_user(){
      if (!isset($_GET['id']))
        return call('pages', 'error');
        $Name = $_GET['id'];
      // we use the given id to get the right post
      $cate = User::delete_user($_GET['id']);
      require_once('views/posts/delete.php');
    }

    public function category() {
      // we store all the posts in a variable
      $category = Post::all();
      $products =Product::product_count();
      require_once('views/posts/category.php');
    }



    public function add(){

      require_once('views/posts/add.php');
    }

    public function add_category(){
      $ds          = DIRECTORY_SEPARATOR;
      $storeFolder = 'uploads';
       //6
      if(isset($_POST['Submit'])) {
        if (!empty($_FILES)) {
          $tempFile = $_FILES['file']['tmp_name'];          //3
          $targetPath = dirname( __FILE__ ).$ds.$storeFolder.$ds;  //4
          $targetFile =  $targetPath.$_FILES['file']['name'];  //5
          $fileName = $_FILES['file']['name'];
          move_uploaded_file($tempFile,$targetFile);
        $Name = $_POST['Name'];
        $Description = $_POST['Description'];
        $SEO_Title = $_POST['SEO_Title'];
        $SEO_Description = $_POST['SEO_Description'];
        $SEO_Keywords = $_POST['SEO_Keywords'];
        $cate = Post::add_category($_POST['Name'], $_POST['Description'],$fileName, $_POST['SEO_Title'], $_POST['SEO_Description'], $_POST['SEO_Keywords']);
        }
      }
      require_once('views/posts/add_result.php');
    }




    public function edit_category(){
      if (!isset($_GET['id']))
        return call('pages', 'error');
        $id = $_GET['id'];
        require_once('views/posts/edit.php');
        }

    public function update_category(){
      if (!isset($_GET['id']))
        return call('pages', 'error');
        $id = $_GET['id'] ;
      $ds          = DIRECTORY_SEPARATOR;
      $storeFolder = 'uploads';
      if(isset($_POST['Submit'])) {
          if (!empty($_FILES)) {
          $tempFile = $_FILES['file']['tmp_name'];          //3
          $targetPath = dirname( __FILE__ ).$ds.$storeFolder.$ds;  //4
          $targetFile =  $targetPath.$_FILES['file']['name'];  //5
          $fileName = $_FILES['file']['name'];
          move_uploaded_file($tempFile,$targetFile);
          $Name = $_POST['Name'];
          $Description = $_POST['Description'];
          $SEO_Title = $_POST['SEO_Title'];
          $SEO_Description = $_POST['SEO_Description'];
          $SEO_Keywords = $_POST['SEO_Keywords'];
          $cate = Post::update_category($id, $_POST['Name'], $_POST['Description'],$fileName, $_POST['SEO_Title'], $_POST['SEO_Description'], $_POST['SEO_Keywords']);
        }
      }
    require_once('views/posts/add_result.php');
    }


    public function delete_category(){
      if (!isset($_GET['Name']))
        return call('pages', 'error');
        $Name = $_GET['Name'];
      // we use the given id to get the right post
      $cate = Post::delete_category($_GET['Name']);
      require_once('views/posts/delete.php');
    }



    //products controller//

    public function product() {
      // we store all the posts in a variable
      $category = Post::all();
      require_once('views/posts/product.php');
    }

    public function show_product(){
      if (!isset($_GET['Id']))
          $id = $_GET['id'];
      if (!isset($_GET['Name']))
        return call('pages', 'error');
        $Name = $_GET['Name'];
      // we use the given id to get the right post
      $product = Post::find1($_GET['Name']);
        require_once('views/posts/show_product.php');
    }



    public function add1(){
      if (!isset($_GET['Name']))
        return call('pages', 'error');
        $Name = $_GET['Name'];
        require_once('views/posts/add1.php');
    }



  public function product_upload(){
    if (!isset($_GET['Name']))
      return call('pages', 'error');
    $ds          = DIRECTORY_SEPARATOR;
    $storeFolder = 'uploads';
    if (!empty($_FILES)) {
      $tempFile = $_FILES['file']['tmp_name'];          //3
      $targetPath = dirname( __FILE__ ).$ds.$storeFolder.$ds;  //4
      $targetFile =  $targetPath.$_FILES['file']['name'];  //5
      $fileName = $_FILES['file']['name'];
      move_uploaded_file($tempFile,$targetFile); //6

      $prd = Post::product_upload($fileName, $_POST['category']);
    }
      //require_once('views/posts/show_product.php');
    }

    public function edit_product(){
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $prd = Post::edit_product($_GET['id']);
      require_once('views/posts/edit.php');
    }

    public function update_product(){
      if (!isset($_GET['Name']))
        return call('pages', 'error');
      $id= $_GET['Name'] ;
      if(isset($_POST['Submit'])) {
      $Name = $_POST['Name'];
      $Description = $_POST['Description'];
      $SEO_Title = $_POST['SEO_Title'];
      $SEO_Description = $_POST['SEO_Description'];
      $SEO_Keywords = $_POST['SEO_Keywords'];
      $prd = Post::update_product($id, $_POST['Name'], $_POST['Description'], $_POST['SEO_Title'], $_POST['SEO_Description'], $_POST['SEO_Keywords']);
      require_once('views/posts/add_result.php');
    }
  }

    public function delete_product(){
      if (!isset($_GET['Name']))
        return call('pages', 'error');
        $Name=$_GET['Name'];

      // we use the given id to get the right post
      $prd = Post::delete_product($_GET['Name']);
      require_once('views/posts/delete.php');
    }

  }
?>
