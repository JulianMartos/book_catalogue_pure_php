<?php


function check_login($con)
{
    require_once "database.php";

	if(isset($_SESSION['user_id']))
	{

		
        $statement = $pdo->prepare('SELECT * FROM users WHERE u_id = :id LIMIT 1');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $user_data = $user;
		return $user_data;
	}

	//redirect to login
	header("Location: login.php");
	die;

}