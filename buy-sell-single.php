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
	if(isset($_GET['ad_id'])){
		global $con;
		$get_id = $_GET['ad_id'];
  
		$get_posts = "select *from sell where sell_id='$get_id'";
		$run_posts = mysqli_query($con,$get_posts);
		$row_event = mysqli_fetch_array($run_posts);
	
    $user_id  = $row_event['user_id'];
    $sell_id = $row_event['sell_id'];
    $title = $row_event['title'];
    $des = $row_event['des'];
    $number = $row_event['number'];
    $topic = $row_event['topic'];
    $model = $row_event['model'];
    $price = $row_event['price'];
    $date = $row_event['date'];
    $location = $row_event['location'];
    $sell_status = $row_event['status'];
    $sell_pic1 = $row_event['sell_pic1'];
    $sell_pic3 = $row_event['sell_pic2'];
    $sell_pic3 = $row_event['sell_pic3'];
		
		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id'";
		
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		
		//now displaying all at once
		echo"
			<div class='row'>
				<div class='col-md-2 text-center'>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$title</h3>
					<p>$des</p>
					<p><strong>Status:</strong> $sell_status</p>
					<p><strong>Model:</strong> $model</p>
					<p><strong>Number:</strong> $number</p>
					<p><strong>location:</strong> $location</p>
					<p><strong>Date:</strong> $date </p>
				</div>
			</div>
		";
	}
?>
		</div>
		<div class="col-lg-5">
			<a href='' class='cd-modal-trigger text-center'><img src='user/buy_sell/<?php echo $sell_pic1 ?>' widht='auto' height='300px'/></a>
			<hr>
			<?php echo "<h3>Rs $price</h3>" ?>
      <div class='cd-modal'>
        <div class='modal-contents'>
          <center><img alt='' src='user/buy_sell/<?php echo $sell_pic1 ?>'/></center>
          <center><img alt='' src='user/buy_sell/<?php echo $sell_pic2 ?>'/></center>
          <center><img alt='' src='user/buy_sell/<?php echo $sell_pic3 ?>'/></center>
        </div>
        <a href='#0' class='modal-close'>Close</a>
      </div>
      <div class='cd-transition-layer'>
        <div class='bg-layer'></div>
      </div>
    </div>
    </div>
</div>

<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> 
<?php 
}
include("newtemplate/footer.php");
?>









