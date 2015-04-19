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

	$datas = $database->select("registration", "*", [
		"AND" =>["studentID" => $_SESSION["student_logged_in"],
		"academicYear" => $academicYear[0]]
	]);
	
    function url(){
	  return sprintf(
	    "%s://%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME']
	  );
	}

	function thainumDigit($num){  
	    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),  
	    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),  
	    $num);  
	};

	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../public/css/registration_printer.css" >
		<script src="../public/js/jquery-1.11.1.min.js"></script>
		<script src="../public/js/bootstrap.js"></script>
		<script src="../public/js/student.js"></script>
		<script src="../public/js/registration_printer.js"></script>
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
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="activity_form.php" id="view-activity-form">Activity Form</a></li>
			            <li><a href="view_all_activity.php" id="view-all-activity">View All Activities</a></li>
			            <li class="divider"></li>
			            <li><a href="change_password.php" id="changePassword">Change Password</a></li>
			            <li class="divider"></li>
			            <li><a href="activity_paper.php" id="changePassword">Get Activity Paper</a></li>
			            <li><a href="#" id="changePassword">Get Register Paper</a></li>
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
					<div class="jumbotron" style="text-align:center;margin-top:15em">	  
			  	    	<h1 class="b">Print registration document</h1>
			  	    	<button class="btn btn-primary" id ="printButton">print</button>
					</div>

			</div>
		</div>




		<div class="container" id="printable" style="margin-top:2em;">
			<div class="row">
				<div class="col-xs-1"><img src="/scholarship/public/images/engr_logo.png"class="logo"></div>
				<div class="col-xs-8 title">
					<h4 class="b">ใบสมัครขอรับทุนการศึกษาคณะวิศวกรรมศาสตร์</br>มหาวิทยาลัยธรรมศาสตร์ ปีการศึกษา <under class ="underline"><?= thainumDigit($academicYear[0])?><under></h4>
				</div>
				<div class="col-xs-2 pictureBox"></br>ติดรูปถ่าย </br></br>2 นิ้ว</div>
			</div>

			<div class="row" style="margin-top:1em;">
			  <div class="col-xs-12">

			  	<p style="text-indent: 40px;"><b>ข้อมูลทั่วไปของผู้สมัครขอทุน</b></p>

				  	<p style="text-indent: 100px;">ชื่อ (นาย/น.ส.)..............................................นามสกุล........................................................
				  	</p>


				  	<p style="text-indent: 100px;">ชื่อ-นามสกุล (ภาษาอังกฤษ)...............................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">เลขประจำตัวประชาชน......................................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">สาขาวิชา................................................เลขทะเบียน..................................ชั้นปี...............
				  	</p>

				  	<p style="text-indent: 100px;">คะแนนเฉลี่ยสะสม (ล่าสุด).................................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">วัน/เดือน/ปี เกิด.................................................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">สถานที่เกิด..............................................ศาสนา................................................................
				  	</p>

				  	<p style="text-indent: 100px;"><b>การเข้าศึกษาในมหาวิทยาลัยธรรมศาสตร์</b></p>

			  		<div class="row">
			  			<div class="col-xs-3"></div>
			  			<div class="col-xs-4">
			  				<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:17px;">Admission ตรง</p>
			  			</div>
			  			<div class="col-xs-5">
			  				<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:17px;">Admission กลาง</p>
			  			</div>
			  		</div>

			  		<div class="row">
			  			<div class="col-xs-3"></div>
			  			<div class="col-xs-6">
			  				<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:17px;">โครงการนักศึกษาเรียนดีจากชนบท</p>
			  			</div>
			  		</div>
			  		<div class="row">
			  				<div class="col-xs-3"> </div>
			  				<div class="col-xs-3">
				  				<div class="box" style="margin-left:2em;"></div>
				  				<p style="margin-top:-17px;margin-left:3.5em;">ทุนเต็ม</p>
			  				</div>
			  				<div class="col-xs-3">
			  					<div class="box" style="margin-left:-3em;"></div>
			  					<p style="margin-top:-17px;margin-left:-1.5em;">ทุนบางส่วน</p>
			  				</div>
			  				<div class="col-xs-3" >
			  					<div class="box" style="margin-left:-5em;"></div>
			  					<p style="margin-top:-17px;margin-left:-3.5em;">ที่นั่ง</p>
			  				</div>
			  		</div>


				  	<div class="row">
				  		<div class="col-xs-3"></div>
			  			<div class="col-xs-9">
			  				<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:17px;">โครงการพิเศษอื่น ๆ.....................................................................................
			  				</p>
			  			</div>
				  	</div>

				  	<p style="text-indent: 100px;">ที่อยู่ตามภูมิลำเนาเดิม บ้านเลขที่..............หมู่ที่..............ซอย/ตรอก....................................
				  	</p>

				  	<p style="text-indent: 100px;">ถนน....................ตำบล/แขวง..............................อำเภอ/เขต...............................................
				  	</p>

				  	<p style="text-indent: 100px;">จังหวัด............................รหัสไปรษณีย์....................โทรศัพท์บ้าน........................................
				  	</p>
				  	
				  	<p style="text-indent: 100px;">โทรศัพท์มือถือ......................................................................................................................

				  	<p style="text-indent: 100px;">ที่อยู่ปัจจุบัน (ติดต่อได้สะดวก) บ้านเลขที่...............หมู่ที่..........ซอย/ตรอก.........................
				  	</p>

				  	<p style="text-indent: 100px;">ถนน......................ตำบล/แขวง............................อำเภอ/เขต..............................................
				  	</p>

				  	<p style="text-indent: 100px;">จังหวัด............................รหัสไปรษณีย์....................โทรศัพท์...............................................
				  	</p>

				  	<p style="text-indent: 100px;">กรณีอยู่หอพัก ชื่อหอพัก...........................................หมายเลขห้องพัก...............................
				  	</p>

				  	<p style="text-indent: 100px;">หมายเลขโทรศัพท์................................................................................................................</p>

				<p style="text-indent: 40px;"><b>ประวัติการศึกษาโดยย่อ</b></p>

					<p style="text-indent: 100px;">มัธยมตอนปลาย จากโรงเรียน.................................................จังหวัด..................................</p>

					<p style="text-indent: 100px;">เกรดเฉลี่ยสะสม (ม.ปลาย).............................</p>

			  </div>
			</div>

			<!-- variable for printing section -->
				
				<div class="row">
					<div class="col-xs-6">
						<div id="name" style="margin-top:-51.1em; margin-left:14em;">
				  			<?= $datas[0]["firstname"] ?>
				  		</div>
					</div>
					<div class="col-xs-6">
						<div id="surname" style="margin-top:-51.1em; margin-left:5.2em;">
					  		<?= $datas[0]["lastname"] ?>
					  	</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div id="name" style="margin-top:-44.7em; margin-left:11.2em;">
				  			<?= $datas[0]["department"] ?>
				  		</div>
					</div>
					<div class="col-xs-4">
						<div id="surname" style="margin-top:-44.7em; margin-left:4.5em;">
					  		<?= $datas[0]["studentID"] ?>
					  	</div>
					</div>
					<div class="col-xs-2">
						<div id="surname" style="margin-top:-44.7em; margin-left:-2em;">
					  		<?= $datas[0]["year"] ?>
					  	</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2">
						<div id="surname" style="margin-top:-42.6em; margin-left:25em;">
					  		<?= $datas[0]["GPA"] ?>
					  	</div>
					</div>
				</div>

		</div>


		<section id="printable"></section>

		<div class="row pageNumber" id = "printable">1</div>

		<div class="container" id="printable" style="margin-top:4em;">
			<div class="row">
				<p style="text-indent: 4em;"><b>สถานภาพครอบครัวของผู้ขอทุน</b></p>
					<p style="text-indent: 7.5em;">ชื่อบิดา.........................................................................................อายุ.................................ปี</p>
			</div>

			<div class="row">
  				<div class="col-xs-3" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">ถึงแก่กรรม</p>
	  			</div>
  				<div class="col-xs-3" style="margin-left:-5.7em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่ด้วยกัน</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-6em;">
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">แยกกันอยู่</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-6em;" >
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">หย่าร้าง</p>
  				</div>
			</div>
			
			<div class="row">
				<p style="text-indent: 7.5em;">อาชีพ........................................ลักษณะงาน.........................................................................</p>	
				<p style="text-indent: 7.5em;">ตำแหน่ง / ยศ................................................รายได้ต่อเดือน..........................................บาท</p>
				<p style="text-indent: 7.5em;">สถานที่ทำงาน................................................จังหวัด.............................................................</p>	
				<p style="text-indent: 7.5em;">โทรศัพท์.....................................โทรศัพท์มือถือ.....................................................................</p>
				<p style="text-indent: 7.5em;">ชื่อมารดา...................................................................................อายุ...................................ปี</p>	
			</div>

			<div class="row">
  				<div class="col-xs-3" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">ถึงแก่กรรม</p>
	  			</div>
  				<div class="col-xs-3" style="margin-left:-5.7em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่ด้วยกัน</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-6em;">
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">แยกกันอยู๋</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-6em;" >
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">หย่าร้าง</p>
  				</div>
			</div>

			<div class="row">
				<p style="text-indent: 7.5em;">อาชีพ........................................ลักษณะงาน...........................................................................</p>	
				<p style="text-indent: 7.5em;">ตำแหน่ง / ยศ................................................รายได้ต่อเดือน..........................................บาท</p>
				<p style="text-indent: 7.5em;">สถานที่ทำงาน................................................จังหวัด.............................................................</p>	
				<p style="text-indent: 7.5em;">โทรศัพท์.....................................โทรศัพท์มือถือ.....................................................................</p>
				<p style="text-indent: 7.5em;">ชื่อมารดา...................................................................................อายุ....................................ปี</p>	
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>สภาพการอยู่อาศัยของผู้ขอทุน</b></p>
			</div>

			<div class="row">
  				<div class="col-xs-3" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่กับบิดา / มารดา</p>
	  			</div>
  				<div class="col-xs-3" style="margin-left:-2.5em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่กับบิดา</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-6em;">
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">อยู่กับมารดา</p>
  				</div>
  				<div class="col-xs-3" style="margin-left:-5em;" >
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">อยู่กับผู้อุปการะ</p>
  				</div>
			</div>

			<div class="row">
  				<div class="col-xs-8" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่หอพัก เสียค่าเช่า.......................บาท / เดือน</p>
	  			</div>
			</div>

			<div class="row">
  				<div class="col-xs-8" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อาศัยอยู่กับเพื่อน / ผู้อื่น</p>
	  			</div>
			</div>

			<div class="row">
  				<div class="col-xs-8" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อื่น ๆ..................................</p>
	  			</div>
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>บิดา / มารดา ของผู้ขอทุน</b></p>
			</div>

			<div class="row">
  				<div class="col-xs-5" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">มีที่ดินทำกิน / อยู่อาศัยเป็นของตนเอง</p>
	  			</div>
  				<div class="col-xs-3" style="margin-left:2em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">อยู่กับบิดา</p>
  				</div>
			</div>

			<div class="row">
  				<div class="col-xs-8" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">เช่าบ้านอยู่ ค่าเช่าเดือนละ.........................บาท</p>
	  			</div>
			</div>
			<div class="row">
  				<div class="col-xs-8" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">เช่าที่ดิน ค่าเช่าเดือนละ.............................บาท</p>
	  			</div>
			</div>

			<div class="row">
				<p style="text-indent: 7.5em;">ผู้ขอทุนมีพี่น้อง (รวมตนเอง)..........................คน ผู้ขอทุนเป็นคนที่....................</p>	
				<p style="text-indent: 7.5em;"> - ภาระหนี้สินของบิดา มารดา หรือ ผู้ปกครอง (ประมาณ)............................................บาท</p>	
			</div> 
	

		</div>


		<section id="printable"></section>

		<div class="row pageNumber" id = "printable">2</div>

		<div class="container" id = "printable"style="margin-top : 3em"> 
			<div class="row">
				<p style="text-indent: 4em;"><b>ผู้อุปการะ</b></p>
					<p style="text-indent: 7.5em;">- นักศึกษาได้รับการอุปการะส่งเสียจาก</p>
			</div>

			<div class="row">
  				<div class="col-xs-4" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">บิดา และมารดาทั้งสองคน</p>
	  			</div>
  				<div class="col-xs-4" style="margin-left:-4em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">บิดาหรือมารดาคนใดคนหนึ่ง</p>
  				</div>
  				<div class="col-xs-4" style="margin-left:-3em;">
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">ไม่มีผู้อุปการะส่งเสีย</p>
  				</div>
			</div>

			<div class="row">
  				<div class="col-xs-10" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">บุคคลอื่น (ชื่อ)................................เกี่ยวข้องเป็น.........................</p>
	  			</div>
	  			<p style="text-indent: 7.5em;">- ที่อยู่ บ้านเลขที่.............................</p>
	  			<p style="text-indent: 8.2em;">หมู่ที่...........ซอย / ตรอก.......................ถนน.......................ตำบล/แขวง...........................</p>
				<p style="text-indent: 8.2em;">อำเภอ/เขต...........จังหวัด....................รหัสไปรษณีย์..............โทรศัพท์บ้าน......................</p>
				<p style="text-indent: 8.2em;">โทรศัพท์มือถือ.............................</p>
				<p style="text-indent: 7.5em;">- อาชีพของผู้อุปการะ...............................ตำแหน่ง/ลักษณะงาน.........................................</p>
				<p style="text-indent: 8.2em;">สถานที่ทำงาน..............................โทรศัพท์.........................โทรศัพท์มือถือ........................</p>
				<p style="text-indent: 8.2em;">รายได้เฉลี่ยต่อเดือน..................บาท หนี้สินของผู้อุปการะ (ประมาณ).........................บาท</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>การศึกษา และอาชีพของพี่น้อง (รวมตนเองด้วย)</b></p>
				<p style="text-indent: 7.5em;">คนที่ เพศ สถานที่ทำงาน / สถานศึกษา ระดับการศึกษา รายได้เฉลี่ยต่อเดือน</p>
			</div>

			<table border="1px" style="margin-left:4em; margin_top:-3em">
				<caption> (เฉพาะคนที่ทำงานแล้ว)</caption>
					<thead>
					    <tr>
					    	<th>คนที่</th>
					     	<th>เพศ</th>
					     	<th>สถานที่ทำงาน / สถานศึกษา</th>
					     	<th>ระดับการศึกษา</th>
					     	<th style="text-align:center;">รายได้เฉลี่ยต่อเดือน </br> เฉพาะที่ทำงานแล้ว</th>
					  	</tr>
					</thead>
					<tbody>
					  	<tr>
					     	<td>1</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>2</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>4</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>4</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>5</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>6</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					  	<tr>
					     	<td>7</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					  	</tr>
					</tbody>
			</table>
			</br>
			<div class="row">
				<p style="text-indent: 4em;"><b>รายได้/รายจ่ายของผู้ขอทุน</b></p>
				<p style="text-indent: 7.5em;">- ได้รับเงินมาใช้จ่าย</p>
			</div>

			<div class="row" style= "margin-top:-2em">
  				<div class="col-xs-2" style="margin-left:15em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">รายวัน</p>
	  			</div>
  				<div class="col-xs-2" style="margin-left:-3.6em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">รายสัปดาห์</p>
  				</div>
  				<div class="col-xs-5" style="margin-left:-1.5em;">
  					<div class="box"></div>
  					<p style="margin-top:-17px;margin-left:17px;">รายเดือน คิดเป็นวันละ.........บาท</p>
  				</div>
  				<p style="text-indent: 7.5em;">- ค่าใช้จ่ายในการเดินทาง...............................บาท/วัน</p>
  				<p style="text-indent: 7.5em;">- ค่าใช้จ่ายเพื่อการศึกษา................................บาท/เดือน</p>
  				<p style="text-indent: 7.5em;">- ค่าใช้จ่ายอื่น ๆ.............................................บาท/เดือน</p>
  				<p style="text-indent: 7.5em;">- หารายได้พิเศษ (ระบุลักษณะงาน)..................................................</p>
  				<p style="text-indent: 8em;">มีรายได้ ประมาณ...............................บาท/วัน</p>
  				
			</div>

			<div class="row">
  				<div class="col-xs-5" style="margin-left:6.5em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">ใช้จ่ายจากเงินกู้ยืมฯอย่างเดียว</p>
	  			</div>
  				<div class="col-xs-6" style="margin-left:-6em;">
	  				<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:17px;">ใช้จ่ายจากเงินกู้ยืมฯ และเงินจากทางบ้านบางส่วน</p>
  				</div>
			</div>

			


		</div>

		
		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:-1em" id = "printable" >3</div>


		<div class="container" id="printable" style="margin-top : 7em">

			<div class="row">
				<p style="text-indent: 4em;"><b>ทุนการศึกษาที่เคยได้รับ</b></p>

				<div class="row">
	  				<div class="col-xs-4" style="margin-left:6.5em;">
	  					<div class="box"></div>
		  				<p style="margin-top:-17px;margin-left:19px;"> ไม่เคยได้รับมาก่อน</p>
		  			</div>
				</div>

				<div class="row">
	  				<div class="col-xs-10" style="margin-left:6.5em;">
	  					<div class="box"></div>
		  				<p style="margin-top:-17px;margin-left:19px;"> เคยได้รับทุน ชื่อทุนืั้ได้รับ..................................จำนวนเงิน..................บาทเมื่อปี พ.ศ...........</p>
		  			</div>
				</div>

			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>ทุนกู้ยืมล่สุด (ปีล่าสุด)</b></p>

				<div class="row">
	  				<div class="col-xs-10" style="margin-left:6.5em;">
	  					<div class="box"></div>
		  				<p style="margin-top:-17px;margin-left:19px;"> กยศ. ปีการศึกษา............................จำนวนเงินที่กู้............................บาท</p>
		  			</div>
				</div>

				<div class="row">
	  				<div class="col-xs-10" style="margin-left:6.5em;">
	  					<div class="box"></div>
		  				<p style="margin-top:-17px;margin-left:19px;"> กรอ. ปีการศึกษา............................จำนวนเงินที่กู้............................บาท</p>
		  			</div>
				</div>

			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>กิจกรรมพิเศษที่เข้าร่วม</b></p>
				<p style="margin-left:6.5em;">- กิจกรรมด้านวิชาการ.................................................................................................................</p>
	  			<p style="margin-left:6.5em;">- กิจกรรมด้านสาธารณประโยชน์.................................................................................................</p>
	  			<p style="margin-left:6.5em;">- กิจกรรมด้านกีฬา.......................................................................................................................</p>
	  			<p style="margin-left:6.5em;">- กิจกรรมอื่นๆ..............................................................................................................................</p>
	  			
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>บุคคลที่สามารถให้ข้อมูลเพิ่มเติม (เช่นเพื่อนสนิท / อาจารย์ / ญาติ)</b></p>
				<p style="margin-left:6.5em;">- ชื่อ.........................................เกี่ยวข้องเป็น.............................ที่อยู่ปัจจุบัน บ้านเลขที่..............</p>
	  			<p style="text-indent: 4em;">ซอย.......................ถนน.............................ตำบล................................อำเภอ.........................................</p>
				<p style="text-indent: 4em;">จังหวัด................................หมายเลขโทรศัพท์............................โทรศัพท์มือถือ....................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>ความสามารถพิเศษ</b> (เช่นพิมพ์ดีดไทย อังกฤษ ทำบัญชี คอมพิวเตอร์ งานศิลป์ ฯลฯ) ระบุ.................</p>
				<p style="text-indent: 4em;">................................................................................................................................................................</p>
				<p style="text-indent: 4em;">................................................................................................................................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b>ปัญหาด้านสุขภาพ</b></p>
  					<p style="margin-left:7em;">- โรคประจำตัว</p>
  					<div class="row">
		  				<div class="col-xs-5" style="margin-left:13.5em; margin-top:-2em">
		  					<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:19px;">มี ระบุ........................</p>
			  			</div>
			  			<div class="col-xs-5" style="margin-left:25em; margin-top:-2em">
		  					<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:19px;">ไม่มี</p>
			  			</div>
					</div>
					<p style="margin-left:7em;">- ปัญหาด้านอื่น ๆ (ที่เป็นอุปสรรคต่อการเรียน).........................................................................</p>
					<p style="text-indent: 4em;">................................................................................................................................................................</p>
					<p style="margin-left:7em;">- ปัญหาครอบครัว.......................................................................................................................</p>
					<p style="text-indent: 4em;">................................................................................................................................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;">อาจารย์ที่ปรึกษา ชื่อ.....................................................โทรศัพท์............................................................</p>
				<p style="text-align:center">ข้าพเจ้าขอรับรองว่าข้อความที่แจ้งไว้ทั้งหมดนี้ เป็นความจริงทุกประการ</p>
				<p style="text-align:center">(ลงชื่อ)...................................................ผู้ขอทุน</p>
				<p style="text-align:center">(.........................................)</p>
				<p style="text-align:center">วันที่..........เดือน..................พ.ศ............</p>
			</div>
				
		</div>

		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:3em" id = "printable" >4</div>

		<div class="container" id = "printable"style="margin-top : 5em"> 
			<div class="row">
				<p style="text-indent: 4em;"><b>หมายเหตุ</b></p>
				<p style="text-indent: 4em;"><b>1. การแจ้งข้อมูลที่เป็นเท็จนักศึกษามีความผิดทางวินัยนักศึกษา นักศึกษาจะถูกตัดสิทธิ์การ</b></p>
				<p style="text-indent: 4em;"><b>ได้รับทุนการศึกษาพร้อมทั้งเรียกเงินทุนที่ได้รับคืน</b></p>
				<p style="text-indent: 4em;">2. สถานที่ที่สามารถเรียกตัวได้ทันทีในมหาวิยาลัย ที่ชุมนุม / กลุ่ม..........................................................</p>
				<p style="text-indent: 4em;">อาคาร.......................................................................................................................................................</p>
				<p style="text-indent: 4em;">3. หมายเลขบัญชีออมทรัพย์ มหาวิทยาลัยธรรมศาสตร์ ชื่อบัญชี.............................................................</p>
				<p style="text-indent: 4em;">เลขที่บัญชี.................................................................................................................................................</p>
				<p style="text-indent: 4em;">4. หมายเลขบัญชีธนาคารกรุงไทย จำกัด (มหาชน) สาขา........................................................................</p>
				<p style="text-indent: 4em;">ชื่อบัญชี...........................................................เลขที่บัญชี.........................................................................</p>
			</div>
			
		</div>

		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:3em" id = "printable" >5</div>

		<div class="container" id="printable" style="margin-top : 6em">

			<div class="row">
				<p style="text-indent: 4em;"><b>บรรยายประวัติ สภาพครอบครัว และเหตุผลความจำเป็นในการขอทุน เพื่อประโยชน์ในการพิจารณา</b></p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				<p style="text-indent: 4em;">......................................................................................................................................................................</p>
				</div>
			
		</div>


		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:6em" id = "printable" >6</div>

		<div class="container" id="printable" style="margin-top : 4em">

			<div class="row">
				<p style="text-indent: 4em;"><b>เขียนแผนที่ย้านของนักศึกษาพอสังเขป ด้านหลังแผ่นใบนี้</b></p>
				<div class="map"></div>
			</div>


		</div>

		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:8em" id = "printable" >7</div>

		<div class="container" id="printable" style="margin-top:5em">
			<div class="row">
				<p style="text-align:center"><b>หนังสือรับรองของอาจารย์ที่ปรึกษา หรืออาจารย์ของคณะสำหรับนักศึกษาผู้ขอรับทุน</b></p>
				<p style="text-indent: 4em;">เรียนอาจารย์ที่ปรึกษา หรือ อาจารย์ของภาควิชาคณะวิศวกรรมศาสตร์ มธ.</br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					เพื่อโปรดกรุณาสอบถามข้อมูลเกี่ยวกับนักศึกษาผู้ขอรับทุน ตามข้อความด้านล่างนี้ หรือตามที่ท่านเห็น</br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					ควร เพื่อประโยชน์ในการพิจารณาทุนการศึกษาของคณะกรรมการ ฯ จะขอบคุณอย่างยิ่ง</br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					คณะกรรมการพิจารณาทุนการศึกษา</p>
			</div>

			<div class="row">
				<p  style="text-indent: 4em;">.......................................................................................................................................................................</p>
			</div>
			<div class="row">
					<p style="text-indent: 4em;"><b>ชื่อผู้ขอรับทุน นาย / นางสาว....................................................เลขทะเบียน.......................................</b></p>
			</div>
			<div class="row">
					<p style="text-indent: 4em;"><b>คณะ........................................................สาขาวิชา.....................................................ชั้นปี.................</b></p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">1. ฐานะทางเศรษฐกิจของผู้ขอรับทุน</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">1.1 ลักษณะอาชีพของบิดามารดา หรือผู้ปกครอง........................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">1.2 รายได้ของบิดามารดา หรือผู้ปกครอง....................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">1.3 ความขาดแคลนของผู้ขอรับทุน..............................................................................................................</p>
			</div>
			<div class="row">
				<p class="small" style="text-indent: 4em;">.....................................................................................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">2. ความเป็นอยู่ การใช้ชีวิตประจำวันขอผู้ขอรับทุน</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">2.1 การทำงานพิเศษหารายได้ช่วยตอนเอง..................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">2.2 การทำกิจกรรมในมหาวิทยาลัย / นอกมหาวิทยาลัย.............................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">2.3 สุขภาพ.......................................................ความประพฤติ....................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">2.4 อื่น ๆ......................................................................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">3 ความสนใจในด้านการเรียน.......................................................................................................................</p>
			</div>
			<div class="row">
				<p class="small" style="text-indent: 4em;">......................................................................................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">4 เหตุผลและความจำเป็นของผู้ขอรับทุน.....................................................................................................</p>
			</div>
			<div class="row">
				<p class="small" style="text-indent: 4em;">......................................................................................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">5 เหตุผลและความจำเป็น ตลอดจนปัญหาของผู้ขอรับทุนในทัศนะของท่าน...............................................</p>
			</div>
			<div class="small" class="row">
				<p class="small" style="text-indent: 4em;">..................................................................................................................................................................</p>
			</div>
			<div class="row">
					<p class="small" style="text-indent: 4em;">6. นักศึกษาผู้นี้สมควรได้รับการพิจารณาทุนหรือไม่</p>
			</div>
			<div class="row">
  				<div class="col-xs-11" style="margin-left:3em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:19px;"> สมควรได้รับทุน เนื่องจาก.......................................................................................................................</p>
	  			</div>
			</div>
			<div class="row">
  				<div class="col-xs-11" style="margin-left:3em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:19px;"> ไม่สมควร เนื่องจาก.................................................................................................................................</p>
	  			</div>
			</div>
			<div class="row">
  				<div class="col-xs-11" style="margin-left:3em;">
  					<div class="box"></div>
	  				<p style="margin-top:-17px;margin-left:19px;"> ข้อเสนอแนะอื่นๆ.....................................................................................................................................</p>
	  			</div>
			</div>
			<div class="row">
				<p class="small" style="text-align:center;">อาจารย์ที่ปรึกษาลองชื่อ...................................................</p>
			</div>
			<div class="row">
				<p class="small" style="text-align:center">(.........................................................)</p>
			</div>
			<div class="row">
				<p class="small" style="text-align:center">วันที่.................เดือน.............................พ.ศ............</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;margin-top:1em"><b>หมายเหตุ หนังสือฉบับบนี้ไม่ใช่เป็นการคํ้าประกันนักศึกษา</b></p>
			</div>

			
		</div>


		<section id="printable"></section>

		<div class="row pageNumber" style="margin-top:9em" id = "printable" >8</div>

		<div class="container" id="printable" style="margin-top:5em">
			<div class="row">
				<p style="text-align:center"><b>หนังสือรับรองรายได้ครอบครัว ผู้ขอทุนการศึกษาของมหาวิทยาลัยธรรมศาสตร์</b></p>
			</div>
			<div class="row">
				<p style="text-align:right;margin-right:2em">วันที่.............เดือน...........................พ.ศ...............</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">ข้าพเจ้าบิดา/มารดา/ผู้ปกครอง (ที่มิใช่บิดา ข มารดา) ของนาย/นางสาว............................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">ได้ประกอบอาชีพ...................................................................................................................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">สถานที่ทำงาน...............................เลขที่.....................ถนน............................ตำบล/แขวง....................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">อำเภอ/เขต.............................จังหวัด...............................โทรศัพท์..........................มีรายได้ปีละ..................บาท</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">และ นาย/นาง/นางสาว.................................................บิดา/มารดาของ..............................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">ประกอบอาชีพ.......................................................................................................................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">สถานที่ทำงาน................................................เลขที่...............................ถนน........................................................</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em">ตำบล/แขวง...........................................อำเภอ/เขต...................................จังหวัด...............................................</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">โทรศัพท์...............................................มีรายได้ปีละ......................................................................................บาท</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em"><b>เหตุผลความจำเป็นที่บุตร/ธิดา/ผู้ที่อยู่ในความดูแลของท่าน ขอรับทุนการศึกษา</b></p>
			</div>	

			<div class="row">
				<p  style="text-indent: 4em;">..............................................................................................................................................................................</p>
			</div>

			<div class="row">
				<p  style="text-indent: 4em;">..............................................................................................................................................................................</p>
			</div>

			<div class="row">
				<p style="text-align:center">ข้าพเจ้าขอรับรอง และยืนยันว่าข้อความดังกล่าวข้างต้นเป้นความจริง</p>
			</div>
			<div class="row">
				<p style="text-align:center">ลงชื่อ............................................</p>
			</div>
			<div class="row">
				<p style="text-align:center">(......................................................)</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">หมายเหตุ</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">1. การข้อมูลข้างต้นที่เป็นเท็จต่อเจ้าหน้าที่พนักงานมีความผิดทางกฎหมาย</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">2. ผู้รับรองรายได้ต้องมีข้อความลายมือตนเองทั้งฉบับ มิให้ลบ ขูด ขีด ฆ่า หากเขียนผิดต้อง</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">มีลายเซ็นผู้รับรองเซ้นกำกับ ห้ามใช้นํ้ายาลบคำผิด</p>
			</div>
			<div class="row">
				<p style="text-indent: 4em">3. สามารถส่งเอกสารประกอบการพิจารณาอื่นๆ ได้</p>
			</div>
		</div>

		<section id="printable"></section>

		<div class="pageNumber" style="margin-top:11em" id="printable">9</div>
	</body>

</html>