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

	if(isset($_POST['stdID'])){
		$strID = mysqli_real_escape_string($con,$_POST['stdID']);
		$query = "SELECT userID FROM tb_user WHERE userID = '$strID'";
		if(!$result = mysqli_query($con, $query))
			{
				exit(mysqli_error($con));
			}

		if(mysqli_num_rows($result) > 0)
			{
				echo "<span class='status-not-available'> <font color='green'>ชื่ชื่อผู้ใช้มีอยู่แล้วในระบบ</font></span>";
			}
		else
			{
				// username is avaialable to use.
				echo "<span class='status-available'> <font color='green'>ชื่อผู้ใช้นี้สามารถใช้งานได้</font></span>";
			}
	}
	
?>