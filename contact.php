<?php
session_start();
	include("newtemplate/header.php");
?>

    <!-- Header Image -->
    <section class='contact'>
      <div class='padding-top-90 padding-bottom-90 bg-parallax' style="background-image: url('images/contact/contact-1.png')"></div>
    </section>

    <!-------------BODY------------->

    <!-- Contact Us -->
    <section class='contact'>
      <!-- Contact  -->
      <div class='padding-top-80 padding-bottom-80 bg-parallax' style="background-image: url('images/contact/contact-1.jpg')">
        <div class='container'>
          <div class='row'> 
                    <!-- Main Heading  -->
        <div class='heading-block text-center animate fadeInU' data-wow-delay='0.4s'>
          <h3 class='wt'>Get In Touch</h3>
          <div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
          <span style="color: #fff;">Suport Fast &amp; Pro 24/7</span> </div>
            <!-- Phone Number  -->
            <div class='col-md-4 animate fadeInUp' data-wow-delay='0.4s'>
              <div class='icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-xlarge'>
                <div class='ib-icon'> <i class='fa fa-mobile text-primary'></i> </div>
                <div class='ib-info text-white'>
                  <p>+92 333 2586336</p>
                </div>
              </div>
            </div>
            
            <!-- Address -->
            <div class='col-md-4 animate fadeInUp' data-wow-delay='0.6s'>
              <div class='icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-large'>
                <div class='ib-icon'> <i class='fa fa-map-marker text-primary'></i> </div>
                <div class='ib-info text-white'>
                  <p>Mateen Mall</p>
                  <p>Opt NED Uni</p>
                  <p>Karachi Pakistan</p>
                </div>
              </div>
            </div>
            
            <!-- Email  -->
            <div class='col-md-4 animate fadeInUp' data-wow-delay='0.8s'>
              <div class='icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-large'>
                <div class='ib-icon'> <i class='fa fa-envelope-o text-primary'></i> </div>
                <div class='ib-info'>
                  <p class='no-margin-bottom'><a href='#.' class='text-white'>abdul@nuig.us</a></p>
                </div>
              </div>
            </div>
            
            <!-- Form  -->
            <div class='col-md-12 margin-top-50 animate fadeInUp' data-wow-delay='0.4s'>
              <div class='contact-form'> 
                
                <!-- Success Msg -->
                <div id='contact_message' class='success-msg animated fadeInUp'> <i class='fa fa-paper-plane-o'></i>Thank You. Your Message has been Submitted</div>
                
                <!-- FORM -->
                <form id='contact_form' class='contact-form' action='' method='post'>
                  <ul class='row'>
                    <li class='col-sm-4'>
                      <label>*<span> NAME</span>
                        <input type='text' class='form-control' name='name' id='name' required>
                      </label>
                    </li>
                    <li class='col-sm-4'>
                      <label>* <span>EMAIL</span>
                        <input type='email' class='form-control' name='email' id='email' required>
                      </label>
                    </li>
                    <li class='col-sm-4'>
                      <label>* <span>SUBJECT</span>
                        <input type='text' class='form-control' name='company' id='company' required>
                      </label>
                    </li>
                    <li class='col-sm-12 margin-top-20'>
                      <label> <span>MESSAGE</span>
                        <textarea class='form-control' name='message' id='message' rows='5' required></textarea>
                      </label>
                    </li>
                    <li class='col-sm-12'>
                      <button type='submit' value='submit' id='btn_submit' name='email'>SEND ME</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-------------BODY-END------------>
<?php 
  include("functions/contactform.php");
  include("newtemplate/footer.php");
 ?>