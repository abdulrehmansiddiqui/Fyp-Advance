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
		<h3>Edit Discussions Post</h3>
		<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		<span>You can edit post </span>
	</div>

	<?php
	if(isset($_GET['post_id'])){
		$get_id = $_GET['post_id'];
		$get_posts = "select * from posts where post_id='$get_id'";
		$run_posts = mysqli_query($con,$get_posts);
		$row_posts = mysqli_fetch_array($run_posts);
		
		$user_id  = $row_posts['user_id'];
		$user_title  = $row_posts['user_title'];
		$user_msg  = $row_posts['user_msg'];
		$post_date  = $row_posts['post_date'];
	}
		?>
    <!-------------BODY------------->
<div class="container margin-bottom-100">
    <div class="row">
        <div class="col-lg-12 ">
		<div class='row border border-success padding-top-30 padding-bottom-30'>
			<div class='col-md-2 text-center animate fadeInLeft' data-wow-delay='0.4s'>
			<?php
			echo"
				<img class='rounded-circle' src='user/user_images/$main_image' width='70' height='70'>
				<h6><a href='user_profile.php?u_id=$main_id'>$main_name</a></h6>";
			?>
			</div>
			<div class='col-md-10 animate fadeInRight' data-wow-delay='0.4s'>
				<form action="" method="post">
					<div class="form-group">
					<input class="form-control" type="text" name="u_title" value="<?php echo"$user_title"?>"/>
					</div>
					<div class="form-group">
					<input class="form-control" type="text" name="u_msg" value="<?php echo"$user_msg"?>" />
					</div>
					<select class="form-control" name="u_topic">
					<?php
						$get_topicss = "select * from topicss";
						$run_topicss = mysqli_query($con,$get_topicss);
							
							while($row=mysqli_fetch_array($run_topicss)){
								$topic_id = $row['topic_id'];
								$topic_title = $row['topic_title'];
							echo "<option value='$topic_id'>$topic_title</a></option>";
							}
					?>
					</select>
			</div>
			<div class='col-md-12 margin-top-20'>
					<button name="update" class="btn btn-success btn-block">Update</button>
				</form>		
			<?php
	if(isset($_POST['update'])){
		$utitle = $_POST['u_title'];
		$umsg = $_POST['u_msg'];
		$utopic = $_POST['u_topic'];
			
		$update = "update posts set user_title='$utitle', user_msg='$umsg', user_topic='$utopic' where post_id='$get_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Post is Updated!')</script>";
			// echo "<script>window.open('my_posts.php?u_id=$user_id','_self')</script>";
		}
		else{
			echo "<h3>Error!</h3>";
		}
	}
?>
			</div>
		</div>
        </div>
    </div>
</div>
				
    <!-------------BODY-END------------>
<?php 
}
include("newtemplate/footer.php");
?>





