<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("header/header.php");?>

<!-- Contact -->
<section class="content-section bg-light" id="Users">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h2>All Register Users!</h2>
          <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Subject</th>
    <th scope="col">Message</th>
    <th scope="col">Date</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

<?php
	$get_event = "select *from contact";
	$run_event = mysqli_query($con,$get_event);

	$i=0;
	while($row_event=mysqli_fetch_array($run_event)){
		$id = $row_event['contact_id'];
		$name = $row_event['name'];
		$email = $row_event['email'];
		$subject = $row_event['subject'];
		$message = $row_event['message'];
		$date = $row_event['date'];
	$i++;

?>

<tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $name;?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $subject; ?></td>
      <td><?php echo $message; ?></td>
      <td><?php echo $date; ?></td>
      <td>		        
	  <p><a href="includes/delete_contact.php?contact_id=<?php echo $id;?>"><img src="img/delete.png" width="15" height="15"/></a></p>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>


        </div>
      </div>
    </div>
  </section>


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


