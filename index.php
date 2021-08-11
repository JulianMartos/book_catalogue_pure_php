<!doctype html>
<html lang="en">
  <head>
  	<title>Book storage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style/css/table_style.css">
	</head>
	<body>
	<?php
		include "header.php";
	?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Books</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center mb-4">Books in storage</h4>
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th>id</th>
					        <th>Title</th>
					        <th>Authors</th>
					        <th>Editorial</th>
					        <th>Year of Published</th>
					        <th>Edit</th>
							<th>Delete</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <th scope="row" class="scope" >.com</th>
					        <td>1 Year</td>
					        <td>$70.00</td>
					        <td>$5.00</td>
					        <td>$5.00</td>
					        <td><a href="#" class="btn btn-primary">Edit</a></td>
					        <td><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" >.net</th>
					        <td>1 Year</td>
					        <td>$75.00</td>
					        <td>$5.00</td>
					        <td>$5.00</td>
					        <td><a href="#" class="btn btn-primary">Edit</a></td>
					        <td><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" >.org</th>
					        <td>1 Year</td>
					        <td>$65.00</td>
					        <td>$5.00</td>
					        <td>$5.00</td>
					        <td><a href="#" class="btn btn-primary">Edit</a></td>
					        <td><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" >.biz</th>
					        <td>1 Year</td>
					        <td>$60.00</td>
					        <td>$5.00</td>
					        <td>$5.00</td>
					        <td><a href="#" class="btn btn-primary">Edit</a></td>
					        <td><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope" >.info</th>
					        <td>1 Year</td>
					        <td>$50.00</td>
					        <td>$5.00</td>
					        <td>$5.00</td>
					        <td><a href="#" class="btn btn-primary">Edit</a></td>
					        <td><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					      <tr>
					        <th scope="row" class="scope border-bottom-0">.me</th>
					        <td class="border-bottom-0">1 Year</td>
					        <td class="border-bottom-0">$45.00</td>
					        <td class="border-bottom-0">$5.00</td>
					        <td class="border-bottom-0">$5.00</td>
					        <td class="border-bottom-0"><a href="#" class="btn btn-primary">Edit</a></td>
					        <td class="border-bottom-0"><a href="#" class="btn btn-primary">Delete</a></td>
					      </tr>
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>

	<script src="style/indexStyle/js/jquery.min.js"></script>
  <script src="style/indexStyle/js/popper.js"></script>
  <script src="style/indexStyle/js/bootstrap.min.js"></script>
  <script src="style/indexStyle/js/main.js"></script>

  <?php
	include "footer.php"
  ?>

	</body>
</html>

