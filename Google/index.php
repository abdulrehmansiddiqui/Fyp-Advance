<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
	$file = $_SESSION['picture']
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login With Google</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-6">
        <form action="" method="post">
			<div class="form-group">
				<label >Full Name</label>
				<input  type="text" name="u_name" class="form-control" value="<?php echo $_SESSION['givenName'] ?> <?php echo $_SESSION['familyName'] ?>" required>
			</div>
			<div class="form-group">
				<label >Email address</label>
				<input type="email" name="u_email" class="form-control" value="<?php echo $_SESSION['email'] ?>" required>
			</div>
			<div class="form-group">
				<label >Password</label>
				<input type="password" name="u_pass" class="form-control" placeholder="Password" autofocus required>
			</div>
			<div class="form-group">
				<label >Mobile Number</label>
				<input type="number" name="u_mobile" class="form-control" placeholder="You Mobile Number" required>
			</div>
			<div class="form-group">
				<label >Gender</label>
				<select class="form-control" name="u_gender" required>
					<option><?php echo $_SESSION['gender'] ?></option>
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>
			<button name="sign_up" class="btn btn-success">Submit</button>
		</form>
			<?php include("google_insert.php");?>
		</div>
		<div class="col-md-6">
			<h4>Enter mobile number and your new password <?php echo $_SESSION['givenName'] ?> <?php echo $_SESSION['familyName'] ?></h4>
			<img style="width: 70%;" src="<?php echo $file ?>">
		</div>
	</div>
</div>
</body>
</html>