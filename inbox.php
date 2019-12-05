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

  <!-- MAIN HEADING -->
	<div class='heading-block text-center animate fadeInDown' data-wow-delay='0.4s'>
		<h3>Inbox Of <?php echo "$main_name"; ?></h3>
		<div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
		<span>You can see personal messages </span>
	</div>

    <!-------------BODY------------->
<div class="container margin-bottom-100">
    <div class="row">
        <div class="col-lg-12 padding">
			<h2></h2>
        </div>
        <?php
        $select = "select * from inbox where sender_id='$main_id'";
		$run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){

        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $reciver_name = $row['reciver_name'];
        $u_id = $row['user_id'];
        $status = $row['status'];

        echo"
        <div class='col-lg-12 margin-top-10'>
        <a class='btn btn-outline-success btn-block' href='my_messages.php?s_id=$u_id$main_id'>$reciver_name </a>
        </div>
        ";
        }
        ?>
        
        <?php
        $select = "select * from inbox where user_id='$main_id'";
		    $run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){

        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $status = $row['status'];

        echo"
        <div class='col-lg-12 margin-top-10'>
        <a class='btn btn-outline-success btn-block' href='my_messages.php?s_id=$sender_id$main_id'>$sender_name</a>
        </div>
        ";
        }
        ?>
        
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
include("newtemplate/footer.php");
?>


