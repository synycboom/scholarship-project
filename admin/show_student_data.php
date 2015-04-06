<?php
	require "../public/db/dbConnect.php";
	extract($_POST);
	// query first time ajax call
	$datas = $database->select("registration", "*");

	//return call back javascript
	echo '<script>';
	echo 'function changeStatus(id) {';
		echo 'var dataString = "id="+id;';     
		echo '$.ajax({ ';   	
			echo 'type: "POST", ';	
			echo 'url: "show_student_data.php",';      
			echo 'data: dataString,';     
			echo 'success: function(response) {';	        
				echo "$('#table-data').html(response);";        	
			echo '}';  
		echo '});';  
		echo 'return false;'; 
    echo '};';

    echo 'function moreDetails() {';
		// echo 'var dataString = "id="+id;';     
		// echo '$.ajax({ ';   	
		// 	echo 'type: "POST", ';	
		// 	echo 'url: "show_student_data.php",';      
		// 	echo 'data: dataString,';     
		// 	echo 'success: function(response) {';	        
		// 		echo "$('#table-data').html(response);";        	
		// 	echo '}';  
		// echo '});';  
		// echo 'return false;'; 
    	echo "$('#more-detail-modal').modal('show')";  
    echo '};';

	echo '</script>';

	

	if(isset($id)){
		$status = $database->select("registration", "status", [
			"id" => $id
		]);
		if($status[0]=="0"){
			$database->update("registration", [
				"status" => "1"],[
				"id" => $id
			]);
		}
		else{
			$database->update("registration", [
				"status" => "0"],[
				"id" => $id
			]);
		}



		$datas = $database->select("registration", "*");


		echo "<table class='table table-hover' style='margin-top:6em;text-align:center;'>\n";
			echo "<thead>\n";
				echo "<tr>\n";
					echo "<th class='info' style='text-align:center'>Student ID</th>\n";
					echo "<th class='info' style='text-align:center'>First Name</th>\n";
					echo "<th class='info' style='text-align:center'>Last Name</th>\n";
					echo "<th class='info' style='text-align:center'>Department</th>\n";
					echo "<th class='info' style='text-align:center'>Year</th>\n";
					echo "<th class='info' style='text-align:center'>GPA</th>\n";
					echo "<th class='info' style='text-align:center'>Academic Year</th>\n";
					echo "<th class='info' style='text-align:center'>Status</th>\n";

				echo "</tr>\n";


			echo "</thead>\n";
			
			echo "<tbody>\n";
			foreach($datas as $data)
			{
				echo "<tr>\n";
					echo "<td>\n";
						echo $data["studentID"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["firstname"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["lastname"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["department"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["year"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["GPA"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["academicYear"];
					echo "</td>\n";

					echo "<td>\n";
						if($data["status"] == 0)
							echo "<button type='button' class='btn btn-danger ' onClick=\"changeStatus(".$data["id"].")\">not pass</button>";
						else
							echo "<button type='button' class='btn btn-success'  onClick=\"changeStatus(".$data["id"].")\">&nbsp;&nbsp;&nbsp;pass&nbsp;&nbsp;&nbsp;</button>";
					echo "</td>\n";

				echo "</tr>\n";
	    	}
			echo "</tbody>\n";
		echo "</table>";
	}



	else{
		//status is only if admin want to know authorized students
		if(isset($status)){
			$datas = $database->select("registration", "*", [
			"status" => $status
			]);
		}


		echo "<table class='table table-hover' style='margin-top:6em;text-align:center;'>\n";
			echo "<thead>\n";
				echo "<tr>\n";
					echo "<th class='info' style='text-align:center'>Student ID</th>\n";
					echo "<th class='info' style='text-align:center'>First Name</th>\n";
					echo "<th class='info' style='text-align:center'>Last Name</th>\n";
					echo "<th class='info' style='text-align:center'>Department</th>\n";
					echo "<th class='info' style='text-align:center'>Year</th>\n";
					echo "<th class='info' style='text-align:center'>GPA</th>\n";
					echo "<th class='info' style='text-align:center'>Academic Year</th>\n";
					if(isset($status)){
					  echo "<th class='info' style='text-align:center'>Detail</th>\n";
					}
					else{
					  echo "<th class='info' style='text-align:center'>Status</th>\n";
					}
					

				echo "</tr>\n";


			echo "</thead>\n";
			
			echo "<tbody>\n";
			foreach($datas as $data)
			{
				echo "<tr>\n";
					echo "<td>\n";
						echo $data["studentID"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["firstname"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["lastname"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["department"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["year"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["GPA"];
					echo "</td>\n";

					echo "<td>\n";
						echo $data["academicYear"];
					echo "</td>\n";

					echo "<td>\n";
						if(isset($status)){
							echo "<button type='button' class='btn btn-info ' 
							onClick=\"moreDetails()\"
							>more details</button>";
						}
						else{
							if($data["status"] == 0)
							echo "<button type='button' class='btn btn-danger ' onClick=\"changeStatus(".$data["id"].")\">not pass</button>";
						else
							echo "<button type='button' class='btn btn-success'  onClick=\"changeStatus(".$data["id"].")\">&nbsp;&nbsp;&nbsp;pass&nbsp;&nbsp;&nbsp;</button>";
						}
						
					echo "</td>\n";

				echo "</tr>\n";
	    	}
			echo "</tbody>\n";
		echo "</table>";
	}

?>