<?php
session_start();

if(!isset($_SESSION['user_email'])){
  header("location: index.php");
}
else {
  include("newtemplate/header.php");
?>
<link rel="stylesheet" href="css/linkeffect.css">

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 margin-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>

    <!-- PORTFOLIO -->
    <section class='portfolio port-wrap'>
      <div class='container'> 
        <!-- MAIN HEADING -->
        <div class='heading-block text-center animate fadeInUp' data-wow-delay='0.4s'>
        <h3>Discussions Area</h3>
          <div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
          <a href='' class='cd-modal-trigger'>Create an post</a> </div>
        
        <!-- Work Filter -->
        <ul class='tabs portfolio-filter text-center margin-bottom-80 animate fadeInUp' data-wow-delay='0.4s'>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf'>All</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design1'>Car Auto Show</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design2'>Bike Auto Show</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design3'>Spear Parts</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design4'>Management</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-design5'>Other</a></li>
        </ul>
      </div>
      
      <!-- PORTFOLIO ITEMS -->
      <div class="container">
      <div class='items row animate fadeInUp' data-wow-delay='0.4s'> 
        <?php
        global $con;
        $get_posts = "select * from posts ORDER by 1 DESC";
        $run_posts = mysqli_query($con,$get_posts);
        
        while($row_posts=mysqli_fetch_array($run_posts)){
            $post_id = $row_posts['post_id'];
            $user_id  = $row_posts['user_id'];
            $user_title  = $row_posts['user_title'];
            $user_msg  = $row_posts['user_msg'];
            $user_topic  = $row_posts['user_topic'];
            $post_date  = $row_posts['post_date'];

		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id' AND posts='yes'";
		
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
      //now displaying all at once
?>

<article class='col-lg-3 portfolio-item pf pf-branding-design<?php echo"$user_topic";?>  margin-bottom-80 '>
  <div class="icon-box ib-center ib-text-alt ib-bordered ib-bordered-light ib-medium ib-circle border-bottom-1 border-light">
    <div class="ib-icon"> <img class="rounded-circle" src="user/user_images/<?php echo $user_image?>" alt="<?php echo $user_name?>" height="90" weight="90" style="margin-top:-8px;" /> </div>
      <div class="ib-info">
        <h4 class="h6"><?php echo "$user_title";?></h4>
        <p><?php echo "$user_msg";?></p>
        <p>Date: <a><?php echo "$post_date";?></a></p>
        <a href='single.php?post_id=<?php echo $post_id ?>' class='btn btn-success'>Comments</a>
      </div>
  </div>
</article>

<?php
  };
 ?>
      </div>
      </div>
    </section>


    

<div class="cd-modal">
	<div class="modal-contents">
      <div class='container'> 
  		<h1 style="color:#fff;">Create an post</h1>
      <form action="" method="post" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
			<label for="inputEmail4">Title</label>
      <input type="text" class="form-control" name="u_title" placeholder="Title" required="required">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Type</label>
				<select class="form-control" name="u_topic" required="required">
					<option value="" style="display:none">Select Topic*</option>
					<?php 
		global $con;
	$get_topicss = "select * from topicss";
	$run_topicss = mysqli_query($con,$get_topicss);
		
		while($row=mysqli_fetch_array($run_topicss)){
			$topic_id = $row['topic_id'];
			$topic_title = $row['topic_title'];
		echo "<option value='$topic_id'>$topic_title</a></option>";
		}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Description</label>
			<input type="text" class="form-control" name="u_msg" placeholder="Description" />
		</div>

			<button name="posted" class="btn btn-success btn-block">Update</button>
		</form>
<?php
			if(isset($_POST['posted'])){
        $title = addslashes(mysqli_real_escape_string($con,$_POST['u_title']));
        $msg = addslashes(mysqli_real_escape_string($con,$_POST['u_msg']));
        $topic = mysqli_real_escape_string($con,$_POST['u_topic']);
        
        $insert = "insert into posts (user_id,user_title,user_msg,user_topic,post_date) values ('$main_id','$title','$msg','$topic',NOW())";
      
        $run_insert = mysqli_query($con,$insert);
          if($run_insert){
          echo "<h2>POSTED Successful</h2>";
    
          $update ="update users set posts='yes' where user_id='$user_id'";
          $run_update = mysqli_query($con,$update);
          
		    	echo "<script>window.open('discussions.php','_self')</script>";
          }
          else{ echo "<script>alert('error');</script>";}
        }
?>

  
	  </div>
	</div>
	<a href="#0" class="modal-close">Close</a>
</div>

<div class="cd-transition-layer"> 
	<div class="bg-layer"></div>
</div> 

<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> 

<?php 
include("newtemplate/footer.php");
}
 ?>