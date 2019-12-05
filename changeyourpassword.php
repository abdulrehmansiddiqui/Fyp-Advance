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
<div class="container padding">
    <h2>Change your password</h2>
    <form action="" method="post">
        <div class="row">		
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Your email</label>
                    <input type="email" class="form-control" disabled value="<?php echo "$main_email";?>" />
                </div>

            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Your old password</label>
                    <input type="password" class="form-control" name="oldpass" />
					
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Your new password</label>
                    <input type="password" class="form-control" name="newpass1" />
					
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Retype your new password</label>
                    <input type="password" class="form-control" name="newpass2" />
				</div>
            </div>
			<div class="col-lg-12">
				<div class="form-group"><br>
					<input type="submit" name="updatepass" value="Update Password" class="btn btn-danger btn-block" />
				</div>
			</div>
        </div>
    </form>

<?php
	if(isset($_POST['updatepass'])){
		$oldpass = $_POST['oldpass'];
		$newpass1 = $_POST['newpass1'];
		$newpass2 = $_POST['newpass2'];

        
        if(MD5($oldpass) == $main_pass){
            if($newpass1 == $newpass2){
                
                $update = "update users set user_pass=MD5('$newpass2') where user_id='$main_id'";
                $run = mysqli_query($con,$update);
                if($run){
                	echo "<script>alert('You Password Is Updated!')</script>";
                	echo "<script>window.open('edit_profile.php?u_id=$main_id','_self')</script>";
                }
            }
            else{
            echo "<h3>Please enter the same password</h3>";
            }
        }
        else{
        echo "<h3>You enter a wrong password</h3>";
        }
    }
        

		
	
?>

</div>
    <!-------------BODY-END------------>
<?php 
include("newtemplate/footer.php");
}
 ?>