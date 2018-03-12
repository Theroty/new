<div class="product">

  <div class="container " style=" margin-top:30px;">
    <h2><?php echo $Name; ?></h2>
      <form action="?controller=posts&action=product_upload&Name=<?php echo $Name ?>&norender=true" class="dropzone" id="my-awesome-dropzone">
        <input type="hidden" name="category" value="<?php echo $id ?>">
      </form>
  </div>

  <center>
    <div id="product">
      <?php foreach($product as $prd) { ?>
      <div id="gallery">
        <div id="img"><?php  echo '<img src="./controllers/uploads/'.$prd->Image.'" id="img" alt="Random image" />';?>
          <a href="?controller=posts&action=add1&Name=<?php echo $prd->Image ?>" class="btn btn-info btn-sm">Edit</a>
          <a href="?controller=posts&action=delete_product&Name=<?php echo $prd->Image ?>" class="btn btn-info btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </center>

</div>


<script>
$(function() {
  Dropzone.options.myAwesomeDropzone = {
    init: function () {
      this.on("success", function(file, responseText) {
        $("#product").prepend(responseText);
      });
    }
  };
});
</script>
