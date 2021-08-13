<?php

$pdo = require_once 'utils/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: author.php');
    exit;
}
try {
    $statement = $pdo->prepare('DELETE FROM author WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: authors.php');

} catch (\Throwable $th) {
    echo "<SCRIPT Language='JavaScript'>
    alert('This record can not be delete');
   
    window.location.href = 'authors.php';
    </SCRIPT>";
}
