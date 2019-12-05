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

    <!-- PORTFOLIO -->
    <section class='portfolio port-wrap margin-bottom-50'>
      <div class='container'> 
        <!-- MAIN HEADING -->
        <div class='heading-block text-center animate fadeInUp' data-wow-delay='0.4s'>
          <h3>Our Verified Cars And Bike ads</h3>
          <div class='divider divider-short divider-center'><img class='i-div' src='images/divider/hammers.png' alt='Divider Icon Image'/></div>
          <a href='buy-sell_form.php'>Post n free ads</a> </div>
        
        <!-- Work Filter -->
        <ul class='tabs portfolio-filter text-center margin-bottom-80 animate fadeInUp' data-wow-delay='0.4s'>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf'>All</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-Car'>Cars</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-Bike'>Bikes</a></li>
          <li class='tab-title filter-item'><a href='#.' data-filter='.pf-branding-Parts'>Spear Parts</a></li>
        </ul>
      </div>
      
      <!-- PORTFOLIO ITEMS -->
      <div class='items row animate fadeInUp' data-wow-delay='0.4s'> 
        <?php
    $get_sell = "select *from sell where status='verify'";
		$run_event = mysqli_query($con,$get_sell);
			while($row_event=mysqli_fetch_array($run_event)){
                $user_id  = $row_event['user_id'];
                $sell_id = $row_event['sell_id'];
                $title = $row_event['title'];
                $des = $row_event['des'];
                $number = $row_event['number'];
                $price = $row_event['price'];
                $topic = $row_event['topic'];
                $date = $row_event['date'];
                $location = $row_event['location'];
                $sell_status = $row_event['status'];
                $sell_pic1 = $row_event['sell_pic1'];

      //now displaying all at once
?>
        <!-- ITEM -->
        <article class='portfolio-item pf pf-branding-<?php echo"$topic";?>'>
          <div class='portfolio-image'><img src='user/buy_sell/<?php echo "$sell_pic1";?>' style="width:476px;height:336px;"> </div>
          <div class='portfolio-overlay'>
            <div class='position-center-center'>
              <h3><a href='buy-sell-single.php?ad_id=<?php echo"$sell_id";?>'><?php echo "$title";?></a></h3>
              <span><a href='buy-sell-single.php?ad_id=<?php echo"$sell_id";?>'><?php echo "Rs $price/-";?></a></span>
            </div>
          </div>
        </article>
<?php
        };
 ?>
      </div>
    </section>

<?php 
include("newtemplate/footer.php");
}
 ?>