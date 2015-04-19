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
		if(!empty($username) && !empty($password)){
			$pass = $database->select("admin","password",["username" => $username]);
			//if this user exist in db
			if(isset($pass[0])){
				if (hash_equals($pass[0], crypt($password, $pass[0]))){
					$_SESSION["logged_in"] = "true";
					$_SESSION['greatOrderFirst'] = false;
					$_SESSION['isSearch'] = false;
					echo "true";
				}
				//if user has an incorrect password
				else{
					echo "Password is incorrect!!";
				}
			}
			//user is not in database
			else{
				echo "There is no this username";
			}
		}
		else{
			echo "Invalid Username or Password";
		}
		// if ($database->has("admin", [
		// 	"AND" => [
		// 		"username" => $username,
		// 		"password" => $password
		// 	]
		// ]) ){
		// 	echo "true";	

		// }
		// else {
		// 	echo "Invalid username or password";
		// }
	}
	if(isset($logout)){
		session_unset(); 
	}
	
?>