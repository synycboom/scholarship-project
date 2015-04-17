<?php 
	session_start();
	require "../public/db/dbConnect.php";
	extract($_POST);
	$database->insert("activity", [
		"studentID" => $_SESSION["student_logged_in"],
		"date" => $date,
		"start-time" => $startTime,
		"end-time" => $endTime,
		"total" => $totalTime
	]);
	
?>