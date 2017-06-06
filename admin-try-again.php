<?php
	include_once 'DBconnection.php';
?>

<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: admin>blog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis|Orbitron|Comfortaa">
		
	</head>
	
<!-- header -->
<?php include '_header.php'?>
		
<!-- content -->
	<div id="content">
		<div id="manageblog">
			<h1>Manage Blog system</h1>
			
			<div id="login-form">
				<hr>
				<p class="wrong">Wrong password or username!</p>
				<p>Please login with <u>correct</u> details:</p>
				
				<form method="POST" action="admin-login-check.php">
					<p> Username: <input class="form-field" type="text" name="username"></p>
					<p> Password: <input class="form-field" type="password" name="password"></p>
					<p><input id="login-button" type="submit" value="Login"</p>
					
				</form>
				<hr>
			</div>
			
			
		</div>
		
<!-- footer -->		
<?php include '_footer.php'?>