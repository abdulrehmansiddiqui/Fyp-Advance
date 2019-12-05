<?php
			if(isset($_POST['email'])){
        $name = addslashes(mysqli_real_escape_string($con,$_POST['name']));
        $email = addslashes(mysqli_real_escape_string($con,$_POST['email']));
        $company = mysqli_real_escape_string($con,$_POST['company']);
        $message = mysqli_real_escape_string($con,$_POST['message']);
        
        $insert = "insert into contact (name,email,subject,message,date) values ('$name','$email','$company','$message',NOW())";
      
        $run_insert = mysqli_query($con,$insert);
          if($run_insert){
          echo "<h2>POSTED Successful</h2>";
    
          $update ="update users set posts='yes' where user_id='$user_id'";
          $run_update = mysqli_query($con,$update);
          
		    	echo "<script>window.open('contact.php','_self')</script>";
          }
          else{ echo "<script>alert('error');</script>";}
        }
?>