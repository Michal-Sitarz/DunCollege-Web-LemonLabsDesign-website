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
	
	$thisID = $_POST['thisID'];
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
			<h1>Edit post</h1>
			<hr>
			
			<div id="manageblog-content">
				<hr>
				
				<?php
					$query = $con -> query("
							SELECT *
							FROM LLD_blog
							WHERE blogPostID = $thisID
					");
					
					$blog = $query -> fetch(PDO::FETCH_OBJ);
					
					$displayPost='<h3>ID: '.$blog->blogPostID.'</h3><hr>';
					
					//form to Edit post
					$displayPost.='
							<form action="manage-blog-edit-done.php">
								
								<div id="blog-photo">
									<label for="photo"><p style="color: white">Upload photo</p></label>
									<input type="file" accept="image/*">
								</div>
								
								<label for="title">Edit title: </label><br>
								<input type="text" name="title" id="title" value="'.$blog->title.'"><br>
								<br>
								<label for="content">Edit text: </label><br>
								<textarea type="text" name="content" id="content">'.$blog->postContent.'</textarea><br>
								
								<input style="display:none" type="text" name="thisID" value="'.$thisID.'">
								
								<input id="submit" type="submit" value="Save changes"><br>
								
							</form>';
					
					
					echo $displayPost;
					
				?>
				
				<hr>
					<form action="manage-blog-edit.php">
						
							<input id ="cancel-button" type="submit" value="Cancel">
						
					</form>

			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>