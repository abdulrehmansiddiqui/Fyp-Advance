<?php
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
if(isset($_GET['event_id'])){
	$event_id = $_GET['event_id'];
	
	$delete = "delete from events where event_id='$event_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A EVENT has been deleted')</script>";
			echo "<script>window.open('../index.php#Events','_self')</script>";
		}
}
?>





