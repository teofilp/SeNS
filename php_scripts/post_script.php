<?php 
	include "database.php";
	


	$postTitle = strip_tags($_POST['postTitle']);
	$postAuthor = strip_tags($_POST['postAuthor']);
	$postTags = strip_tags($_POST['postTags']);
	$postCategory = strip_tags($_POST['postCategory']);
	$postContent = strip_tags($_POST['postContent']);

	//getting the image name that will be inserted into the database
	$imageName = $_FILES['postImage']['name'];

	//getting the post category id
	$postCategoryId = $_POST['postCategoryId'];

	//moving the image
	$imageCurrentPath = $_FILES['postImage']['tmp_name'];
	$targetPath = "../images/" . $_FILES['postImage']['name'];
	//switching directories
	move_uploaded_file($imageCurrentPath, $targetPath);

	//inserting psot into database
	   $postQuery = $database->prepare("INSERT INTO posts (id, post_title, post_author, post_tags, post_category,
	   	post_image, post_content, post_category_id) VALUES (NULL, :postTitle, :postAuthor, :psotTags, :postCategory, :postImage, :postContent, :postCategoryId)");
	   $postQuery->bindParam(":postTitle", $postTitle);
	   $postQuery->bindParam(":postAuthor", $postAuthor);
	   $postQuery->bindParam(":psotTags", $postTags);
	   $postQuery->bindParam(":postCategory", $postCategory);
	   $postQuery->bindParam(":postImage", $imageName);
	   $postQuery->bindParam(":postContent", $postContent);
	   $postQuery->bindParam(":postCategoryId", $postCategoryId);
	   $postQuery->execute();

	 // //preparing the query for pulling all the posts from the database 
	 // $allPostsQuery = $database->query("SELECT * FROM posts");
     //    $allPostsQuery->execute();



	if(isset($_POST['deletedPost'])) {

		$deletedPostId = strip_tags($_POST['postId']);

		//deleting query
		$deletePostQuery = $database->prepare("DELETE FROM posts WHERE id = :postId");
		$deletePostQuery->bindParam(":postId", $deletedPostId);
		$deletePostQuery->execute();
	} 	
?>