<?php
session_start();

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
else {
  include("newtemplate/header.php");
?>
	<?php
	if(isset($_GET['u_id'])){
		global $con;
		$get_id = $_GET['u_id'];
	
		$select = "select * from users where user_id='$get_id'";
		$run = mysqli_query($con,$select);
		$row = mysqli_fetch_array($run);
	
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_des = $row['user_des'];
		$user_image = $row['user_image'];
		$user_email = $row['user_email'];
		$user_gender = $row['user_gender'];
		$user_country = $row['user_country'];
		$mobile = $row['user_mobile'];
		$registor_date = $row['registor_date'];
		$last_login = $row['last_login'];
		$posts = $row['posts'];
		$cover = $row['cover'];
		
		if($user_gender=='Male'){
			$msg="Send him a message";
		}
		else{
			$msg="Send her a message";
		}

?>
    <!-- Header Image -->
    <section class="sub-banner animated fadeIn" style="background:url(user/cover/<?php echo $cover ?>) fixed no-repeat ;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;  background-size: cover;">
      <div class="container">
        <div class="position-center-center">
          <h2><?php echo $user_name?></h2>
        </div>
      </div>
    </section>

    <!-- Services Intro -->
	<section class="service-intro padding-top-80 padding-bottom-80">
      <div class="container">
        <div class="row">
          <div class="col-md-5 animate fadeInLeft" data-wow-delay="0.4s"> <img class="img-responsive" src='user/user_images/<?php echo $user_image ?>' width='100%;' height='auto' alt=""> </div>
          <div class="col-md-7 animate fadeInRight" data-wow-delay="0.4s">
            <h2 class="margin-top-50 margin-bottom-50"><?php echo "Short intro about $user_name" ?></h2>
            <p class="font-crimson"><?php echo "$user_des <br>From <strong>$user_country</strong>";?></p>
            <hr class="balck col-sm-1 float-none">
            <h6>Last Login - <span class="font-crimson font-italic"><?php echo $last_login ?></span></h6>
            <h6>Registor On - <span class="font-crimson font-italic"><?php echo $registor_date ?></span></h6>
          </div>
        </div>


        <div class="row margin-top-50"> 
          
          <!-- Icon -->
          <div class="col-md-3 animate fadeInLeft" data-wow-delay="0.4s">
            <div class="icon-box ib-style-5 ib-center ib-text-alt ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-circle">
              <div class="ib-icon"> <i class="fa fa-copy"></i> </div>
              <div class="ib-info">
                <h4 class="h6"><?php echo "See $user_name Posts" ?></h4>
                <p><?php echo "$user_name have post? $posts "?> </p>
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
}
?>
        </div>
      </div>
    </section>


	<section class="team style-2 margin-bottom-50 animate fadeInUp" data-wow-delay="0.4s">
        <div class="container">
	<h5 class="margin-top-50 margin-bottom-30 text-uppercase">More Members</h5>
          <ul class="team-small">
<?php
	$get_member = "select *from users";
	$run_member = mysqli_query($con,$get_member);
			
	while($row = mysqli_fetch_array($run_member)){
	$user_id = $row['user_id'];
	$user_name = $row['user_name'];
	$user_image = $row['user_image'];
?>
            <li><img class="img-responsive" src="user/user_images/<?php echo $user_image?>" widht='214px' height='214px' alt=""><a class="hover" href="user_profile.php?u_id=<?php echo $user_id?>"><?php echo $user_name?> <i class="ion-plus-round"></i></a></li>
<?php
}
?>
          </ul>
        </div>
  </section>

<?php 
}
include("newtemplate/footer.php");
?>


