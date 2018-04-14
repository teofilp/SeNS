<?php 

	include 'database.php';

	if(isset($_POST['memberSubmited'])) {

		//reciveing the member info
		$firstName = strip_tags($_POST['firstName']);
		$lastName = strip_tags($_POST['lastName']);
		$email = strip_tags($_POST['email']);
		$adeziune = strip_tags($_POST['adeziune']);
		$address = strip_tags($_POST['address']);
		$job = strip_tags($_POST['job']);
		$jobPlace = strip_tags($_POST['job_place']);
		$memberCNP = strip_tags($_POST['memberCNP']);
		
		echo $firstName . $lastName . $email . $adeziune . $address . $job . $jobPlace . $memberCNP;

		$test = "Rares";
		//preparing the insert query
		$insertMemberQuery = $database->prepare("INSERT INTO members (prenume, nume, email, adeziune, cnp, job, job_place, address) VALUES (:prenume, :nume, :email, :adeziune, :cnp, :job, :job_place, :address)");
		//insertiung the parameters
		$insertMemberQuery->bindParam(":prenume", $firstName);
        $insertMemberQuery->bindParam(":nume", $lastName);
        $insertMemberQuery->bindParam(":email", $email);
        $insertMemberQuery->bindParam(":adeziune", $adeziune);
        $insertMemberQuery->bindParam(":cnp", $memberCNP);
        $insertMemberQuery->bindParam(":job", $job);
        $insertMemberQuery->bindParam(":job_place", $jobPlace);
        $insertMemberQuery->bindParam(":address", $address);
       	$insertMemberQuery->execute();
	}

	//selecting all the members
	$allMembersQuery = $database->query("SELECT * FROM members");
	$allMembersQuery->execute();

	//the response to the page is sent here
	while($row = $allMembersQuery->fetch(PDO::FETCH_ASSOC)) {

		
		$response = "<tr><td>" . $row['prenume'] . "</td>";
		$response .= "<td>" . $row['nume'] . "</td>";
		$response .= "<td>" . $row['email'] . "</td>";
		$response .= "<td>" . $row['adeziune'] . "</dt>";
		$response .= "<td>" . $row['address'] . "</td>";
		$response .= "<td>" . $row['job'] . "</td>";
		$response .= "<td>" . $row['job_place'] . "</td>";
		$response .= "<td>" . $row['cnp'] . "<td><td><button class='btn btn-danger' data-target='member' value='" . $row['id'] . "'>Sterge</button></td></tr>";

		echo $response;
	} 

	if(isset($_POST['deletedMember'])) {

		$memberId = strip_tags($_POST['memberId']);

		//delete query
		$deleteMemberQuery = $database->prepare("DELETE FROM members WHERE id = :memberId");
		$deleteMemberQuery->bindParam(":memberId", $memberId);
		$deleteMemberQuery->execute();
	}
 ?>