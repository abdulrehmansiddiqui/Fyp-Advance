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
	<?php
		if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
			
		$sel = "select * from users where user_id='$u_id'";
		$run = mysqli_query($con,$sel);
		$row=mysqli_fetch_array($run);
		
		$user_name2 = $row['user_name'];
		$user_image = $row['user_image'];
		$reg_date = $row['registor_date'];
		$last_login = $row['last_login'];
		}
		?>
  <!-- MAIN HEADING -->
  <div class='heading-block text-center animate fadeInDown' data-wow-delay='0.4s'>
		<h3>Send A Message to <?php echo " $user_name2"; ?></h3>
		<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		<span>You sending personal messages </span>
	</div>

    <!-------------BODY------------->
<div class="container margin-bottom-100">
    <div class="row">
		<div class="col-lg-12  margin-bottom-30">
			<form action="message.php?u_id=<?php echo $u_id;?>" method="post"  >
				<div class="input-group">
					<input type="text" name="msg_title" class="form-control" placeholder="Type you messages here" required/>
					<div class="input-group-append">
					<input type="submit" name="new" value="Send Msg" class="btn btn-outline-success"/>
					</div>
				</div>
			</form>
<?php
if(isset($_POST['new'])){
	$msg_title = $_POST['msg_title'];
	$insert = "insert into messages (reciver_id,reciver_name,sender_id,sender_name,sender_msg,reply,status,msg_date,checker,checker1) values ('$u_id','$user_name2','$main_id','$main_name','$msg_title','no_reply','unread',NOW(),'2$u_id$main_id','2$main_id$u_id')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<h2> Your message was sent!</h2>";
	}

	$inbox = "select * from inbox where checker='2$u_id$main_id' || checker='2$main_id$u_id' || checker1='2$main_id$u_id' || checker1='2$u_id$main_id' ";
	$run_inbox = mysqli_query($con,$inbox);
	$check = mysqli_num_rows($run_inbox);
		if($check==0){
			$inbox = "insert into inbox (user_id,reciver_name,sender_id,sender_name,status,date,checker,checker1) values ('$u_id','$user_name2','$main_id','$main_name','unread',NOW(),'2$u_id$main_id','2$main_id$u_id')";
			$run_inbox = mysqli_query($con,$inbox);
			echo "<h2> New Inbox Update!</h2>";
			echo "<script>window.open('inbox.php?user_id=$$user_id','_self')</script>";
		}
		else{
			echo "<h2> Inbox Already Exist!</h2>";
			echo "<script>window.open('inbox.php?user_id=$$user_id','_self')</script>";
		}

}
?>
        </div>
		<div class="col-lg-5 text-center">
			<img src="user/user_images/<?php echo $user_image;?>" width="auto" height="200px" />
        </div>
		<div class="col-lg-6">
			<p><?php echo $user_name2;?> last login is:<strong> <?php echo "$last_login";?></strong></p>
			<p><?php echo $user_name2;?> is member of since:<strong> <?php echo "$reg_date";?></strong></p>
        </div>

		
		
			
    </div>
</div>

                   
    <!-------------BODY-END------------>
<?php 
}
include("newtemplate/footer.php");
?>


