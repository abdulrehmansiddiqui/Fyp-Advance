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

    <!-- Events -->
<section class='portfolio port-wrap'>
      <div class='container'> 
        <!-- MAIN HEADING -->
        <div class='heading-block text-center animate fadeInUp' data-wow-delay='0.4s'>
        <h3>All Posted Events </h3>
          <div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		  <a href='' class='cd-modal-trigger'>Create an event</a>
		</div>

        <!-- Work Filter -->
        <ul class='tabs portfolio-filter text-center margin-bottom-80 animate fadeInUp' data-wow-delay='0.4s'>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf'>All</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design1'>Car Auto Show</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design2'>Bike Auto Show</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design3'>Spear Parts</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design4'>Management</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design5'>Other</a></li>
        </ul>
      </div>

      <!-- PORTFOLIO ITEMS -->
<div class="container">
    <div class='items row animate fadeInUp' data-wow-delay='0.4s'> 
	<?php
		global $con;
		$get_event = "select *from events";
		$run_event = mysqli_query($con,$get_event);

			while($row_event=mysqli_fetch_array($run_event)){
				$event_id = $row_event['event_id'];
				$user_id = $row_event['user_id'];
				$event_title = $row_event['event_title'];
				$event_description = $row_event['event_description'];
				$event_date = $row_event['event_date'];
				$event_status = $row_event['event_status'];
				$event_topic = $row_event['event_topic'];

		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
	?>
	<article class='col-lg-12 portfolio-item pf pf-branding-design<?php echo"$event_topic";?> margin-bottom-30 '>
<?php
//now displaying all at once
	echo"
	<div class='row border border-success padding-top-30'>
		<div class='col-lg-2 text-center'>
			<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'/>
			<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
		</div>
		<div class='col-lg-8'>
			<h3>$event_title</h3>
			<p>$event_description</p>
			<p>$event_date </p>
			<div style='position: absolute; bottom: -15px; right: 40%;'><a href='event_single.php?event_id=$event_id' class='btn btn-success'>Open event</a></div>
		</div>
		<div class='col-lg-2'>
	";
		if($event_status=="approve"){echo"<img src='img/aprroved.jpg'/>";}
		else{echo"<img src='img/unapproved.jpg'/>";}
	echo"
		</div>
	</div>
	<br>
	";
?>
	</article>
	<?php
			};
	?>
    </div>
</div>
</section>

<div class='cd-modal'>
	<div class='modal-contents'>
      <div class='container'> 
		<h1 style="color:#fff;">Create an event</h1>
		<form action="" method="post" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="inputEmail4">Title</label>
				<input type="text" class="form-control" name="utitle" placeholder="Title*" required="required"/>
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Type</label>
				<select class="form-control" name="utopic" required="required">
					<option value="" style="display:none">Select Topic*</option>
					<?php 
						global $con;
						$get_topics = "select * from event_topic";
						$run_topics = mysqli_query($con,$get_topics);
							while($row=mysqli_fetch_array($run_topics)){
								$event_topic_id = $row['event_topic_id'];
								$event_topic = $row['event_topic'];
									echo "<option value='$event_topic_id'>$event_topic</a></option>";
								}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Event Description</label>
			<input type="text" class="form-control" name="umsg" placeholder="Event Description" required="required"/>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="inputCity">Date</label>
				<input type="date" class="form-control" name="udate" required="required"/>	
			</div>
			<div class="form-group col-md-4">
				<label for="inputState">Time</label>
				<input type="time" class="form-control" name="utime" required="required"/>
			</div>
			<div class="form-group col-md-4">
				<label for="inputZip">Picture</label>
				<input type="file" class="form-control" name="ufile" required="required"/>
			</div>
			<div class="form-group col-md-12">
				<label for="inputZip">Document</label>
				<input type="file" class="form-control" name="udoc"/>
			</div>
		</div>
			<button name="update" class="btn btn-success btn-block">Update</button>
		</form>
		<?php
			if(isset($_POST['update'])){
				$title = addslashes(mysqli_real_escape_string($con,$_POST['utitle']));
				$msg = addslashes(mysqli_real_escape_string($con,$_POST['umsg']));
				$topic = mysqli_real_escape_string($con,$_POST['utopic']);
				$date = mysqli_real_escape_string($con,$_POST['udate']);
				$time = mysqli_real_escape_string($con,$_POST['utime']);
				$file = $_FILES['ufile']['name'];
				$image_tmp = $_FILES['ufile']['tmp_name'];
			
				move_uploaded_file($image_tmp,"user/event_file/$file");
				
				$udoc = $_FILES['udoc']['name'];
				$image_tmp1 = $_FILES['udoc']['tmp_name'];
			
				move_uploaded_file($image_tmp1,"user/event_file/$udoc");
				
				$insert = "insert into events (user_id, event_title, event_description, event_topic, event_date,event_time, event_pic, event_doc, event_status,event_post_date) values ('$main_id','$title','$msg','$topic','$date','$time','$file','$udoc','Unverify',NOW())";
			
				$run_insert = mysqli_query($con,$insert);
					if($run_insert){
					echo "
						<script>alert('Event is update successful')</script>
					";
					}
					else{
						echo "
						<script>alert('Error')</script>
					";	
					}
				}
		?>
	  </div>
	</div>
	<a href='#0' class='modal-close'>Close</a>
</div>
<div class='cd-transition-layer'>
	<div class='bg-layer'></div>
</div>

<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> 
<?php 
}
include("newtemplate/footer.php");
?>
