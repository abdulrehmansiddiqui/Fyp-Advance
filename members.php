<?php
session_start();
	include("newtemplate/header.php");
?>

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 margin-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>

<div class="container margin-bottom-80">
    <div class="row text-center">
        <div class='col-lg-12'>
			<div class='heading-block animate fadeInUp' data-wow-delay='0.4s'>
			<h3>Members</h3>
			<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
			<span>All Registered User</span> </div>
		</div>
		<?php
		// error_reporting(0);
		$get_member = "select *from users";
		$run_member = mysqli_query($con,$get_member);
		$increment = 1;
		
		while($row = mysqli_fetch_array($run_member)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_country = $row['user_country'];
		$user_image = $row['user_image'];
		$number = 0.3;
		$increment++;
		$sum = $number*$increment;

		?>
        <div class='col-lg-3' style="margin: 0px; padding:0px;">
		<div class='items animate fadeInUp' data-wow-delay='<?php echo "$sum";?>s'> 
		<!-- ITEM -->
		<article class='portfolio-item'>
		<div class='portfolio-image'> <a href='#'> <img alt='Open Imagination' src='user/user_images/<?php echo "$user_image";?>'> </a> </div>

		<div class='portfolio-overlay style-4'>
			<div class='detail-info'>
				<div class='position-center-center'>
                    <h3 class="no-margin"><?php echo "$user_name";?></h3>
                    <hr class="balck">
					<span><a href='user_profile.php?u_id=<?php echo $user_id ?>'><?php echo "$user_country";?></a></span><a href="user_profile.php?u_id=<?php echo $user_id ?>" class="go"><i class="fa fa-user"></i></a> 
				
				</div>
			</div>
		</div>

		</article> 
		</div>
		</div>
		<?php
		}
		?>
		</div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
include("newtemplate/footer.php");

?>