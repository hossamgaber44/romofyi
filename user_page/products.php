<div class="blue_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- project section -->
<div id="project" class="project">
    <div class="container">

        <div class="row">
            <div class="product_main">

                <?php
                @$CategoryId=$_GET['cat'];
                @$searchContent=$_GET['search'];
                if(!empty($CategoryId)){
                    $getAllProductQuery="SELECT * FROM products WHERE category_id='$CategoryId' AND Status='Active'  ";
                }elseif(!empty($searchContent)){
                    $getAllProductQuery="SELECT * FROM products WHERE product_name LIKE '%$searchContent%' AND Status='Active'";
                }else{
                    $getAllProductQuery="SELECT * FROM products WHERE Status='Active'";
                }
                $getAllProductResult= mysqli_query($connection,$getAllProductQuery);
                while($getAllProductRow=mysqli_fetch_assoc($getAllProductResult)){
                ?>
                <div class="project_box" style="min-width: 197px;" >
                    <a href="index.php?page=product_details&id=<?php echo $getAllProductRow['id'] ?>" class="dark_white_bg"><img src="./uploads/<?php echo $getAllProductRow['img'] ?>" alt="#" /></a>
                    <h3><?php echo $getAllProductRow['product_name'] ?> $<?php echo $getAllProductRow['price'] ?></h3>
                </div>
                <?php }?>

                <div class="col-md-12">
                    <!-- <a class="read_more" href="#">See More</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end project section -->