<?php
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
if(isset($_GET['event_id'])){
	$event_id = $_GET['event_id'];
	
	$update = "update events set event_status='approve' where event_id='$event_id'";
	$run = mysqli_query($con,$update);
		if($run){
			echo "<script>window.open('../view_events_edit.php?event_id=$event_id','_self')</script>";
		}

}
?>





