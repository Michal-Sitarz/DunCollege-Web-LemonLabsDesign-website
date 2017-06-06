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
	
	//set cookie
	$cookie_name = $user;
	$cookie_value = "John Doe";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day * 7 = 1 week
	
?>

<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: ManageBlog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis|Orbitron|Comfortaa">
		
	</head>

	
<!-- _header_manage-blog.php :: was here [START]-->
	<body>
	<div id="full-width-container">
<!-- header -->
		<div id="header">
			<img src="img/LLD_logo.png">
		</div>	
		
<!-- NavBar -->
		<div id="nav-bar">
			<ul>
				<li><a href="index.php" target="_blank">Home</a>
				<li><a href="blog.php" target="_blank">Blog</a>
				<li><a href="manage-blog.php">Manage Blog</a>
				<li>>>
				<li><a href="manage-blog-add.php">/Add post</a>
				<li><a href="manage-blog-edit.php">/Edit post</a>
				<li><a href="manage-blog-delete.php">/Delete post</a>
			</ul>
		</div>
<!-- _header_manage-blog.php :: was here [END]-->
		

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
			<h1>Manage Blog system</h1>
			<hr>
			
			<div id="manageblog-content">
				
				<div id="manageblog-main">
					<div id="manageblog-buttons">
						<a href="manage-blog-add.php"><h3>Add post</h3></a>
						<a href="manage-blog-edit.php"><h3>Edit post</h3></a>
						<a href="manage-blog-delete.php"><h3>Delete post</h3></a>
					</div>
				</div>
				
<!-- script to display "welcome" dialog box + info about cookies-->
				<script>alert("Welcome in Manage Blog system :) \nThis service uses cookies.");</script>
				
				<hr><p>Latest post:</p>
				<?php
					$query = $con -> query("
							SELECT *
							FROM LLD_blog
					");
					
					$blog = $query -> fetchALL(PDO::FETCH_OBJ);
					
					// go through all posts
					foreach($blog as $post){

						$singlePost='<hr><br><section id="blog">';
						$singlePost.='<div id="blog-photo">'.'<img src="data:image/*;base64,'.base64_encode( $post->postPhoto ).'"/>'.'</div>';
						$singlePost.='<br><h3>'.$post->title.'</h3>';
						$singlePost.='<p>Published: '.$post->datePublished.' ';
						$singlePost.='<br>Author: '.$post->author.'</p>';
						$singlePost.='<p>'.$post->postContent.'</p><br>';
						$singlePost.='</section>';
						$singlePost.='<hr>';
						
					}
					
					//most recent post (display the last one)
					echo $singlePost;
					
				?>
				
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>