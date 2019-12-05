<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">Author</th>
    <th scope="col">Post title</th>
    <th scope="col">Comments</th>
    <th scope="col">Date</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  	<?php
	$sel_comm = "select *from comments ORDER by 1 DESC";
	$run_comm = mysqli_query($con,$sel_comm);
	$i=0;
	while($row_comm = mysqli_fetch_array($run_comm)){
		$comment_id = $row_comm['comment_id'];
		$post_id = $row_comm['post_id'];
		$user_id = $row_comm['user_id'];
		$comment = $row_comm['comment'];
		$comment_author = $row_comm['comment_author'];
		$date = $row_comm['date'];
	$i++;
	
	$sel_posts = "select *from posts where post_id=$post_id ";
	$run_posts = mysqli_query($con,$sel_posts);
	$row_posts = mysqli_fetch_array($run_posts);
		$user_title = $row_posts['user_title'];
	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $comment_author;?></td>
      <td><?php echo $user_title; ?></td>
      <td><?php echo $comment; ?></td>
      <td><?php echo $date; ?></td>
      <td>		        
	  <center>     
	  <a href="includes/delete_comment.php?comment_id=<?php echo $comment_id;?>"><img src="img/delete.png" width="15" height="15"/></a>   
	  </center>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>