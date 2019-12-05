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
<div class="container margin-bottom-100">
	<div class="row">
        <!-- MAIN HEADING -->
        <div class='heading-block text-center animate fadeInUp' data-wow-delay='0.4s'>
        <h3>Single Discussions Post</h3>
          <div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
          <span>You can comment and give review</span> </div>
<?php
	global $con;
	$get_id = $_GET['post_id'];
	$get_posts = "select * from posts where post_id='$get_id'";
	$run_posts = mysqli_query($con,$get_posts);
	$row_posts = mysqli_fetch_array($run_posts);
	
		$post_id = $row_posts['post_id'];
		$user_id  = $row_posts['user_id'];
		$user_title  = $row_posts['user_title'];
		$user_msg  = $row_posts['user_msg'];
		$post_date  = $row_posts['post_date'];
		
		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id' AND posts='yes'";
		
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
			
		<div class='col-md-2 text-center animate fadeInLeft'>
			<img src='user/user_images/$user_image' width='70' height='70'>
			<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
		</div>
		<div class='col-md-10 animate fadeInRight'>
			<h3>$user_title</h3>
			<p>$user_msg</p>
			<p>$post_date </p>
		</div>
			
		<div class='col-md-12 animate fadeInUp'>
			<form action='' method='post'>
			  <div class='form-group'>
				<input type'text' class='form-control' placeholder='Wirte your comment' name='comment' required />
			  </div>
			  <div class='form-group'>
				<input class='btn btn-success btn-block' type='Submit' name='reply' value='Post Comment'/>
			  </div>
			</form>
		</div>
		";

			$get_id = $_GET['post_id'];
			$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";
			$run_com = mysqli_query($con,$get_com);
	
		while($row = mysqli_fetch_array($run_com)){
			$com = $row['comment'];
			$com_name = $row['comment_author'];
			$date = $row['date'];
			echo"
			<div class='col-lg-12 border border-success padding-top-20 margin-top-20 animate fadeInUp'>
			<div class='row'>
			<div class='col-lg-2 text-center animate fadeInLeft'>
				<h6><a href='user_profile.php?u_id=$user_id'>$com_name</a></h6>
			</div>
			<div class='col-lg-10 animate fadeInRight'>
				<h4>$com</h4>
				<p>$date</p>
			</div>
			</div>
			</div>
			";
		}
			echo"";

	/////////////////////////////Ineserting the Comments
		global $user_id;
		if(isset($_POST['reply'])){
			$comment = $_POST['comment'];
				if($comment==' '){
					echo "
				<div class='alert alert-danger text-center margin-top-30' role='alert'>
					<h5>Please Fill the Form first</h5>
				</div>";
				}
				else{
			$insert = "insert into comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> Comment Was Added!</h5>
				</div>
				<script>window.open('single.php?post_id=$post_id','_self')</script>
				";
				}	
		}
	
?>

	</div>
</div>

<?php 
include("newtemplate/footer.php");
}
 ?>