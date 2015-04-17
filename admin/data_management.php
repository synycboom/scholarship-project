<?php
	require "../public/db/dbConnect.php";
	extract($_POST);

	if(isset($resetPasswordID)){
		$studentID = $database->select("registration", "studentID", [
			"id" => $resetPasswordID
		]);

		$hash_password = crypt($studentID[0]);

		$database->update("registration", [
				"password" => $hash_password],[
				"id" => $resetPasswordID
		]);
		echo "reset";

	}

	//see the total of activity time
	if(isset($detailID)){
		$studentID = $database->select("registration", "studentID", [
			"id" => $detailID
		]);
		$details = $database->select("activity", "total", [
			"studentID" => $studentID[0]
		]);
		echo "Total Activity Time: ".AddTime($details);
	}

	if(isset($setInCompleteID)){
		$database->update("registration", [
				"status" => "1"],[
				"id" => $setInCompleteID
		]);
		echo 'this student is incomplete';
	}

	if(isset($setCompleteID)){
		$database->update("registration", [
				"status" => "2"],[
				"id" => $setCompleteID
		]);
		echo 'this student is complete';
	}

	else if(isset($id)){
		$status = $database->select("registration", "status", [
			"id" => $id
		]);
		if($status[0]=="0"){
			$database->update("registration", [
				"status" => "1"],[
				"id" => $id
			]);
			echo "<button type='button' class='btn btn-success changeStatus' id='$id'>&nbsp;&nbsp;&nbsp;pass&nbsp;&nbsp;&nbsp;</button>";
		}
		else{
			$database->update("registration", [
				"status" => "0"],[
				"id" => $id
			]);
			echo "<button type='button' class='btn btn-danger changeStatus' id='$id'>not pass</button>";
		}
	}

	else if(isset($moreDetailID)){
		$datas = $database->select("registration", "*", [
									"id" => $moreDetailID]);
		foreach($datas as $data){
			echo "Student ID: ".$data['studentID']."</br>\n";
			echo "Name: ".$data['firstname']."\n";
			echo $data['lastname']."</br>\n";
			echo "Year: ".$data['year']."</br>\n";
			echo "Academic Year: ".$data['academicYear']."</br>\n";
			echo "GPA: ".$data['GPA']."</br>\n";
			echo "Departmet: ".$data['department']."</br>\n";
		}	
	}




	function AddTime($times) {
		$minutes = 0;
	    // loop throught all the times
	    foreach ($times as $time) {
	        list($hour, $minute) = explode(':', $time);
	        $minutes += $hour * 60;
	        $minutes += $minute;
	    }

	    $hours = floor($minutes / 60);
	    $minutes -= $hours * 60;

	    // returns the time already formatted
	    return sprintf('%02d:%02d', $hours, $minutes);
	}
?>