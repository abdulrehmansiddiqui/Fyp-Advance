<?php
	 include("../../includes/connection.php");
	 
if(isset($_GET['user_id'])){
		$get_id = $_GET['user_id'];

		$delete = "delete from users where user_id='$get_id'";
		$run_delete = mysqli_query($con,$delete);

		$del_posts = "delete from posts where user_id='$get_id'";
		$run_posts = mysqli_query($con,$del_posts);
		
		$del_com = "delete from comments where user_id='$get_id'";
		$run_com = mysqli_query($con,$del_com);
		
	
			echo"<script>alert('User Has been deleted')</script>";
			echo"<script>window.open('../index.php?view_users','_self')</script>";	
		
	}
?>
