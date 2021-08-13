<?php

require_once "utils/database.php";
require_once "utils/funcions.php";

$keyword = $_GET['search'] ?? null;



if ($keyword) {
    $statement = $pdo->prepare('SELECT u_id, username FROM users WHERE username like :keyword ORDER BY u_id ASC');
    $statement->bindValue(":keyword", "%$keyword%");
} else {
    $statement = $pdo->prepare('SELECT u_id, username FROM users ORDER BY u_id ASC');
}
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
	<?php include_once "views/pageParts/header.php"; ?>
	<div class="container">
		<h2>Users</h2><br>
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
				<th scope="col">username</th>
				<th scope="col">Actions</th>
				
			</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $id => $user):?>
				<tr>
				<th scope="row"><?php echo $id+1 ?></th>
				<td><?php echo $user["username"]?></td>
				<td>
					<form method="post" action="delete_user.php" style="display: inline-block">
						<input  type="hidden" name="id" value="<?php echo $user['u_id'] ?>"/>
						<button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
					</form>
				</td> 
				</tr>
			</tbody>
			<?php endforeach ?>
		</table>
		<a href="create_user.php" type="button" class="btn btn-primary">Create New Record</a>
	</div>

	</body>
</html>

