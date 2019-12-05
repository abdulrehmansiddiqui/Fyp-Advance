<?php
session_start();
if(!isset($_SESSION['super_admin_email'])){
	header("location: admin_login.php");
	}
else{
?>
<?php include("../includes/connection.php");?>
<html>
<head>	
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Other CSS -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="styles/menu.css" rel="stylesheet" />
	<?php include("../includes/connection.php");?>
	<title>Super Admin Panel</title>
</head>
<body>

<div class="container">
<div class="row">

<div class="col-lg-12">
	<div class='ribbon'>
		<a href="admin_logout.php" class="btn btn-danger btn-block"><span>logout</span></a>
	</div>
</div>

<div class="col-md-12">
<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Password</th>
    <th scope="col">Number</th>
    <th scope="col">Add</th>
    <th scope="col">Edit</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  	<?php
	$sel_users = "select *from admin ORDER by 1 DESC";
	$run_users = mysqli_query($con,$sel_users);
	$i=0;
	while($row_users = mysqli_fetch_array($run_users)){
		$admin_id = $row_users['admin_id'];
		$admin_email = $row_users['admin_email'];
		$admin_pass = $row_users['admin_pass'];
		$admin_name = $row_users['admin_name'];
		$admin_number = $row_users['admin_number'];
	$i++;
	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $admin_name;?></td>
      <td><?php echo $admin_email; ?></td>
      <td><?php echo $admin_pass; ?></td>
      <td><?php echo $admin_number; ?></td>
      <td><a href="super_admin.php?view_admdin&add"><img src="img/add.png" width="15" height="15"/></a> </td>
      <td><a href="super_admin.php?view_admdin&edit=<?php echo $admin_id;?>"><img src="img/edit.png" width="15" height="15"/></a> </td>
      <td><a href="super_admin.php?view_admdin&delete=<?php echo $admin_id;?>"><img src="img/delete.png" width="15" height="15"/></a>   
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>
<?php 
	////////////////////////////////For Adding New Admin
	if(isset($_GET['add'])){
		echo"
		
	<div class='col-md-12'>
		<h2>Add New Admin </h2>
		<form action='' method='post'>
			<div class='form-group'>
			<input class='form-control' type='email' name='ad_email' required='required' placeholder='Email address'/>
			</div>
			<div class='form-group'>
			<input class='form-control' type='password' name='ad_pass' required='required' placeholder= 'Password'/>
			</div>
			<div class='form-group'>
			<input class='form-control' type='text'  name='ad_name' required='required' placeholder='Name'/>
			</div>
			<div class='form-group'>
			<input class='form-control' type='number'  name='ad_number' required='required' placeholder='Mobile Number'/>
			</div>
			<div class='form-group'>
			<input type='submit' name='insert' value='Insert' class='btn btn-danger btn-block' />
			</div>
		</form>
	</div>
		";
		if(isset($_POST['insert'])){
		$ad_email = $_POST['ad_email'];
		$ad_pass = $_POST['ad_pass'];
		$ad_name = $_POST['ad_name'];
		$ad_number = $_POST['ad_number'];
		
		$insert = "insert into admin (admin_email,admin_pass,admin_name,admin_number) values ('$ad_email','$ad_pass','$ad_name','$ad_number')";
		$run_insert = mysqli_query($con,$insert);
		if($run_insert){
			echo "<script>alert('You Successfully Updated New admin!')</script>";
			echo "<script>window.open('super_admin.php?view_admdin&add' ,'_self')</script>";
		}
		
		}
	}
	////////////////////////////////For edit Admin
	  if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
		

	$sel_users = "select *from admin where admin_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
		$admin_id = $row_users['admin_id'];
		$admin_email = $row_users['admin_email'];
		$admin_pass = $row_users['admin_pass'];
		$admin_name = $row_users['admin_name'];
		$admin_number = $row_users['admin_number'];

?>
	<div class='col-md-12'>
		<h2>Edit User Profile</h2>
		<form action="" method="post">
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Name</span>
					</div>
					<input class="form-control" type="text"name="admin_name" value="<?php echo $admin_name;?>" required />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Email</span>
					</div>
					<input class="form-control" type="email" name="admin_email" value="<?php echo $admin_email;?>" required />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Password</span>
					</div>
					<input class="form-control" type="password" name="admin_pass" value="<?php echo $admin_pass;?>" required />
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Mobile</span>
					</div>
					<input class="form-control" type="number" name="admin_number" value="<?php echo $admin_number;?>" required />
				</div>
			</div>
				
				<input type="submit" name="update" value="Update" class="btn btn-danger btn-block" />
				</form>
	</div>
<?php

	if(isset($_POST['update'])){
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_number = $_POST['admin_number'];

		$update = "update admin set admin_name='$admin_name', admin_email='$admin_email', admin_pass='$admin_pass', admin_number='$admin_number' where admin_id='$edit_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Profile Updated!')</script>";
			echo "<script>window.open('super_admin.php' ,'_self')</script>";
		}
	}
	  }
	  
	////////////////////////////////For delete Admin
	if(isset($_GET['delete'])){
		$delete_id = $_GET['delete'];
		
		$delete = "delete from admin where admin_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete);

		if($run_delete){
			echo"<script>alert('A Admin has been deleted')</script>";
			echo"<script>window.open('super_admin.php','_self')</script>";	
		}
	}
	  
       ?>

</div>
</div>
</div>
</body>
<?php } ?>