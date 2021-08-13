<?php

require_once "utils/database.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: authors.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM author WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$author = $statement->fetch(PDO::FETCH_ASSOC);

var_dump($author);

$author_name =        $author['a_name'];
$author_lastName =    $author['lastName'];
$author_phoneNumber = $author['a_phoneNumber'];
$author_address =     $author['a_address'];
$author_country =     $author['a_country'];




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/authors/validate.php';
    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE author SET 
        a_name = :author_name,
        lastName =  :author_lastName,
        a_phoneNumber = :author_phoneNumber, 
        a_address = :author_address,
        a_country = :author_country
         WHERE id =:id" );
        $statement->bindValue(':author_name', $author_name);
        $statement->bindValue(':author_lastName', $author_lastName);
        $statement->bindValue(':author_phoneNumber', $author_phoneNumber);
        $statement->bindValue(':author_address', $author_address);
        $statement->bindValue(':author_country', $author_country);
        $statement->bindValue(':id', $id);
        $statement->execute();
        header('Location: authors.php');
    }

}
?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Update book</h2>
    <?php require_once "views/authors/form.php" ?>    
</div>
</body>