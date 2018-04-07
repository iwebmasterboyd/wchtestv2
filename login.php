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
<?php     //start php tag
session_start();
require_once('dbconnect.php');

	$strUsername = mysqli_real_escape_string($con,$_POST['username']);
	$strPassword = mysqli_real_escape_string($con,$_POST['passwd']);

	$strSQL = "SELECT * FROM tb_user WHERE userName = '".$strUsername."' and userPass = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo ".";
		
?>
			<script type="text/javascript">  
				swal({  
				title: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
                text:  "กรุณาตรวจสอบชื่อผู้ใช้หรือรหัสผ่าน",  
                type: "success", 
				icon: "warning",
				button: false,
				
				});
			</script>
<?php
		header("refresh:1;url=index.php");
		exit();
	}
	else
	{
		if($objResult["LoginStatus"] == "1")
		{	
			echo '.';
?>
			<script type="text/javascript">  
				swal({  
				title: "เกิดข้อผิดพลาด",
                text:  "ชื่อผู้ใช้ "+"<?php echo $strUsername; ?>"+" กำลังอยู่ในระบบกรุณาล็อคอินชื่ออื่น",  
                type: "success", 
				icon: "warning",
				button: false,
				
				});
			</script>
<?php
			header("refresh:1;url=index.php");
			exit();
		} else
				if ($objResult["userType"] == "1")
					{
					//*** Update Status Login
					$sql = "UPDATE tb_user SET LoginStatus = '1' , LastUpdate = NOW() WHERE userID = '".$objResult["userID"]."' ";
					$query = mysqli_query($con,$sql);

					//*** Session
					$_SESSION["userID"] = $objResult["userID"];
					$_SESSION["LoginStatus"] = $objResult["LoginStatus"];
					session_write_close();
					echo '.';
?>
					<script type="text/javascript">  
						swal({  
						title: "ยินดีต้อนรับ",
						text:  "สวัสดี "+"<?php echo $objResult['userName'];?>"+" คุณได้เข้าสู่ระบบ",  
						type: "success", 
						icon: "success",
						button: false,

						});
					</script>
<?php
					header("refresh:1;url=student.php");
					}
					if ($objResult["userType"] == "2")
					{
					//*** Update Status Login
					$sql = "UPDATE tb_user SET LoginStatus = '1' , LastUpdate = NOW() WHERE userID = '".$objResult["userID"]."' ";
					$query = mysqli_query($con,$sql);

					//*** Session
					$_SESSION["userID"] = $objResult["userID"];
					$_SESSION["LoginStatus"] = $objResult["LoginStatus"];
					session_write_close();
					echo '.';
?>
					<script type="text/javascript">  
						swal({  
						title: "ยินดีต้อนรับ",
						text:  "สวัสดี "+"<?php echo $objResult['userName'];?>"+" คุณได้เข้าสู่ระบบ",  
						type: "success", 
						icon: "success",
						button: false,

						});
					</script>
<?php
					header("refresh:1;url=admin/index.php");
					}
			
	}
					mysqli_close($con);

?>
			