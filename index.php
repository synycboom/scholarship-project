<?php 
	$firstnameErr = $lastnameErr = $studentIDErr = $yearErr = $GPAErr = $departmentErr= "";
	if(isset($_COOKIE['firstnameErr'])){
		$firstnameErr = $_COOKIE['firstnameErr'];
		setcookie("firstnameErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['lastnameErr'])){
		$lastnameErr = $_COOKIE['lastnameErr'];
		setcookie("lastnameErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['studentIDErr'])){
		$studentIDErr = $_COOKIE['studentIDErr'];
		setcookie("studentIDErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['yearErr'])){
		$yearErr = $_COOKIE['yearErr'];
		setcookie("yearErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['GPAErr'])){
		$GPAErr = $_COOKIE['GPAErr'];
		setcookie("GPAErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['departmentErr'])){
		$departmentErr = $_COOKIE['departmentErr'];
		setcookie("departmentErr", "", time() - (86400 * 30));
	}
	if(isset($_COOKIE['registeredErr'])){
		$GPAErr = $_COOKIE['registeredErr'];
		setcookie("registeredErr", "", time() - (86400 * 30));
	}
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="public/css/index.css" >
		<script src="public/js/jquery-1.11.1.min.js"></script>
		<script src="public/js/bootstrap.js"></script>
	    <script src="public/js/validator.js"></script>
	    <script src="public/js/index.js"></script>
	</head>
	<body>
		<div class="header">
			<img id="logo" src="public/images/head.png">
		</div>
		<h2 style="text-align:center;font-family: 'THSarabunNew', sans-serif; ">
			ใบสมัครทุนการศึกษาคณะวิศวกรรมศาสตร์</h2>

		<div class="container-fluid bg">
			<div class="row">
				<div class="col-md-12 col-md-offset-3">
					<form class="form-horizontal" action="registration_printer.php" method="post" data-toggle="validator" id="registerForm">
						<div class="form-group">
						    <label for="firstname" class="col-sm-2 control-label" role="form">First name</label>
						    <div class="row">
								 <div class="col-xs-2">
								 	<input type="text" 
								 	class="form-control" 
								 	name="firstname" 
								 	id="firstname" 
								 	placeholder="ชื่อ (ภาษาไทย)" 
								 	required
								 	pattern="^([ก-๙]){1,}$">
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
					  	</div>


						<div class="form-group">
							<label for="lastname" class="col-sm-2 control-label">Last name</label>
						    <div class="row">
								 <div class="col-xs-2">
								 	<input type="text" 
								 	class="form-control"
								 	name="lastname" 
								 	id="lastname" 
								 	placeholder="นามสกุล (ภาษาไทย)"
								 	required
								 	pattern="^([ก-๙]){1,}$">
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						</div>

						<div class="form-group">
							<label for="department" class="col-sm-2 control-label">Department</label>
							<div class="row">
								 <div class="col-xs-2">
								 	<select name="department" id="department"  class="form-control">
										<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>
										<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>
										<option value="วิศวกรรมโยธา">วิศวกรรมโยธา</option>
										<option value="วิศวกรรมเครื่องกล">วิศวกรรมเครื่องกล</option>
										<option value="วิศวกรรมเคมี">วิศวกรรมเคมี</option>
										<option value="วิศวกรรมอุตสาหการ">วิศวกรรมอุตสาหการ</option>
									</select>
								 </div>
							</div>
							
						</div>

						<div class="form-group">
							<label for="studentID" class="col-sm-2 control-label">Student ID</label>
							<div class="row">
								 <div class="col-xs-2">
								 	<input type="text" 
								 	class="form-control" 
								 	name="studentID" 
								 	id="studentID" 
								 	placeholder="รหัสนักศึกษา (10 หลัก)"
								 	maxlength="10"
								 	required
								 	pattern="^([0-9]){10}$">
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						</div>

						<div class="form-group">
							<label for="year" class="col-sm-2 control-label">Year</label>
							<div class="row">
								 <div class="col-xs-1">
								 	<select name="year" id="year"  class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								 </div>
							</div>
						</div>

						<div class="form-group">
							<label for="GPA" class="col-sm-2 control-label">GPA</label>
							<div class="row">
								 <div class="col-xs-2">
								 	<input type="text" 
								 	class="form-control" 
								 	name="GPA" 
								 	id="GPA" 
								 	placeholder="ตัวอย่าง: 3.40"
								 	maxlength="4"
								 	required
								 	pattern="^((?:[0-3]\.[0-9]{2})|4.00)$">
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						</div>

						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <input type="submit" 
						      value="Submit" 
						      id="submitBtn" 
						      class="btn btn-warning">
						    </div>
						 </div>
					</form>

				</div>
			</div>
		</div>
		


		<!-- Final checking form's data -->

		<div class="modal fade" id="confirmationModal">

		  <div class="modal-dialog">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">โปรดตรวจสอบสอบข้อมูลอีกครั้ง</h4>

		      </div>

		      <div class="modal-body">
		        <p id="firstnameCheck"></p>
		        <p id="lastnameCheck"></p>
		        <p id="departmentCheck"></p>
		        <p id="studentIDCheck"></p>
		        <p id="yearCheck"></p>
		        <p id="GPACheck"></p>
		      </div>

		      <div class="modal-footer">
		      	<h5>เมื่อส่งข้อมูลแล้วจะไม่สามารถแก้ไขได้</h5>
		      	<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-danger" id="realSubmit">Submit</button>
		      </div>

		    </div>

		  </div>

		</div>

		<!-- Error validation modal -->
		<div class="modal fade" id="validationErrorModal">

		  <div class="modal-dialog">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Validation Errors</h4>

		      </div>

		      <div class="modal-body">
		        <p><?php if(isset($firstnameErr)){echo $firstnameErr;} ?></p>
		        <p><?php if(isset($lastnameErr)){echo  $lastnameErr;}  ?></p>
		        <p><?php if(isset($studentIDErr)){echo  $studentIDErr;}  ?></p>
		        <p><?php if(isset($yearErr)){echo  $yearErr;}  ?></p>
		        <p><?php if(isset($GPAErr)){echo  $GPAErr;}  ?></p>
		        <p><?php if(isset($departmentErr)){echo  $departmentErr;}  ?></p>
		        <p><?php if(isset($registeredErr)){echo  $registeredErr;}  ?></p>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>

		    </div>

		  </div>

		</div>

	</body>
</html>