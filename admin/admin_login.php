<?php
session_start();
include("../includes/connection.php");
?>

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
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

	</head>
	
<body id="page-top">

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Login to admin panel</h1>
      <h3 class="mb-5">
      </h3>
		<form method="post" action="admin_login.php">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>
					<input class="form-control" type="text" placeholder="Email" name="email" required />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">#</span>
					</div>
					<input class="form-control" type="password" placeholder="Password" name="pass" required />
				</div>
			</div>
			<button class="btn btn-primary btn-xl js-scroll-trigger" name="login">Admin Login</button>
			<button class="btn btn-primary btn-xl js-scroll-trigger" name="admin">Super Admin Login</button>
		</form>
    </div>
    <div class="overlay"></div>
  </header>


<div class="container emptyall">
	<div class="row">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
		

		</div>
		<div class="col-lg-3">
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>
</body>
</html>

<?php
	if(isset($_POST['admin'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);
			
		$get_user = "select * from super_admin where super_user='$email' AND super_pass='$pass'";
		$run_user = mysqli_query($con,$get_user);
		$check = mysqli_num_rows($run_user);
			
		if($check==1){
			$_SESSION['super_admin_email']=$email;
			echo "<script>window.open('super_admin.php','_self')</script>";
		}
		else{
			echo "<div class='alert alert-danger text-center' role='alert'>
					<h5>Sorry ! incorrect ID Password</h5>
				</div>";
		}
	}
	
	if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);
			
		$get_user = "select * from admin where admin_email='$email' AND admin_pass='$pass'";
		$run_user = mysqli_query($con,$get_user);
		$check = mysqli_num_rows($run_user);
			
		if($check==1){
			$_SESSION['admin_email']=$email;
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<div class='alert alert-danger text-center' role='alert'>
					<h5>Sorry ! incorrect ID Password</h5>
				</div>";
		}
	}
?>