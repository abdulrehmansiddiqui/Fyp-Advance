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

	<!-- MAIN HEADING -->
	<div class='heading-block text-center animate fadeInDown' data-wow-delay='0.4s'>
		<h3><?php echo $main_name ?> Discussions Post Only</h3>
		<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		<span>You can edit post and delete post</span>
	</div>

	
    <!-------------BODY------------->
<div class="container margin-bottom-100">
    <div class="row">
        <div class="col-lg-12">
				<?php 	if(isset($_GET['u_id'])){
	$u_id = $_GET['u_id'];
	}
	
	$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC";
	$run_posts = mysqli_query($con,$get_posts);
	
	while($row_posts=mysqli_fetch_array($run_posts)){
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

		//now displaying all at once
		echo"
			<div class='row border border-success padding-top-30 padding-bottom-30 animate fadeInUp' data-wow-delay='0.4s'>
				<div class='col-md-2 text-center '>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$user_title</h3>
					<p>$user_msg</p>
					<p>$post_date </p>
				</div>
				<div class='col-md-4 marginsm'>
					<a href='single.php?post_id=$post_id' class='btn btn-success btn-block'>Comments</a>
				</div>
				<div class='col-md-4 marginsm'>
					<a href='edit_post.php?post_id=$post_id' class='btn btn-success btn-block'>Edit</a>
				</div>
				<div class='col-md-4 marginsm'>
					<a href='functions/delete_post.php?post_id=$post_id' class='btn btn-danger btn-block'>Delete</a>
				</div>

			</div>
			<br>
			
			
		";
	}?>
        </div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
include("newtemplate/footer.php");
?>


