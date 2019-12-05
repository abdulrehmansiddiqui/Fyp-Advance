<?php
	 include("../../includes/connection.php");
	 
if(isset($_GET['topic_id'])){
		$topic_id = $_GET['topic_id'];
		
		$delete = "delete from topicss where topic_id='$topic_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Topics has been deleted')</script>";
			echo"<script>window.open('../index.php?view_topic','_self')</script>";	
		}
	}
?>