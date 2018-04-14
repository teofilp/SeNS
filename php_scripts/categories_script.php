<?php 
	include "database.php";

	if(isset($_POST['categoryAdded'])) {

		$category = $_POST['categoryName'];

		//inserting actegory into database
		$insertQuery = $database->prepare("INSERT INTO categories (id, category_title) VALUES (NULL, :category)");
		$insertQuery->bindParam(":category", $category);
		$insertQuery->execute();

	} else {

		$optionsQuery = $database->query("SELECT * FROM categories");

		//displaying the catefories dinamicaly
		while($row = $optionsQuery->fetch(PDO::FETCH_ASSOC)) {
			echo "<option  value='" . $row['id'] ."'>" . $row['category_title'] . "</option>";
		}
	}
 ?>