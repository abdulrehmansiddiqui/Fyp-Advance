<?php
	 include("../../includes/connection.php");
	 
if(isset($_GET['contact_id'])){
		$contact_id = $_GET['contact_id'];
		
		$delete = "delete from contact where contact_id='$contact_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Contact has been deleted')</script>";
			echo"<script>window.open('../contact.php','_self')</script>";	
		}
	}
?>