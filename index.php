<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="public/css/index.css" >
		<script src="public/js/jquery-1.11.1.min.js"></script>
		<script src="public/js/bootstrap.js"></script>
	    <script src="public/js/validator.js"></script>
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
					<form class="form-horizontal" action="registration_printer.php" method="post" data-toggle="validator">
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
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
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
						      <input type="submit" value="Submit" class="btn btn-warning">
						    </div>
						 </div>
					</form>

				</div>
			</div>
		</div>
		
	</body>
</html>