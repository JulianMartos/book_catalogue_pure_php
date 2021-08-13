<?php

require_once "utils/database.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM book WHERE b_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$book = $statement->fetch(PDO::FETCH_ASSOC);



$book_title =    $book['title'];
$book_authors =  $book['author_id'];
$book_edit =     $book['editorial_id'];
$book_pub_date = $book['dateOf_published'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/books/validate.php';
    echo $book_authors;
    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE book SET 
        title = :title,
         dateOf_published =  :book_pub_date,
          editorial_id = :book_edit, 
          author_id = :book_authors WHERE b_id =:id" );
        $statement->bindValue(':title', $book_title);
        $statement->bindValue(':book_pub_date', date($book_pub_date));
        $statement->bindValue(':book_edit', (int)$book_edit);
        $statement->bindValue(':book_authors', (int)$book_authors);
        $statement->bindValue(':id', $id);
        $statement->execute();
        header('Location: index.php');
    }

}
?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Update book</h2>
    <?php require_once "views/books/form.php" ?>    
</div>
</body>