
  <!-- Footer -->
  <footer id="footer">
    <div class="footer-wrapper"> 
      
      <!-- Footer Top -->
      <div class="footer-top">
        <div class="footer-top-wrapper">
          <div class="container">
            <div class="row"> 
              <!-- About Block -->
              <div class="col-md-3">
                <div class="block block-about">
                  <h3 class="block-title no-underline"><span class="text-primary"><?php echo $main_name ?></span></h3>
                  <div class="block-content">
                    <?php 
                      if($main_image == ''){ echo "<img class='footer-logo' src='images/logo.png' alt='' />";}
                      else{echo "<a href='user_profile.php?u_id=$main_id'><img src='user/user_images/$main_image' alt='' widht='100px' height='100px'/></a>"; }
                    ?>

                     </div>
                </div>
              </div>
              <!-- End About Block --> 
              <!-- Footer Links Block -->
              <div class="col-md-3">
                <div class="block block-links">
                  <h3 class="block-title"><span>Detail</span></h3>
                  <div class="block-content">
                    <ul>
                      <li><?php echo $main_email ?></li>
                      <li><?php echo $main_country ?></li>
                      <li><?php echo $main_mobile ?></li>
                      <li><?php echo $main_reg ?></li>
                      <li><?php echo $main_last ?></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End Footer Links Block --> 

              <!-- user Links Block -->
              <div class="col-md-3">
                <div class="block block-links">
                  <h3 class="block-title"><span>Menu</span></h3>
                  <div class="block-content">
                    <ul>
                      <li><a href="my_posts.php?u_id=<?php echo $main_id?>">My Posts</a></li>
                      <li><a href="my_events.php?u_id=<?php echo $main_id?>">My Events</a></li>
                      <li><a href="inbox.php?u_id=<?php echo $main_id?>">Messages</a></li>
                      <li><a href="edit_profile.php?u_id=<?php echo $main_id?>">Edit Your Profile</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- End user Widget Block --> 
              
              <!-- About Widget Block -->
              <div class="col-md-3">
                <div class="block block-instagram-widget">
                  <h3 class="block-title"><span>About</span></h3>
                  <p style=" text-align: justify;">This is an online application that gathers information about all Sport Bike, Car and events being organized at one place. This System will provide us about all selling of sport bike, cars and spear parts and also allow us to create event for auto show and other type.

                  </p>
                </div>
              </div>
              <!-- End About Widget Block --> 
              
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Top --> 
      
      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="footer-bottom-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-md-6 copyright">
                <p>&copy; 2018 - 2019 Frantic designed by Abdul Rehman.</p>
              </div>
              <div class="col-md-6 social-links">
                <ul class="right">
                  <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#."><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#."><i class="fa fa-behance"></i></a></li>
                  <li><a href="#."><i class="fa fa-pinterest"></i></a></li>
                  <li><a href="#."><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Footer Bottom --> 
    </div>
  </footer>
  <!-- End Footer --> 
  
  <!-- GO TO TOP --> 
  	<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="js/vendors/jquery/jquery.min.js"></script> 
<script src="js/vendors/wow.min.js"></script> 
<script src="js/vendors/bootstrap.min.js"></script> 
<script src="js/vendors/own-menu.js"></script> 
<script src="js/vendors/flexslider/jquery.flexslider-min.js"></script> 
<script src="js/vendors/jquery.countTo.js"></script> 
<script src="js/vendors/jquery.isotope.min.js"></script> 
<script src="js/vendors/jquery.bxslider.min.js"></script> 
<script src="js/vendors/owl.carousel.min.js"></script> 
<script src="js/vendors/jquery.sticky.js"></script> 
<script src="js/vendors/color-switcher.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="js/zap.js"></script>
</body>
</html>