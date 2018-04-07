<!DOCTYPE html>

<?php
include('config.inc.php');
session_start();
require_once('dbconnect.php');
if(isset($_SESSION['userID']))
	{
		
		$strSQL = "SELECT * FROM tb_user WHERE userID = '".$_SESSION['userID']."'";
		$objQuery = mysqli_query($con,$strSQL);
		$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
			if ($objResult['userType']==2)
				{
					header("refresh:0;url=admin/index.php");
					exit();
				} 

			else
	
				{
					header("refresh:0;url=student.php");
					exit(); 
				}
	}


?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <script src="js/sweetalert.min.js"></script>
  


  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">โรงเรียนวิเชียรมาตุ 2</a></h1>
      
        
      </div>
	  <nav id="nav-menu-container">
        <ul class="nav-menu">
			<li class="menu-active"><a href="#intro"><span class="fa fa-home"></span> หน้าแรก </a></li>
			<li><a href="#manual"><span class="fa fa-archive"></span> แนะนำการใช้งาน </a></li>
			<li><a href="#" data-toggle="modal" data-target="#registerForm"><span class="fa fa-user-plus"></span> ลงทะเบียน </a></li>
			<li><a href="#loginform"><span class="fa fa-drivers-license-o"></span> เข้าสู่ระบบ </a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>บทเรียนผ่านเครือข่ายคอมพิวเตอร์ เรื่อง แอนิเมชั่น</h2>
      <p>สื่อการเรียนรู้ในรายวิชา แอนิเมชั่น </p>
      <p>นางทัศนีย์ สารทิพย์ โรงเรียนวิเชียรมาตุ 2 จังหวัดตรัง สพม.13 </p>
		<a href="#loginform" class="btn-get-started scrollto">เข้าสู่ระบบ</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
     Login Section
    ============================-->
    <section id="loginform" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
        <br>
          <h3 class="section-title">เข้าสู่ระบบ</h3>
          <span class="section-divider"></span>
          <div class="section-description">
            กรุณาล็อคอินเข้าสู่ระบบเพื่อเข้าใช้งาน
          </div>
        </div>
        <div class="form-horizontal box wow fadeInDown " align="center">
              <form action="login.php" method="post" role="form" id="loginform">
                     <div class="form-group" >
                      <div class="col-sm-6">
						  <input type="text" name="username" class="form-control" id="username" placeholder="ชื่อผู้ใช้" pattern="^([a-zA-Z0-9)$" data-validation="required" maxlength="20" data-validation-error-msg="กรุณาใส่ชื่อผู้ใช้" />
                      </div>
                  	</div>
               <div class="form-group" >
                      <div class="col-sm-6">
                        <input type="password" name="passwd" class="form-control" id="passwd" placeholder="รหัสผ่าน" data-validation="required" 
		 				data-validation-error-msg="กรุณาใส่รหัสผ่าน"/>
					 </div>
                </div>
                <div>
                		<button class="btn-get-started scrollto" type="submit" name="submit" title="Login">เข้าสู่ระบบ</button>
                </div>
                <br>
              </form>
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
				<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
					rel="stylesheet" type="text/css" />
				<script>
				  $.validate({
						form : '#loginform',
						validateOnBlur : false, // disable validation when input looses focus
						scrollToTopOnError : false, // Set this property to true on longer forms
				  });
				</script>
        	</div>
      </div>
</section>


