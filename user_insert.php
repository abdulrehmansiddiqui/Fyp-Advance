<?php
include("includes/connection.php");
	if(isset($_POST['sign_up'])){
			$name = mysqli_real_escape_string($con,$_POST['u_name']);
			$email = mysqli_real_escape_string($con,$_POST['u_email']);
			$pass = mysqli_real_escape_string($con,$_POST['u_pass']);
			$mobile = mysqli_real_escape_string($con,$_POST['u_mobile']);
			$gender = mysqli_real_escape_string($con,$_POST['u_gender']);
			$des = "No description here";
			$status = "unverified";
			$posts = "no";

			$verifation_code = mt_rand();
			
			$get_email = "select * from users where user_email='$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			
			if($check==1){
				echo "<script>alert('Email Is Already Registered')</script>";
				exit();
			}
			if(strlen($pass)<8){
				echo "<h2>Password Should be 8 char</h2>";
				exit();
			}
			if(strlen($mobile)<9){
				echo "<h2>Please Enter the Correct Number</h2>";
				exit();
			}
			else{
			$insert = "insert into users (user_name, user_pass, user_email, user_gender, user_des, user_mobile, user_image, cover, registor_date, status, ver_code, posts ) values ('$name', MD5('$pass'), '$email', '$gender', '$des', '$mobile', '$newimage', 'cdefualt.jpg', NOW(), '$status', '$verifation_code', '$posts')";
			$run_insert = mysqli_query($con,$insert);
				if($run_insert){
				$_SESSION['user_email']=$email;
				echo "<script>alert ('Hi $name, verify your account to signin <br> check your $email')</script>";
				
				}
				else{echo "<script>alert ('Error')</script>";}
			}
			
		$to = $email;
		$subject = "verifation for abdul.com";
		$message = "
		Hello $name you have just create an account on abduls.com
		click here to verify you account: <a href='http://getfastdelivery.com/abdulrehman/verify.php?code=$verifation_code' class='btn bt-primary'>Verify</a><br>
		Thank You For Creating Account...
		";
			
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <arehmans07@gmail.com>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		}
?>