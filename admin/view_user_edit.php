<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("header/header.php");?>

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

  <section class="user text-dark " id="Events">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Singer User</h3>
        <h2 class="mb-5"><?php echo $user_name ?></h2>
      </div>
      <div class="row">
		<div class="col-md-3">
			<?php echo "
			<p><img src='../user/user_images/$user_image' widht='200px' height='200px'/></p>
			<p><strong>last login: </strong>$last_login</p>
			<p><strong>Reg date: </strong>$registor_date</p>
			<p><strong>Status: </strong>$status</p>
			" ;?>
		</div>
		<div class="col-md-9">
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
						<option>Pakistan</option>
						<option>United Arab of Emirate</option>
						<option>Egypt</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="u_gender">
						<option><?php echo $user_gender ?></option>
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" disabled value="<?php echo $birth?>" name="u_birth"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="number"  placeholder="Mobile Number" value="<?php echo $mobile;?>" name="u_mobile">
				</div>

				<button name="update" class="btn btn-outline-primary btn-block">Update</button>
			</form>
		</div>
      </div>
    </div>
  </section>


  <?php

if(isset($_POST['update'])){
	$u_name = $_POST['u_name'];
	$u_pass = $_POST['u_pass'];
	$u_email = $_POST['u_email'];
	$u_mobile = $_POST['u_mobile'];
	$u_gender = $_POST['u_gender'];
	$u_country = $_POST['u_country'];
	
	$update = "update users set user_name='$u_name', user_pass=MD5('$u_pass') , user_email='$u_email', user_mobile='$u_mobile', user_gender='$u_gender', user_country='$u_country' where user_id='$edit_id'";
	
	$run = mysqli_query($con,$update);
	if($run){
		echo "<script>alert('You Profile Updated!')</script>";
		echo "<script>window.open('view_user_edit.php?view_users&edit=$user_id' ,'_self')</script>";
	}

}

  }
?>

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