<section id="manual" >
      <div class="section-header">
         <br>
		  <h4 class="section-title"><b>คำแนะนำในการใช้งาน</b></h4>
          <span class="section-divider"></span>
      </div>
    
        <div class="container-fluid">

          <div class="row">
          <div class="col-md-6 box wow fadeInUp">
           	   <br>
			   <h3><span class="ion-ios-briefcase"></span> คำแนะนำในการใช้งาน</h3>
			  <div><p>บทเรียนผ่านเครือข่ายคอมพิวเตอร์วิชาแอเมั่น ใช้สอนนักเรียนระดับชั้นมัธยมศึกษาปีที่ 3 ได้แบ่งเนื้อหาออกเป็น 5 หน่วยการเรียนรู้ ใช้เวลาเรียนทั้งสิ้น 20 ชั่วโมง ให้นักเรียนศึกษาคู่มือการใช้บทเรียนสำหรับนักเรียนให้เข้าใจ แล้วเริ่มต้นศึกษาบทเรียนโดยมีลำดับขั้นตอนในการศึกษาดังนี้</p>
			  </div><br>
			   		<ul>
						<b class="ion-android-checkmark-circle"> หน่วยที่ 1 งานแอนิเมชันเบื้องต้น</b>
						
					</ul>
			   		<ul>
			   			<li class="ion-android-checkmark-circle"> ความรู้เบื้องต้นเกี่ยวกับงานแอนิเมชัน</li>
			   			<li class="ion-android-checkmark-circle"> โปรแกรมที่ใช้ในการสร้างงานแอนิเมชัน</li>
			   		</ul>
			   		<ul>
						<b class="ion-android-checkmark-circle"> หน่วยที่ 2 การใช้งานโปรแกรม Flash เบื้องต้น</b>
			  		</ul>
					<ul>
			   			<li class="ion-android-checkmark-circle"> ส่วนประกอบของโปรแกรม Flash</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือในการวาดภาพ Line Tool , Pen Tool</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือในการวาดภาพ Oval Tool</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือในการวาดภาพ Rectangle Tool</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือในการวาดภาพ Pencil Tool , Brush Tool, Eraser Tool</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือการจัดการสี </li>
			   		</ul>
			   		<ul>
						<b class="ion-android-checkmark-circle"> หน่วยที่ 3 การจัดการวัตถุ</b>
			  		</ul>
			  		<ul>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือในการจัดการวัตถุ</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือการช่วยวัดและจัดวางวัตถุ</li>
			   			<li class="ion-android-checkmark-circle"> การใช้เครื่องมือข้อความ</li>
			   			<li class="ion-android-checkmark-circle"> การจัดการวัตถุด้วยเลเยอร์</li>
			   			<li class="ion-android-checkmark-circle"> การสร้างซิมโบลและอินสแตนซ์</li>
			   			<li class="ion-android-checkmark-circle"> การจัดการกับเสียง </li>
			   		</ul>
			   		<ul>
						<b class="ion-android-checkmark-circle"> หน่วยที่ 4 แอนิเมชันอย่างง่าย</b>
			  		</ul>
			   		<ul>
			   			<li class="ion-android-checkmark-circle"> เฟรมต่อเฟรม (Frame by Frame)</li>
			   			<li class="ion-android-checkmark-circle"> ภาพเคลื่อนไหวแบบเคลื่อนที่ (Motion Tween)</li>
			   			<li class="ion-android-checkmark-circle"> ภาพเคลื่อนไหวแบบเปลี่ยนรูปร่าง (Shape Tween)</li>
			   		</ul>
			   		<ul>
						<b class="ion-android-checkmark-circle"> หน่วยที่ 5 ประยุกต์ใช้และนำเสนองานแอนิเมชัน</b>
			  		</ul>
			  		<ul>
			   			<li class="ion-android-checkmark-circle"> การนำเสนอข้อมูลในรูปแบบต่าง ๆ</li>
			   			<li class="ion-android-checkmark-circle"> การประยุกต์ใช้งานแอนิเมชัน</li>
			   		</ul>
		   </div>
		   <div class="col-md-5 box wow fadeInUp">
           	   <br>
			   <h3><span class="ion-ios-briefcase"></span> ผู้จัดทำ</h3>
			   		<ul>
						<li><i class="ion-android-checkmark-circle"> dgasdgsgsg</i></li>
			   		
			   		</ul>
		   </div>
		</div>
	</div>
