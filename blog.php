<?php
	include_once 'DBconnection.php';
?>

<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: Blog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis">
		
	</head>

<!-- _header.php :: was here [START]-->
	<body>
	<div id="full-width-container">

<!-- header -->
		<div id="header">
			<img src="img/LLD_logo.png">
			
	<!-- admin link -->
			<div id="admin-link">
				<a href="admin.php">/admin</a>
			</div>
		</div>
		
<!-- NavBar -->
		<div id="nav-bar">
			<ul>
				<li><a href="index.php">Home</a>
				<li><a href="about.php">About</a>
				<li><a href="offer.php">Offer</a>
				<li><a href="gallery.php">Gallery</a>
				<li><a href="contact.php">Contact</a>
				<li><a href="blog.php">Blog</a>
			</ul>
		</div>		
<!-- _header.php :: was here [END]-->
		
<!-- content -->		
		<div id="content">
				
			<h1>Blog</h1>
			<p>Here's some of our recent activities</p>
				
				<?php
					$query = $con -> query("
							SELECT *
							FROM LLD_blog
					");
					
					$blog = $query -> fetchALL(PDO::FETCH_OBJ);
					
					// display all the posts (in reverse order)
					foreach(array_reverse($blog) as $post){
						
						$singlePost='<section id="blog">';
						$singlePost.='<div id="blog-photo">'.'<img src="data:image/*;base64,'.base64_encode( $post->postPhoto ).'"/>'.'</div>';
						$singlePost.='<br><h3>'.$post->title.'</h3>';
						$singlePost.='<p>Published: '.$post->datePublished.' ';
						$singlePost.='<br>Author: '.$post->author.'</p>';
						$singlePost.='<p>'.$post->postContent.'</p><br><br>';
						$singlePost.='</section>';
						$singlePost.='<hr>';
						echo $singlePost;
						
					}
					
				?>
				
			
			
		</div>
		
		
	

<!-- footer -->		
<?php include '_footer.php'?>