<?php 
	session_start();
	require "../public/db/dbConnect.php";
	extract($_POST);
	if(isset($login)){
		if ($database->has("admin", [
			"AND" => [
				"username" => $username,
				"password" => $password
			]
		]) ){
			echo "true";	
			$_SESSION["logged_in"] = "true";
			$_SESSION['greatOrderFirst'] = false;
			$_SESSION['isSearch'] = false;
		}
		else {
			echo "Invalid username or password";
		}
	}
	if(isset($logout)){
		session_unset(); 
	}
	
?>