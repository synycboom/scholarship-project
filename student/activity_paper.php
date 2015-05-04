<?php 
	session_start();
	require "../public/db/dbConnect.php";
	if(!isset($_SESSION['student_logged_in'])){
		header("Location: ".url()."/scholarship/student/");
	}

	$academicYear = $database->select("registration","academicYear",[
				"studentID" => $_SESSION["student_logged_in"],
				"ORDER" => "academicYear DESC"

	]);

	// $totalTime = $database->select("activity", "total", [
	// 		"AND" => [
	// 			"studentID" => $_SESSION["student_logged_in"],
	// 			"academicYear" => $academicYear[0]
	// 		]
			
	// ]);

	$datas = $database->select("activity", "*", [
		"AND" =>["studentID" => $_SESSION["student_logged_in"],
		"academicYear" => $academicYear[0]] ,
		"ORDER" => "date"
	]);

	$count = $database->count("activity", "*", [
		"AND" =>["studentID" => $_SESSION["student_logged_in"],
		"academicYear" => $academicYear[0]]
	]);

	/////////////////////////////////////////////////////////////////////
	///////////////               for printing             //////////////
	$paper = ceil($count/23);
	$current_index = 0;
	$table_bound = 23;



	$name = $database->select("registration", "*", [
		"studentID" => $_SESSION["student_logged_in"]
	]);

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
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../public/css/activity_paper.css" >
		<script src="../public/js/jquery-1.11.1.min.js"></script>
		<script src="../public/js/bootstrap.js"></script>
		<script src="../public/js/student.js"></script>
		<script src="../public/js/activity_paper.js"></script>
	</head>
	<body>
		<div id="non-printable">
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">
			      	<img alt="Brand" src="../public/images/brand.png" id="brand">
			      </a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active" style="font-family: 'Droid Serif', serif;">
			        	<a><b>TU Engineering</b> 
			        		<span class="sr-only">(current)</span>
			        	</a>
			        </li>
			         <li style="font-family: 'Lobster', cursive; font-size:20px;">
			         	<a href="../student/">Student<span class="sr-only">(current)</span>
			         	</a>
			         </li>
			        
			        <?php if(isset($_SESSION['student_logged_in'])){ ?>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการ <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="activity_form.php" id="view-activity-form">ฟอร์มบันทึกกิจกรรม</a></li>
			            <li class="divider"></li>
			            <li><a href="view_all_activity.php" id="view-all-activity">กิจกรรมทั้งหมด</a></li>
			            <li class="divider"></li>
			            <li><a href="change_password.php" id="changePassword">เปลี่ยนรหัสผ่าน</a></li>
			            <li class="divider"></li>
			            <li><a href="activity_paper.php" >พิมพ์กิจกรรมทั้งหมด</a></li>
			            <li class="divider"></li>
			            <li><a href="registration_paper.php" >พิมพ์ใบสมัคร</a></li>
			          </ul>
			        </li>
			        <?php } ?>

			      </ul>
			      

			      <?php if(isset($_SESSION['student_logged_in'])){ ?>
			      	<form class="navbar-form navbar-right">
				      	<div class="form-group">
				        	<button class="btn btn-danger" id="logout">Logout</button>
				        </div>
			      	</form>

			      <?php } else { ?>
			      	<div class="navbar-form navbar-right">
				        <button class="btn btn-warning" data-toggle="modal" data-target="#loginModal">Login</button>
			      	</div>
			      <?php }?>

			      

			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		

			<div class="container" id="welcome">
					<div class="jumbotron" style="text-align:center;margin-top:10em">	  
			  	    	<h1 class="b">พิมพ์ประวัติกิจกรรมทั้งหมด</h1>
			  	    	<h2 style="color:red">ก่อนพิมพ์</h2>
			  	    	<h4 style="color:red">รองรับเฉพาะ google chrome เท่านั้น **</h4>
		  	    		<h3 ><b>กรุณายกเลิกการพิมพ์หัวกระดาษและท้ายกระดาษ</b></h3>
		  	    		<h4>เลือก Options -> ติ๊ก header and footer ออก</h4>
		  	    		<h3><b>เลือกขนาดกระดาษเป็น A4</b></h3>
		  	    		<h4>ที่ Paper size -> เลือก A4 </h4>
			  	    	<button class="btn btn-primary" id ="printActivityHis">print</button>
					</div>
			</div>


		</div>


		<div class="container" style="margin-top:1em;" id="printable">
			<div class="row">
				<div class="col-xs-12">
					<h5 class="htitle"><b>
						แบบลงชื่อมาช่วยปฏิบัติงานของนักศึกษาที่ได้รับทุนการศึกษา</br>
						คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธรรมศาสตร์</br>
						ประจำปีการศึกษา ............
						</b>
					</h5>
				</div>
			</div>

			<div class="row" id="upperText">
				<p style="text-indent:8em;">ชื่อ (นาย/น.ส.)...................................................................เลขทะเบียน.....................................
				</p>
				<p style="text-indent:8em;">สาขาวิชา.................................................................................ชั้นปีที่........................................
				</p>
				<p style="text-indent:8em;">ปฏิบัติงานกับอาจารย์/หน่วยงาน..........................................ซึ่งได้รับทุน...................................
				</p>
				<p style="text-indent:8em;">จำนวน.........................................บาท ต้องทำงานจำนวน..............................................ชั่วโมง
				</p>
			</div>

			<div class="row">
				<table border="1px" style="margin-left:4em; margin-top:-0.5em;">
					<thead>
					    <tr>
					    	<th>วัน/เดือน/ปี</th>
					     	<th>เวลาทำงาน</th>
					     	<th>ลายชื่อผู้มาทำงาน</th>
					     	<th>ชั่วโมง</th>
					     	<th>รายละเอียดการทำงานของนักศึกษา</th>
					  	</tr>
					</thead>
					<tbody>
						<?php 
							$i = 0;
							$totalTime = array();
							for(;$current_index<$table_bound;$current_index++){
								$t_time = explode(":",$datas["$current_index"]["start-time"]);
								$startTime = $t_time[0].":".$t_time[1];

								$t_time = explode(":",$datas["$current_index"]["end-time"]);
								$endTime = $t_time[0].":".$t_time[1];

								$t_time = explode(":",$datas["$current_index"]["total"]);
								$total = $t_time[0].":".$t_time[1];

								$t_date = explode("-",$datas["$current_index"]["date"]);
								$date = $t_date[2]."/".$t_date[1]."/".$t_date[0];
							  	echo "<tr>";
							     	echo "<td>".$date."</td>";
							     	echo "<td>";
							     		echo $startTime." - ".$endTime;
							     	echo "</td>";
							     	echo "<td>";
							     		echo $name[0]["firstname"]." ".$name[0]["lastname"];
							     	echo"</td>";
							     	echo "<td>".$total."</td>";
							     	echo "<td></td>";
							  	echo "</tr>";
							  	$totalTime[$i++] = $total;
							}
							for ($x = 1; $x <= (23-$i); $x++) {
								echo    "<tr>
											<td>&nbsp;</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>";
							}

							$table_bound += 23;   
							$paper -= 1;
						?>
					  	<tr>
					     	<td style="border-left-style:hidden;border-bottom-style:hidden;"></td>
					     	<td style="border-left-style:hidden;border-bottom-style:hidden;"></td>
					     	<td id="total">รวม</td>
					     	<td><?= Addtime($totalTime);?></td>
					     	<td style="border-right-style:hidden;border-bottom-style:hidden;"></td>
					  	</tr>
					</tbody>
				</table>
			</div>
			
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-11">
					<div class="box" style="margin-top:1em"></div>
					<p class="checkbox-text">นักศึกษาจะต้องเก็บเอกสารฉบับนี้ไว้กับตัว หรือเก็บไว้กับอาจารย์ / เจ้าหน้าที่ผู้ควบคุมนักศึกษา</br> และส่งคืนให้งานบริการนักศึกษา เมื่อครบชั่วโมงที่กำหนด</p>

					<div class="box"></div>
					<p class="checkbox-text">นักศึกษาต้องทำงานครบตามชั่วโมงที่กำหนด 2 ครั้ง ครั้งที่ 1 (ภายในวันที่ ...........................................)</br>ครั้งที่ 2 (ภายในวันที่............................................)</p>

					<div class="box"  style="margin-top:0.7em"></div>
					<p class="checkbox-text">เอกสารฉบับนี้ใช้สำหรับเป็นหลักฐานในการขอทุนการศึกษาครั้งจ่อไปของนักศึกษา</p>
				</div>
				
			</div>
			
			<div class="row"  >
				<div class="col-xs-5"></div>
				<div class="col-xs-7">
					<p class="license" style="margin-top:0.1em">ผู้ควบคุม..................................................................ตัวบรรจง</br>
					ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์/เจ้าหน้าที่ (ผู้ควบคุม)</p>
				</div>
			</div>


				<div style="font-size: 12;margin-top: -70.3em;margin-left:30.7em">
					<?= $name[0]["academicYear"] ?>
				</div>


				<div style="font-size: 12;margin-top: 0.74em;margin-left:13em">
					<?= $name[0]["title"]." ".$name[0]["firstname"]."  &nbsp;".$name[0]["lastname"] ?>
				</div>
				<div style="font-size: 12;margin-top: -1.4em;margin-left:37em">
					<?= $name[0]["studentID"]?>
				</div>



				<div style="font-size: 12;margin-top: 0.75em;margin-left:14em">
					<?= $name[0]["department"] ?>
				</div>
				<div style="font-size: 12;margin-top: -1.5em;margin-left:39em">
					<?= $name[0]["year"]?>
				</div>


		</div>
		<section id="printable" style="margin-top:7em"></section>









		<?php for($k = 0; $k < $paper ;$k++){ ?>

			<div class="container" style="margin-top:1em;" id="printable">
				<div class="row" style="margin-top:2em;">
					<div class="col-xs-12">
						<h5 class="htitle"><b>
							แบบลงชื่อมาช่วยปฏิบัติงานของนักศึกษาที่ได้รับทุนการศึกษา</br>
							คณะวิศวกรรมศาสตร์ มหาวิทยาลัยธรรมศาสตร์</br>
							ประจำปีการศึกษา ............
							</b>
						</h5>
					</div>
				</div>
				<div class="row" id="upperText">
					<p style="text-indent:8em;">ชื่อ (นาย/น.ส.)...................................................................เลขทะเบียน.....................................
					</p>
					<p style="text-indent:8em;">สาขาวิชา.................................................................................ชั้นปีที่........................................
					</p>
					<p style="text-indent:8em;">ปฏิบัติงานกับอาจารย์/หน่วยงาน..........................................ซึ่งได้รับทุน...................................
					</p>
					<p style="text-indent:8em;">จำนวน.........................................บาท ต้องทำงานจำนวน..............................................ชั่วโมง
					</p>
				</div>

				<div class="row">
					<table border="1px" style="margin-left:4em; margin-top:-0.5em;">
						<thead>
						    <tr>
						    	<th>วัน/เดือน/ปี</th>
						     	<th>เวลาทำงาน</th>
						     	<th>ลายชื่อผู้มาทำงาน</th>
						     	<th>ชั่วโมง</th>
						     	<th>รายละเอียดการทำงานของนักศึกษา</th>
						  	</tr>
						</thead>
						<tbody>
							<?php 
								$i = 0;
								$totalTime = array();
								for(;$current_index<$table_bound;$current_index++){
									if($current_index == $count){
										break;
									}
									$t_time = explode(":",$datas["$current_index"]["start-time"]);
									$startTime = $t_time[0].":".$t_time[1];

									$t_time = explode(":",$datas["$current_index"]["end-time"]);
									$endTime = $t_time[0].":".$t_time[1];

									$t_time = explode(":",$datas["$current_index"]["total"]);
									$total = $t_time[0].":".$t_time[1];

									$t_date = explode("-",$datas["$current_index"]["date"]);
									$date = $t_date[2]."/".$t_date[1]."/".$t_date[0];
								  	echo "<tr>";
								     	echo "<td>".$date."</td>";
								     	echo "<td>";
								     		echo $startTime." - ".$endTime;
								     	echo "</td>";
								     	echo "<td>";
								     		echo $name[0]["firstname"]." ".$name[0]["lastname"];
								     	echo"</td>";
								     	echo "<td>".$total."</td>";
								     	echo "<td></td>";
								  	echo "</tr>";
								  	$totalTime[$i++] = $total;
								}
								for ($x = 1; $x <= (23-$i); $x++) {
									echo    "<tr>
												<td>&nbsp;</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>";
								}

								$table_bound += 23;   
							?>
						  	<tr>
						     	<td style="border-left-style:hidden;border-bottom-style:hidden;"></td>
						     	<td style="border-left-style:hidden;border-bottom-style:hidden;"></td>
						     	<td id="total">รวม</td>
						     	<td><?= Addtime($totalTime);?></td>
						     	<td style="border-right-style:hidden;border-bottom-style:hidden;"></td>
						  	</tr>
						</tbody>
					</table>
				</div>
				
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-11">
						<div class="box" style="margin-top:1em"></div>
						<p class="checkbox-text">นักศึกษาจะต้องเก็บเอกสารฉบับนี้ไว้กับตัว หรือเก็บไว้กับอาจารย์ / เจ้าหน้าที่ผู้ควบคุมนักศึกษา</br> และส่งคืนให้งานบริการนักศึกษา เมื่อครบชั่วโมงที่กำหนด</p>

						<div class="box"></div>
						<p class="checkbox-text">นักศึกษาต้องทำงานครบตามชั่วโมงที่กำหนด 2 ครั้ง ครั้งที่ 1 (ภายในวันที่ ...........................................)</br>ครั้งที่ 2 (ภายในวันที่............................................)</p>

						<div class="box"  style="margin-top:0.7em"></div>
						<p class="checkbox-text">เอกสารฉบับนี้ใช้สำหรับเป็นหลักฐานในการขอทุนการศึกษาครั้งจ่อไปของนักศึกษา</p>
					</div>
					
				</div>
				
				<div class="row"  >
					<div class="col-xs-5"></div>
					<div class="col-xs-7">
						<p class="license" style="margin-top:0.1em">ผู้ควบคุม..................................................................ตัวบรรจง</br>
						ตำแหน่ง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาจารย์/เจ้าหน้าที่ (ผู้ควบคุม)</p>
					</div>
				</div>


					<div style="font-size: 12;margin-top: -70.3em;margin-left:30.7em">
						<?= $name[0]["academicYear"] ?>
					</div>


					<div style="font-size: 12;margin-top: 0.74em;margin-left:13em">
						<?= $name[0]["title"]." ".$name[0]["firstname"]."  &nbsp;".$name[0]["lastname"] ?>
					</div>
					<div style="font-size: 12;margin-top: -1.4em;margin-left:37em">
						<?= $name[0]["studentID"]?>
					</div>



					<div style="font-size: 12;margin-top: 0.75em;margin-left:14em">
						<?= $name[0]["department"] ?>
					</div>
					<div style="font-size: 12;margin-top: -1.5em;margin-left:39em">
						<?= $name[0]["year"]?>
					</div>


			</div>
			<section id="printable" style="margin-top:7em"></section>
		<?php }?>

	</body>
</html>