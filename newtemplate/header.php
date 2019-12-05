<?php
	include("includes/connection.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<!-- Document Title -->
<title>Frantic | The Multi-Purpose Management System Template</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- StyleSheets -->
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

<!-- COLORS -->
<link rel="stylesheet" id="color" href="css/default.css">

<!-- JavaScripts -->
<script src="js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- LOADER ===========================================-->
<div id='loader'>
  <div class='loader'>
    <div class='position-center-center'> <img src='images/logo-dark.png' alt=''>
      <p class='font-crimson text-center'>Please Wait...</p>
      <div class='loading'>
        <div class='ball'></div>
        <div class='ball'></div>
        <div class='ball'></div>
      </div>
    </div>
  </div>
</div>

<!-- Page Wrapper -->
<div id='wrap'> 
  
  <!-- Header -->
  <header class='header'>
    <div class='sticky'>
      <div class='container'>
        <div class='logo'> <a href='index.html'><img src='images/logo.png' alt=''></a> </div>
        <!-- Nav -->
        <nav>
          <ul id='ownmenu' class='ownmenu'>
            <li ><a href='index.php'>Home</a></li>
            <li><a href='about.php'>About</a></li>
            <li><a href='members.php'>Members</a></li>
            <li><a href='discussions.php'>Posts</a></li>
            <li><a href='event.php'>Events</a></li>
            <li><a href='buy-sell.php'>Buy & Sell</a></li>
            <li><a href='contact.php'>Contact</a></li>

            <!--======= Shopping Cart =========-->
<?php
if(!isset($_SESSION['user_email'])){
?>
  <li class='shop-cart right'><a href='login.php'><i class='fa fa-user'></i></a>
  <ul class='dropdown animated-3s fadeInUp'>
  <form method='post' action='' id='form1' class='contact2-form validate-form'>
    <li>
      <div class='row'>
        <div class='col-md-6'>
			<input type="email" placeholder="Email" name="email" class="form-control" required />
		</div>
        <div class='col-md-6'>
			<input type="password" placeholder="Password" name="pass" class="form-control" required />
        </div>
      </div>
    </li>
    <li class='no-padding no-border no-margin'>
      <div class='row'>
        <div class='col-lg-12'> <button name="login" class="btn btn-success btn-block">LOGIN</button></div>
      </div>
    </li>
    <li class='no-padding no-border no-margin'>
      <div class='row'>
        <div class='col-lg-12'> <a href='login.php' class='btn btn-success btn-block'>REGISTER YOUR SELF</a></div>
      </div>
    </li>
  </form>
  </ul>
</li>
  <!--======= ADMIN ICON =========-->
<li class='search-nav right'><a href='admin/index.php' target="_blank"><i class='fa fa-users'></i></a>
</li>

<?php
                include("includes/connection.php");
                if(isset($_POST['login'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $pass = mysqli_real_escape_string($con,$_POST['pass']);

                $get_user = "select * from users where user_email='$email' AND user_pass=MD5($pass) AND status='verified'";
                $run_user = mysqli_query($con,$get_user);
                $check = mysqli_num_rows($run_user);

                if($check==1){
                $_SESSION['user_email']=$email;
			        	$update = "update users set last_login=NOW() where user_email='$email'";
					      $run = mysqli_query($con,$update);
                  echo "
                  <script>window.open('index.php', '_self')</script>";
                }
                else{
                  echo "<script> alert('Sorry Enter the Wrong  ID PASS') </script>";
                }
                }
}
else {
  echo"
  <li class='shop-cart right'><a ><i class='fa fa-user'></i></a>
  <ul class='dropdown animated-3s fadeInUp'>
    <li class='no-padding no-border no-margin'>
      <div class='row'>
        <div class='col-lg-12'> <a href='logout.php' class='btn btn-success btn-block'>LOGOUT</a></div>
      </div>
    </li>
  </ul>
</li>
";
}
?>
            
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- End Header --> 
  <?php
 
 error_reporting(0);
  
		//Getting User Session
		$main_email = $_SESSION['user_email'];
		$get_main = "select *from users where user_email='$main_email'";
		$run_main = mysqli_query($con,$get_main);
		$row_main = mysqli_fetch_array($run_main);
		$main_id = $row_main['user_id'];
    $main_name = $row_main['user_name'];
    $main_des = $row_main['user_des'];
    $main_birth = $row_main['user_birth'];
		$main_image = $row_main['user_image'];
		$main_email = $row_main['user_email'];
		$main_pass = $row_main['user_pass'];
		$main_gender = $row_main['user_gender'];
		$main_country = $row_main['user_country'];
		$main_mobile = $row_main['user_mobile'];
		$main_reg = $row_main['registor_date'];
		$main_last = $row_main['last_login'];
?>