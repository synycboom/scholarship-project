<?php 
	extract($_POST);
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="public/css/registration_printer.css" >
		<script src="public/js/jquery-1.11.1.min.js"></script>
		<script src="public/js/bootstrap.js"></script>
		<script src="public/js/registration_printer.js"></script>
	</head>
	<body>
		<div class="container" id="non-printable">
			<div class="row">
				<div class="col-md-12">
					<h2>เอกสารจะมีจำนวนทั้งหมด 2 ชุด โปรดคลิกปุ่ม "print" ด้านล่าง</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<button id = "printButton">Print</button>
				</div>
			</div>
			
		</div>

		<div class="container" id="printable" style="margin-top:2em;">
			<div class="row">
				<div class="col-xs-1"><img src="/scholarship/public/images/engr_logo.jpg"class="logo"></div>
				<div class="col-xs-8 title">
					<h4><b>ใบสมัครขอรับทุนการศึกษาคณะวิศวกรรมศาสตร์</br>มหาวิทยาลัยธรรมศาสตร์ ปีการศึกษา <under class ="underline">๒๕๕......<under></b></h4>
				</div>
				<div class="col-xs-2 pictureBox"></br>ติดรูปถ่าย </br></br>2 นิ้ว</div>
			</div>

			<div class="row" style="margin-top:1em;">
			  <div class="col-xs-12">

			  	<p style="text-indent: 40px;"><b>ข้อมูลทั่วไปของผู้สมัครขอทุน</b></p>

				  	<p style="text-indent: 100px;">ชื่อ (นาย/น.ส.)..............................................นามสกุล..............................................
				  	</p>


				  	<p style="text-indent: 100px;">ชื่อ-นามสกุล (ภาษาอังกฤษ).....................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">เลขประจำตัวประชาชน............................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">สาขาวิชา......................................เลขทะเบียน..................................ชั้นปี...............
				  	</p>

				  	<p style="text-indent: 100px;">คะแนนเฉลี่ยสะสม (ล่าสุด).......................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">วัน/เดือน/ปี เกิด.......................................................................................................
				  	</p>

				  	<p style="text-indent: 100px;">สถานที่เกิด..............................................ศาสนา.....................................................
				  	</p>

				  	<p style="text-indent: 100px;"><b>การเข้าศึกษาในมหาวิทยาลัยธรรมศาสตร์</b></p>

				  	<!-- <div class="container-fluid"> -->
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
			  				<div class="col-xs-3"></div>
			  				<div class="col-xs-3">
				  				<div class="box"></div>
				  				<p style="margin-top:-17px;margin-left:17px;">ทุนเต็ม</p>
			  				</div>
			  				<div class="col-xs-3">
			  					<div class="box"></div>
			  					<p style="margin-top:-17px;margin-left:17px;">ทุนบางส่วน</p>
			  				</div>
			  				<div class="col-xs-3" >
			  					<div class="box"></div>
			  					<p style="margin-top:-17px;margin-left:17px;">ที่นั่ง</p>
			  				</div>
			  		</div>


				  	<div class="row">
				  		<div class="col-xs-3"></div>
			  			<div class="col-xs-9">
			  				<div class="box"></div>
			  				<p style="margin-top:-17px;margin-left:17px;">โครงการพิเศษอื่น ๆ...........................................................................
			  				</p>
			  			</div>
				  	</div>

				  	<p style="text-indent: 100px;">ที่อยู่ตามภูมิลำเนาเดิม บ้านเลขที่..............หมู่ที่.........ซอย/ตรอก..............................
				  	</p>

				  	<p style="text-indent: 100px;">ถนน....................ตำบล/แขวง.........................อำเภอ/เขต........................................
				  	</p>

				  	<p style="text-indent: 100px;">จังหวัด.......................รหัสไปรษณีย์..................โทรศัพท์บ้าน...................................
				  	</p>
				  	
				  	<p style="text-indent: 100px;">โทรศัพท์มือถือ.........................................................................................................

				  	<p style="text-indent: 100px;">ที่อยู่ปัจจุบัน (ติดต่อได้สะดวก) บ้านเลขที่.............หมู่ที่.......ซอย/ตรอก......................
				  	</p>

				  	<p style="text-indent: 100px;">ถนน....................ตำบล/แขวง.........................อำเภอ/เขต........................................
				  	</p>

				  	<p style="text-indent: 100px;">จังหวัด.........................รหัสไปรษณีย์..................โทรศัพท์........................................
				  	</p>

				  	<p style="text-indent: 100px;">กรณีอยู่หอพัก ชื่อหอพัก.......................................หมายเลขห้องพัก...........................
				  	</p>

				  	<p style="text-indent: 100px;">หมายเลขโทรศัพท์....................................................................................................</p>

				<p style="text-indent: 40px;"><b><i>ประวัติการศึกษาโดยย่อ</i></b></p>

					<p style="text-indent: 100px;">มัธยมตอนปลาย จากโรงเรียน............................................จังหวัด............................</p>

					<p style="text-indent: 100px;">เกรดเฉลี่ยสะสม (ม.ปลาย)........................</p>

			  </div>
			</div>

			<div class="row pageNumber">1</div>

			<!-- variable for printing section -->
			<div class="row">
				<div class="col-xs-6">
					<div id="name" style="margin-top:-56.45em; margin-left:14em;">
			  			<?= $firstname ?>
			  		</div>
				</div>
				<div class="col-xs-6">
					<div id="surname" style="margin-top:-56.45em; margin-left:7em;">
				  		<?= $lastname ?>
				  	</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div id="name" style="margin-top:-50.15em; margin-left:11.5em;">
			  			<?= $department ?>
			  		</div>
				</div>
				<div class="col-xs-4">
					<div id="surname" style="margin-top:-50.15em; margin-left:4em;">
				  		<?= $studentID ?>
				  	</div>
				</div>
				<div class="col-xs-2">
					<div id="surname" style="margin-top:-50.15em; margin-left:0em;">
				  		<?= $year ?>
				  	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2">
					<div id="surname" style="margin-top:-48.1em; margin-left:20em;">
				  		<?= $GPA ?>
				  	</div>
				</div>
			</div>

		</div>





		<section id="printable"></section>






		<div class="container" id="printable" style="margin-top:4em;">
			<div class="row">
				<p style="text-indent: 4em;"><b><i>สถานภาพครอบครัวของผู้ขอทุน</i></b></p>
					<p style="text-indent: 7.5em;">ชื่อบิดา...............................................................................อายุ............................ปี</p>
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
				<p style="text-indent: 7.5em;">อาชีพ.................................ลักษณะงาน....................................................................</p>	
				<p style="text-indent: 7.5em;">ตำแหน่ง / ยศ...........................................รายได้ต่อเดือน.....................................บาท</p>
				<p style="text-indent: 7.5em;">สถานที่ทำงาน...........................................จังหวัด.......................................................</p>	
				<p style="text-indent: 7.5em;">โทรศัพท์................................โทรศัพท์มือถือ..............................................................</p>
				<p style="text-indent: 7.5em;">ชื่อมารดา..............................................................................อายุ............................ปี</p>	
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
				<p style="text-indent: 7.5em;">อาชีพ.................................ลักษณะงาน....................................................................</p>	
				<p style="text-indent: 7.5em;">ตำแหน่ง / ยศ...........................................รายได้ต่อเดือน.....................................บาท</p>
				<p style="text-indent: 7.5em;">สถานที่ทำงาน...........................................จังหวัด.......................................................</p>	
				<p style="text-indent: 7.5em;">โทรศัพท์................................โทรศัพท์มือถือ..............................................................</p>
				<p style="text-indent: 7.5em;">ชื่อมารดา..............................................................................อายุ............................ปี</p>	
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b><i>สถานการอยู่อาศัยของผู้ขอทุน</i></b></p>
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
  				<div class="col-xs-3" style="margin-left:-6em;" >
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
				<p style="text-indent: 4em;"><b><i>บิดา / มารดา ของผู้ขอทุน</i></b></p>
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
				<p style="text-indent: 7.5em;"> - ภาระหนี้สินของบิดา มารดา หรือ ผู้ปกครอง (ประมาณ)...........................................บาท</p>	
			</div> 


			<div class="row pageNumber" style="margin-top:9em">2</div>

		</div>

		



		<section id="printable"></section>



		<div class="container" id = "printable"style="margin-top : 2em"> 
			<div class="row">
				<p style="text-indent: 4em;"><b><i>ผู้อุปการะ</i></b></p>
					<p style="text-indent: 7.5em;">นักศึกษาได้รับการอุปการะส่งเสียจาก</p>
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
	  			<p style="text-indent: 8.2em;">หมู่ที่...........ซอย / ตรอก.......................ถนน.......................ตำบล/แขวง........................</p>
				<p style="text-indent: 8.2em;">อำเภอ/เขต...........จังหวัด....................รหัสไปรษณีย์..............โทรศัพท์บ้าน....................</p>
				<p style="text-indent: 8.2em;">โทรศัพท์มือถือ.............................</p>
				<p style="text-indent: 7.5em;">- อาชีพของผู้อุปการะ...............................ตำแหน่ง/ลักษณะงาน........................................</p>
				<p style="text-indent: 8.2em;">สถานที่ทำงาน..............................โทรศัพท์.........................โทรศัพท์มือถือ....................</p>
				<p style="text-indent: 8.2em;">รายได้เฉลี่ยต่อเดือน..................บาท หนี้สินของผู้อุปการะ (ประมาณ).........................บาท</p>
			</div>

			<div class="row">
				<p style="text-indent: 4em;"><b><i>การศึกษา และอาชีพของพี่น้อง (รวมตนเองด้วย)</i></b></p>
				<p style="text-indent: 7.5em;">คนที่ เพศ สถานที่ทำงาน / สถานศึกษา ระดับการศึกษา รายได้เฉลี่ยต่อเดือน</p>
			</div>

			<table border="1px" style="margin-left:4em;">
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
				<p style="text-indent: 4em;"><b><i>รายได้/รายจ่ายของผู้ขอทุน</i></b></p>
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
	  				<p style="margin-top:-17px;margin-left:17px;">ใช้จ่ายจากเงินกุ้ยืมฯ และเงินจากทางบ้านบางส่วน</p>
  				</div>
			</div>

			<div class="row pageNumber">3</div>


		</div>

		




	</body>

</html>