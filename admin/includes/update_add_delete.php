<?php
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
if(isset($_GET['add_id'])){
	$add_id = $_GET['add_id'];
	
	$delete = "delete from sell where sell_id='$add_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A ADD has been deleted')</script>";
			echo "<script>window.open('../index.php#adds','_self')</script>";
		}
}
?>





