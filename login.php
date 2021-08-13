<?php include_once "views/pageParts/header.php"; 


	require_once "utils/database.php";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
   // var_dump($_POST);
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{ 
      $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
      $statement->bindValue(':username', $user_name);
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC); 
			
			if($user)
			{
					
					if(password_verify($password, $user['password']))
					{
						$_SESSION['user_id'] = $user['u_id'];
            			$_SESSION['username'] = $user['username'];
						header("Location: index.php");
					
					}			
					echo "<SCRIPT Language='JavaScript'>
							alert('Wrong username or password');
							window.location.href = 'login.php';
						</SCRIPT>";

				}    
        		echo "<SCRIPT Language='JavaScript'>
						alert('Wrong username or password');
						window.location.href = 'login.php';
					</SCRIPT>";

			}	
			echo "<SCRIPT Language='JavaScript'>
					alert('Wrong username or password');
					window.location.href = 'login.php';
				</SCRIPT>";
		}
	
  

?>


<body class="text-center">
    <form class="form-signin" method="post" action="login.php" style="display: inline-block">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">UserName</label>
      <input type="text" id="inputUserName" class="form-control" placeholder="UserName" name="username">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"> 
      <br><button class="btn btn-primary btn-block" type="submit">Sign in</button>
    </form>
  

</body></html>