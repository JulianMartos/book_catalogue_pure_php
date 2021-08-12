<?php 
require_once "utils/database.php";

$errors = [];

$book_title = '';
$book_authors = '';
$book_edit = '';
$book_pub_date = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/books/validate.php';
    echo $book_authors;
    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO book (title, dateOf_published, editorial_id, author_id)
                VALUES (:title, :book_pub_date, :book_edit, :book_authors )");
        $statement->bindValue(':title', $book_title);
        $statement->bindValue(':book_pub_date', date($book_pub_date));
        $statement->bindValue(':book_edit', (int)$book_edit);
        $statement->bindValue(':book_authors', (int)$book_authors);
        $statement->execute();
        header('Location: index.php');
    }

}




?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Create new book record</h2>
    <?php require_once "views/books/form.php" ?>    
</div>
</body>