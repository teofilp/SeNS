
<h1 class='section-title'>Adauga o Categorie</h1>
				<div id='memberFormWrapper'>
					<form method='POST' action='' id='categoriesForm'>
						<div class='group'>
							<label>Categorie :</label>
							<input type='text' name='postCategory' id='postCategory'>
						</div>
						<div class='group'>
							<button class="button" type='submit' name='addCategory'>Adauga !</button>
						</div>
					</form>
				</div> 
				<div id="tableContainer">
					<table style="font-family: 'Open Sans Condensed', sans-serif;" class='table table-hover'>
					    <thead>
					      <tr>
					        <th>Numar</th>
					        <th>Categorie</th>
					      </tr>
					    </thead>
					    <tbody id="categoriesTableBody">
					    	<?php 
								include "../php_scripts/database.php";

								$optionsQuery = $database->query("SELECT * FROM categories");
								$optionsQuery->execute();

								//displaying the catefories dinamicaly
								while($row = $optionsQuery->fetch(PDO::FETCH_ASSOC)) {
									echo "<tr><td>" . $row['id'] ."</td><td>" . $row['category_title'] . "</td></tr>";
								}
							 ?>
					    </tbody>
					  </table> 
				  </div>
