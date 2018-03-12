<?php
class Client {
  // we define 7 attributes
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

    public static function category_list() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM category');
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $cate) {
        $list[] = new Client($cate['id'], $cate['Name'], $cate['Description'], $cate['Image'], $cate['SEO_Title'], $cate['SEO_Description'], $cate['SEO_Keywords']);
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
      $list[] = new Client($prd['id'], $prd['Name'], $prd['Description'], $prd['Image'], $prd['SEO_Title'], $prd['SEO_Description'], $prd['SEO_Keywords']);
    }
    return $list;
  }

  }

?>
