<?php ob_start(); 

$postId = $_GET['postid'];
$postCatId = $_GET['postcategory'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog Post</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/blog-post.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

</head>
<body>
		<div class="header">
		<div class="center-header">
			<div class="title"><h2 class="header-title">Blog</h2>
			</div>
			<form id="searchForm" method="POST" action="blog-search.php">
				<div class="search-bar">
						<input type="text" name="search" id="searchInput" placeholder="search">
						<button type="submit" name="searchBtn" id="searchBtn"><span class="glyphicon glyphicon-search"></span></button>
				</div>
			</form>
			<ul class="nav">
				<li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Acasa</a></li>
			</ul>
		</div>
	</div>
		<?php 

		include "php_scripts/database.php";

		$query = $database->prepare("SELECT * FROM posts WHERE id = :postId");
		$query->bindParam(":postId", $postId);
		$query->execute();

		while($rowImage = $query->fetch(PDO::FETCH_ASSOC)) {

			echo "<div class='img-div'><img src='images/" . $rowImage['post_image'] . "' class='post-img'><div class='overlay'></div><h1 style='letter-spacing: 0.5px; word-spacing: 3px;' class='post-title'>" . $rowImage['post_title'] . ", de <span style='color:#3399ff;'>" . $rowImage['post_author'] . "</span></h1></div>";
		}

		 ?>
		<!-- <div class="img-div"><img src="<?php ?>" class="post-img">
			<div class="overlay"></div>
			<h1 class="post-title">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </h1>
			<div class="post-date-div">
				<h5 class="post-date">Posted on August 23 2017</h5>
			</div>
		</div> -->
		
		<div class="center">
			<div class="left">
			<?php 

				$query2 = $database->prepare("SELECT * FROM posts WHERE id = :postId");
				$query2->bindParam(":postId", $postId);
				$query2->execute();

				while($row = $query2->fetch(PDO::FETCH_ASSOC)) {

					echo "<h2></h2><p class='post-content'>" . $row['post_content'] ."</p><h2 style='font-size: 30px;' class='post-subtitle'><span style='color: black;'>articol scris de</span> " . $row['post_author'] ."</h2>";
				}
			 ?>
			</div>
			<div style="margin-top: 0px" class="right">
				
				<h2 class="related-title">Postari asemanatoare</h2>

				<?php 

					$postsQuery = $database->prepare("SELECT * FROM posts WHERE post_category_id = :categoryId");
					$postsQuery->bindParam(":categoryId", $postCatId);
					$postsQuery->execute();

					while($row = $postsQuery->fetch(PDO::FETCH_ASSOC)) {

						echo " <div class='related-post-div' style='margin-bottom: 5px;'>" .
								"<div class='related-post-image-div'>" .
									"<img style='width: 100%; height: 100%;' src='images/tree.jpg' class='related-post-image-img'>" .
								"</div>" .
								"<div class='related-post-content' style='overflow: hidden;'>" .
									"<h3 class='related-post-title'><a href='blog-post.php?postid=" . $row['id'] . "&postcategory=" . $row['post_category_id'] . "'><div class='related-post-content-margined'>" . $row['post_content'] . "</a>" .
									"</h3>" .
								"</div>" .
							"</div>";
					}

				 ?>
		

		</div>
		<footer class="footer-div">
			<div class="footer">
				<h6 class="copyright-text">&#169; Copyright 2017. All Rights Reserved by Sindicatul National Solidaritatea </h6>
			</div>
		</footer>
</body>
</html>