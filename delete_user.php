<?php

$pdo = require_once 'utils/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: users.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM users WHERE u_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: users.php');