<?php
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
if(isset($_GET['add_id'])){
	$add_id = $_GET['add_id'];
	
	$update = "update sell set status='verify' where sell_id='$add_id'";
	$run = mysqli_query($con,$update);
		if($run){
			echo "<script>window.open('../view_adds_edit.php?sell_id=$add_id','_self')</script>";
		}

}
?>





