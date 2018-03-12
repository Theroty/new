<div class="product">
  
  <?php foreach($product as $prd) { ?>
  <div class="gallery">
    <?php echo '<img src="./controllers/uploads/'.$prd->Image.'" id="img_sample" alt="Random image" />';?><br>
    <?php echo $prd->Image?><br>
    <?php echo $prd->Description?>
  </div>
<?php } ?>
</div>
