<?php
	$get_event = "select *from events";
	$run_event = mysqli_query($con,$get_event);

	$i=0;
	while($row_event=mysqli_fetch_array($run_event)){
		$event_id = $row_event['event_id'];
		$user_id = $row_event['user_id'];
		$event_title = $row_event['event_title'];
		$event_description = $row_event['event_description'];
		$event_date = $row_event['event_date'];
		$event_time = $row_event['event_time'];
		$event_status = $row_event['event_status'];
		$event_pic = $row_event['event_pic'];
	$i++;

	$sel_users = "select *from users where user_id=$user_id ";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
		$user_name = $row_users['user_name'];

	?>
<div class="col-lg-6">
  <a class="portfolio-item" href="view_events_edit.php?event_id=<?php echo $event_id; ?>">
    <span class="caption">
      <span class="caption-content">
        <h2><?php echo $event_title; ?></h2>
        <p class="mb-0"><?php echo $event_description; ?></p>
		<hr>
		<p class="mb-0"><?php echo "Date: <strong>$event_date</strong> Time: <strong>$event_time</strong>"; ?>!</p>
		<p class="btn btn-warning" ><?php echo $event_status;?></p>
      </span>
    </span>
    <img class="img-fluid" src="../user/event_file/<?php echo $event_pic;?>" alt="">
  </a>
</div>
    
	<?php } ?>

</table>
</div>
</div>
<?php 
	  if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
		

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
		$event_status = $row_users['event_status'];
		$event_post_date = $row_users['event_post_date'];

?>
<div class="col-md-4 bgw emptyall">
	<?php echo " <h2>$event_title</h2>
	<p><img src='../user/user_images/$event_pic' widht='200px' height='200px'/></p>
	<p><strong>Timing: </strong>$event_time</p>
	<p><strong>Date: </strong>$event_date</p>
	<p><strong>Status: </strong>$event_status</p>
	<p><strong>Status: </strong>$event_post_date</p>
	
	" ;?>
</div>
<div class="col-md-8 bgw emptyall">
	<p><strong>Description: </strong><?php echo "$event_description";?></p>
</div>

 <?php }?>