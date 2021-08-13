<?php

$pdo = require_once 'utils/database.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: editorials.php');
    exit;
}
try{
    $statement = $pdo->prepare('DELETE FROM editorial WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header('Location: editorials.php');
} catch (\Throwable $th) {
    echo "<SCRIPT Language='JavaScript'>
    alert('This record can not be delete');
   
    window.location.href = 'editorials.php';
    </SCRIPT>";
    
  
}
?>
<!-- <meta http-equiv="Refresh" content="0; url='https://www.w3docs.com'" /> -->