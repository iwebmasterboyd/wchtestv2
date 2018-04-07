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

//Upload Section

	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["stdAvatar"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["stdAvatar"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo '.';
		?>
			<script type="text/javascript">  
					swal({  
					title: "เกิดข้อผิดพลาด",
					text:  "กรุณาเลือกรูปแบบไฟล์เป็นรูปภาพ",  
					type: "warning", 
					icon: "warning",
					button: false,		
					});
			</script>
		<?php
			$uploadOk = 0;
			header("refresh:1;url=student.php");
		}
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
			echo '.';
	?>
			<script type="text/javascript">  
					swal({  
					title: "เกิดข้อผิดพลาด",
					text:  "กรุณาเลือกรูปแบบไฟล์เป็นรูปภาพ",  
					type: "success", 
					icon: "warning",
					button: false,		
					});
			</script>
		<?php
			$uploadOk = 0;
			header("refresh:1;url=student.php");
			exit();
	}
	// Check file size
	if ($_FILES["stdAvatar"]["size"] > 500000) {
		echo '.';
	?>
			<script type="text/javascript">  
					swal({  
					title: "เกิดข้อผิดพลาด",
					text:  "ขนาดของรูปภาพไม่ถูกต้อง",  
					type: "success", 
					icon: "warning",
					button: false,		
					});
			</script>
	<?php
		$uploadOk = 0;
		header("refresh:1;url=student.php");
		exit();
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo '.';
	?>
			<script type="text/javascript">  
					swal({  
					title: "เกิดข้อผิดพลาด",
					text:  "ไม่สามารถบันทึกข้อมูลได้เนื่องจากรูปประจำตัวไม่ถูกต้อง",  
					type: "success", 
					icon: "warning",
					button: false,		
					});
			</script>
	<?php
			header("refresh:1;url=student.php");
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["stdAvatar"]["tmp_name"], $target_file)) {
			$sql = "UPDATE tb_user SET userPass = '".$_POST["stdPasswd"]."' WHERE userID = '".$_SESSION["userID"]."'";
			$query = mysqli_query($con,$sql);

			$sqlStd = "UPDATE tb_student SET stdTitle = '".$_POST["stdTitle"]."', stdFirstname = '".$_POST["stdName"]."', stdLastname = '".$_POST["stdSurname"]."', stdClass = '".$_POST["stdClass"]."', stdRoom = '".$_POST["stdRoom"]."', stdFotoPath = '".$target_file."' WHERE userID = '".$_SESSION["userID"]."'"; 
			$queryStd = mysqli_query($con,$sqlStd);

		if($query && $queryStd) {
			echo '.';	
	?>
	<script type="text/javascript">  
			swal({  
			title: "แก้ไขข้อมูลเรียบร้อย",
			text:  "ระบบได้บันทึกข้อมูลเรียบร้อยแล้ว",  
			type: "success", 
			icon: "success",
			button: false,		
			});
	</script>
	<?php
		header("refresh:1;url=student.php");
	
	}

	mysqli_close($con);
	
		} else {
	?>
			<script type="text/javascript">  
					swal({  
					title: "เกิดข้อผิดพลาด",
					text:  "ไม่สามารถบันทึกข้อมูลได้",  
					type: "success", 
					icon: "warning",
					button: false,		
					});
			</script>
	<?php
			header("refresh:1;url=student.php");
		}
	}	
	?>
