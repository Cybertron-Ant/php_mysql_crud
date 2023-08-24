<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Add Data</h5>
		</div>
		<div class="card-body">
			<?php
			//including the database connection file
			include_once("classes/Crud.php");
			include_once("classes/Validation.php");

			$crud = new Crud();
			$validation = new Validation();

			if(isset($_POST['Submit'])) {	
				$name = $crud->escape_string($_POST['name']);
				$age = $crud->escape_string($_POST['age']);
				$email = $crud->escape_string($_POST['email']);

				$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
				$check_age = $validation->is_age_valid($_POST['age']);
				$check_email = $validation->is_email_valid($_POST['email']);

				// checking empty fields
				if($msg != null) {
					echo '<div class="alert alert-danger">' . $msg . '</div>';
					//link to the previous page
					echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
				} elseif (!$check_age) {
					echo '<div class="alert alert-danger">Please provide proper age.</div>';
				} elseif (!$check_email) {
					echo '<div class="alert alert-danger">Please provide proper email.</div>';
				} else { 
					// if all the fields are filled (not empty) 

					//insert data to database	
					$result = $crud->execute("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");

					//display success message
					echo '<div class="alert alert-success">Data added successfully.</div>';
					echo '<a href="index.php" class="btn btn-primary">View Result</a>';
				}
			}
			?>
		</div>
	</div>
</div>
</body>
</html>
