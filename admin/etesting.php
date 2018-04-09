
<?php
include('../config.inc.php');
session_start();
require('../dbconnect.php');
if(isset($_SESSION['userID']))
	{
		
		$strSQL = "SELECT * FROM tb_user WHERE userID = '".$_SESSION['userID']."'";
		$objQuery = mysqli_query($con,$strSQL);
		$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
			if ($objResult['userType']==1)
				{
					header("refresh:0;url=../student.php");
					exit();
				} 

	} 	else
		
	{
		header("refresh:0;url=../index.php");
		exit();
	}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="ค้นหา...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> หน้าแรก</a>
                        </li>
                        
                        <li>
                            <a href="tables.html"><i class="fa fa-user fa-fw"></i> นักเรียน</a>
                        </li>
                        <li>
                            <a href="etesting.php"><i class="fa fa-edit fa-fw"></i> ข้อสอบ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> รายงานคะแนน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-arrow-down fa-fw"></i> ออกจากระบบ</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">เมนู : ข้อสอบ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		    <div class="row">
				<div class="pull-right">
				<p>
				<div class="btn-toolbar" role="toolbar">
				  <div class="btn-group" role="group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square-o"></i> เพิ่มชุดข้อสอบ</button>
				  </div>
				</div>
				</p>
				</div>
		    </div>
	
		  <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">เพิ่มชุดข้อสอบ</h4>
				</div>
				<div class="modal-body">
				         <form class="addExamForm" action="addexam.php" method="post" role="form" id="addExamForm" enctype="multipart/form-data">
						 <div class="row">
						 	<div class="col-md-4">
									<div class='form-group'>
										<?php 
											$sql="SELECT chapterID FROM tb_chapter ORDER BY chapterID DESC";
											$rs= mysqli_query($con,$sql); 
										if (mysqli_num_rows($rs)==0){
											$vl=str_repeat("0",2-1)."1";
										}else{
											$row = mysqli_fetch_array($rs);
											$s="9".substr($row['chapterID'],- 2);
											$vl=substr(($s+1),- 2);
											}
										?>	
											<label for='chpaterID'>รหัสบทเรียน :</label>
											<input type='text' class='form-control' id='chapterID' name='chapterID' value="<?php echo $vl;?>" disabled>
									</div>
							</div>
							 </div>
							<div class="row">
							<div class="col-md-12">
								<div class='form-group'>
										<label for='chapterName'>ชื่อชุดข้อสอบ :</label>
										<textarea  class='form-control' id='chapterName' name='chapterName' data-validation="required" rows="1" data-validation-error-msg="กรุณาใส่ชื่อชุดข้อสอบ" ></textarea>
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class='form-group'>
										<label for='chapterScore'>คะแนน :</label>
										<input type='text' class='form-control' id='chapterScore' name='chapterScore' data-validation="required" maxlength="300" data-validation-error-msg="กรุณาใส่คะแนนของชุดข้อสอบ" >
								</div>
							</div>
							<div class="col-md-6">
								<div class='form-group'>
										<label for='chapterTime'>เวลา(นาที) :</label>
										<input type='text' class='form-control' id='chapterTime' name='chapterTime' data-validation="required" maxlength="300" data-validation-error-msg="กรุณาใส่เวลาในการทำข้อสอบ" >
								</div>
							</div>
						</div>
						<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
						<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
						<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
									rel="stylesheet" type="text/css" />
						<script>
							$.validate({
									form : '#addExamForm',
									validateOnBlur : true, // disable validation when input looses focus
									scrollToTopOnError : false, // Set this property to true on longer forms
								  });
						</script>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
						<button type="Submit" name="Submit" class="btn btn-primary">เพิ่มชุดข้อสอบ</button>
					  </div>
					  </form>
				</div>
			  </div>
			  </div>
	
			<!-- ModalAddExam -->
		  <div class="modal fade" id="ModalAddExam" role="dialog">
			<div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">เพิ่มชุดข้อสอบ</h4>
				</div>
				<div class="modal-body">
				         <form class="addExamForm" action="addexam.php" method="post" role="form" id="addExamForm" enctype="multipart/form-data">
						 <div class="row">
						 	<div class="col-md-4">
									<div class='form-group'>
											<label for='chpaterID'>รหัสบทเรียน :</label>
											<input type='text' class='form-control' id='chapterID' name='chapterID' disabled>
									</div>
							</div>
							 </div>
							<div class="row">
							<div class="col-md-12">
								<div class='form-group'>
										<label for='chapterName'>ชื่อชุดข้อสอบ :</label>
										<textarea  class='form-control' id='chapterName' name='chapterName' data-validation="required" rows="1" data-validation-error-msg="กรุณาใส่ชื่อชุดข้อสอบ" ></textarea>
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<div class='form-group'>
										<label for='chapterScore'>คะแนน :</label>
										<input type='text' class='form-control' id='chapterScore' name='chapterScore' data-validation="required" maxlength="300" data-validation-error-msg="กรุณาใส่คะแนนของชุดข้อสอบ" >
								</div>
							</div>
							<div class="col-md-6">
								<div class='form-group'>
										<label for='chapterTime'>เวลา(นาที) :</label>
										<input type='text' class='form-control' id='chapterTime' name='chapterTime' data-validation="required" maxlength="300" data-validation-error-msg="กรุณาใส่เวลาในการทำข้อสอบ" >
								</div>
							</div>
						</div>
						<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
						<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
						<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
									rel="stylesheet" type="text/css" />
						<script>
							$.validate({
									form : '#addExamForm',
									validateOnBlur : true, // disable validation when input looses focus
									scrollToTopOnError : false, // Set this property to true on longer forms
								  });
						</script>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
						<button type="Submit" name="Submit" class="btn btn-primary">เพิ่มชุดข้อสอบ</button>
					  </div>
					  </form>
				</div>
			  </div>
			  </div>
	
	
	
            <div class="row">
                <div class="col-lg-12">    
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="text-center">ชุดที่</th>
                                        <th class="text-center">ชื่อชุดข้อสอบ</th>
										<th class="text-center">จำนวนข้อสอบ</th>
                                        <th class="text-center">คะแนนเต็ม</th>
                                        <th class="text-center">เวลา/นาที</th>
                                        <th class="text-center">แก้ไข</th>
										<th class="text-center">ลบ</th>
										<th class="text-center">เพิ่มข้อสอบ</th>
										<th class="text-center">แสดงข้อสอบ</th>
                                    </tr>
                                </thead>
								<?php
									$sql = "SELECT * FROM tb_chapter";
									$query = mysqli_query($con,$sql);
								?>
                                <tbody>
								<?php 
									while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
									{
								?>
                                    <tr class="odd gradeX">
                                        <td class="text-center" width="10%"><?php echo $result["chapterID"];?></td>
                                        <td><?php echo $result["chapterName"];?></td>
										<td class="text-center" width="10%">30</td>
                                        <td class="text-center" width="10%"><?php echo $result["chapterScore"];?></td>
                                        <td class="text-center" width="10%"><?php echo $result["chapterTime"];?></td>
										<td class="text-center" width="5%"><img class="img-responsive center-block" src="../img/file-4.png" width="20" height="20"></td>
										<td class="text-center" width="5%"><img class="img-responsive center-block" src="../img/file-13.png" width="20" height="20"></td>
                                        <td class="text-center" width="10%"><a class="addExam" href="#" data-toggle="modal" data-target="#ModalAddExam" data-id="<?php echo $result["chapterID"];?>"><img class="img-responsive center-block" src="../img/file.png" width="20" height="20"></a></td>
										<td class="text-center" width="10%"><img class="img-responsive center-block" src="../img/notepad-12.png" width="20" height="20"</td>
                                    </tr>
									<script>
									   $('.addExam').click(function(){
									   var chapterID = $(this).attr('data-id');
									   $('#ModalAddExam #chapterID').val(chapterID);
									});
										</script>
								<?php
									}
								?>
                                </tbody>
                            </table>   
							<?php
								mysqli_close($con);
							?>
        </div>
        <!-- /#page-wrapper -->
    </div>
</div>


    <!-- /#wrapper -->

	    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>


</body>

</html>
