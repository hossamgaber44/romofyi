
<!-- banner -->
<section class="banner_main">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="text-bg">
               <h1> <span class="blodark"> Romofyi </span> <br>Trands 2019</h1>
               <p>A huge fashion collection for ever </p>
               <a class="read_more" href="index.php?page=products">Shop now</a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="ban_img">
               <figure><img src="./style/images/ban_img.png" alt="#" /></figure>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end banner -->
<!-- project section -->
<?php
      // start category_section
      include('./user_page/category_section.php');
      // end category_section
      
      // start product_section
      include('./user_page/product_section.php');
      // end product_section
      
   ?>
<!-- end project section -->
<!-- fashion section -->
<div class="fashion">
   <img src="./style/images/fashion.jpg" alt="#" />
</div>
<!-- end fashion section -->
<!-- news section -->
<div class="news">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Letest News</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="./style/images/news_img1.jpg"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="./style/images/news_img2.jpg"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12 margin_top40">
            <div class="row d_flex">
               <div class="col-md-5">
                  <div class="news_img">
                     <figure><img src="./style/images/news_img3.jpg"></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="news_text">
                     <h3>Specimen book. It has survived not only five</h3>
                     <span>7 July 2019</span>
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end news section -->
<!-- newslatter section -->
<div class="newslatter">
   <div class="container">
      <div class="row d_flex">
         <div class="col-md-5">
            <h3 class="neslatter">Subscribe To The Newsletter</h3>
         </div>
         <div class="col-md-7">
            <?php 
            @$subscribeEmail=$_POST['email'];
            @$subscribeSumbit=$_POST['subscribeSumbit'];
            @$errormsg=['email'=>''];
            if(isset($subscribeSumbit)){
               if(empty($subscribeEmail)){
                  $errormsg['email']="please enter the email";
               }else{
                  @$SubscribeQuery="INSERT INTO `newsletters`(`email`,`user_id`) VALUES ('$subscribeEmail','$userId ')";
                  $SubscribeResult=mysqli_query($connection,$SubscribeQuery);
               }
            }

            ?>
            <form class="news_form" method="POST" action="<?php __DIR__ ?>">
               <span class="error_message mr-5"><?php echo $errormsg['email'] ?></span>
               <input class="letter_form" placeholder=" Enter your email" type="text" name="email">
               <button name="subscribeSumbit" class="sumbit mt-3">Subscribe</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- end newslatter section -->
<!-- three_box section -->
<div class="three_box">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="./style/images/icon_mony.png"></i>
               <span>Money Back</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="./style/images/icon_gift.png"></i>
               <span>Special Gift</span>
            </div>
         </div>
         <div class="col-md-4">
            <div class="gift_box">
               <i><img src="./style/images/icon_car.png"></i>
               <span>Free Shipping</span>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end three_box section -->