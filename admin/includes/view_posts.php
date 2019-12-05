<?php
$sel_posts = "select *from posts ORDER by 1 DESC";
$run_posts = mysqli_query($con,$sel_posts);
$i=0;
	while($row_posts = mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$user_title = $row_posts['user_title'];
		$user_msg = $row_posts['user_msg'];
		$post_date = $row_posts['post_date'];
	$i++;
	
	$sel_users = "select *from users where user_id=$user_id ";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
		$user_name = $row_users['user_name'];
		$user_image = $row_users['user_image'];
	?>

	<div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
		<span class="mb-3">
			<img src="../user/user_images/<?php echo $user_image;?>" title="<?php echo $user_name;?>" class="service-icon rounded-circle mx-auto"/>
		</span>
			<h4><strong><?php echo $user_title; ?></strong></h4>
			<p class="text-faded mb-0"><?php echo $user_msg; ?></p>
			<em><?php echo $post_date; ?></em>
			<p><a href="includes/delete_post.php?post_id=<?php echo $post_id;?>" class="badge badge-pill badge-danger">Delete</a></p>
	</div>
      
<?php } ?>
	