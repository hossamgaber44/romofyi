<?php
// session_start();
// include('../../connection/connected.php');
@$productId =$_GET['productId'];
if(!isset($_SESSION['user_id'])){
    header("location:../../User_auth/userLogin.php");
}
$userId=$_SESSION['user_id'];

if(isset($productId)){
    echo '<h1>'.$productId.'</h1>';
     // get product price
     $productQuery="SELECT price FROM products WHERE id='$productId' ";
     $productResult=mysqli_query($connection,$productQuery);
     $productRow=mysqli_fetch_assoc($productResult);
     $productPrice=$productRow['price'];
     echo 'product price' . $productRow['price'] ;
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
            // update the qty
            $productQty=$productQtyRow['quantity'];
            $newQty=$productQty+1;
            $productQuery=" UPDATE `order_details` SET `quantity`='$newQty' WHERE order_id ='$orderId' AND product_id='$productId' ";
            $productResult=mysqli_query($connection,$productQuery);
            echo 'PRODUCT qty'.$newQty;
        }else{
            // add product to card
            $productQuery="INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `unit_price`) VALUES ($orderId,'$productId','1','$productPrice') ";
            $productResult=mysqli_query($connection,$productQuery);
            echo 'PRODUCT ADDED';
        }
        
    }else{
        // في حاله ان مفيش سله مشتريات
        // create order
        $addOrderQuery="INSERT INTO `orders`(`user_id`) VALUES ('$userId')";
        $addOrderResult=mysqli_query($connection,$addOrderQuery);
        // get last order id 
        $getOrderQuery="SELECT id FROM orders WHERE user_id='$userId' AND finshed='no'";
        $getOrderResult=mysqli_query($connection,$getOrderQuery);
        $getOrderRow=mysqli_fetch_assoc($getOrderResult);
        if($getOrderRow != null){
            $getOrderId=$getOrderRow['id'];
            // add product to card
            $productQuery="INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `unit_price`) VALUES ($getOrderId,'$productId','1','$productPrice') ";
            $productResult=mysqli_query($connection,$productQuery);
            echo 'order added';
        }
    }
}
@$redirectPage =$_GET['redirect'];
if($redirectPage == 'order_details'){
    // header("location:/index.php?page=order_details");
    echo "<script>
    window.location.href='index.php?page=$redirectPage';
    </script>";
}
echo "<script>
window.location.href='index.php?page=product_details&id=$productId';
</script>";
?>