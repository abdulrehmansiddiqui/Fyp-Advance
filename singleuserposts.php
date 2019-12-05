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
    <div class="row">
        <div class="col-lg-6">
            <center></center>
<?php
if(isset($_GET['u_id'])){
	$u_id = $_GET['u_id'];
}
	//getting the user who has posted the thread
	$user = "select * from users where user_id='$u_id' AND posts='yes'";

	$run_user = mysqli_query($con,$user);
	$row_user = mysqli_fetch_array($run_user);
	$user_id = $row_user['user_id'];
	$user_name = $row_user['user_name'];
	$user_image = $row_user['user_image'];
	$user_email = $row_user['user_email'];
	$user_gender = $row_user['user_gender'];
	$user_country = $row_user['user_country'];
	$mobile = $row_user['user_mobile'];
	$registor_date = $row_user['registor_date'];
	$last_login = $row_user['last_login'];

	if($user_gender=='Male'){
		$msg="Send him a message";
	}
	else{
		$msg="Send her a message";
	}

	echo "<h2>$user_name all posts</h2>";

	$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC";
	$run_posts = mysqli_query($con,$get_posts);
	
	while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id  = $row_posts['user_id'];
		$user_title  = $row_posts['user_title'];
		$user_msg  = $row_posts['user_msg'];
		$post_date  = $row_posts['post_date'];

		//now displaying all at once
		echo"
			<div class='row border border-primary paddingtop'>
				<div class='col-md-2 text-center '>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$user_title</h3>
					<p>$user_msg</p>
					<p>$post_date </p>
					<div style='position: absolute; bottom: -15px; right: 40%;'><a href='single.php?post_id=$post_id' class='btn btn-primary'>Comments</a></div>
				</div>
			</div>
			<br>
		";
	}
?>
        </div>
		<div class="col-lg-6">
			<div class='row'>
				<div class='col-md-6 animate fadeIn' data-wow-delay='0.6s'>
					<img src='user/user_images/<?php echo $user_image?>' width='100%;' height='auto' alt='''> 
				</div>
				<div class='col-md-6 animate fadeInRight' data-wow-delay='0.4s'>
					<p class='font-crimson'>From <strong><?php echo $user_country?></strong>'</p>
					<hr class='balck col-sm-1 float-none'>
					<h6>Last Login - <span class='font-crimson font-italic'><?php echo $last_login?> </span></h6>
					<h6>Registor On - <span class='font-crimson font-italic'><?php echo $registor_date?> </span></h6>
				</div>
			</div>
		</div>
    </div>

	<div class="row margin-top-50"> 
          <!-- Icon -->
          <div class="col-md-3 animate fadeInLeft" data-wow-delay="0.4s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-copy"></i> </div>
              <div class="ib-info">
                <h4 class="h6"><?php echo "See $user_name Posts" ?></h4>
                <p><?php echo "$user_name have post?"?> </p>
                <a href="singleuserposts.php?u_id=<?php echo $user_id?>">Open <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
          </div>
          
          <!-- Icon -->
          <div class="col-md-3 animate fadeInLeft" data-wow-delay="0.6s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-calendar"></i> </div>
              <div class="ib-info">
                <h4 class="h6"><?php echo "See $user_name Event" ?></h4>
                <a href="singleuserevents.php?u_id=<?php echo $user_id?>">Open <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
          </div>
          
          <!-- Icon -->
          <div class="col-md-3 animate fadeInRight" data-wow-delay="0.4s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-viacoin"></i> </div>
              <div class="ib-info">
                <h4 class="h6"><?php echo "See $user_name Review" ?></h4>
                <p>What members says to  <?php echo "$user_name" ?></p>
                <a href="pro_review.php?u_id=<?php echo $user_id ?>">Give Review <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
          </div>
		  
<?php if($user_name==$main_name){?>
          <!-- Icon -->
          <div class="col-md-3 animate fadeInRight" data-wow-delay="0.6s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-cog"></i> </div>
              <div class="ib-info">
                <h4 class="h6">Edit You Profile</h4>
                <p>Update details OR change Profile and cover picture</p>
                <a href="edit_profile.php?u_id=<?php echo $user_id?>">Edit? <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
		        </div>
<?php } else { ?>
          <!-- Icon -->
          <div class="col-md-3 animate fadeInRight" data-wow-delay="0.6s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-trophy"></i> </div>
              <div class="ib-info">
                <h4 class="h6"><?php echo $msg ?></h4>
                <p>Personal Message </p>
                <a href="message.php?u_id=<?php echo $user_id?>">Send <i class="fa fa-chevron-circle-right"></i></a> </div>
            </div>
		        </div>
<?php
	}
?>
        </div>

</div>

<?php 
}
include("newtemplate/footer.php");
?>


