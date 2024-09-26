<?php
// session_start();
// include('../connection/connected.php');
if(!isset($_SESSION['user_id'])){
    header("location:../../User_auth/userLogin.php");
}
$userId=$_SESSION['user_id'];
?>

<!-- start get product data -->
<?php 
@$productId=$_GET['id'];
if(isset($productId)){
    $product_details_query="SELECT * FROM products WHERE id='$productId'";
    $product_details_result=mysqli_query($connection ,$product_details_query);
    $product_details=mysqli_fetch_assoc($product_details_result);
?>

<!-- end get product data -->

<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="titlepage mt-5 mb-2">
        <h2>Featured Products........................................</h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="./uploads/<?php echo $product_details['img'] ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>Product Name: <?php echo $product_details['product_name'] ?> </h3>
                <h3 class="font-weight-semi-bold mb-4">Price: $<?php echo $product_details['price'] ?></h3>
                <p class="mb-4"><?php echo $product_details['small_desc'] ?></p>
                <div class="d-flex align-items-center mb-4 pt-2">
            <!-- start card code -->
            <?php
            @$productId =$product_details['id'];
            if(isset($productId)){
                // echo '<h1>'.$productId.'</h1>';
                //  get order where finshed=no
                $query="SELECT id FROM orders WHERE user_id='$userId' AND finshed='no'";
                $result=mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($result);
                if($row != null){
                    // في حاله ان فيه سله مشتريات
                    $orderId=$row['id'];
                    // check the product in the card or not
                    $productQtyQuery="SELECT quantity FROM order_details WHERE order_id ='$orderId' AND product_id='$productId'";
                    $productQtyResult=mysqli_query($connection,$productQtyQuery);
                    $productQtyRow=mysqli_fetch_assoc($productQtyResult);
                    if($productQtyRow != null){
                        // get the qty
                        $productQty=$productQtyRow['quantity'];
                        // start html
                        ?>
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <a href="index.php?page=card/decrease_card&redirect=product_details&productId=<?php echo $product_details['id'] ?>" class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" disabled value="<?php echo $productQty ?>">
                            <div class="input-group-btn">
                                <a  href="index.php?page=card/addToCard&redirect=product_details&productId=<?php echo $product_details['id'] ?>" class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                        // end html
                    }else{
                        ?>
                        <a href="index.php?page=card/addToCard&productId=<?php echo $product_details['id'] ?>"
                            class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                        <?php
                        }
                        }else{
                    ?>
                        <a href="index.php?page=card/addToCard&redirect=product_details&productId=<?php echo $product_details['id'] ?>"
                            class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                        <!-- <a href="card/addToCard.php?productId=<?php echo $product_details['id'] ?>">add to card</a> -->
                        <?php
                        }
                    }
                    ?>
                    <!-- end card code -->

                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <!-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?php echo $product_details['productDescription'] ?></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p><?php echo $product_details['information'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end php  -->
<?php
}
?>
<!-- Shop Detail End -->
