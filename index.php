<?php
//including the database connection file
include_once("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (latest entry first)
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $crud->getData($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">User Data</h5>
		</div>
		<div class="card-body">
			<a href="add.html" class="btn btn-primary mb-3">Add New Data</a>

			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Age</th>
							<th>Email</th>
							<th>Update</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($result as $key => $res) {
							echo "<tr>";
							echo "<td>".$res['name']."</td>";
							echo "<td>".$res['age']."</td>";
							echo "<td>".$res['email']."</td>";	
							echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-warning btn-sm\">Edit</a> | <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>
