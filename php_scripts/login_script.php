<?php 

	include 'database.php';

	if (isset($_POST['login'])) {

		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);

		//getting the encrypted password from the database
		$password = cryptPassword($password);

		$loginQuery = $database->prepare('SELECT * FROM users WHERE user_name = :username');
		$loginQuery->bindParam(':username', $username);
		$loginQuery->execute();

		if($loginQuery->rowCount() > 0) {

			while($row = $loginQuery->fetch(PDO::FETCH_ASSOC)) 	{
				$validUserPassword = $row['password']; 
			}

			if($password == $validUserPassword) {
		 		$response="<div id='adminPanelWrapper'>
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
															
									</div> <!-- penl Info tag end  -->
								</div>
							</div>
							";
				 echo $response;
			} else {
				$response = "
					    <div id='formWrapper'>
					      	<div id='formContainer'>
							      <div class='warning-wrapper'><h1 class='warning-login'>Parola introdusa nu exista!!</h1></div>
							        <h1 class='title-login'>Log In</h1>
							        <form action='php_scripts/login_script.php' method='POST'>
							          <div class='group-login'>
							            <label class='label-login'  for='userName'>Username :</label>
							            <input class='input-text' placeholder='username' type='text' name='userName' id='userName'>
							          </div>
							          <div class='group-login'>
							            <label class='label-login' for='userPassword'>Password :</label>
							            <input class='input-text' placeholder='password' type='password' name='userPassword' id='userPassword'>
							          </div>

							          <input class='submit-input' type='submit' onclick='return false;'  name='logInBtn' id='logInBtn' value='Logi In'>
							        </form>
							 </div>
							 <div class='overlay'></div>
						 </div>";
							   
				echo $response;
			}
		} else {
				   $response = "
							    <div id='formWrapper'>
							      <div id='formContainer'>
							      	<div class='warning-wrapper'><h1 class='warning-login'>Nume de utilizator incorect!</h1></div>
									        <h1 class='title-login'>Log In</h1>
									        <form action='php_scripts/login_script.php' method='POST'>
									          <div class='group-login'>
									            <label class='label-login' for='userName'>Username :</label>
									            <input class='input-text' placeholder='username' type='text' name='userName' id='userName'>
									          </div>
									          <div class='group-login'>
									            <label class='label-login' for='userPassword'>Password :</label>
									            <input class='input-text' placeholder='password' type='password' name='userPassword' id='userPassword'>
									          </div>

									          <input class='submit-input' type='submit' onclick='return false;'  name='logInBtn' id='logInBtn' value='Logi In'>
									        </form>
									 </div>
									 <div class='overlay'></div>
								</div>";	
			echo $response;
		}
	}
 ?>

