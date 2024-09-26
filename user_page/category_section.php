<div class="six_box">
    <div class="container-fluid">
        <div class="row">
            <?php 
            $query="SELECT * FROM categories WHERE Status='Active'";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-2 col-sm-4 pa_left">
                <div class="six_probpx yellow_bg">
                    <i ><img src="./uploads/cat/<?php echo $row['img'] ?>" alt="#" /></i>
                    <a href="index.php?page=products&cat=<?php echo $row['id'] ?>" ><?php echo $row['CategoryName'] ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>