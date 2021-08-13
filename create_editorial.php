<?php 
require_once "utils/database.php";

$errors = [];

$editorial_name = '';
$editorial_lastName = '';
$editorial_phoneNumber = '';
$editorial_address = '';
$editorial_country = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/editorials/validate.php';
    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO editorial (e_name, e_phoneNumber, e_address, e_country)
                VALUES (:editorial_name, :editorial_phoneNumber, :editorial_address, :editorial_country)");
        $statement->bindValue(':editorial_name', $editorial_name);
        $statement->bindValue(':editorial_phoneNumber', $editorial_phoneNumber);
        $statement->bindValue(':editorial_address', $editorial_address);
        $statement->bindValue(':editorial_country', $editorial_country);
        $statement->execute();
        header('Location: editorials.php');
    }

}




?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Create new Editorial record</h2>
    <?php require_once "views/editorials/form.php" ?>    
</div>
</body>