</section>
 
 
  <!--==========================
    Regiater Modal Form Section
  ============================-->
  
  <div class="modal fade" id="registerForm" tabindex="-1" role="dialog" aria-labelledby="stdRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <h5 class="modal-title" id="stdRegisterModalLabel"><span class="fa fa-id-card-o"></span> สมัครสมาชิก </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="registerForm" action="stdregister.php" method="post" role="form" id="registerForm" enctype="multipart/form-data">
         <div class="row">
         <div class="col-md-4">
		 <div class='form-group'>
				<label for='stdYear'>ปีการศึกษา :</label>
					<select class='form-control' name='stdYear' id='stdYear'>
						<option>2558</option>
						<option>2559</option>
						<option>2560</option>
						<option>2561</option>
					</select>
		</div>
		</div>
		</div>
         <div class="row">
         <div class="col-md-4">
				<div class='form-group'>
						<label for='stdID'>ชื่อผู้ใช้งาน :</label>
						<input type='text' class='form-control' id='stdID' name='stdID' data-validation="required" maxlength="5" data-validation-error-msg="กรุณาใส่รหัสประจำตัวนักเรียน 5 ตัว" onBlur="checkAvailability()" ><span id="user-availability-status"></span> 
				</div>
				<script>
			 		function checkAvailability() {
						$("#loaderIcon").show();
						jQuery.ajax({
						url: "checkuser.php",
						data:'stdID='+$("#stdID").val(),
						type: "POST",
						success:function(data){
						$("#user-availability-status").html(data);
						$("#loaderIcon").hide();
						},
						error:function (){}
						});
						}
			 	</script>
		</div>
		</div>
         <div class="row">
         <div class="col-md-4">
		 <div class='form-group'>
				<label for='stdTitle'>คำนำหน้า :</label>
					<select class='form-control' name='stdTitle' id='stdTitle'>
						<option>เด็กชาย</option>
						<option>เด็กหญิง</option>
						<option>นาย</option>
						<option>นางสาว</option>
					</select>
		</div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class='form-group'>
						<label for='stdName'>ชื่อ :</label>
						<input type='text' class='form-control' id='stdName' name='stdName' data-validation="required" maxlength="50" data-validation-error-msg="กรุณาใส่ชื่อ" >
				</div>
			</div>
			<div class="col-md-6">
				<div class='form-group'>
						<label for='stdSurname'>นามสกุล :</label>
						<input type='text' class='form-control' id='stdSurname' name='stdSurname' data-validation="required" maxlength="50" data-validation-error-msg="กรุณาใส่นามสกุล" >
				</div>
			</div>
	  	 </div>
	  	 <div class="row">
	  	 <div class="col-md-4">
			 <div class='form-group'>
					<label for='stdClass'>ระดับชั้น :</label>
					<select class='form-control' name='stdClass' id='stdClass'>
							<option value='1'>ชั้นมัธยมศึกษาปีที่ 1</option>
							<option value='2'>ชั้นมัธยมศึกษาปีที่ 2</option>
							<option value='3'>ชั้นมัธยมศึกษาปีที่ 3</option>
							<option value='4'>ชั้นมัธยมศึกษาปีที่ 4</option>
							<option value='5'>ชั้นมัธยมศึกษาปีที่ 5</option>
							<option value='6'>ชั้นมัธยมศึกษาปีที่ 6</option>
					</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class='form-group'>
					<label for='stdRoom'>ห้อง :</label>
					<select class='form-control' name='stdRoom' id='stdRoom'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					 </select>
			</div>
		</div>
	  	<div class="col-md-6">
		<div class='form-group'>
				<label for='stdPasswd'>รหัสผ่าน :</label>
				<input type='password' class='form-control' size='8' id='stdPasswd' name='stdPasswd' data-validation="required" maxlength="50" data-validation-error-msg="กรุณาใส่รหัสผ่าน">
        </div>
        </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
					rel="stylesheet" type="text/css" />
      	<script>
			$.validate({
					form : '#registerForm',
					validateOnBlur : true, // disable validation when input looses focus
					scrollToTopOnError : false, // Set this property to true on longer forms
				  });
		</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="Submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
      </div>
      </form>
			  
    </div>
  </div>
</div>
 
 

 <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
			  &copy; ออกแบบและพัฒนาโดย นางทัศนีย์ สารทิพย์
          </div>
          <div class="credits">
            โรงเรียนวิเชียรมาตุ 2
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
