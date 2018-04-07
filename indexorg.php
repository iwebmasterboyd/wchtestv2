<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>บทเรียนออนไลน์ เรื่อง แอนิเมชั่น</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
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
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
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
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>
	  <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro"><span class="ion-ios-home"> หน้าแรก </span></a></li>
          <li><a href="#about">บทเรียน</a></li>
          <li><a href="#features">คู่มือการใช้งาน</a></li>
          <li><a href="#pricing">เข้าสู่ระบบ</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>ยินดีต้อนรับเข้าสู่บทเรียนออนไลน์ เรื่อง แอนิเมชั่น</h2>
      <p>สื่อการเรียนรู้ในรายวิชา แอนิเมชั่น </p>
      <a href="#loginform" class="btn-get-started scrollto">เข้าสู่ระบบ</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="img/product-screen-2.png" alt=""><!DOCTYPE html>
        <html>
        <head>
          <title></title>
        </head>
        <body>
        
        </body>
        </html>
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
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
						  <input type="text" name="username" class="form-control" id="username" placeholder="ชื่อผู้ใช้" pattern="^([a-zA-Z0-9)$" data-validation="required" maxlength="20" data-validation-error-msg="กรุณาใส่ชื่อผู้ใช้"/>
                      </div>
                  	</div>
               <div class="form-group" >
                      <div class="col-sm-6">
                        <input type="password" name="passwd" class="form-control" id="passwd" placeholder="รหัสผ่าน" data-validation="required" 
		 data-validation-error-msg="กรุณาใส่รหัสผ่าน"/>
					 </div>
                </div>
                <div><button class="btn-get-started scrollto" type="Submit" name="Submit" title="Login">เข้าสู่ระบบ</button></div><br>
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
</section><!-- #about -->




</body>
</html>
