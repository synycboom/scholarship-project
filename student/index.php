<?php
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	//###########################  this is in index of student ##################################
	session_start();
	require "../public/db/dbConnect.php";
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../public/css/student.css">
	<script src="../public/js/jquery-1.11.1.min.js"></script>
	<script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/validator.js"></script>
    <script src="../public/js/student.js"></script>
</head>
<body>
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
	         	<a>Student<span class="sr-only">(current)</span>
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

	<!-- admin log in modal -->
	<div class="modal fade" id="loginModal">

		  <div class="modal-dialog modal-sm">

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Log in</h4>

		      </div>

		      <div class="modal-body">
		      	<form action="" method="post" id="loginForm">
		      		<div class="form-group">
					  <label for="studentID">Username</label>
					    <input type="text" class="form-control" 
					    maxlength="10" 
					    id="studentID"
					    required>
					</div>
					<div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" required>
					</div>
		      	</form>
		      	<p id = 'loginMessage' class="bg-warning"></p>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="cancel">Cancel</button>
		        <button type="button" class="btn btn-danger" id="submit">Log in</button>
		      </div>

		    </div>

		  </div>

		</div>

		<?php if(isset($_SESSION['student_logged_in'])){ ?>
		<div class="container" id="welcome">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<?= "<h1>ยินดีต้อนรับ ".$_SESSION['name']."</h1>"?>
		  	    <h4>เพื่อที่จะเพิ่มข้อมูลกิจกรรม. กรุณากด จัดการ -> ฟอร์มบันทึกกิจกรรม</h4>
		  	    <h4>เพื่อที่จะตั้งค่าบัญชี. กรุณากด จัดการ -> การจัดการบัญชีผู้ใช้</h4>
			</div>
		</div>

		<?php } else { ?>
		<div class="container ">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<h1>บันทึกกิจกรรมนักศึกษา</h1>
		  		<p>กรุณาเข้าสู่ระบบเพื่อใช้งาน</p>
			</div>
		</div>
		<?php } ?>




		<div class="container" id="table-data"></div>

</body>
</html>