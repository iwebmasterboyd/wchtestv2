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
<?php
	session_start();
	require_once('dbconnect.php');


	$sql = "INSERT INTO tb_user (userID, userName, userPass, userType, LoginStatus, LastUpdate) 
		VALUES ('".$_POST["stdID"]."','".$_POST["stdID"]."','".$_POST["stdPasswd"]."'
		,'1','0','0000-00-00 00:00:00')";
	$query = mysqli_query($con,$sql);

	$sqlStd = "INSERT INTO tb_student (userID, stdYear, stdTitle, stdFirstname, stdLastname, stdClass, stdRoom ,stdStatus, stdFotoPath) 
	          VALUES ('".$_POST["stdID"]."','".$_POST["stdYear"]."','".$_POST["stdTitle"]."','".$_POST["stdName"]."','".$_POST["stdSurname"]."','".$_POST["stdClass"]."','".$_POST["stdRoom"]."','0','upload/userdefault.png')";
	$queryStd = mysqli_query($con,$sqlStd);

	$sqlStdScore ="insert INTO tb_userscore (userID, pretest, scoreCh01, scoreCh02, scoreCh03, scoreCh04, scoreCh05, scoreCh06, scoreCh07, scoreCh08, scoreCh09, scoreCh10, scoreCh11, scoreCh12, scoreCh13, scoreCh14,  scoreCh15, scoreCh16, scoreCh17, scoreCh18, scoreCh19, posttest, scoreTotal) VALUES ('".$_POST["stdID"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')";
	$queryStdScore=mysqli_query($con,$sqlStdScore);

	if($query && $queryStd && $queryStdScore) {
		echo '.';	
?>
	<script type="text/javascript">  
			swal({  
			title: "ลงทะเบียนเรียบร้อย",
			text:  "กรุณาล็อคอินเข้าสู่ระบบ",  
			type: "success", 
			icon: "success",
			button: false,		
			});
	</script>
<?php
		header("refresh:1;url=index.php");
	
	}

	mysqli_close($con);
	
	
?>
