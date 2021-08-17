
<?php
require_once "utils/funcions.php";
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

  </head>

<body>
  <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 link-dark">Books</a></li>
          <li><a href="authors.php" class="nav-link px-2 link-dark">Authors</a></li>
          <li><a href="editorials.php" class="nav-link px-2 link-dark">Editorials</a></li>
          <?php if (isset($_SESSION["username"])): ?>
          <li><a href="users.php" class="nav-link px-2 link-dark">Users</a></li>
          <?php endif ?>
          <li><a href="reports.php" class="nav-link px-2 link">Download Report</a></li>
        </ul>

        <div class="col-md-3 text-end">
          <?php if (!isset($_SESSION["user_id"])){?>
          <a href="login.php" type="button" class="btn btn-primary">Login</a>
          <?php } else { ?>
            <label for="inputEmail" style="padding: 2%;" class="sr-only"><?php echo $_SESSION['username'] ?></label>
            <a href="logout.php" type="button" class="btn btn-primary">Logout</a>
          <?php } ?>
        </div>
      </header>
    </div>
