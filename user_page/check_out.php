    <!-- Checkout Start -->
    <?php 
     $orderQuery="SELECT id FROM orders WHERE user_id='$userId' AND finshed='no'";
     $orderResult=mysqli_query($connection,$orderQuery);
     $orderRow=mysqli_fetch_assoc($orderResult);
     if($orderRow != null){
         // في حاله ان فيه سله مشتريات
         $orderId=$orderRow['id'];
         // get count of product
         $productCountQuery=" SELECT * FROM `order_details` WHERE order_id='$orderId' ";
         $productCountResult=mysqli_query($connection,$productCountQuery);
         $total_price=0;
     ?>
    <div class="container-fluid mt-3">
        <form class="row px-xl-5" method="POST" action="<?php __DIR__ ?>" >
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                        Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <?php 
                    @$first_name =$_POST['first_name'];
                    @$last_name =$_POST['last_name'];
                    @$email =$_POST['email'];
                    @$phone =$_POST['phone'];
                    @$first_address =$_POST['first_address'];
                    @$second_address =$_POST['second_address'];
                    @$city =$_POST['city'];
                    @$place_order =$_POST['place_order'];
                    @$total_price_input =$_POST['total_price'];
                    @$errormsg=['first_name'=>'','last_name'=>'','email'=>'','phone'=>'','first_address'=>'','city'=>''];
                    if(isset($place_order)){
                        if(empty($first_name)){
                            $errormsg['first_name']='the first_name is required...';
                        }
                        if(empty($last_name)){
                            $errormsg['last_name']='the last_name is required...';
                        }
                        if(empty($email)){
                            $errormsg['email']='the email is required...';
                        }
                        if(empty($phone)){
                            $errormsg['phone']='the phone is required...';
                        }
                        if(empty($first_address)){
                            $errormsg['first_address']='the first_address is required...';
                        }
                        if(empty($city)){
                            $errormsg['city']='the city is required...';
                        }else{
                            @$updateOrderQuery="UPDATE `orders` SET `address`='$first_address',`finshed`='yes',`total_price`=$total_price_input WHERE id='$orderId' ";
                            @$updateOrderResult=mysqli_query($connection ,$updateOrderQuery);
                            @$addClientQuery="INSERT INTO `client`(`oreder_id`, `name`, `phone`, `email`, `city`, `first_address`, `second_address`) VALUES ('$orderId','$first_name $last_name','$phone','$email','$city','$first_address','$second_address')";
                            @$addClientResult=mysqli_query($connection ,$addClientQuery);
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['first_name'] ?></span></label>
                            <input class="form-control" name="first_name" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['last_name'] ?></span></label> </label> 
                            <input class="form-control" name="last_name" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['email'] ?></span></label> </label>
                            <input class="form-control" name="email" type="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['phone'] ?></span></label> </label>
                            <input class="form-control" name="phone" type="number" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1 <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['first_address'] ?></span></label> </label>
                            <input class="form-control" name="first_address" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2 <span style="margin-left: 12px;font-size: 12px;" class="error_message"></span></label> </label>
                            <input class="form-control" name="second_address" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City <span style="margin-left: 12px;font-size: 12px;" class="error_message"><?php echo $errormsg['city'] ?></span></label> </label>
                            <input class="form-control" name="city" type="text" placeholder="New York">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                        Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php 
                            while($productCountRow=mysqli_fetch_assoc($productCountResult)){
                                $total_price+=$productCountRow['unit_price']*$productCountRow['quantity'];
                        ?>
                        <div class="d-flex justify-content-between">
                            <p>
                                <?php
                                    @$productId=$productCountRow['product_id'];
                                    @$getProductDetailsQuery="SELECT id,product_name FROM products WHERE id='$productId'";
                                    @$getProductDetailsResult=mysqli_query($connection ,$getProductDetailsQuery);
                                    @$getProductDetailsRow=mysqli_fetch_assoc($getProductDetailsResult);
                                    echo $getProductDetailsRow['product_name'];
                                ?>
                            </p>
                            <p>
                                $<?php echo $productCountRow['unit_price']; ?>
                                <?php 
                                if($productCountRow['quantity'] > 1){
                                    ?>
                                <sup style="color:red;"> x<?php echo $productCountRow['quantity'] ?></sup>
                                <?php
                                }else{
                                    ?>
                                <sup style="color:red;display: inline-block;width: 5px;"></sup>
                                <?php
                                }
                                ?>
                            </p>

                        </div>
                        <?php }}else{
                            echo "<script>
                            window.location.href='index.php';
                            </script>";
                            // header("location: index.php");
                        } ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <input type="hidden" value="<?php echo $total_price+10 ?>" name="total_price">
                            <h6>$<?php echo $total_price ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?php echo $total_price+10 ?></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <button name="place_order" class="btn btn-block btn-primary font-weight-bold py-3">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->