<div id="project" class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product_main" >
                <?php 
                $query="SELECT * FROM products WHERE Status='Active' LIMIT 10 ";
                $result=mysqli_query($connection ,$query);
                while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="project_box" style="min-width: 197px;" >
                    <a href="index.php?page=product_details&id=<?php echo $row['id'] ?>" class="dark_white_bg"><img src="./uploads/<?php echo $row['img'] ?>" alt="#" /></a>
                    <h3><?php echo $row['product_name'] ?> $<?php echo $row['price'] ?></h3>
                    <!-- <h3>Short Openwork Cardigan hidden</h3> -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>