<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="styles/blog.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>
<body>
	<div class="header">
		<div class="center">
			<div class="title"><h2 class="header-title">Blog</h2>
			</div>
			<form id="searchForm" method="POST" action="blog-search.php">
				<div class="search-bar">
					<form id="serchFrom" method="POST" action="">
						<input type="text" name="search" id="searchInput" placeholder="search">
						<button type="submit" name="searchBtn" id="searchBtn"><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>
			</form>
			<ul class="nav">
				<li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Acasa</a></li>
			</ul>
		</div>
	</div>
	<div class="blog-image">
		<div class="overlay"></div>
		<h1 class="SNS">Sindicatul National Solidaritatea - SeNS</h1>
	</div>

	<div class="blog-div">
		<div class="categories">
			<h3 class="categories-title">Categorii</h3>
			<div class="categories-div">
				<?php 

					include "php_scripts/database.php";

					$categoriesQuery = $database->query("SELECT * FROM categories");
					$categoriesQuery->execute();

					while($row = $categoriesQuery->fetch(PDO::FETCH_ASSOC)) {
						echo "<a href='blog-category.php?category=" . $row['id'] .  "'><div class='category-example'><h3 class='category-name'>" . $row['category_title'] . "</h3></div></a>";
					}
				 ?>
			</div>
		</div>
		<?php 

			$postQuery = $database->query("SELECT * FROM posts ORDER BY id DESC");
			$postQuery->execute();

			while($row = $postQuery->fetch(PDO::FETCH_ASSOC)) {

				echo "<div class='blog-post'><div class='post-image'><img src='images/" . $row['post_image'] . "' class='post-image-img'></div><div class='post-content'><a href='blog-post.php?postid=" . $row['id'] . "&postcategory=" . $row['post_category_id'] . "'><h2 class='post-title'>" . $row['post_title'] . "</h2></a><h6 class='date-category'>de " . $row['post_author'] . "</h6><div class='blog-post-text'><p class='post-text'>" . $row['post_content'] . "</p></div><a href='blog-post.php?postid=" . $row['id'] . "&postcategory=" . $row['post_category_id'] . "'>Read more..</a></div></div>";
			}
		 ?>
		 
	</div>
	<!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</body>
</html>