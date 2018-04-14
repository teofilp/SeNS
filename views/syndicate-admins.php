<h1 class="section-title">Adauga Administrator</h1>
				<div id="memberFormWrapper">
					<form method="POST" action="" id='adminsForm'>
						<div class="group">
							<label>Utilizator :</label>
							<input type="text" name="newAdminUserName" id="newAdminUserName">
						</div>
						<div class="group">
							<label>Parola :</label>
							<input type="text" name="newAdminPassword" id="newAdminPassword">
						</div>
						<div class="group">
							<label>Prenume :</label>
							<input type="text" name="newAadminFirstName" id="newAadminFirstName">
						</div>
						<div class="group">
							<label>Nume :</label>
							<input type="text" name="newAdminSecondName" id="newAdminSecondName">
						</div>
						<div class="group">
							<button id="addAdmin" class="button" type="submit" name="addAdmin">Adauga !</button>
						</div>
					</form>
				</div> 
				<div id="tableContainer">
					<table style="font-family: 'Open Sans Condensed', sans-serif;" class='table table-hover'>
					    <thead>
					      <tr>
					        <th>Username</th>
					        <th>Parola</th>
					        <th>Nume</th>
					        <th>Prenume</th>
					      </tr>
					    </thead>
					    <tbody id="adminsTableBody">
					    	<?php 
					    		include "../php_scripts/database.php";

					    		$allUsersQuery = $database->query("SELECT * FROM users");
								$allUsersQuery->execute();

								//displaying table data 
								while($row = $allUsersQuery->fetch(PDO::FETCH_ASSOC)) {

									$response = "<tr><td>" . $row['user_name'] . "</td><td>" . $row['password'] ."</td><td>"
												. $row['first_name'] . "</td><td>" . $row['last_name'] ."</td><td><button onclikc='return false;' class='btn btn-danger' data-target='admin' value='". $row['id'] . "'>Sterge</button></td></tr>";

									echo $response;
								}
					    	 ?>
					    </tbody>
					  </table> 
				  </div>