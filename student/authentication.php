<?php 
	session_start();
	require "../public/db/dbConnect.php";
	extract($_POST);
	if(isset($login)){
		if ($database->has("registration", [
			"AND" => [
				"studentID" => $studentID,
				"status" => 1
			]
		]) ){
			echo "true";	
			$_SESSION["student_logged_in"] = $studentID;
			$name = $database->select("registration", "firstname", [
				"studentID" => $studentID
			]);
			$_SESSION["name"] = $name[0];
		}
		else {
			$status = $database->select("registration", "status", [
				"studentID" => $studentID
			]);
			if(isset( $status[0] ) && $status[0] == "0"){
				echo "You have not been authorized yet";
			}
			else{
				echo "Invalid username or password";
			}
			
		}
	}
	if(isset($logout)){
		session_unset(); 
	}
	
?>