<?php 
		try {
		$database = new PDO("mysql:dbname=sns;host=localhost", "root", "");
	} catch (Exception $e) {
		echo "Sorry an error has occured. Check your internet connetction and try again.";
	}

	echo cryptPassword("parola");

	//function for encrypting the password 
	function cryptPassword($userPassword) {

		$hashFromat = "$2y$10$";
		$salt = "thiscryptisinvdopeel22";
		//combining the hashFormat and the salt for better security
		$cryptString = $hashFromat . $salt;

		$encryptedPassword = crypt($userPassword, $cryptString);

		return $encryptedPassword;
	}
 ?>

 