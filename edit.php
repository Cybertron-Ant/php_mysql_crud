<?php
// including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

// getting id from url
$id = $crud->escape_string($_GET['id']);

// selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE id=$id");

foreach ($result as $res) {
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Edit Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Edit Data</h5>
		</div>
		<div class="card-body">
			<a href="index.php" class="btn btn-secondary mb-3">Home</a>
			
			<form name="form1" method="post" action="editaction.php">
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="age" class="col-sm-2 col-form-label">Age</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<div class="form-group row">
					<div class="col-sm-10 offset-sm-2">
						<input type="submit" class="btn btn-primary" name="update" value="Update">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
