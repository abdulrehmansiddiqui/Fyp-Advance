<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("../includes/connection.php");?>
<!DOCTYPE html>
<html>
	<head>
  <title>Admin Login Panel</title>
  
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

	</head>

<body id="page-top">
  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    =
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Users">Users</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Events">Events</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Posts">Posts</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Comments">Comments</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Adds">Adds</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#Topic">Topic</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="contact.php">Contact Form</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="admin_logout.php">Logout</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex text-white">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Welcome to admin panel</h1>
      <h3 class="mb-5">
        <em>You Can Edit any thing you want</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Users">Users</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Posts">Posts</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Events">Events</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Comments">Comments</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Adds">Adds</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#Topic">Topic</a>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="contact.php">Contact Form</a>
    </div>
    <div class="overlay"></div>
  </header>

<!-- USER -->
  <section class="content-section bg-light" id="Users">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>All Register Users!</h2>
		        <?php include("includes/view_users.php");?>
        </div>
      </div>
    </div>
  </section>

  <!-- POST -->
  <section class="content-section bg-primary text-white text-center" id="Posts">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Posts</h3>
        <h2 class="mb-5">What User Posting</h2>
      </div>
      <div class="row">
		<?php include("includes/view_posts.php");?>
      </div>
    </div>
  </section>

  <!-- Events -->
  <section class="content-section" id="Events">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Events</h3>
        <h2 class="mb-5">Recent Projects</h2>
      </div>
      <div class="row no-gutters">
	  <?php  include("includes/view_events.php");?>
      </div>
    </div>
  </section>


<!-- POST Comments -->
  <section class="content-section bg-light" id="Comments">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>All POST comments by Users!</h2>
		  <?php include("includes/view_comments.php");?>
        </div>
      </div>
    </div>
  </section>
  
<!-- EVENT Comments -->
  <section class="content-section bg-light" id="Comments">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>All  EVENT comments by Users!</h2>
		  <?php include("includes/view_eventcom.php");?>
        </div>
      </div>
    </div>
  </section>

  <!-- Adds -->
  <section class="callout text-white" id="Adds">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Adds</h3>
        <h2 class="mb-5 ">All Users Adds</h2>
      </div>
      <div class="row">
		<?php include("includes/view_adds.php");?>
      </div>
    </div>
  </section>

<!-- EVENT Comments -->
  <section class="content-section bg-light" id="Topic">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>Topic!</h2>
		  <?php include("includes/view_topic.php");?>
        </div>
      </div>
    </div>
  </section>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>
</body>
</html>

<?php } ?>