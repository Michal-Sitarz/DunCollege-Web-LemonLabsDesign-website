<?php
	
	$check_username = $_POST['username']; 
	$check_password = $_POST['password'];
	
	
	//check if the username, password aren't empty
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		header("Location: admin-try-again.php");
		exit;
	}
	else
	{
	
		include_once 'DBconnection.php';
			
		$query = $con -> query("
						SELECT username, password
						FROM LLD_users
						WHERE username='$check_username'
				");
		
		$user = $query -> fetch(PDO::FETCH_OBJ);
				
		// check if this username exists in the database
		if($user->username==$check_username)
		{
				
			//check password (using built-in hash functionality)
			if (password_verify($check_password, $user->password))
			{
				
				//start session to pass the username value
				session_start();
				$_SESSION['username'] = $user->username;
				
				//redirect to the "manage-blog" page
				header("Location: manage-blog.php");
				exit; //ensure that nothing else is excecuted!!!
			}
			else
			{
				header("Location: admin-try-again.php");
				exit;
			}
		}
		else
		{
			header("Location: admin-try-again.php");
			exit;
		}
		
	}
?>
