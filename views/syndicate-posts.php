 <h1 class='section-title' style='margin-left: 5%;'>Postari & Stiri</h1>
				<div id='tableContainer'>
					<table style="font-family: 'Open Sans Condensed', sans-serif;" class='table table-hover'>
				    <thead>
				      <tr>
				        <th>Titlu</th>
				        <th>Autor</th>
				        <th>Tags</th>
				        <th>Categorie</th>
				        <th>Id Categorie</th>
				        <th>Imagine</th>
				      </tr>
				    </thead>
				    <tbody id='postsTableBody'>
				    
				      <?php 
				      	include "../php_scripts/database.php";

				      	$allPostsQuery = $database->query("SELECT * FROM posts");
				      	$allPostsQuery->execute();

				      	while($row = $allPostsQuery->fetch(PDO::FETCH_ASSOC)) {

					      		echo "<tr><td>" . $row['post_title'] . "</td><td>"
					      		. $row['post_author'] . "</td><td>" . $row['post_tags'] . "</td>"
					      		. "<td>" . $row['post_category'] . "</td><td>" . $row['post_category_id'] . "</td>"
					      		. "<td><img class='table-image' src='../images/" . $row['post_image'] ."'></td><td><button class='btn btn-danger' data-target='post' value='" . $row['id'] . "'>Sterge</button></td></tr>";
				      	}
				       ?>
				    </tbody>
				  </table> 
				</div>
					 <h1 class='section-title' style='margin-left: 5%; margin-bottom: 0'>Adauga o Postare</h1>
					<div style='margin-left: 5%;' id='memberFormWrapper'>
					<form method='POST' action='members.php' id='postsForm' enctype='multipart/form-data'>
						 <h1 class='section-title' style='margin: 0 0 50px 0; color: black; font-size: 2.3em;'>Informatii Generale</h1>
						<div class='group'>
							<label for='postTitle'>Titlu :</label>
							<input type='text' id='postTitle' name='postTitle'>
						</div>

						<div class='group'>
							<label for='postAuthor'>Autor :</label>
							<input type='text' id='postAuthor' name='postAuthor'>
						</div>

						<div class='group'>
							<label for='postTags'>Tags :</label>
							<input type='text' id='postTags' name='postTags'>
						</div>

						<div class='group'>
							<label for='postImage'>Imagine :</label>c
							<input type='file' id='postImage' name='postImage'>
						</div>
						<!-- Transmiting the post acategory id to the post_script.php -->
						<input type="hidden" id="postCategoryId" name="postCategoryId">
						<div class='group last-group'>
							<label>Categorie :</label>
							<select id='selectCategory' name='postCategory'>
								<?php 
									$optionsQuery = $database->query("SELECT * FROM categories");

									//displaying the catefories dinamicaly
									while($row = $optionsQuery->fetch(PDO::FETCH_ASSOC)) {
										echo "<option  data-target='" . $row['id'] ."'>" . $row['category_title'] . "</option>";
									}
								 ?>
							</select>
						</div>	

						<h1 class='section-title' style='margin: 0 0 50px 0; color: black; font-size: 2.3em;'>Continutul Postarii</h1>

						 <div class='group large-group'>
						 	<label for='postContent'>Continut :</label>
						 	<textarea name='postContent' id='postContent'></textarea>
						 </div>

						 <div class='group'>
							<button class="button" type='submit' name='submitPost' id='submitPost' value="Posteaza !">Posteaza</button>
						</div>
					</form>
				</div>