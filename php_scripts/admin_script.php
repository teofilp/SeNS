<?php 
	include "database.php";

	//checking if clicked
	if(isset($_POST['adminAdded'])) {

		//getting user input
		$userName = strip_tags($_POST['adminUserName']);
		$userPassword = strip_tags($_POST['adminPassword']);
		$userFirstName = strip_tags($_POST['adminFirstName']);
		$userSecondName = strip_tags($_POST['adminSecondName']);

		//crypt password 
		$userPassword = cryptPassword($userPassword);

		//inserting administrator account into database
		$insertUser = $database->prepare("INSERT INTO users (id, user_name, password, first_name, last_name) VALUES (NULL, :userName, :userPassword, :firstName, :lastName)");
		$insertUser->bindParam(":userName", $userName);
		$insertUser->bindParam(":userPassword", $userPassword);
		$insertUser->bindParam(":firstName", $userFirstName);
		$insertUser->bindParam(":lastName", $userSecondName);
		$insertUser->execute();

		$allUsersQuery = $database->query("SELECT * FROM users");
		$allUsersQuery->execute();

		//displaying table data 
		while($row = $allUsersQuery->fetch(PDO::FETCH_ASSOC)) {

			$response = "<tr><td>" . $row['user_name'] . "</td><td>" . $row['password'] ."</td><td>"
						. $row['first_name'] . "</td><td>" . $row['last_name'] ."</td><td><button onclikc='return false;' class='btn btn-danger'>Sterge</button></td></tr>";

			echo $response;
		}
	}

	//checking if deleted btn is clicked
	if(isset($_POST['adminDeleted'])) {

		$adminId = strip_tags($_POST['adminId']);

		//deletiong query
		$deleteQuery = $database->prepare("DELETE FROM users WHERE id = :adminId");
		$deleteQuery->bindParam(":adminId", $adminId);
		$deleteQuery->execute();

		
	}

 ?>