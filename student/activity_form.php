<?php
	session_start();
	require "../public/db/dbConnect.php";

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
	         	<a href="../student/">Student<span class="sr-only">(current)</span>
	         	</a>
	         </li>
	        
	        <?php if(isset($_SESSION['student_logged_in'])){ ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#" id="view-activity-form">Activity Form</a></li>
	            <li><a href="view_all_activity.php" id="view-all-activity">View All Activities</a></li>
	            <li class="divider"></li>
	            <li><a href="change_password.php" id="changePassword">Change Password</a></li>
	            <li class="divider"></li>
	            <li><a href="activity_paper.php" >Get Activity Paper</a></li>
	            <li><a href="registration_paper.php" >Get Register Paper</a></li>
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

	        <!-- <form class="navbar-form navbar-right" role="search" >
	          <div class="form-group">
	            <input type="text" class="form-control" placeholder="Search">
	          </div>
	          <button type="submit" class="btn btn-default">Submit</button>
	        </form> -->
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

		<?php if(isset($_SESSION['student_logged_in'])){ ?>

		<div class="container" id="activity-form">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		
		  		<div>
					<h1>บันทึกเวลาการทำงาน</h1>
				</div>

				<div>
					<form class="form-inline">
						<div class="form-group">
						    <label for="date" >Date</label>
						    <div class="row">
								 <div class="col-xs-2">
								 	<?php echo'
								 	<input type="date" 
								 	class="form-control" 
								 	placeholder="'.(date("Y")+543).'/01/21 yyyy/mm/dd"
								 	name="date" 
								 	id="date" 
								 	required>';
								 	?>
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						 </div>

						 <div class="form-group">
						    <label for="start-time">Start Time</label>
						    <div class="row">
								 <div class="col-xs-2">
								 	<input type="time" 
								 	class="form-control" 
								 	placeholder="ex. 13:45"
								 	name="start-time" 
								 	id="start-time" 
								 	required>
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						 </div>

						 <div class="form-group">
						    <label for="end-time">End Time</label>
						    <div class="row">
								 <div class="col-xs-2">
								 	<input type="time" 
								 	class="form-control" 
								 	placeholder="ex. 15:50"
								 	name="end-time" 
								 	id="end-time" 
								 	required>
								 </div>
								 <div class="help-block with-errors"></div>
							</div>
						 </div>

						 <div class="form-group">
						    <div class=" col-sm-10" style="margin-top:1.7em">
						      <button 
						      id="saveActivity" 
						      class="btn btn-warning">save</button>
						    </div>
						 </div>

					</form>
				</br>
					<p id = "validation-error-M"></p>
				</div>
				

			</div>
		</div>


		<?php } else {
			header("Location: ".url()."/scholarship/student/");
		}?>




		<div class="container" id="table-data"></div>

</body>
</html>