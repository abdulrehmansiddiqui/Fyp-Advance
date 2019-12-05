<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("header/header.php");?>

<?php 
	  if(isset($_GET['sell_id'])){
		$edit_id = $_GET['sell_id'];

	$sel_users = "select *from sell where sell_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
		$user_id = $row_users['user_id'];
		$title = $row_users['title'];
		$des = $row_users['des'];
		$number = $row_users['number'];
		$topic = $row_users['topic'];
		$model = $row_users['model'];
		$date = $row_users['date'];
		$status = $row_users['status'];
		$location = $row_users['location'];
		$price = $row_users['price'];
		$sell_pic1 = $row_users['sell_pic1'];
		$sell_pic2 = $row_users['sell_pic2'];
		$sell_pic3 = $row_users['sell_pic3'];
		$sell_pic4 = $row_users['sell_pic4'];
		$sell_pic5 = $row_users['sell_pic5'];
		$sell_pic6 = $row_users['sell_pic6'];

?>

  <!--Single Adds -->
  <section class="content-section" id="Events">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Single Add</h3>
        <h2 class="mb-5"><?php echo $title?></h2>
      </div>
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src='../user/buy_sell/<?php echo $sell_pic1?>' widht='200px' height='200px' alt="No File Uploaded"/>
        </div>
        <div class="col-md-4">
          <p><strong>Number: </strong><?php echo $number ?></p>
          <p><strong>Topic: </strong><?php echo $topic ?></p>
          <p><strong>Model: </strong><?php echo $model ?></p>
          <p><strong>Status: </strong><?php echo $status ?></p>
          <p><strong>Location: </strong><?php echo $location ?></p>
          <p><strong>Price: </strong><?php echo $price ?></p>
          <p><strong>Date: </strong><?php echo $date ?></p>
          <p><a class="btn btn-success" href="includes/update_add_approve.php?add_id=<?php echo $edit_id;?>">Approve</a> <a class="btn btn-warning" href="includes/update_add_decline.php?add_id=<?php echo $edit_id;?>">Decline</a>
          <a class="btn btn-danger" href="includes/update_add_delete.php?add_id=<?php echo $edit_id;?>">Delete</a></p>
        </div>
        <div class="col-md-4">
          <p><strong>Description: </strong><?php echo "$des";?></p>
        </div>
        <div class="col-md-12">
          <img src='../user/buy_sell/<?php echo $sell_pic2?>' widht='200px' height='200px' alt="No File Uploaded"/> 
          <img src='../user/buy_sell/<?php echo $sell_pic3?>' widht='200px' height='200px' alt="No File Uploaded"/> 
          <img src='../user/buy_sell/<?php echo $sell_pic4?>' widht='200px' height='200px' alt="No File Uploaded"/> 
          <img src='../user/buy_sell/<?php echo $sell_pic5?>' widht='200px' height='200px' alt="No File Uploaded"/> 
          <img src='../user/buy_sell/<?php echo $sell_pic6?>' widht='200px' height='200px' alt="No File Uploaded"/>          
        </div>
      </div>
    </div>
  </section>

<?php }?>

  <!-- Adds -->
  <section class="callout text-white" id="Adds">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Adds</h3>
        <h2 class="mb-5 ">All Users Adds</h2>
      </div>
      <div class="row">
		<?php include("includes/view_adds.php");?>
      </div>
    </div>
  </section>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/stylish-portfolio.min.js"></script>
</body>
</html>

<?php } ?>
