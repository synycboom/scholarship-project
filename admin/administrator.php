<?php
	session_start();
	require "../public/db/dbConnect.php";
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
	         	<a>Administrator<span class="sr-only">(current)</span>
	         	</a>
	         </li>
	        
	        <?php if(isset($_SESSION['logged_in'])){ ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#" id="registeredStudent">Registered Students</a></li>
	            <li class="divider"></li>
	            <li><a href="#" id="authorizedStudent">Authorized Students</a></li>
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

	        <form class="navbar-form navbar-right" role="search" >
	          <div class="form-group">
	            <input type="text" class="form-control" placeholder="Search">
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
		<div class="container ">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<h1>Welcome Administrator</h1>
		  	    <h4>To see registered students.Please click Manage-> Registered Students</h4>
		  	    <h4>To see students that is verified.Please click Manage-> Authorized Students</h4>
			</div>
		</div>
		<?php } else { ?>
		<div class="container ">
			<div class="jumbotron" style="text-align:center;margin-top:15em">	  
		  		<h1>Welcome :)</h1>
		  		<p>Please log in to be an administrator</p>
			</div>
		</div>
		<?php } ?>

		<!-- more-detail modal -->
		<div class="modal fade" id="more-detail-modal">

			  <div class="modal-dialog modal-sm">

			    <div class="modal-content">

			      <div class="modal-header">

			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">more details</h4>

			      </div>

			      <div class="modal-body">
			   		testestestes
			      </div>

			    </div>

			  </div>

		</div>





		<div class="container" id="table-data"></div>

</body>
</html>