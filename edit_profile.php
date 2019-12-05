<?php
session_start();

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
else {
  include("newtemplate/header.php");
?>

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 margin-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>

    <!-------------BODY------------->
<div class="container margin-bottom-100">
    <h2>Edit Your Profile</h2>
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-9">
                <div class="form-group">
                    <label>Your Full Name</label>
                    <input type="text" class="form-control" name="u_name" required="required" value="<?php echo $main_name;?>" />
					<small class="form-text text-muted">We'll never share your personal detail with anyone else.</small>
                </div>
            </div>
            <div class="col-lg-3">
				<div class="form-group"><br>
                    <input type="submit" name="updatename" value="Update Name" class="btn btn-danger btn-block" />
                </div>
            </div>
		
            <div class="col-lg-9">
                <div class="form-group">
                    <label>Short intro about your self</label>
                    <input type="text" class="form-control" name="u_des" required="required" value="<?php echo $main_des;?>" />
                </div>
            </div>
            <div class="col-lg-3">
				<div class="form-group"><br>
                    <input type="submit" name="updatedes" value="Update Description" class="btn btn-danger btn-block" />
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>Your email</label>
                    <input type="email" class="form-control" disabled name="u_email" value="<?php echo $main_email;?>" />
					<small class="form-text text-muted">You can't change you E-mail Or Contact  to support.</small>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Your password</label>
                    <input type="password" class="form-control" name="u_pass" disabled name="u_email" value="<?php echo $main_pass;?>" />
					<small class="form-text text-muted">To change you password <a href="<?php echo"Changeyourpassword.php?u_id=$main_id";?>">click here</a>.</small>
                </div>
            </div>
        </div>
    </form>

<?php
	if(isset($_POST['updatename'])){
		$u_name = $_POST['u_name'];

		$update = "update users set user_name='$u_name' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Profile Name Is Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>

<?php
	if(isset($_POST['updatedes'])){
		$u_des = $_POST['u_des'];

		$update = "update users set user_des='$u_des' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Description Is Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>

<form action="" method="post" >
<div class="row">
    <div class="col-lg-6">
		<div class="form-group">
			<label>Mobile Number</label>
			<input type="number" class="form-control" name="u_mobile" value="<?php echo $main_mobile;?>" />
		</div>
	</div>
    <div class="col-lg-3">
		<div class="form-group">
			<label>Country</label>
			<select name="u_country" class="form-control">
				<option><?php echo $main_country;?></option>
				<option>Pakistan</option>
				<option>United Arab of Emirate</option>
				<option>Egypt</option>
			</select>
		</div>
	</div>
    <div class="col-lg-3">
		<div class="form-group"><br>
			<input type="submit" name="numbercontry" value="Update Number & Country" class="btn btn-danger btn-block" />
		</div>
	</div>
</div>
</form>
<?php
	if(isset($_POST['numbercontry'])){
		$u_country = $_POST['u_country'];
		$u_mobile = $_POST['u_mobile'];

		$update = "update users set user_country='$u_country' , user_mobile='$u_mobile' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('Your Number & Country Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>

<form action="" method="post" >
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label>Gender</label>
            <select name="u_gender" class="form-control">
                <option><?php echo $main_gender;?></option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3">
		<div class="form-group">
			<label>New Date Of Birth</label>
			<input type="date" class="form-control" name="u_birth" required />
		</div>		
    </div>
    <div class="col-lg-3">
		<div class="form-group">
			<label>Your Date Of Birth</label>
			<input type="text" class="form-control" disabled name="u_email" value="<?php echo $main_birth;?>" />
		</div>
    </div>
    <div class="col-lg-3"><br>
		<input type="submit" name="birthgender" value="Update Birth & Gender" class="btn btn-danger btn-block" />
    </div>
</div>
</form>
<?php
	if(isset($_POST['birthgender'])){
		$u_gender = $_POST['u_gender'];
		$u_birth = $_POST['u_birth'];
		$u_mobile = $_POST['u_mobile'];

		$update = "update users set user_gender='$u_gender' , user_birth='$u_birth' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('Your Date of Birth & Gender Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-9">
        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="u_image" required />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group"><br>
            <input type="submit" name="photo" value="Update Picture" class="btn btn-danger btn-block" />
        </div>
    </div>  
</div>  
</form>
<?php
	if(isset($_POST['photo'])){
		$u_image = $_FILES['u_image']['name'];
		$image_tmp = $_FILES['u_image']['tmp_name'];
	
		move_uploaded_file($image_tmp,"user/user_images/$u_image");

		$update = "update users set user_image='$u_image' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('Your Profile Picture Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-9">
        <div class="form-group">
            <label>Profile Header Cover</label>
            <input type="file" class="form-control" name="u_cover" required />
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group"><br>
            <input type="submit" name="cover" value="Update Picture" class="btn btn-danger btn-block" />
        </div>
    </div>  
</div>  
</form>
<?php
	if(isset($_POST['cover'])){
		$u_cover = $_FILES['u_cover']['name'];
		$image_tmp = $_FILES['u_cover']['tmp_name'];
	
		move_uploaded_file($image_tmp,"user/cover/$u_cover");

		$update = "update users set cover='$u_cover' where user_id='$main_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('Your Profile Cover Updated!')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
		}
		
	}
?>
</div>
    <!-------------BODY-END------------>
<?php 
include("newtemplate/footer.php");
}
 ?>