<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'client':
        require_once('models/client_model.php');
        $controller = new ClientController();
      break;
      case 'pages':

        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('client' => ['home','error', 'about', 'products','show_product'],
                       'pages' => ['home', 'error'],
                       'posts' => ['user', 'user_detail', 'adduser','delete_user', 'category', 'show', 'add', 'edit_category', 'add_category', 'uploads', 'update_category', 'delete_category', 'show_product', 'add1', 'product_upload', 'update_product', 'delete_product', 'edit_product']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>
