<?php
	session_start();
	require "../public/db/dbConnect.php";
	require "search_and_sort_helper.php";
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../public/css/admin.css">
	<script src="../public/js/jquery-1.11.1.min.js"></script>
	<script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/validator.js"></script>
    <script src="../public/js/admin.js"></script>
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
	         	<a href="../admin/">Administrator<span class="sr-only">(current)</span>
	         	</a>
	         </li>
	        
	        <?php if(isset($_SESSION['logged_in'])){ ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการ <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	          	<?php if($_SESSION['isSearch']){?>
	          		<!-- ####################### -->
	          		<!--   clear search history  -->
	          		<!-- ####################### -->
	          	    <li><a href="registered_student.php?clear" id="registeredStudent">นักศึกษาทีี่สมัคร</a></li>
	          		<li class="divider"></li>
	            	<li><a href="authorized_student.php?clear" id="authorizedStudent">นักศึกษาที่อนุมัติ</a></li>
	            	<li class="divider"></li>
	            	<li><a href="authorized_paper.php" >พิมพ์รายชื่อนักศึกษา</a></li>
	          	<?php } else {?>
		            <li><a href="#" id="registeredStudent">นักศึกษาทีี่สมัคร</a></li>
		            <li class="divider"></li>
		            <li><a href="authorized_student.php" id="authorizedStudent">นักศึกษาที่อนุมัติ</a></li>
		            <li class="divider"></li>
	            	<li><a href="authorized_paper.php" >พิมพ์รายชื่อนักศึกษา</a></li>
	            <?php } ?>
	          </ul>
	        </li>
	        <?php } ?>

	      </ul>
	      

	      <?php if(isset($_SESSION['logged_in'])){ ?>
	      	<form class="navbar-form navbar-right">
		      	<div class="form-group">
		        	<button class="btn btn-danger" id="logout">Logout</button>
		        </div>
	      	</form>

	        <form class="navbar-form navbar-right" role="search" method="post" 
	          action="registered_student.php" >
	          <div class="form-group">
	            <input type="text" style="text-align:center;"class="form-control" placeholder="ค้นหา" name="searchValue">
	          </div>

	          <div class="form-group">
	          	<select name="searchType"  style="text-align:center;" id="department"  class="form-control">
					<option value="studentID" selected>รหัสนักศึกษา</option>
					<option value="firstname">ชื่อ</option>
					<option value="lastname">นามสกุล</option>
					<option value="department">ภาควิชา</option>
					<option value="year">ชั้นปี</option>
					<option value="GPA">เกรดเฉลี่ย</option>
					<option value="academicYear">ปีการศึกษา</option>
				</select>
	          </div>
	          <button type="submit" class="btn btn-default">Submit</button>
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
					  <label for="username">Username</label>
					    <input type="text" class="form-control" maxlength="10" id="username">
					</div>
					<div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password">
					</div>
		      	</form>
		      	<p id = 'loginMessage' class="bg-warning"></p>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="cancel">Cancel</button>
		        <button type="button" class="btn btn-danger" id="submit">Log in</button>
		      </div>

		    </div>

		  </div>

		</div>

		<?php if(isset($_SESSION['logged_in'])){ ?>
			<div class="modal fade" id="change-status-modal">

				  <div class="modal-dialog modal-md">

				    <div class="modal-content">

				      <div class="modal-header">

				        <button type="button" id = "close-modal"class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">แก้ไขสิทธิ</h4>

				      </div>

				      <div class="modal-body" id="detail-body-modal">
				      	<form action="" method="post" id="loginForm">
				      		
							<div class="form-group">
							    <label for="s_type">ประเภททุน</label>
							    <input type="text" class="form-control" id="s_type" placeholder="N/A">
							</div>

							<div class="form-group">
							  <label for="amount">จำนวน</label>
							    <input type="number" class="form-control"  placeholder="N/A" id="amount">
							</div>
							<p id ="erM"></p>
				      	</form>
				      </div>

				      <div class="modal-footer" id="setPassButton">
				      	<button class="btn btn-danger setNotPassButton" style="float:left">ไม่อนุมัติ</button>
				      	<button class="btn btn-success setPassButton">อนุมัติ</button>
				      </div>

				    </div>

				  </div>

			</div>
		<?php } else { ?>
		<div class="container ">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<h1>ยินดีต้อนรับ :)</h1>
		  		<p>กรุณา log in เพื่อเข้าใช้</p>
			</div>
		</div>
		<?php } ?>

		
		<?php if(isset($_SESSION['logged_in'])){ ?>
			<div class="container" id="table-data">
		<?php 
						echo "<table class='table table-hover' style='margin-top:6em;text-align:center;'>\n";
				echo "<thead>\n";
					echo "<tr>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByStudentID'>รหัสนักศึกษา</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByfirstname'>คำนำหน้า</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByTitle'>ชื่อ</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortBylastname'>นามสกุล</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByDepartment'>ภาควิชา</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByYear'>ชั้นปี</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByGPA'>เกรดเฉลี่ย</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByAcademicyear'>ปีการศึกษา</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByType'>ประเภททุน</a></th>\n";
						echo "<th class='info' style='text-align:center'><a href='registered_student.php?sortByAmount'>จำนวน</a></th>\n";
						echo "<th class='info' style='text-align:center'>สถานะ</th>\n";

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
							echo $data["title"];
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
							echo $data["scholarship_t"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["amount"];
						echo "</td>\n";

						echo "<td class=".$data["id"].">\n";
							if($data["status"] == 0)
								echo "<button type='button' class='btn btn-danger changeStatus' id='".$data["id"]."'>ไม่อนุมัติ</button>";
							else if($data["status"] == 1)
								echo "<button type='button' class='btn btn-success changeStatus' id='".$data["id"]."'>&nbsp;&nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;&nbsp;</button>";
							else
								echo "<button type='button' class='btn btn-primary'>ใช้ทุนครบ</button>";
						echo "</td>\n";

					echo "</tr>\n";
		    	}
				echo "</tbody>\n";
			echo "</table>";

		?>
		</div>
<!-- 		redirect to home when admin log out -->
		<?php } else {
			header("Location: ".url()."/scholarship/admin/");
		}?>




		
</body>
</html>