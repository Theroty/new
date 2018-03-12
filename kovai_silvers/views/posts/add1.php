<html>
<head>
	<title>Add Data</title>
</head>
<script>
function validateForm() {
    var x = document.forms["form1"]["Name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
		var x = document.forms["form1"]["Description"].value;
    if (x == "") {
        alert("Description must be filled out");
        return false;
    }
		var x = document.forms["form1"]["SEO_Title"].value;
    if (x == "") {
        alert("SEO_Title must be filled out");
        return false;
    }
		var x = document.forms["form1"]["SEO_Description"].value;
    if (x == "") {
        alert("SEO_Description must be filled out");
        return false;
    }
		var x = document.forms["form1"]["SEO_Keywords"].value;
    if (x == "") {
        alert("SEO_Keyword must be filled out");
        return false;
    }
}
</script>

<body>
	<div class="container form" style="padding-top:20px; border-radius: 6px; margin-top:20px; width:800px; box-shadow: 0 9px 20px 0 rgba(0, 0, 0, 0.5), 0 9px 40px 0 rgba(0, 0, 0, 0.5);">
	<form class="form-horizontal " action="?controller=posts&action=update_product&Name=<?php echo $Name ?>" onsubmit="return validateForm()" method="post" name="form1">

		<div class="form-group">
			<lable class="control-lable col-sm-1">Name</lable>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="Name">
			</div>
		</div>

		<div class="form-group">
			<lable class="control-lable col-sm-1">Description</lable>
			<div class="col-sm-10">
				<textarea class="form-control" name="Description"></textarea>
			</div>
		</div>

		<div class="form-group">
			<lable class="control-lable col-sm-1">SEO_Title</lable>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="SEO_Title">
			</div>
		</div>

		<div class="form-group">
			<lable class="control-lable col-sm-1">SEO_Description</lable>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="SEO_Description">
			</div>
		</div>

		<div class="form-group">
			<lable class="control-lable col-sm-1">SEO_Keyword</lable>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="SEO_Keywords">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-default btn-primary" type="submit" name="Submit" value="Save">
		</div>
	</div>

	</form>
	</div>
	</body>
	</html>
