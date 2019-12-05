<?php
session_start();

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
else {
  include("newtemplate/header.php");
?>
<link rel="stylesheet" href="css/linkeffect.css">

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 margin-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>
	
<div class="container">
    <div class="row margin-bottom-70">
		<div class="col-lg-7">
<?php 
	if(isset($_GET['event_id'])){
		global $con;
		$get_id = $_GET['event_id'];
				
		$get_posts = "select * from events where event_id='$get_id'";
		$run_posts = mysqli_query($con,$get_posts);
		$row_posts = mysqli_fetch_array($run_posts);
	
		$event_id = $row_posts['event_id'];
		$user_id  = $row_posts['user_id'];
		$event_title = $row_posts['event_title'];
		$event_description = $row_posts['event_description'];
		$event_date = $row_posts['event_date'];
		$event_time = $row_posts['event_time'];
		$event_pic = $row_posts['event_pic'];
		$event_doc = $row_posts['event_doc'];
		$event_status = $row_posts['event_status'];
		
		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id'";
		
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
				
		//Getting User Session
		$user_com = $_SESSION['user_email'];
		$get_com = "select *from users where user_email='$user_com'";
		$run_com = mysqli_query($con,$get_com);
		$row_com = mysqli_fetch_array($run_com);
		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];
		
		//now displaying all at once
		echo"
			<div class='row'>
				<div class='col-md-2 text-center'>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$event_title</h3>
					<p>$event_description</p>
					<p>Date: $event_date </p>
					<p>Time: $event_time</p>
					<a href='' class='cd-modal-trigger'><img src='user/event_file/$event_pic' width='476px' height='auto'/></a>
				</div>
			</div>
			
<div class='cd-modal'>
	<div class='modal-contents'>
	<center><img src='user/event_file/$event_pic'/></center>
	<center><img src='user/event_file/$event_doc'/></center>
	</div>
	<a href='#0' class='modal-close'>Close</a>
</div>
<div class='cd-transition-layer'>
	<div class='bg-layer'></div>
</div>
		";
	}
?>
		</div>
		<div class="col-lg-5"><?php
				echo "
				<form action='' method='post'>
				  <div class='form-group'>
					<input type'text' class='form-control' placeholder='Wirte your comment' name='comment' required />
				  </div>
				  <div class='form-group'>
					<input class='btn btn-success btn-block' type='Submit' name='reply' value='Post Comment'/>
				  </div>
				</form>
			";

				$get_com = "select * from event_comments where event_id='$get_id' ORDER by 1 DESC";
				$run_com = mysqli_query($con,$get_com);

			while($row = mysqli_fetch_array($run_com)){
				$com = $row['comment'];
				$com_name = $row['comment_author'];
				$event_date = $row['event_date'];
				echo"
				<div class='col-lg-12 border border-success padding-top-20 margin-top-20 animate fadeInRight'>
					<h4>$com</h4>
					<p style='text-align:left;'>
					$event_date
					<span style='float:right;'><a href='user_profile.php?u_id=$user_id'>$com_name</a></span>
					</p>
				</div>
				";
			}
		/////////////////////////////Ineserting the Comments
		global $user_id;
		if(isset($_POST['reply'])){
			$comment = $_POST['comment'];
				if($comment==' '){
					echo "<script>alert('Please Fill the Form first');</script>";
				}
				else{
			$insert = "insert into event_comments (event_id,user_id,comment,comment_author,event_date) values ('$event_id','$user_id','$comment','$user_com_name',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> Comment Was Added!</h5>
				</div>
				<script>window.open('event_single.php?event_id=$event_id','_self')</script>
				";
				}
		}
		?></div>
    </div>
</div>

<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> 
<?php 
}
include("newtemplate/footer.php");
?>









