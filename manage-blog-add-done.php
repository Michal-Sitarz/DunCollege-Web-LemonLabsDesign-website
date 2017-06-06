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
	
	//obtain post's title and text-content
	$title = $_POST['title'];
	$content = $_POST['content'];
	
	//obtain post's photo
	$photoFile = $_FILES['photo']['tmp_name'];
	
	// open file and store its content in $photo
	$file = fopen($photoFile, 'r');
	$photo = fread($file, filesize($photoFile));
	fclose($file);
	//done
		
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
				
				<?php
				
					//obtain author's first and last name
					$queryAuthor = $con->query("
						SELECT username, firstName, lastName FROM LLD_users
						WHERE username='$user'
					");
					
					$authorDetails = $queryAuthor -> fetch(PDO::FETCH_ASSOC);
					
					//assign names to string
					$author=$authorDetails['firstName'].' '.$authorDetails['lastName'];
					
					//set today's date
					$date=date("Y-m-d");
					
					//add blog post to the database
										
					$query = $con->prepare("
				
						INSERT INTO LLD_blog (title, postContent, author, datePublished, postPhoto)
						VALUES (:title, :postContent, :author, :datePublished, :postPhoto)
		
					");
		
					$success=$query->execute([
				
						'title'=>$title,
						'postContent'=>$content,
						'author'=>$author,
						'datePublished'=>$date,
						'postPhoto'=>$photo
					]);
					
					//confirm adding blog post to the database
					$lastId=$con->lastInsertId();
					echo '<br><p style="text-align:center">The post of ID: '.$lastId.' has been created.</p>';
					
					
				?>
				
				<div id="done">
					<a href="manage-blog.php"><h1>Done!</h1></a>
				</div>
				
				
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>