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
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                        $orderQuery="SELECT * FROM orders WHERE user_id='$userId' AND finshed='yes'";
                        $orderResult=mysqli_query($connection,$orderQuery);
                        $orderRow=mysqli_fetch_assoc($orderResult);
                        if($orderRow != null){
                            while($orderRow=mysqli_fetch_assoc($orderResult)){
                                ?>
                    <tr>
                        <td class="align-middle"><?php 
                            $userId=$orderRow['user_id'] ;
                            $UserNameQuery="SELECT `name` FROM users WHERE id='$userId' ";
                            $UserNameResult=mysqli_query($connection,$UserNameQuery);
                            $UserNameRow=mysqli_fetch_assoc($UserNameResult);
                            echo $UserNameRow['name'];
                        ?></td>
                        <td class="align-middle"><?php echo $orderRow['address'] ?></td>
                        <td class="align-middle"><?php echo $orderRow['total_price'] ?></td>
                        <td class="align-middle"><?php echo $orderRow['order_status'] ?></td>
                        <td class="align-middle"><a class="showBtn" href="index.php?page=finshed_order_details&order_Id=<?php echo $orderRow['id']  ?>">Show Details</a></td>
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
    </div>
</div>
<!-- Cart End -->