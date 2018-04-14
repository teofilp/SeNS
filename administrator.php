<!DOCTYPE html>
<html>
<head>
	<title>Admin SNS</title>
	<meta charset="utf-8">

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>

    <!-- Optional theme -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' integrity='sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp' crossorigin='anonymous'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'>

	<link rel='stylesheet' type='text/css' href='styles/admin-style.css'>
	<link rel='stylesheet' type='text/css' href='styles/login.css'>
</head>
<body>
	<div id='adminPanelWrapper'>
		<div id='adminPanel'>
			<div id='dashboard'>
				<div class='wrapper'>
					<div id='administratorImage'></div>
				</div>
				 <div id='dashboardItemsWrapper'>
				 	<a onclick='return false;' class='dashboard-link' href='#' data-target='syndicate-members'>
				 		<div class='dashboard-item'>
					 		<div class='span-wrapper'>
					 			<span class='glyphicon glyphicon-user'></span>
					 		</div>
					 		<h2 class='title'>Membrii</h2>
					 	</div>
				 	</a>
				 	<a onclick='return false;' class='dashboard-link' href='#' data-target='syndicate-posts'>
				 		<div class='dashboard-item'>
					 		<div class='span-wrapper'>
					 			<span class='glyphicon glyphicon-th-list'></span>
					 		</div>
					 		<h2 class='title'>Postari & Stiri</h2>
					 	</div>
				 	</a>
				 	<a onclick='return false;' class='dashboard-link' href='#' data-target='syndicate-admins'>
				 		<div class='dashboard-item'>
					 		<div class='span-wrapper'>
					 			<span class='glyphicon glyphicon-tower'></span>
					 		</div>
					 		<h2 class='title'>Administratori</h2>
					 	</div>
				 	</a>
				 	<a onclick='return false;' class='dashboard-link' href='#' data-target='syndicate-categories'>
				 		<div class='dashboard-item'>
					 		<div class='span-wrapper'>
					 			<span class='glyphicon glyphicon-knight'></span>
					 		</div>
					 		<h2 class='title'>Categorii</h2>
					 	</div>
				 	</a>
				 </div>
			</div>
			<div id='panelInfo'>
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
				    	include "php_scripts/database.php";

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

			</div> <!-- penl Info tag end  -->
		</div>
	</div>
	<script
	  src='https://code.jquery.com/jquery-3.2.1.js'
	  integrity='sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE='
	  crossorigin='anonymous'></script>
	<script type='text/javascript' src='js/ajax-script.js'></script>
</body>
</html>