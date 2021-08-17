<?php

require_once "utils/database.php";
require_once "utils/countries.php";

$keyword = $_GET['search'] ?? null;



if ($keyword) {
    $statement = $pdo->prepare('SELECT * FROM author WHERE name like :keyword ORDER BY id ASC');
    $statement->bindValue(":keyword", "%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT * FROM author ORDER BY id ASC');
}
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
	<?php include_once "views/pageParts/header.php"; ?>
	<div class="container">
		<h2>Authors</h2><br>
		<form action="" method="get">
			<div class="input-group mb-3">
			<input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $keyword ?>">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit">Search</button>
			</div>
			</div>
		</form>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Address</th>
				<th scope="col">Country</th>
				<?php if (isset($_SESSION["username"])): ?>
				<th scope="col">Actions</th>
				<?php endif ?>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($books as $id => $book):?>
				<tr>
				<th scope="row"><?php echo $id+1 ?></th>
				<td><?php echo $book["a_name"]?></td>
				<td><?php echo $book["lastName"]?></td>
				<td><?php echo $book["a_phoneNumber"]?></td>
				<td><?php echo $book["a_address"]?></td>
				<td><?php echo $countries[$book["a_country"]]?></td>
				<?php if (isset($_SESSION["username"])): ?>
				<td>
					<a href="update_author.php?id=<?php echo $book['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
					<form method="post" action="delete_author.php" style="display: inline-block">
						<input  type="hidden" name="id" value="<?php echo $book['id'] ?>"/>
						<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
					</form>
				</td> 
				<?php endif ?>
			</tr>
			</tbody>
			<?php endforeach ?>
		</table>
		<?php if (isset($_SESSION["username"])): ?>
		<a href="create_author.php" type="button" class="btn btn-primary">Create New Record</a>
		<?php endif ?>
	</div>

	</body>
</html>

