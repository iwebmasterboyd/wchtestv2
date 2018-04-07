
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

<?php
	session_start();
	include('config.inc.php');
	require_once("dbconnect.php");

	if(!isset($_SESSION['userID'])||($_SESSION["LoginStatus"]))
	{
		echo ".";
?>
		<script type="text/javascript">  
				swal({  
				title: "คุณไม่มีสิทธิ์เข้าใช้งาน",
                text:  "กรุณาล็อคอินเพื่อเข้าใช้งาน",  
                type: "success", 
				icon: "warning",
				button: false,
				});
		</script>
<?php
		
		header("refresh:2;url=index.php");
		exit();
	} 	
	//*** Update Last Stay in Login System
	$sql = "UPDATE tb_user SET LastUpdate = NOW() WHERE userID = '".$_SESSION["userID"]."' ";
	$query = mysqli_query($con,$sql);

	//*** Get Data User Login
	$strSQL = "SELECT * FROM tb_user INNER JOIN tb_student on tb_user.userID=tb_student.userID WHERE tb_user.userID = '".$_SESSION['userID']."' ";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <script src="js/sweetalert.min.js"></script>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
</head>

<body>
  
   <!--==========================
    Intro Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">โรงเรียนวิเชียรมาตุ 2</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>
	  <nav id="nav-menu-container">
        <ul class="nav-menu">
			<li class="menu-active"><a href="student.php"><span class="fa fa-home"></span> หน้าแรก </a></li>
			<li><a href="#manual"><span class="fa fa-archive"></span> บทเรียน </a></li>
			<li><a href="#" data-toggle="modal" data-target="#registerForm"><span class="fa fa-user-plus"></span> ลงทะเบียน </a></li>
			<li><a href="#loginform"><span class="fa fa-drivers-license-o"></span> เข้าสู่ระบบ </a></li>
        </ul>
      </nav>
    </div>
  </header>
  
   <section id="studentmenu">
	<div class="container-fluid">
	<div class="stdMenu">
		<div class="row">
			<div class="col-md-3">
				<div class="card wow fadeInLeft" >
					<div class="card-heading"><h4><span class="fa fa-address-book"></span> ข้อมูลผู้ใช้งาน</h4></div>
					<div class="card-body">
						<div class="text-center"><img class="img-thumbnail" src="<?php echo $objResult["stdFotoPath"];?>" width="200"></div>
						<br>
						<div>รหัสประจำตัว : <?php echo $objResult["userID"]; ?></div>
						<div>ชื่อ - สกุล  : <?php echo $objResult["stdTitle"].$objResult["stdFirstname"]."  ".$objResult["stdLastname"]; ?></div>
						<div>ชั้นมัธยมศึกษาปีที่ <?php echo $objResult["stdClass"]."/".$objResult["stdRoom"]; ?></div><br>
						<div class="text-center"><span><a href="#" class="btn btn-info" data-toggle="modal" data-target="#stdUpdateForm">แก้ไขข้อมูล</a></span>  <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a></div>
					</div>
				</div>	
			</div>
			<div class="col-md-9">
				<div class="card wow fadeInRightBig" >
					<div class="card-heading"><h4><span class="fa fa-address-book"></span> คำแนะนำในการใช้งาน</h4></div>
					<div class="card-body">
						<div><p>บทเรียนผ่านเครือข่ายคอมพิวเตอร์วิชาแอนิเมชั่น เรื่อง แอนิเมชั่น ใช้สอนนักเรียนระดับชั้นมัธยมศึกษาปีที่ 6 ได้แบ่งเนื้อหาออกเป็น 19 หัวข้อ ใช้เวลาเรียนทั้งสิ้น 40 ชั่วโมง ให้นักเรียนศึกษาคู่มือการใช้ชุดการเรียนสำหรับนักเรียนให้เข้าใจ แล้วเริ่มต้นศึกษาบทเรียนโดยมีลำดับขั้นตอนในการศึกษาดังนี้</p></div>
						<ul><b>1. ทำแบบทดสอบก่อนเรียน</b></ul>
						<ul><b>2. ศึกษาเนื้อหาและทำกิจกรรมระหว่างเรียนตามลำดับหัวข้อดังนี้</b></ul>
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
			   		<ul><b>3. ทำแบบทดสอบหลังเรียน</b></ul>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

  </section>
  
  
  
  <!--==========================
    Update Profile Modal Form Section
  ============================-->
  
  <div class="modal fade" id="stdUpdateForm" tabindex="-1" role="dialog" aria-labelledby="stdUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <h5 class="modal-title" id="stdUpdateModalLabel"><span class="fa fa-id-card-o"></span> แก้ไขข้อมูลส่วนตัว </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="ปิด">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formstdUpdate" action="updatestd.php" method="post" role="form" id="stdUpdate" enctype="multipart/form-data">
         <div class="row">
         <div class="col-md-4">
		 <div class='form-group'>
				<label for='stdTitle'>คำนำหน้า :</label>
					<select class='form-control' name='stdTitle' id='stdTitle'>
						<option <?php if($objResult['stdTitle']=="เด็กชาย"){echo "selected";} ?>>เด็กชาย</option>
						<option <?php if($objResult['stdTitle']=="เด็กหญิง"){echo "selected";} ?>>เด็กหญิง</option>
						<option <?php if($objResult['stdTitle']=="นาย"){echo "selected";} ?>>นาย</option>
						<option <?php if($objResult['stdTitle']=="นางสาว"){echo "selected";} ?>>นางสาว</option>
					</select>
		</div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class='form-group'>
						<label for='stdName'>ชื่อ :</label>
						<input type='text' class='form-control' id='stdName' name='stdName' data-validation="required "value=<?php echo $objResult['stdFirstname'];?>  maxlength="50" data-validation-error-msg="กรุณาใส่ชื่อ" >
				</div>
			</div>
			<div class="col-md-6">
				<div class='form-group'>
						<label for='stdSurname'>นามสกุล :</label>
						<input type='text' class='form-control' id='stdSurname' name='stdSurname' data-validation="required" value=<?php echo $objResult['stdLastname'];?>  maxlength="50" data-validation-error-msg="กรุณาใส่นามสกุล" >
				</div>
			</div>
	  	 </div>
	  	 <div class="row">
	  	 <div class="col-md-4">
			 <div class='form-group'>
					<label for='stdClass'>ระดับชั้น :</label>
					<select class='form-control' name='stdClass' id='stdClass'>
							<option value='1' <?php if($objResult['stdClass']==1){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 1</option>
							<option value='2' <?php if($objResult['stdClass']==2){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 2</option>
							<option value='3' <?php if($objResult['stdClass']==3){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 3</option>
							<option value='4' <?php if($objResult['stdClass']==4){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 4</option>
							<option value='5' <?php if($objResult['stdClass']==5){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 5</option>
							<option value='6' <?php if($objResult['stdClass']==6){echo "selected";} ?>>ชั้นมัธยมศึกษาปีที่ 6</option>
					</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class='form-group'>
					<label for='stdRoom'>ห้อง :</label>
					<select class='form-control' name='stdRoom' id='stdRoom'>
						<option value='1' <?php if($objResult['stdRoom']==1){echo "selected";} ?>>1</option>
						<option value='2' <?php if($objResult['stdRoom']==2){echo "selected";} ?>>2</option>
						<option value='3' <?php if($objResult['stdRoom']==3){echo "selected";} ?>>3</option>
						<option value='4' <?php if($objResult['stdRoom']==4){echo "selected";} ?>>4</option>
						<option value='5' <?php if($objResult['stdRoom']==5){echo "selected";} ?>>5</option>
					 </select>
			</div>
		</div>
	  	<div class="col-md-6">
		<div class='form-group'>
				<label for='stdPasswd'>รหัสผ่าน :</label>
				<input type='password' class='form-control' size='8' id='stdPasswd' name='stdPasswd' data-validation="required" value=<?php echo $objResult['userPass'];?> maxlength="50" data-validation-error-msg="กรุณาใส่รหัสผ่าน">
        </div>
        </div>
        </div>
        <div class="row">
         <div class="col-md-4">
		 <div class='form-group'>
				<label for='stdAvatar'>เลือกรูปประจำตัว :</label>
				<input type="file" name="stdAvatar" id="stdAvatar" data-validation="required" data-validation-error-msg="กรุณาเลือกรูปประจำตัว" />
		</div>
		</div>
		</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
					rel="stylesheet" type="text/css" />
      	<script>
			$.validate({
					form : '#stdUpdateForm',
					validateOnBlur : true, // disable validation when input looses focus
					scrollToTopOnError : false, // Set this property to true on longer forms
				  });
		</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="Submit" name="Submit" class="btn btn-primary">แก้ไขข้อมูล</button>
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
  </footer>
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>
</body>

</html>