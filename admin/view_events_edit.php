<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("header/header.php");?>


<?php 
	  if(isset($_GET['event_id'])){
		$edit_id = $_GET['event_id'];

	$sel_users = "select *from events where event_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
		$user_id = $row_users['user_id'];
		$event_title = $row_users['event_title'];
		$event_description = $row_users['event_description'];
		$event_topic = $row_users['event_topic'];
		$event_date = $row_users['event_date'];
		$event_time = $row_users['event_time'];
		$event_pic = $row_users['event_pic'];
		$event_doc = $row_users['event_doc'];
		$event_status = $row_users['event_status'];
		$event_post_date = $row_users['event_post_date'];

?>

  <!--Single Events -->
  <section class="content-section" id="Events">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Single Events</h3>
        <h2 class="mb-5"><?php echo $event_title?></h2>
      </div>
      <div class="row no-gutters">
		<div class="col-md-4">
			 <img src='../user/event_file/<?php echo $event_pic?>' widht='200px' height='200px'/>
			 <img src='../user/event_file/<?php echo $event_doc?>' widht='200px' height='200px' alt="No File Uploaded" />
		</div>
		<div class="col-md-4">
			<p><strong>Timing: </strong><?php echo $edit_id ?></p>
			<p><strong>Timing: </strong><?php echo $event_time ?></p>
			<p><strong>Date: </strong><?php echo $event_date ?></p>
			<p><strong>Status: </strong><?php echo $event_status ?></p>
			<p><strong>Event Post Date: </strong><?php echo $event_post_date ?></p>
			<p><a class="btn btn-success" href="includes/update_event_approve.php?event_id=<?php echo $edit_id;?>">Approve</a> <a class="btn btn-warning" href="includes/update_event_decline.php?event_id=<?php echo $edit_id;?>">Decline</a>
			<a class="btn btn-danger" href="includes/update_event_delete.php?event_id=<?php echo $edit_id;?>">Delete</a></p>
		</div>
		<div class="col-md-4">
			<p><strong>Description: </strong><?php echo "$event_description";?></p>
		</div>
      </div>
    </div>
  </section>

<?php }?>

  <!--ALl Events -->
  <section class="callout text-white" id="Events">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">All Events</h3>
        <h2 class="mb-5">Recent Projects</h2>
      </div>
      <div class="row no-gutters">
	  <?php  include("includes/view_events.php");?>
      </div>
    </div>
  </section>
  
<!-- EVENT Comments -->
  <section class="content-section bg-light" id="Comments">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>All  EVENT comments by Users!</h2>
		  <?php include("includes/view_eventcom.php");?>
        </div>
      </div>
    </div>
  </section>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>
</body>
</html>

<?php } ?>
