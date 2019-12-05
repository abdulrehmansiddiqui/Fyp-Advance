<div class="col-md-12 ">
	
<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">Topic Title</th>
    <th scope="col">Edit</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  	<?php
	$sel_topic = "select *from topicss";
	$run_topic = mysqli_query($con,$sel_topic);
	$i=0;
	while($row_topic = mysqli_fetch_array($run_topic)){
		$topic_id = $row_topic['topic_id'];
		$topic_title = $row_topic['topic_title'];
	$i++;
	
	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $topic_title;?></td>
      <td><a href="index.php?view_topic&edit=<?php echo $topic_id;?>"><img src="img/edit.png" width="15" height="15"/></a> </td>
      <td><a href="includes/delete_topic.php?topic_id=<?php echo $topic_id;?>"><img src="img/delete.png" width="15" height="15"/></a>   
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>
Add a new topic ? <a href="index.php?view_topic&add"><img src="img/add.png" width="15" height="15"/></a>
	<?php 
	
	////////////////////////////////For Adding New Topics
	if(isset($_GET['add'])){
		echo"
		<form action='' method='post'><br>
				<strong>Add New Topic: </strong>
				<input type='text'  name='n_topic' required='required'/><br><br>
				<input type='submit' name='insert' value='insert' class='btn btn-danger' />
		</form>
		";
		if(isset($_POST['insert'])){
		$n_topic = $_POST['n_topic'];
		
		$insert = "insert into topicss (topic_title) values ('$n_topic')";
		$run_insert = mysqli_query($con,$insert);
		if($run_insert){
			echo "<script>alert('You Successfully Updated New Topic!')</script>";
			echo "<script>window.open('index.php?view_topic&add' ,'_self')</script>";
		}
		
		}
	}
	
	////////////////////////////////For Editing the topics
	if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
		  
	$sel_topics = "select *from topicss where topic_id=$edit_id";
	$run_topics = mysqli_query($con,$sel_topics);
	$row_topics = mysqli_fetch_array($run_topics);
		$topic_title = $row_topics['topic_title'];
		
		echo "
		
<div class='col-md-4 bgw emptyall'>
		<h2>Edit Topic</h2>
			<form action='' method='post'><br>
				<strong>Edit Topic: </strong>
				<input type='text'  name='u_topic' required='required' value='$topic_title '/><br><br>
				<input type='submit' name='update' value='update' class='btn btn-danger' />
			</form>
</div>
			
		";
		if(isset($_POST['update'])){
		$u_topic = $_POST['u_topic'];
		
		$update = "update topicss set topic_title='$u_topic' where topic_id='$topic_id'";
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Successfully Updated!')</script>";
			echo "<script>window.open('index.php?view_topic&edit=$topic_id' ,'_self')</script>";
		}
		
		}
	  }
	?>

</div>