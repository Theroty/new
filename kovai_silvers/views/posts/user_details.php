<!DOCTYPE html>
<html lang="en">
  <body>
    <div class="container">
      <a href='?controller=posts&action=adduser'  class="btn btn-info btn-sm"><span class="glyphicon glyphicon-user"></span> Add user</a>
        <h2>Users</h2>
        <div id="add_data_table">
           <table class="table table-striped">
              <thead class = "header">
               <tr>
                 <th>User Name</th>
                 <th>Password</th>
                 <th>Email</th>
                 <th>action</th>
               </tr>
             </thead>
             <?php foreach($users as $user) { ?>
               <tr>
                 <td><?php  echo $user->username?></td>
                 <td><?php echo $user->password?></td>
                 <td><?php echo $user->email?></td>
                 <td><a href="?controller=posts&action=delete_user&id=<?php  echo $user->id?>" class="btn btn-info btn-sm" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
               </tr>
             <?php } ?>
          </table>
        </div>
    </div>
  </body>
</html>
