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
			<h1>Delete post</h1>
			<hr>
			
			<div id="manageblog-content">
				
				<?php
						
					$query = $con->prepare("
							
							DELETE FROM LLD_blog
							WHERE blogPostID = :postID
					
						");
					
					$success=$query->execute([
							
							'postID'=>$thisID
								
						]);
				
				?>
				
				<p>The post (ID:<?php echo $thisID?>) has been deleted permanently from the database.</p>
				<hr>
								
				<div id="done">
					<a href="manage-blog-delete.php"><h1>Done!</h1></a>
				</div>
				
				
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>