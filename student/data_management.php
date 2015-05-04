<?php 
	session_start();
	require "../public/db/dbConnect.php";
	extract($_POST);

	if(!isset($_SESSION["student_logged_in"])){
		header("Location: ".url()."/scholarship/student/");
	}

	if(empty($date)||empty($startTime)||empty($endTime)){
		echo "Some inputs are empty";
	}
	else{
		$inValid = false;
		$time_arr  = explode('/', $date);
		if(count($time_arr)!=3){
			$time_arr  = explode('-', $date);
		}
		if(count($time_arr)!=3){
			echo "Date is not valid. ";
			$inValid = true;
		}else{
			//if BE convert to BE 
			if($time_arr[0]>date("Y")){
				$time_arr[0]  = (intval($time_arr[0] ) - 543)."";
			}
			//date validation  ||month||  day ||          year     ||
			if (!(checkdate($time_arr[1], $time_arr[2], $time_arr[0]) && $time_arr[0] == date("Y") ) ) {
				echo "Date is not valid. ";
				$inValid = true;
			}
			else{
				if($time_arr[0] == date("Y")){
					$date = (date("Y")+543)."/".$time_arr[1]."/".$time_arr[2];
				}
			}
		}
		

		//time validation
		if( !(preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/", $startTime) 
			&& preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/", $endTime) && ( $startTime < $endTime ) ) ){

			echo "Time is not valid. ";
			$inValid = true;
		}

		//if data is valid
		if(!$inValid){


			$academicYear = $database->select("registration","academicYear",[
				"studentID" => $_SESSION["student_logged_in"],
				"ORDER" => "academicYear DESC"

			]);
			$count = $database->count("activity",[
				"AND" => [
					"studentID" =>  $_SESSION["student_logged_in"],
					"academicYear" => $academicYear[0]
				]
			]);
			//student can insert upto 26 because the paper has a length limit to 26 row
			// if($count<26){
				$database->insert("activity", [
					"studentID" => $_SESSION["student_logged_in"],
					"date" => $date,
					"start-time" => $startTime,
					"end-time" => $endTime,
					"total" => $totalTime,
					"academicYear" => $academicYear[0]
				]);
				echo "ok";
			// }
			// else{
			// 	echo "Can't add new data. Your activity is full";
			// }


		}
	}
	
	


	

	function url(){
	  return sprintf(
	    "%s://%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME']
	  );
	}
	
?>