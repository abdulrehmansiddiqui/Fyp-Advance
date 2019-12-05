<?php
	 include("../../includes/connection.php");
	
if(isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
		
		$delete = "delete from posts where post_id='$post_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A post has been deleted')</script>";
			echo"<script>window.open('../index.php?view_posts','_self')</script>";	
		}
	}
?>