<?php
	$get_event = "select *from sell";
	$run_event = mysqli_query($con,$get_event);

	$i=0;
	while($row_event=mysqli_fetch_array($run_event)){
		$sell_id  = $row_event['sell_id'];
		$user_id  = $row_event['user_id'];
		$title = $row_event['title'];
		$des = $row_event['des'];
		$number = $row_event['number'];
		$topic = $row_event['topic'];
		$date = $row_event['date'];
		$location = $row_event['location'];
		$sell_status = $row_event['status'];
		$sell_pic1 = $row_event['sell_pic1'];
		$sell_pic2 = $row_event['sell_pic2'];
		$sell_pic3 = $row_event['sell_pic3'];
		$sell_pic4 = $row_event['sell_pic4'];
		$sell_pic5 = $row_event['sell_pic5'];
		$sell_pic6 = $row_event['sell_pic6'];
	$i++;

	$sel_users = "select *from users where user_id=$user_id ";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
		$user_name = $row_users['user_name'];
?>

	<div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
		<span class="mb-3">
			<img src="../user/buy_sell/<?php echo $sell_pic1;?>" title="<?php echo $user_name;?>" class="service-icon rounded-circle mx-auto"/>
		</span>
			<h4><strong><?php echo $title; ?></strong></h4>
			<p class="text-faded mb-0"><?php echo $sell_status; ?></p>
			<p class="text-faded mb-0"><?php echo $number; ?></p>
			<p class="text-faded mb-0"><?php echo $topic; ?></p>
			<em><?php echo $date; ?></em>
			<p><a href="view_adds_edit.php?sell_id=<?php echo $sell_id;?>" class="badge badge-pill badge-success">Open</a> <a href="includes/delete_adds.php?sell_id=<?php echo $sell_id;?>" class="badge badge-pill badge-danger">Delete</a></p>
	</div>


<?php }
 ?>
 