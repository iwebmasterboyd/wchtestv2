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
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.

	
    if($_REQUEST['username']=="" || $_REQUEST['passwd']=="")
    {
    echo " Field must be filled";
    }
    else
    {
       $sql1= "select * from tb_user where userName= '".$_REQUEST['username']."' &&  userPass ='".$_REQUEST['passwd']."'";
       $result=mysql_query($sql1)
        or exit("Sql Error".mysql_error());
        $num_rows=mysql_num_rows($result);
       if($num_rows>0)
       { 
		   echo '.';
?>
       
		<script type="text/javascript">  
				swal({  
				title: "ยินดีต้อนรับ",
                text: "<?php echo $_REQUEST['username'];?>"+" คุณได้เข้าสู่ระบบ",  
                type: "success", 
				icon: "success",
				button: false,
				
				});
			</script>
        <?php
		   header("refresh:2;url=student.php");
	    }
        else
        {
            echo 'username or password incorrect';
        }
    }
}    
?>