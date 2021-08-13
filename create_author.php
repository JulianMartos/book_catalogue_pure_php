<?php 
require_once "utils/database.php";

$errors = [];

$author_name = '';
$author_lastName = '';
$author_phoneNumber = '';
$author_address = '';
$author_country = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/authors/validate.php';
    echo $book_authors;
    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO author (a_name, lastName, a_phoneNumber, a_address, a_country)
                VALUES (:author_name, :author_lastName, :author_phoneNumber, :author_address, :author_country)");
        $statement->bindValue(':author_name', $author_name);
        $statement->bindValue(':author_lastName', $author_lastName);
        $statement->bindValue(':author_phoneNumber', $author_phoneNumber);
        $statement->bindValue(':author_address', $author_address);
        $statement->bindValue(':author_country', $author_country);
        $statement->execute();
        header('Location: authors.php');
    }

}




?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Create new book record</h2>
    <?php require_once "views/authors/form.php" ?>    
</div>
</body>