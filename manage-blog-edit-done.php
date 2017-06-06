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
	
	
	$title = $_GET['title'];
	$content = $_GET['content'];
	
	$thisID = $_GET['thisID'];
	
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
				
				<?php
					
					//obtain author's first and last name
					$queryAuthor = $con->query("
						SELECT username, firstName, lastName FROM LLD_users
						WHERE username='$user'
					");
					
					$authorDetails = $queryAuthor -> fetch(PDO::FETCH_ASSOC);
					
					//assign names to string
					$author=$authorDetails['firstName'].' '.$authorDetails['lastName'];
					
					$date=date("Y-m-d");
					
					//prepare & execute query to UPDATE database entry
					$query = $con->prepare("
				
						UPDATE LLD_blog 
						SET title = :title, postContent = :postContent, author = :author
						WHERE blogPostID = $thisID
		
					");
					
					$success=$query->execute([
				
						'title'=>$title,
						'postContent'=>$content,
						'author'=>$author
					]);
					
					//display confirmation
					echo '<br><p style="text-align:center">The post of ID: '.$thisID.' has been updated.</p>';
					
					
				?>
				
				<div id="done">
					<a href="manage-blog.php"><h1>Done!</h1></a>
				</div>
				
				
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>