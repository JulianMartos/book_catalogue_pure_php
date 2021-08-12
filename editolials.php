<?php

require_once "utils/database.php";

$keyword = $_GET['search'] ?? null;



if ($keyword) {
    $statement = $pdo->prepare('SELECT * FROM book WHERE title like :keyword ORDER BY id ASC');
    $statement->bindValue(":keyword", "%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT * FROM book ORDER BY id ASC');
}
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
	<?php include_once "views/pageParts/header.php"; ?>
	<div class="container">
		<h2>Books in storage</h2><br>
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
				<th scope="col">Title</th>
				<th scope="col">Authors</th>
				<th scope="col">Editorial</th>
				<th scope="col">Published</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($books as $id => $book):?>
				<tr>
				<th scope="row"><?php echo $id+1 ?></th>
				<td><?php echo $book["title"]?></td>
				<td><?php echo $book["author_id"]?></td>
				<td><?php echo $book["editorial_id"]?></td>
				<td><?php echo $book["dateOf_published"]?></td>
				<td>
					<a href="update_book.php?id=<?php echo $book['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
					<form method="post" action="delete_book.php" style="display: inline-block">
						<input  type="hidden" name="id" value="<?php echo $book['id'] ?>"/>
						<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
					</form>
				</td> 
				</tr>
			</tbody>
			<?php endforeach ?>
		</table>
		<a href="create_book.php" type="button" class="btn btn-primary">Create New Record</a>
	</div>

	</body>
</html>

