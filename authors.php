<?php

require_once "utils/database.php";

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
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($books as $id => $book):?>
				<tr>
				<th scope="row"><?php echo $id+1 ?></th>
				<td><?php echo $book["name"]?></td>
				<td><?php echo $book["lastName"]?></td>
				<td><?php echo $book["phoneNumber"]?></td>
				<td><?php echo $book["Address"]?></td>
				<td><?php echo $book["Country"]?></td>
				<td>
					<a href="update_author.php?id=<?php echo $book['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
					<form method="post" action="delete_book.php" style="display: inline-block">
						<input  type="hidden" name="id" value="<?php echo $book['id'] ?>"/>
						<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
					</form>
				</td> 
				</tr>
			</tbody>
			<?php endforeach ?>
		</table>
		<a href="create_author.php" type="button" class="btn btn-primary">Create New Record</a>
	</div>

	</body>
</html>

