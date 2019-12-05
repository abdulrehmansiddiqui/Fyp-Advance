<?php
	 include("../../includes/connection.php");
	 
if(isset($_GET['comment_id'])){
		$comment_id = $_GET['comment_id'];
		
		$delete = "delete from event_comments where comment_id='$comment_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Comment has been deleted')</script>";
			echo"<script>window.open('../index.php','_self')</script>";	
		}
	}
?>