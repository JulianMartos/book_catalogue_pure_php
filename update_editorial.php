<?php

require_once "utils/database.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: editorials.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM editorial WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$editorial = $statement->fetch(PDO::FETCH_ASSOC);


$editorial_name =        $editorial['e_name'];
$editorial_phoneNumber = $editorial['e_phoneNumber'];
$editorial_address =     $editorial['e_address'];
$editorial_country =     $editorial['e_country'];




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/editorials/validate.php';
    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE editorial SET 
        e_name = :editorial_name,
        e_phoneNumber = :editorial_phoneNumber, 
        e_address = :editorial_address,
        e_country = :editorial_country
         WHERE id =:id" );
        $statement->bindValue(':editorial_name', $editorial_name);
        $statement->bindValue(':editorial_phoneNumber', $editorial_phoneNumber);
        $statement->bindValue(':editorial_address', $editorial_address);
        $statement->bindValue(':editorial_country', $editorial_country);
        $statement->bindValue(':id', $id);
        $statement->execute();
        header('Location: editorials.php');
    }

}
?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Update Editorial</h2>
    <?php require_once "views/editorials/form.php" ?>    
</div>
</body>