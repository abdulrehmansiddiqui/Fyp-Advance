<?php
	$con = mysqli_connect("localhost","getfastd_abdul","SY)wPCsvr]oe","getfastd_abdul") or die("Connection was not established");
	
if(isset($_GET['msg_id'])){
		$get_id = $_GET['msg_id'];
		
		$delete = "delete from messages where msg_id='$get_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Message has been deleted')</script>";
			echo"<script>window.open('../my_messages.php','_self')</script>";	
		}
	}
?>