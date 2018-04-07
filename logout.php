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

	require_once("dbconnect.php");

	//*** Update Status
	$sql = "UPDATE tb_user SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00' WHERE userID = '".$_SESSION["userID"]."' ";
	$query = mysqli_query($con,$sql);

	session_destroy();
	echo '.';
?>
	<script type="text/javascript">  
				swal({  
				title: "ออกจากระบบ",
                text: "คุณได้ออกจากระบบเรียบร้อยแล้ว",  
                type: "success", 
				icon: "success",
				button: false,
				
				});
	</script>
<?php
	header("refresh:2;url=index.php");
?>