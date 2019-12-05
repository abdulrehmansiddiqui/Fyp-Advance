<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
    <th scope="col">User Name</th>
    <th scope="col">Email</th>
    <th scope="col">Country</th>
    <th scope="col">Gender</th>
    <th scope="col">Mobile</th>
    <th scope="col">Reg Date</th>
    <th scope="col">Last Login</th>
    <th scope="col">Status</th>
    <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sel_users = "select *from users ORDER by 1 DESC";
	$run_users = mysqli_query($con,$sel_users);
	$i=0;
	while($row_users = mysqli_fetch_array($run_users)){
		$user_id = $row_users['user_id'];
		$user_name = $row_users['user_name'];
		$user_email = $row_users['user_email'];
		$user_pass = $row_users['user_pass'];
		$user_gender = $row_users['user_gender'];
		$user_country = $row_users['user_country'];
		$mobile = $row_users['user_mobile'];
		$last_login = $row_users['last_login'];
		$registor_date = $row_users['registor_date'];
		$status = $row_users['status'];
	$i++;
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $user_name;?></td>
      <td><?php echo $user_email; ?></td>
      <td><?php echo $user_country; ?></td>
      <td><?php echo $user_gender; ?></td>
      <td><?php echo $mobile; ?></td>
      <td><?php echo $registor_date; ?></td>
      <td><?php echo $last_login; ?></td>
      <td><?php echo $status; ?></td>
      <td>		        
	  <p><a href="view_user_edit.php?edit=<?php echo $user_id;?>"><img src="img/edit.png" width="15" height="15"/></a> </p>
	  <p><a href="includes/delete_users.php?user_id=<?php echo $user_id;?>"><img src="img/delete.png" width="15" height="15"/></a></p>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
