<?php 
//    include('../connection/connected.php');
//    session_start();
   if(!isset($_SESSION['user_id'])){
      header("location:./User_auth/userLogin.php");
   }
   $userId =$_SESSION['user_id'];
?>

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5 mt-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
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
                            while($productCountRow=mysqli_fetch_assoc($productCountResult)){
                                $total_price+=$productCountRow['unit_price']*$productCountRow['quantity'];
                                ?>
                    <tr>
                        <?php
                        @$productId=$productCountRow['product_id'];
                        @$getProductDetailsQuery="SELECT id,product_name,img FROM products WHERE id='$productId'";
                        @$getProductDetailsResult=mysqli_query($connection ,$getProductDetailsQuery);
                        @$getProductDetailsRow=mysqli_fetch_assoc($getProductDetailsResult);
                        ?>
                        <td class="align-middle"><img src="./uploads/<?php echo $getProductDetailsRow['img'] ?>" alt=""
                                style="width: 50px;" class="mr-2" ><?php echo $getProductDetailsRow['product_name'] ?></td>
                        <td class="align-middle"><?php echo $productCountRow['unit_price'] ?></td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="index.php?page=card/decrease_card&redirect=order_details&productId=<?php echo $productCountRow['product_id'] ?>"
                                        class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <input disabled type="text"
                                    class="form-control form-control-sm bg-secondary border-0 text-center"
                                    value="<?php echo $productCountRow['quantity'] ?>">
                                <div class="input-group-btn">
                                    <a href="index.php?page=card/addToCard&redirect=order_details&productId=<?php echo $productCountRow['product_id'] ?>"
                                        class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <?php echo $productCountRow['unit_price']*$productCountRow['quantity'] ?></td>
                        <td class="align-middle"><a
                                href="index.php?page=card/remove_card&redirect=order_details&productId=<?php echo $productCountRow['product_id'] ?>"
                                class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php 
                            }   
                        }else{
                            echo "<script>
                            window.location.href='index.php';
                            </script>";
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                    Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$<?php echo $total_price ?> </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10 </h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$<?php echo $total_price+10 ?></h5>
                    </div>
                    <a href="index.php?page=check_out" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->