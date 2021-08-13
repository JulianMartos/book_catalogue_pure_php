<?php 
require_once "utils/database.php";

$errors = [];

$user_name = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'views/users/validate.php';
    var_dump($errors);
    if (empty($errors)){
        if (isset($user_pass)) {
            echo 1;
            $statement = $pdo->prepare("INSERT INTO users (username, password)
                    VALUES (:username, :pass)");
            $statement->bindValue(':username', $user_name);
            $statement->bindValue(':pass', password_hash($user_pass, PASSWORD_DEFAULT));

            $statement->execute();
        }

        
        header('Location: users.php');
    }
}

?>

<body>
    <?php require_once "views/pageParts/header.php"; ?>
<div class="container">
    <h2>Create new book record</h2>
    <?php require_once "views/users/form.php" ?>    
</div>
</body>