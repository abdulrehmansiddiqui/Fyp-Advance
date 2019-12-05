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
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

	</head>

<body id="page-top">
  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
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
        <a class="js-scroll-trigger" href="admin_logout.php">Logout</a>
      </li>
    </ul>
  </nav>

<?php 
	if(isset($_GET['edit'])){
		global $con;
		$edit_id = $_GET['edit'];

	$sel_users = "select *from users where user_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);

		$user_id = $row_users['user_id'];
		$user_name = $row_users['user_name'];
		$user_email = $row_users['user_email'];
		$user_pass = $row_users['user_pass'];
		$user_country = $row_users['user_country'];
		$user_gender = $row_users['user_gender'];
		$mobile = $row_users['user_mobile'];
		$birth = $row_users['user_birth'];
		$user_image = $row_users['user_image'];
		$last_login = $row_users['last_login'];
		$registor_date = $row_users['registor_date'];
		$status = $row_users['status'];
?>
<div class="col-md-3 bgw emptyall">
	<?php echo " <h2>$user_name</h2>
	<p><img src='../../user/user_images/$user_image' widht='200px' height='200px'/></p>
	<p><strong>last login: </strong>$last_login</p>
	<p><strong>Reg date: </strong>$registor_date</p>
	<p><strong>Status: </strong>$status</p>

	" ;?>
</div>
<div class="col-md-9 bgw emptyall">
	<h2>Edit User Profile</h2>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input class="form-control" type="text" name="u_name" value="<?php echo $user_name;?>" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="u_email" value="<?php echo $user_email;?>" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="u_pass" value="<?php echo $user_pass;?>" required />
				</div>
				<div class="form-group">
					<select class="form-control" name="u_country">
				</div>
				<div class="form-group">
						<option><?php echo $user_country;?></option>
						<option>Karachi</option>
						<option>Hyderabad</option>
						<option>Lahore</option>
						<option>Peshawar</option>
						<option>Islamabad</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="u_gender">
						<option><?php echo $user_gender;?></option>
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" disabled value="<?php echo $birth;?>" name="u_birth"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="number"  placeholder="Mobile Number" value="<?php echo $mobile;?> name="u_mobile">
				</div>

				<button name="update" class="btn btn-outline-primary btn-block">Update</button>
			</form>
<?php

	if(isset($_POST['update'])){
		$u_name = $_POST['u_name'];
		$u_pass = $_POST['u_pass'];
		$u_email = $_POST['u_email'];
		$u_mobile = $_POST['u_mobile'];
		$u_gender = $_POST['u_gender'];
		$u_country = $_POST['u_country'];
		
		$update = "update users set user_name='$u_name', user_pass='$u_pass', user_email='$u_email', user_mobile='$u_mobile', user_gender='$u_gender', user_country='$u_country' where user_id='$user_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Profile Updated!')</script>";
			echo "<script>window.open('index.php?view_users&edit=$user_id' ,'_self')</script>";
		}

	}

	  }
?>

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