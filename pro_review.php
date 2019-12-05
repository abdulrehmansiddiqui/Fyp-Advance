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

<div class="container">
    <div class="row">
<?php
	if(isset($_GET['u_id'])){
		global $con;
		$get_id = $_GET['u_id'];
	
		$select = "select * from users where user_id='$get_id'";
		$run = mysqli_query($con,$select);
		$row = mysqli_fetch_array($run);
	
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		$user_email = $row['user_email'];
		$user_gender = $row['user_gender'];
		$user_country = $row['user_country'];
		$mobile = $row['user_mobile'];
		$registor_date = $row['registor_date'];
		$last_login = $row['last_login'];
		
		if($user_gender=='Male'){
			$msg="Send him a message";
		}
		else{
			$msg="Send her a message";
        }
		echo"
		<div class='col-md-6 animate fadeInLeft' data-wow-delay='0.4s'>
			<h2>Review of $user_name</h2>
        ";            
			// if(isset($_GET['u_id']))
            // $u_id = $_GET['u_id'];
            
            $review = "select * from review where user_id='$user_id' ORDER by 1 DESC";
			$run_rev = mysqli_query($con,$review);

		while($rev = mysqli_fetch_array($run_rev)){
            $review = $rev['review'];
            $rev_name = $rev['review_author'];
            $rev_author_id = $rev['rev_author_id'];
            $review_date = $rev['date'];
			echo"
			<div class='border border-dark padding-top-20 padding-left-20 margin-bottom-30'>
				<h4>$review</h4>
				$review_date
				<a href='user_profile.php?u_id=$rev_author_id' class='btn btn-dark float-right'>$rev_name </a>
			</div>
			";
        }
    
        echo"
		</div>
		<div class='col-md-6'>
			<div class='row'>
				<div class='col-md-6 animate fadeIn' data-wow-delay='0.6s'>
					<img src='user/user_images/$user_image' width='100%;' height='auto' alt='''> 
				</div>
				<div class='col-md-6 animate fadeInRight' data-wow-delay='0.4s'>
					<p class='font-crimson'>From <strong>$user_country</strong>'</p>
					<hr class='balck col-sm-1 float-none'>
					<h6>Last Login - <span class='font-crimson font-italic'> $last_login </span></h6>
					<h6>Registor On - <span class='font-crimson font-italic'>$registor_date </span></h6>
				</div>

        ";
    
    }
	    if($user_name==$main_name){
        }
        else{
			echo"
		<form action='' method='post' class='animate fadeInUp' data-wow-delay='0.4s'>
		<h4 class='margin-top-20'>Give Your Review about $user_name</h4>
			<div class='form-group'>
			  <input type'text' class='form-control' placeholder='Wirte your comment' name='review' required />
			</div>
			<div class='form-group'>
			  <input class='btn btn-success btn-block' type='Submit' name='reply' value='Post Review'/>
			</div>
		</form>


	";
        }
		if(isset($_POST['reply'])){
			$review = $_POST['review'];
			$insert = "insert into review (review_id,user_id,review,review_author,rev_author_id,date) values ('$review_id','$user_id','$review','$main_name','$main_id',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> review Was Added!</h5>
				</div>
				<script>window.open('pro_review.php?u_id=$user_id','_self')</script>
				";
		}
		echo "
			</div>
		</div>";

?>

    <!-------------BODY-END------------>
	


	</div>
</div>


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
            <li><img class="img-responsive" src="user/user_images/<?php echo $user_image?>" widht='214px' height='214px' alt=""><a class="hover" href="pro_review.php?u_id=<?php echo $user_id?>"><?php echo $user_name?> <i class="ion-plus-round"></i></a></li>
<?php
}
?>
          </ul>
        </div>
  </section>

<?php 
include("newtemplate/footer.php");
}
 ?>