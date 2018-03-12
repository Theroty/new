<div class="products">
  <?php
    foreach($category as $cate) {?>
      <div class="gallery">
        <a href='?controller=client&action=show_product&Name=<?php echo $cate->Name ?>&id=<?php echo $cate->id ?>'>
          <?php echo '<div> <img src="controllers/uploads/'.$cate->Image.'" id="img_sample" alt="Random image" /></div>';?> </a>
          <?php echo $cate->SEO_Title;?><br>
          <?php echo $cate->Description;?>
     </div>
  <?php }?>
</div>
