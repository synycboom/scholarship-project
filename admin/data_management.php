<?php
	require "../public/db/dbConnect.php";
	extract($_POST);
	session_start();
	if(!isset($_SESSION["logged_in"])){
		header("Location: ".url()."/scholarship/admin/");
	}

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
		$studentID = $database->select("registration", 
			["studentID",
			 "academicYear"], 
			["id" => $detailID]
		);

		$details = $database->select("activity", "total", [
			"AND" => [
				"studentID" => $studentID[0]["studentID"],
				"academicYear" => $studentID[0]["academicYear"]
			]
			
		]);
		$d_arr = explode(":",AddTime($details));
		echo "เวลาทำกิจกรรมทั้งหมด: ".$d_arr[0]." ชั่วโมง : ".$d_arr[1]." นาที";
	}

	if(isset($setInCompleteID)){
		$database->update("registration", [
				"status" => "1"],[
				"id" => $setInCompleteID
		]);
		echo 'ใช้ทุนยังไม่ครบ';
	}

	if(isset($setCompleteID)){
		$database->update("registration", [
				"status" => "2"],[
				"id" => $setCompleteID
		]);
		echo 'ใช้ทุนครบแล้ว';
	}

	else if(isset($passID)){
		$database->update("registration", [
				"status" => "1",
				"scholarship_t" => $type,
				"amount" => $amount],[
				"id" => $passID
		]);
		echo "<button type='button' class='btn btn-success change-status' id='".$passID."'>&nbsp;&nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;&nbsp;</button>";
	}

	else if(isset($notPassID)){
		$database->update("registration", [
				"status" => "0",
				"scholarship_t" => $type,
				"amount" => $amount],[
				"id" => $notPassID
		]);
		echo "<button type='button' class='btn btn-danger change-status' id='".$notPassID."'>ไม่อนุมัติ</button>";
	}


	else if(isset($findType)){
		$datas = $database->select("registration", "*", [
									"id" => $findType]);
		foreach($datas as $data){
			echo $data['scholarship_t']." ".$data['amount'];
		}	
	}

	else if(isset($moreDetailID)){
		$datas = $database->select("registration", "*", [
									"id" => $moreDetailID]);
		foreach($datas as $data){
			echo "รหัสนักศึกษา: ".$data['studentID']."</br>\n";
			echo "ชื่อ - นามสกุล: ".$data['firstname']."\n";
			echo $data['lastname']."</br>\n";
			echo "ชั้นปี: ".$data['year']."</br>\n";
			echo "ปีการศึกษา: ".$data['academicYear']."</br>\n";
			echo "เกรดเฉลี่ย: ".$data['GPA']."</br>\n";
			echo "ภาควิชา: ".$data['department']."</br>\n";
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

	function url(){
	  return sprintf(
	    "%s://%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME']
	  );
	}
?>