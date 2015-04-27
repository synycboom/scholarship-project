<?php
	session_start();
	require "../public/db/dbConnect.php";

	$academicYear = $database->select("registration","academicYear",[
				"ORDER" => "academicYear DESC"

	]);

	$datas = $database->select("registration", "*",[
		"AND" => [
			"academicYear" => $academicYear[0],
			"status" => "1"
			]
		]);

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
	<link rel="stylesheet" type="text/css" href="../public/css/admin.css">
	<script src="../public/js/jquery-1.11.1.min.js"></script>
	<script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/validator.js"></script>
    <script src="../public/js/admin.js"></script>
</head>
<body>
	<!-- start point of non-printable -->
	<div class="container" id="non-printable">
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
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
		            <li><a href="registered_student.php" id="registeredStudent">Registered Students</a></li>
		            <li class="divider"></li>
		            <li><a href="authorized_student.php" id="authorizedStudent">Authorized Students</a></li>
		            <li class="divider"></li>
	            	<li><a href="#" >Print Authorized Students</a></li>
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

		<?php } else { ?>
		<div class="container ">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<h1>Welcome :)</h1>
		  		<p>Please log in to be an administrator</p>
			</div>
		</div>
		<?php } ?>

		
		<?php if(isset($_SESSION['logged_in'])){ ?>
			<!-- this is a part of non printable -->
				<div class="container" id="welcome">
					<div class="jumbotron" style="text-align:center;margin-top:8em">	  
			  	    	<h1 class="b">Print all authorized students in this academic year</h1>
			  	    	<h2 style="color:red">Before Printing</h2>
		  	    		<h3 ><b>Disable header and footer!</b></h3>
		  	    		<h4>Options -> then disable header and footer</h4>
		  	    		<h3><b>Select A4 paper size!</b></h3>
		  	    		<h4>Paper size -> A4 </h4>
			  	    	<button class="btn btn-primary" id ="printAuthorized">print</button>
					</div>
				</div>
			</div>

			<div class="container" id="printable">
				<h3 style="text-align:center;margin-top:2em">รายชื่อนักศึกษาที่ได้รับทุนการศึกษาประจำปีการศึกษา <?= $academicYear[0]?></h3>
				<table border="1px" class='table' style='margin-top:2em;text-align:center;'>
					<thead>
					    <tr class='printTR'>
					    	<th>ลำดับ</th>
					    	<th>รหัสนักศึกษา</th>
					    	<th>ชื่อ - นามสกุล</th>
					    	<th>สาขาวิชา</th>
					     	<th>ชั้นปี</th>					
					     	<th>ประเภททุน</th>
					     	<th>จำนวน</th>
					  	</tr>
				</thead>
				<?php 
				echo "<tbody>\n";
				$i = 1;
				foreach($datas as $data)
				{

					echo "<tr class='printTR'>\n";
						echo "<td>\n";
							echo $i++;
						echo "</td>\n";

						echo "<td>\n";
							echo $data["studentID"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["title"]." ".$data["firstname"]." ".$data["lastname"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["department"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["year"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["scholarship_t"];
						echo "</td>\n";

						echo "<td>\n";
							echo $data["amount"];
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