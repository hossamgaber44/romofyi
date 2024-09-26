<div class="app-content">
    <?php 
        @$id =$_GET['id'];
        if(isset($id)){
            @$getProductQuery="SELECT * FROM products WHERE id='$id' ";
            @$getProduct=mysqli_query($connection,$getProductQuery);
            @$query ="DELETE FROM products WHERE id='$id'";
            @$delete=mysqli_query($connection,$query);
            if(isset($delete)){
                if(mysqli_num_rows($getProduct) > 0){
                    @$row=mysqli_fetch_assoc($getProduct);
                    @$imageName=$row['img'];
                    @$image_path="../uploads/".$imageName;
                    if(file_exists($image_path)){
                       if(unlink($image_path)){
                        echo "success deleted";
                       }
                    }
                }
            }else{
                echo"fail deleted";
            }
        }
    ?>
    <div class="app-content-header">
        <h1 class="app-content-headerText">Products</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
        <a href="dashboard.php?page=addProduct" class="app-content-headerButton"
            style="text-decoration: none; line-height: 31px;">Add Product</a>
    </div>
    <div class="app-content-actions">
        <!-- start search -->
        <form method="get" action="<?php __DIR__ ?>">
            <input class="form_sea" type="hidden" value="products" name="page">
            <?php 
            @$searchContent=$_GET['search'];
            if(!empty($searchContent)){
                ?>
                    <input style="color: var(--app-content-main-color);" class="search-bar" value="<?php echo $searchContent ?>" name="search" placeholder="Search By Product Name..." type="text">
                <?php
            }else{
                ?>
                    <input  style="color: var(--app-content-main-color);"  class="search-bar" name="search" placeholder="Search By Product Name..." type="text">
                <?php
            }

            @$ActiveId =$_GET['Active'];
            if(isset($ActiveId)){
                @$updateProductQuery="UPDATE `products` SET `Status`='Active' WHERE id='$ActiveId'";
                @$update=mysqli_query($connection,$updateProductQuery);
            };
            @$DisabledId =$_GET['Disabled'];
            if(isset($DisabledId)){
                @$updateProductQuery="UPDATE `products` SET `Status`='Disabled' WHERE id='$DisabledId'";
                @$update=mysqli_query($connection,$updateProductQuery);
            };

            ?>
        </form>
        <!-- end search -->
        <div class="app-content-actions-wrapper">
            <!-- <div class="filter-button-wrapper">
                <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" /></svg></button>
                <div class="filter-menu">
                    <label>Category</label>
                    <select>
                        <option>All Categories</option>
                        <option>Furniture</option>
                        <option>Decoration</option>
                        <option>Kitchen</option>
                        <option>Bathroom</option>
                    </select>
                    <label>Status</label>
                    <select>
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                    </select>
                    <div class="filter-menu-buttons">
                        <button class="filter-button reset">
                            Reset
                        </button>
                        <button class="filter-button apply">
                            Apply
                        </button>
                    </div>
                </div>
            </div> -->
            <button class="action-button list active" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01" y2="12" />
                    <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
            </button>
            <button class="action-button grid" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" /></svg>
            </button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                Items
            </div>
            <div class="product-cell status-cell">Product name</div>
            <div class="product-cell category">Category</div>
            <div class="product-cell status-cell">Status</div>
            <div class="product-cell status-cell">Price</div>
            <div class="product-cell status-cell">Action</div>
        </div>
        <?php 
        @$searchContent=$_GET['search'];
        if(!empty($searchContent)){
            $query="SELECT * FROM products WHERE `product_name` LIKE '%$searchContent%' ";
        }else{
            $query="SELECT * FROM products";
        }
        $result=mysqli_query($connection,$query);
        // if($row=mysqli_fetch_assoc($result) < 1){
        //     echo "<h3 class='mt-5' style='text-align: center;color: var(--app-content-main-color);' >data not found</h3>";
        // }
        while($row=mysqli_fetch_assoc($result)){
            ?>

        <div class="products-row">
            <div class="product-cell image">
                <img src="http://localhost/romofyi/uploads/<?php echo $row['img']  ?>"
                    alt="product">
                <!-- <span>Ocean</span> -->
            </div>
            <div class="product-cell category"><span
                    class="cell-label">Product Name:</span><?php echo $row['product_name']  ?></div>
            <div class="product-cell category"><span
                    class="cell-label">Category:</span>
                <?php 
                    $productId=$row['category_id'];
                    $CategoryNameQuery="SELECT * FROM categories WHERE id='$productId' ";
                    $CategoryNameResult=mysqli_query($connection,$CategoryNameQuery);
                    $CategoryNameRow=mysqli_fetch_assoc($CategoryNameResult);
                    echo $CategoryNameRow['CategoryName'];
                ?> 
                </div>
            <div class="product-cell status-cell">
                <span class="cell-label">Status:</span>
                <?php 
                if($row['Status'] == 'Active'){
                    ?>
                <a href="dashboard.php?page=products&Disabled=<?php echo $row['id'] ?>" class="status disabled"> Disabled </a>
                <?php 
                }else{
                    ?>
                <a href="dashboard.php?page=products&Active=<?php echo $row['id'] ?>" class="status active"> Active </a>
                <?php } ?>
            </div>
            <div class="product-cell sales"><span class="cell-label">Price:</span><?php echo $row['price']  ?>
              
            </div>
            <div class="product-cell sales"><span class="cell-label">Action:</span>
                <a href="dashboard.php?page=products&id=<?php echo$row['id']?>">
                    <i class="fa-solid fa-trash" style="color: red; margin-right: 10px; font-size: 16px;" ></i>
                </a>
                <a href="dashboard.php?page=editProduct&id=<?php echo$row['id']?>"><i class="fa-solid fa-pen-to-square" style="font-size: 16px;" ></i></a>
            </div>
        </div>

        <?php
        }
        ?>

    </div>
</div>