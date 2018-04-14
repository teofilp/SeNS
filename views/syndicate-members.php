 <h1 class='section-title'>Membrii Sindicatului</h1>
				<div id='memberFormWrapper'>
					<form method='POST' action='members.php' id='membersForm'>
						<div class='group'>
							<label>Prenume :</label>
							<input type='text' name='firstName' id="firstName">
						</div>

						<div class='group'>
							<label>Nume :</label>
							<input type='text' name='memberName' id="memberName">
						</div>

						<div class='group'>
							<label>Email :</label>
							<input type='email' name='memberEmail' id="memberEmail">
						</div>

						<div class='group'>
							<label>Adeziune :</label>
							<input type='text' name='adeziune' id='adeziune'>
						</div>

						<div class='group'>
							<label>Adresa :</label>
							<input type='text' name='memberAddress' id="memberAddress">
						</div>

						<div class="group">
							<label>CNP :</label>
							<input type="text" name="memberCNP" id="memberCNP">
						</div>

						<div class="group">
							<label>Functie :</label>
							<input type="text" name="memberJob" id="memberJob">
						</div>

						<div class="group">
							<label>Loc de Munca :</label>
							<input type="text" name="memberJobPlace" id="memberJobPlace">
						</div>

						<div class='group'>
							<button class='button' type='submit' name='submitMember' id='submitMember'>Adauga !</button>
						</div>
					</form>
				</div>
				<div id='tableContainer'>
					<table style="font-family: 'Open Sans Condensed', sans-serif"; font-size: 1.5em;' class='table table-hover'>
				    <thead>
				      <tr>
				        <th>Prenume</th>
				        <th>Nume</th>
				        <th>Email</th>
				        <th>Adeziune</th>
				        <th>Adresa</th>
				        <th>Functie</th>
				        <th>Loc de munca</th>
				        <th>CNP</th>
				      </tr>
				    </thead>
				    <tbody id="memberTableBody">
				    <?php 
				    	include "../php_scripts/database.php";

				    	$allMembersQuery = $database->query("SELECT * FROM members");
						$allMembersQuery->execute();

						//table data 
						while($row = $allMembersQuery->fetch(PDO::FETCH_ASSOC)) {

							
							$tableData = "<tr><td>" . $row['prenume'] . "</td>";
							$tableData .= "<td>" . $row['nume'] . "</td>";
							$tableData .= "<td>" . $row['email'] . "</td>";
							$tableData .= "<td>" . $row['adeziune'] . "</dt>";
							$tableData .= "<td>" . $row['address'] . "</td>";
							$tableData .= "<td>" . $row['job'] . "</td>";
							$tableData .= "<td>" . $row['job_place'] . "</td>";
							$tableData .= "<td>" . $row['cnp'] . "</td><td><button class='btn btn-danger' data-target='member' value='" . $row['id'] . "'>Sterge</button></td></tr>";

							echo $tableData;
						} 
				     ?>
				    </tbody>
				  </table> 
