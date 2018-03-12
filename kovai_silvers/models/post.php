<?php
class Product{
  public $Name;
  public $Image;
  public $Total;

  public function __construct($Name,$Image,$Total)
  {
    $this->Name  =  $Name;
    $this->Image =  $Image;
    $this->Total =  $Total;
  }

  public static function product_count(){
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT category.Name, category.Image, COUNT(product.category) AS Total FROM category LEFT JOIN product ON category.id = product.category GROUP BY category.id');
    foreach($req->fetchAll() as $count){
      $list[] = new Product($count['Name'], $count['Image'], $count['Total']);
    }
    return $list;
  }
}
class User{
  public $id;
  public $Username;
  public $Password;
  public $Email;

  public function __construct($id,$Username,$Password,$Email)
  {
    $this->id      = $id;
    $this->username =$Username;
    $this->password =$Password;
    $this->email =$Email;
  }
  public static function user_detail(){
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT * FROM login');
    foreach($req->fetchAll() as $user){
      $list[] = new User($user['id'], $user['username'], $user['password'] ,$user['email']);
    }
    return $list;
  }

  public static function delete_user($id){
    $db = Db::getInstance();
    $req = $db->prepare('DELETE FROM login WHERE id= :id');
    $req->execute(array('id' => $id));
  }
}
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $Name;
    public $Description;
    public $Image;
    public $SEO_Title;
    public $SEO_Description;
    public $SEO_Keywords;

    public function __construct($id,$Name,$Description, $Image, $SEO_Title, $SEO_Description, $SEO_Keywords)
    {
      $this->id      = $id;
      $this->Name  = $Name;
      $this->Description = $Description;
      $this->Image = $Image;
      $this->SEO_Title = $SEO_Title;
      $this->SEO_Description = $SEO_Description;
      $this->SEO_Keywords = $SEO_Keywords;
    }

    public static function user($Name,$Password){
      $db = Db::getInstance();
      $req = $db->prepare('INSERT INTO login (username,password) VALUES(:name, :password)');
      $req->execute(array('name' => $Name, 'password' => $Password));
    }


    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM category');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $cate) {
        $list[] = new Post($cate['id'], $cate['Name'], $cate['Description'], $cate['Image'], $cate['SEO_Title'], $cate['SEO_Description'], $cate['SEO_Keywords']);
      }

      return $list;
    }



    public static function add_category($Name, $Description, $fileName, $SEO_Title,$SEO_Description, $SEO_Keywords){
      $db = Db::getInstance();
      $req = $db->prepare('INSERT INTO category (Name,Description,Image,SEO_Title,SEO_Description,SEO_Keywords) VALUES(:name, :description, :image, :seo_title, :seo_description, :seo_keywords)');
      $req->execute(array('name' => $Name, 'description' => $Description, 'image' => $fileName, 'seo_title' => $SEO_Title, 'seo_description' => $SEO_Description, 'seo_keywords' => $SEO_Keywords ));
      }



      public static function delete_category($Name){
          $db = Db::getInstance();
          $req = $db->prepare('DELETE FROM category, product USING category INNER JOIN product ON category.Name = product.Name WHERE category.Name= :name');
          $req->execute(array('name' => $Name));
        }

      public static function update_category($id, $Name, $Description, $fileName, $SEO_Title, $SEO_Description, $SEO_Keywords){
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE `category` SET Name=:name, Description=:description, Image=:image, SEO_Title=:seo_title, SEO_Description=:seo_description, SEO_Keywords=:seo_keywords WHERE id=:id');
        $req->execute(array('id' => $id, 'name' => $Name, 'description' => $Description, 'image' => $fileName, 'seo_title' => $SEO_Title, 'seo_description' => $SEO_Description, 'seo_keywords' => $SEO_Keywords ));
      }
      //product models//

    public static function product_all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM product');
        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $prd) {
          $list[] = new Post($prd['id'], $prd['Name'], $prd['Description'], $prd['Image'], $prd['SEO_Title'], $prd['SEO_Description'], $prd['SEO_Keywords']);
      }

        return $list;
      }

      public static function find1($Name) {
        $list =[];
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM product WHERE category = :id ORDER BY id DESC');
        // the query was prepared, now we replace :name with our actual name value
        $req->execute(array('id' => $_GET['id']));

        foreach($req->fetchAll() as $prd) {
        $list[] = new Post($prd['id'], $prd['Name'], $prd['Description'], $prd['Image'], $prd['SEO_Title'], $prd['SEO_Description'], $prd['SEO_Keywords']);
      }
      return $list;
    }

    public static function product_upload($fileName,  $category){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO product (Image, category) VALUES ( '$fileName', '$category')");
      $req->execute();
      $id = $db->lastInsertId();

      ?>
        <div id="gallery">
          <div id="img"><?php  echo '<img src="./controllers/uploads/'.$fileName.'" id="img" alt="Random image" />';?>
            <a href="?controller=posts&action=add1&Name=<?php echo $fileName ?>" class="btn btn-info btn-sm">Edit</a>
            <a href="?controller=posts&action=delete_product&Nmae=<?php echo $fileName ?>" class="btn btn-info btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
          </div>
        </div>
      <?php
    }

    public static function update_product($id, $Name, $Description, $SEO_Title, $SEO_Description, $SEO_Keywords){
      $db = Db::getInstance();
      $req = $db->prepare('UPDATE product SET Name=:name, Description=:description, SEO_Title=:seo_title, SEO_Description=:seo_description, SEO_Keywords=:seo_keywords WHERE Image=:id');
      $req->execute(array('id' => $id, 'name' => $Name, 'description' => $Description, 'seo_title' => $SEO_Title, 'seo_description' => $SEO_Description, 'seo_keywords' => $SEO_Keywords ));
    }

    public static function delete_product($Name){
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM product WHERE Image= :name');
        $req->execute(array('name' => $Name));
      }

        public static function edit_product(){

        }

      }
