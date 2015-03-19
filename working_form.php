<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="public/css/index.css" >
		<script src="public/js/jquery-1.11.1.min.js"></script>
		<script src="public/js/bootstrap.js"></script>
	</head>
	<body>
		<form action="printerpage.php" method="post">
			<label for="firstname">First name</label>
			<input type="text" name="firstname" id="firstname">
			</br>
			<label for="lastname">Last name</label>
			<input type="text" name="lastname" id="lastname">
			</br>
			<label for="department">Department</label>
			<select name="department" id="department">
				<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>
				<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>
				<option value="วิศวกรรมโยธา">วิศวกรรมโยธา</option>
				<option value="วิศวกรรมเครื่องกล">วิศวกรรมเครื่องกล</option>
				<option value="วิศวกรรมเคมี">วิศวกรรมเคมี</option>
				<option value="วิศวกรรมอุตสาหการ">วิศวกรรมอุตสาหการ</option>
			</select>
			</br>
			<label for="studentID">Student ID</label>
			<input type="text" name="studentID" id="studentID">
			</br>
			<label for="year">Year</label>
			<select name="year" id="year">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
			</br>
			<label for="GPA">GPA</label>
			<input type="text" name="GPA" id="GPA">
			</br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>