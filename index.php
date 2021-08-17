<?php

require_once "utils/database.php";
require_once "utils/funcions.php";

$keyword = $_GET['search'] ?? null;



if ($keyword) {
    $statement = $pdo->prepare('SELECT b_id, title, dateOf_published, editorial.e_name , author.a_name, author.lastName FROM book_storage.book inner join book_storage.editorial on editorial_id = editorial.id inner join book_storage.author on author_id = author.id; WHERE title like :keyword ORDER BY id ASC');
    $statement->bindValue(":keyword", "%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT b_id, title, dateOf_published, editorial.e_name , author.a_name, author.lastName FROM book_storage.book inner join book_storage.editorial on editorial_id = editorial.id inner join book_storage.author on author_id = author.id;');
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
				<?php if (isset($_SESSION["username"])): ?>
				<th scope="col">Actions</th>
				<?php endif ?>
				
			</tr>
			</thead>
			<tbody>
				<?php foreach ($books as $id => $book):?>
				<tr>
				<th scope="row"><?php echo $id+1 ?></th>
				<td><?php echo $book["title"]?></td>
				<td><?php echo $book["a_name"] .' ' . $book['lastName']?></td>
				<td><?php echo $book["e_name"]?></td>
				<td><?php echo $book["dateOf_published"]?></td>
				<?php if (isset($_SESSION["username"])): ?>
				<td>
					<a href="update_book.php?id=<?php echo $book['b_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
					<form method="post" action="delete_book.php" style="display: inline-block">
						<input  type="hidden" name="id" value="<?php echo $book['b_id'] ?>"/>
						<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
					</form>
				</td> 
				<?php endif ?>
				</tr>
			</tbody>
			<?php endforeach ?>
		</table>
		<?php if (isset($_SESSION["username"])): ?>
		<a href="create_book.php" type="button" class="btn btn-primary">Create New Record</a>
		<?php endif ?>
	</div>

	</body>
</html>

