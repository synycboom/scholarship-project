<?php 
	session_start();
	require "../public/db/dbConnect.php";

	if (!function_exists('hash_equals')) {

	    /**
	     * Timing attack safe string comparison
	     * 
	     * Compares two strings using the same time whether they're equal or not.
	     * This function should be used to mitigate timing attacks; for instance, when testing crypt() password hashes.
	     * 
	     * @param string $known_string The string of known length to compare against
	     * @param string $user_string The user-supplied string
	     * @return boolean Returns TRUE when the two strings are equal, FALSE otherwise.
	     */
	    function hash_equals($known_string, $user_string)
	    {
	        if (func_num_args() !== 2) {
	            // handle wrong parameter count as the native implentation
	            trigger_error('hash_equals() expects exactly 2 parameters, ' . func_num_args() . ' given', E_USER_WARNING);
	            return null;
	        }
	        if (is_string($known_string) !== true) {
	            trigger_error('hash_equals(): Expected known_string to be a string, ' . gettype($known_string) . ' given', E_USER_WARNING);
	            return false;
	        }
	        $known_string_len = strlen($known_string);
	        $user_string_type_error = 'hash_equals(): Expected user_string to be a string, ' . gettype($user_string) . ' given'; // prepare wrong type error message now to reduce the impact of string concatenation and the gettype call
	        if (is_string($user_string) !== true) {
	            trigger_error($user_string_type_error, E_USER_WARNING);
	            // prevention of timing attacks might be still possible if we handle $user_string as a string of diffent length (the trigger_error() call increases the execution time a bit)
	            $user_string_len = strlen($user_string);
	            $user_string_len = $known_string_len + 1;
	        } else {
	            $user_string_len = $known_string_len + 1;
	            $user_string_len = strlen($user_string);
	        }
	        if ($known_string_len !== $user_string_len) {
	            $res = $known_string ^ $known_string; // use $known_string instead of $user_string to handle strings of diffrent length.
	            $ret = 1; // set $ret to 1 to make sure false is returned
	        } else {
	            $res = $known_string ^ $user_string;
	            $ret = 0;
	        }
	        for ($i = strlen($res) - 1; $i >= 0; $i--) {
	            $ret |= ord($res[$i]);
	        }
	        return $ret === 0;
	    }

	}

	extract($_POST);
	if(isset($login)){
		if(!empty($studentID) && preg_match("/^([0-9]){10}$/", $studentID) && !empty($password)){
			$pass = $database->select("registration","password",["studentID" => $studentID]);
			//if this user exist in db
			if(isset($pass[0])){
				//if this user has verified
				if ($database->has("registration", [
					"AND" => [
						"studentID" => $studentID,
						"status" => 1
					]
				]) ){
					//if user has a correct password
					if (hash_equals($pass[0], crypt($password, $pass[0]))) {
				    	echo "เข้าสู่ระบบสำเร็จ :)";
						$_SESSION["student_logged_in"] = $studentID;
						$name = $database->select("registration", "firstname", [
							"studentID" => $studentID
						]);
						$_SESSION["name"] = $name[0];
					}
					//if user has an incorrect password
					else{
						echo "รหัสผ่านไม่ถูกต้อง!!";
					}
				}

				//if user status has not verified
				else{
					echo "คุณยังไม่ได้รับอนุมัติทุนการศึกษา";
				}

			}
			//user is not in database
			else{
				echo "ไม่พบผู้ใช้นี้";
			}
		}
		//invalid input
		else{
			echo "รหัสนักศึกษา หรือ รหัสผ่าน ไม่ถูกต้อง";
		}

		

	}
	if(isset($logout)){
		session_unset(); 
	}

	//reset password
	if(isset($currentPassword)&&isset($newPassword)&&isset($reNewPassword)){
		if(empty($newPassword)||empty($currentPassword)||empty($reNewPassword)){
			echo "กรุณากรอกข้อมูลให้ครบถ้วน";

		}
		else if($newPassword!=$reNewPassword){
			echo "รหัสผ่านใหม่ไม่เหมือนกัน!";
		}
		else if(!preg_match("/^([A-Za-z0-9])*$/", $newPassword)){
			echo "รหัสผ่านมีตัวอักษรที่ไม่ได้รับอนุญาติ";
		}
		else if(strlen($newPassword)<8 ){
			echo "ความยาวน้อยกว่า 8 ตัวอักษร";
		}
		else if(strlen($newPassword)>10 ){
			echo "ความยาวมากกว่า 10 ตัวอักษร";
		}
		
		else{
			$pass = $database->select("registration","password",["studentID" => $_SESSION["student_logged_in"]]);
			if(isset($pass[0])){
				//is current password verified?
				if (hash_equals($pass[0], crypt($currentPassword, $pass[0]))){
					$hash_password = crypt($reNewPassword);
					$database->update("registration", [
							"password" => $hash_password],[
							"studentID" => $_SESSION["student_logged_in"]
					]);
					echo "เปลี่ยนรหัสผ่านสำเร็จ";
				}
				else{
					echo "รหัสผ่านปัจจุบันไม่ถูกต้อง";
				}
			}
		}

		

	}

	
?>