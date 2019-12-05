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
	
<div class="container margin-bottom-50">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    	<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="text" name="u_title" placeholder="Title*" required />
			</div>
        </div>
    	<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="text" name="u_des" placeholder="Add Description*" required />
			</div>      
        </div>
    	<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="number" name="u_num" placeholder="Number*" required />
			</div>
        </div>
    	<div class="col-lg-3">
			<select class="form-control" name="u_topic" required>
				<option value="" style="display:none">Select Type*</option>
				<option value="Car">Car</option>
				<option value="Bike">Bike</option>
				<option value="Parts">Parts</option>
				<?php ?>
			</select>
        </div>
    	<div class="col-lg-3">
			<select class="form-control" name="u_model" required>
				<option value="" style="display:none">Select model*</option>
				<option value="2002">2002</option>
				<option value="2003">2003</option>
				<option value="2004">2004</option>
				<option value="2005">2005</option>
				<option value="2006">2006</option>
				<option value="2007">2007</option>
				<option value="2008">2008</option>
				<option value="2009">2009</option>
				<option value="2010">2010</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<?php ?>
			</select>
        </div>
    	<div class="col-lg-6">
			<div class="form-group">
				<input class="form-control" type="text" name="u_location" placeholder="Location*" required />
			</div>
        </div>
    	<div class="col-lg-12 ">
			<h4>Automobile Picture</h4>
    	</div>
		<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file1" required />
			</div>
        </div>
    	<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file2"  />
			</div>
        </div>
    	<div class="col-lg-4">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file3" required />
			</div>
        </div>
    	<div class="col-lg-12">
		<h4>Automobile Papers picture only</h4>
        </div>
    	<div class="col-lg-3">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file4" />
			</div>
        </div>
    	<div class="col-lg-3">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file5" />
			</div>
        </div>
    	<div class="col-lg-3">
			<div class="form-group">
				<input class="form-control" type="file" name="u_file6" />
			</div>
        </div>
    	<div class="col-lg-3">
			<div class="form-group">
				<input class="form-control" type="number" name="u_price" placeholder="Price*" required />
			</div>
        </div>
    </div>
	<button name="reply" class="btn btn-block">Post Now</button>
</form>
		<?php

		if(isset($_POST['reply'])){
			$title = $_POST['u_title'];
			$des = $_POST['u_des'];
			$topic = $_POST['u_topic'];
			$model = $_POST['u_model'];
			$num = $_POST['u_num'];
			$price = $_POST['u_price'];
			$location = $_POST['u_location'];
			$status = "unverified";

			$file1 = $_FILES['u_file1']['name'];
			$image_tmp1 = $_FILES['u_file1']['tmp_name'];
			move_uploaded_file($image_tmp1,"user/buy_sell/$file1");

			$file2 = $_FILES['u_file2']['name'];
			$image_tmp2 = $_FILES['u_file2']['tmp_name'];
			move_uploaded_file($image_tmp2,"user/buy_sell/$file2");

			$file3 = $_FILES['u_file3']['name'];
			$image_tmp3 = $_FILES['u_file3']['tmp_name'];
			move_uploaded_file($image_tmp3,"user/buy_sell/$file3");

			$file4 = $_FILES['u_file4']['name'];
			$image_tmp4 = $_FILES['u_file4']['tmp_name'];
			move_uploaded_file($image_tmp4,"user/buy_sell/$file4");

			$file5 = $_FILES['u_file5']['name'];
			$image_tmp5 = $_FILES['u_file5']['tmp_name'];
			move_uploaded_file($image_tmp5,"user/buy_sell/$file5");

			$file6 = $_FILES['u_file6']['name'];
			$image_tmp6 = $_FILES['u_file6']['tmp_name'];
			move_uploaded_file($image_tmp6,"user/buy_sell/$file6");
			
			$insert = "insert into sell (user_id,title,des,number,topic,model,location,price,date,sell_pic1,sell_pic2,sell_pic3, sell_pic4,sell_pic5,sell_pic6,status) values ('$main_id','$title','$des','$num','$topic','$model','$location','$price',NOW(),'$file1','$file2','$file3','$file4','$file5','$file6','$status')";
			$run = mysqli_query($con,$insert);
			if($run){
			echo "<h3>Add Is Successful Posted </h3>";
			}
			else{
				echo "<h3>QUERY ERROR! Contact with system support  </h3>";
			}
		}
		?>
</div>
<?php 
}
include("newtemplate/footer.php");
 ?>