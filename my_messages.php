<?php
session_start();

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
else {
  include("newtemplate/header.php");
?>

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 margin-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>

<div class="container margin-bottom-100">
    <div class="row">
<table class="table table-striped">
<?php        
		if(isset($_GET['s_id']))
      $s_id = $_GET['s_id'];
        
      $select = "select * from messages where checker='2$s_id' || checker1='2$s_id' ";
	  	$run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){
          $reciver_id = $row['reciver_id'];
          $sender_id = $row['sender_id'];
          $sender_name = $row['sender_name'];
          $sender_msg = $row['sender_msg'];
          $status = $row['status'];
          $msg_date = $row['msg_date'];
    echo"
    <tr>
      <th scope='row'>$sender_name</th>
      <td>$sender_msg</td>
    </tr>
    ";
          }	
?>
</table>
<?php
	if($main_id == $reciver_id){
		echo"<a href='message.php?u_id=$sender_id' class='btn btn-success btn-block'>Reply</a>";
	}
	else{
		echo"<a href='message.php?u_id=$reciver_id' class='btn btn-success btn-block'>Reply</a>";
	}
?>
  </div>
</div>

<?php 
}
include("newtemplate/footer.php");
?>


