<?php 
	include_once 'DBconnection.php';
	
	session_start();
	$user = $_SESSION['username'];
	
	//check if the user is logged in = session isn't empty
	if(empty($_SESSION['username']))
	{
		header("Location: admin-try-again.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: ManageBlog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis|Orbitron|Comfortaa">
		
	</head>

<?php include '_header_manage-blog.php' ?>
		
<!-- content -->
	<div id="content">
		<div id="manageblog">
			<div id="logged">
				<p>Logged as: 
					<?php echo $user; ?>
					<span><a href="admin-logout.php">Logout</a></span>
				</p>
			</div>
			<hr>
			<h1>Add post</h1>
			<hr>
			
			<div id="manageblog-content">
				<hr>
					
				<form action="manage-blog-add-done.php" method="POST" enctype="multipart/form-data">
					
					<div id="blog-photo">
						<label for="photo"><p style="color: white">Upload photo</p></label>
						<input type="file" name="photo" accept="image/*" value="">
					</div>
					
					<label for="title">Enter title: </label><br>
					<input type="text" name="title" id="title"><br>
					<br>
					<label for="content">Enter text: </label><br>
					<textarea type="text" name="content" id="content">Start writing your post here...</textarea><br>
					
					<input id="submit" type="submit" value="Save changes"><br>
					
				</form>
				
				
				<hr>
				
				<form action="manage-blog.php">
					<div id ="cancel-button">
						<input type="submit" value="Cancel">
					</div>
				</form>
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>