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
			<h1>Edit post</h1>
			<hr>
			
			<div id="manageblog-content">
					
					
					<div id="posts-list">
					<?php
					
						$query = $con -> query("
								SELECT title, datePublished, blogPostID
								FROM LLD_blog
						");
						
						$blog = $query -> fetchALL(PDO::FETCH_OBJ);
						
						// display all the posts (in reverse order)
						// as a table
						
						$titlesTable='<table>';
						$titlesTable.='<tr><th>Title:</th><th>Date published:</th>';
						
						foreach(array_reverse($blog) as $post){
							
							//assign post ID
							$thisID=$post->blogPostID;
							
							//create every row
							$titlesTable.='<tr>';
							$titlesTable.='<td><h3>'.$post->title.'</h3></td>';
							$titlesTable.='<td><p>'.$post->datePublished.'</p></td>';
							
							//generate button that sends post ID
							$titlesTable.='	<td>
												<form method="POST" action="manage-blog-edit-post.php">
													<input style="display:none" type="text" name="thisID" value="'.$thisID.'">
													<input id="edit-button" type="submit" value="Edit">
												</form>
											</td>';
							/*				
							$titlesTable.='<td>'.$thisID.'</td>';
							*/
							
							$titlesTable.='</tr>';
														
						}
						$titlesTable.='</table>';
						
						//display table
						echo $titlesTable;
												
					
					
					
					?>
					</div>
										
				<hr>
			</div>
			
			
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>