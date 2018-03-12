  <body>
  	<div class="container adduser" style="margin-top:70px">
  	<form class="form-horizontal " action="?controller=posts&action=user" onsubmit="return validateForm()" method="post" name="form1">
      <div class="header">
        <h2>Add User</h2>
      </div><hr>
  		<div class="form-group">
  			<lable class="control-label col-sm-2">username</lable>
  			<div class="col-sm-10">
  				<input class="form-control" type="text" name="username">
  			</div>
  		</div>

  		<div class="form-group">
  			<lable class="control-lable col-sm-2">password</lable>
  			<div class="col-sm-10">
  				<input class="form-control" type="text" name="password">
  			</div>
  		</div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-info col-sm-12" type="submit" name="Submit" value="Save">
      </div>
    </div>

</form>
</div>
</body>
