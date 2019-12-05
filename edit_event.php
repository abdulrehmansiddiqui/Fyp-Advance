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
		<h3>Edit Event Post</h3>
		<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		<span>You can edit event </span>
	</div>

	<?php
	if(isset($_GET['event_id'])){
		$get_id = $_GET['event_id'];
		$get_posts = "select * from events where event_id='$get_id'";
		$run_posts = mysqli_query($con,$get_posts);
		$row_posts = mysqli_fetch_array($run_posts);
		
		$user_id  = $row_posts['user_id'];
		$event_title  = $row_posts['event_title'];
		$event_description  = $row_posts['event_description'];
		$event_time  = $row_posts['event_time'];
		$event_date  = $row_posts['event_date'];
		$event_status  = $row_posts['event_status'];
		$event_pic  = $row_posts['event_pic'];
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Title</label>
                        <input class="form-control" type="text" name="u_title" value="<?php echo"$event_title"?>"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Type</label>
                        <select class="form-control" name="u_topic" required="required">
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
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Event Description</label>
                        <input class="form-control" type="text" name="u_msg" value="<?php echo"$event_description"?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Date</label>
                        <input class="form-control" type="date" name="u_date" value="<?php echo"$event_date"?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Time</label>
                        <input class="form-control" type="time" name="u_time" value="<?php echo"$event_time"?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Photo</label>
                        <input class="form-control" type="file" name="u_photo" required="required"/>
                    </div>
                </div>

			</div>
			<div class='col-md-12 margin-top-20'>
					<button name="update" class="btn btn-success btn-block">Update</button>
				</form>		
			<?php
	if(isset($_POST['update'])){
		$utitle = $_POST['u_title'];
		$umsg = $_POST['u_msg'];
		$utopic = $_POST['u_topic'];
		$udate = $_POST['u_date'];
		$utime = $_POST['u_time'];
		$uphoto = $_POST['u_photo'];
			
		$update = "update events set event_title='$utitle', event_description='$umsg', event_topic='$utopic',event_time='$utime', event_date='$udate', event_pic='$uphoto', event_status='Unverify' where event_id='$get_id' ";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Event is Updated!')</script>";
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





