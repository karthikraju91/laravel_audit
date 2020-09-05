<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student - Auditing</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(asset('Medicio/assets/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('Medicio/assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('Medicio/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/icofont/icofont.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/animate.css/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/owl.carousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/venobox/venobox.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('Medicio/assets/vendor/aos/aos.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('Medicio/assets/css/style.css')); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v2.0.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
	
      <a href="javascript:void(0)" class="logo mr-auto"><img src="<?php echo e(asset('Medicio/assets/img/logo.png')); ?>" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->
	  <?php if(auth()->guard()->guest()): ?>
	  <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo e(route('login')); ?>">Login</a></li>
          
		<?php if(Route::has('register')): ?>
			<li><a href="<?php echo e(route('register')); ?>">Register</a></li>
			<?php endif; ?>

		</ul>
		</nav>
	<?php else: ?>	
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo e(asset('home')); ?>">Home</a></li>
          <li><a href="<?php echo e(asset('students/list')); ?>">Students</a></li>
          <li><a href="<?php echo e(asset('students/audits')); ?>">Audits Log</a></li>
          <!--<li><a href="#departments">Departments</a></li>
          <li><a href="#doctors">Doctors</a></li>-->
          <!-- <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          

        </ul>
      </nav><!-- .nav-menu -->
	<a class="appointment-btn scrollto" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="d-none d-md-inline"><?php echo e(__('Logout')); ?></span>
                                    </a>

<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>	
<?php endif; ?>									

    </div>
  </header><!-- End Header -->
<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

	  </div>
	</section>
</main>	
<section id="services" class="services services">
      <div class="container" data-aos="fade-up"><?php /**PATH D:\xampp\htdocs\laravel_audit\resources\views/layouts/header.blade.php ENDPATH**/ ?>