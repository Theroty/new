<!DOCTYPE html>
<html lang="en">
<body>

<div class="container" style="margin-top:60px">
  <div id="count">
  <?php foreach($products as $count) { ?>

   <div class="count">
     <div class="total">
       <?php echo $count->Total; ?>
       <?php echo '<div> <img src="controllers/uploads/'.$count->Image.'" id="img_c1" alt="Random image" /></div>'; ?>
     </div>
       <?php echo $count->Name; ?>
   </div>
  <?php } ?>
</div>
 <a href="?controller=posts&action=add" class="btn btn-info">Add category</a><br><br>
    <div id="add_data_table">
 <table class="table table-striped">
    <thead class = "header">
   <tr>
     <th>Image</th>
     <th>Category Name</th>
     <th>Decription</th>
     <th>SEO_Title</th>
     <th>SEO_Description</th>
     <th>SEO_Keywords</th>
     <th>action</th>
   </tr>
 </thead>
  <?php foreach($category as $cate) { ?>
    <tr>
      <td><?php echo '<div> <img src="controllers/uploads/'.$cate->Image.'" id="img_sample" alt="Random image" /></div>'; ?> </td>
      <td><?php echo $cate->Name; ?></td>
      <td><?php echo $cate->Description; ?></td>
      <td><?php echo $cate->SEO_Title; ?></td>
      <td><?php echo $cate->SEO_Description; ?></td>
      <td><?php echo $cate->SEO_Keywords; ?></td>

      <td>
        <a href='?controller=posts&action=show_product&Name=<?php echo $cate->Name ?>&id=<?php echo $cate->id ?>' class="btn btn-info btn-sm">view</a>
        <a href="?controller=posts&action=edit_category&id=<?php echo $cate->id ?>" class="btn btn-info btn-sm">Edit</a>
        <a href="?controller=posts&action=delete_category&Name=<?php echo $cate->Name ?>" class="btn btn-info btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
</tr><?php } ?>
</table>
</div>
</div>
