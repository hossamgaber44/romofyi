<?php 
   include('./connection/connected.php');
   session_start();
   if(!isset($_SESSION['user_id'])){
      header("location:./User_auth/userLogin.php");
   }
   $userId =$_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>romofyi</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="./style/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="./style/css/cardStyle.css">
   <link rel="stylesheet" href="./style/css/style.css">
   <link rel="stylesheet" href="./style/css/stylePage.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="./style/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="./style/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="./style/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>
      .dark_white_bg:hover img {
         filter: drop-shadow(2px 4px 16px yellow);
         cursor: pointer;
      }

      .showBtn {
         color: #ffffff;
         text-decoration: none;
         padding: 8px 12px;
         margin: 0px 2px;
         border-radius: 4px;
         background: #183661;
      }

      .showBtn:hover {
         background: #183661c2;
      }
   </style>
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="./style/images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <?php 
        $settingQuery="SELECT * FROM setting WHERE id=1";
        $settingResult=mysqli_query($connection,$settingQuery);
        $settingRow=mysqli_fetch_assoc($settingResult);
    ?>
      <div class="header">
         <div class="header_top d_none1">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <ul class="conta_icon ">
                        <li><a href="<?php echo $settingRow['whatsApp'] ?>"><img src="./style/images/call.png" alt="#" />Call us:
                              <?php echo $settingRow['call_us'] ?></a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <ul class="social_icon">
                        <li> <a href="<?php echo $settingRow['facebook'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i>
                           </a>
                        </li>
                        <li> <a href="/<?php echo $settingRow['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                        <li> <a href="/<?php echo $settingRow['linkedin'] ?>"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li> <a href="/<?php echo $settingRow['instagram'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i>
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <div class="se_fonr1">
                        <div class="select-box">
                           <a href="./User_auth/logout.php" class="select-box1" style="padding: 6px 16px;" >logOut
                           </a>
                        </div>
                        <span class="time_o"> Open hour: <?php echo $settingRow['Open_hour'] ?> -
                           <?php echo $settingRow['close_hour'] ?></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header_midil">
            <div class="container">
               <div class="row d_flex">
                  <div class="col-md-4">
                     <ul class="conta_icon d_none1">
                        <li><a href="#"><img src="./style/images/email.png"
                                 alt="#" /><?php echo $settingRow['email'] ?></a> </li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <a class="logo" href="#"><img src="./style/images/logo.png" alt="#" /></a>
                  </div>
                  <div class="col-md-4">
                     <!-- start php code  -->
                     <?php
                        $query="SELECT id FROM orders WHERE user_id='$userId' AND finshed='no'";
                        $result=mysqli_query($connection,$query);
                        $row=mysqli_fetch_assoc($result);
                        if($row != null){
                           // في حاله ان فيه سله مشتريات
                           $orderId=$row['id'];
                           // get count of product
                           $productCountQuery=" SELECT COUNT('id') as product_count FROM `order_details` WHERE order_id='$orderId' ";
                           $productCountResult=mysqli_query($connection,$productCountQuery);
                           $productCountRow=mysqli_fetch_assoc($productCountResult);

                           if($productCountRow != null){
                                 // update the qty
                                 $productCount=$productCountRow['product_count'];
                                 
                                 if($productCount >0){
                                    // start html
                                    ?>
                     <ul class="right_icon d_none1">
                        <li><a href="index.php?page=order_details"><img src="./style/images/shopping.png" alt="#" />
                              <span> <?php echo $productCount ?> </span> </a> </li>
                        <a href="index.php?page=order_details" class="order">Order Now</a>
                     </ul>
                     <?php
                                    // end html
                                 }else{
                                    // start html
                                    ?>
                     <ul class="right_icon d_none1">
                        <li><a href="index.php?page=order_details"><img src="./style/images/shopping.png" alt="#" /></a>
                        </li>
                        <a href="index.php?page=order_details" class="order">Order Now</a>
                     </ul>
                     <?php
                                    // end html
                                 }

                           }else{
                           }

                        }else{
                        }
                     ?>
                     <!-- end php code -->
                     <!--  -->
                  </div>
               </div>
            </div>
         </div>
         <div class="header_bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                           data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                           aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item ">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=products">Products</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=orders">Orders</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=contact">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-4">
                     <div class="search">
                        <form action="index.php?page=products">
                           <input class="form_sea" type="hidden" placeholder="Search" value="products" name="page">
                           <?php 
                              @$searchContent=$_GET['search'];
                              if(!empty($searchContent)){
                                 ?>
                                    <input class="form_sea" value="<?php echo $searchContent ?>" type="text" placeholder="Search" name="search">
                                 <?php
                              }else{
                                 ?>
                                    <input class="form_sea" type="text" placeholder="Search" name="search">
                                 <?php
                              }
                              ?>
                           <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->