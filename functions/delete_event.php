<?php
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
if(isset($_GET['event_id'])){
		$event_id = $_GET['event_id'];
		
			$user = "select * from events where event_id='$event_id'";
			$run_user = mysqli_query($con,$user);
			$row_user = mysqli_fetch_array($run_user);
			$user_id = $row_user['user_id'];

		$delete = "delete from events where event_id='$event_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Event has been deleted')</script>";
			echo"<script>window.open('../my_events.php?u_id=$user_id','_self')</script>";
		}
	}
?>