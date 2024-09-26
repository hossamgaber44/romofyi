<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Update Product</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
        <a href="dashboard.php?page=categories" class="app-content-headerButton"
            style="text-decoration: none; line-height: 31px;">Back</a>
    </div>
    <!-- start get product data  -->
    <?php 
    @$id=$_GET['id'];
    if(isset($id)){
        $query="SELECT * FROM products WHERE id='$id' ";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
    }else{
        // header("location:page=categories");
        // exit;
    }
    ?>
    <!-- end get product data  -->

    <!-- start uppdate product data  -->
    <?php 
    @$editProduct=$_POST['editProduct'];
    @$name =$_POST['name'];
    @$category_id =$_POST['category_id'];
    @$price=$_POST['price'];
    @$small_desc =$_POST['small_desc'];
    @$img=$_POST['img'];
    @$description =$_POST['description'];
    @$imageName=$_FILES['img']['name'];
    @$imageTmp=$_FILES['img']['tmp_name'];
    @$productId=$_POST['productId'];
    @$oldProductImg=$_POST['oldProductImg'];
    if(isset($editProduct)){
        if(empty($name) || empty($category_id) || empty($price) ||empty($small_desc) || empty($description)){
            echo"please enter all data of product";
        }else{
            if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
                // echo"pleassssssssssss of product";
                @$image_path="../uploads/".$oldProductImg;
                if(file_exists($image_path)){
                   if(unlink($image_path)){
                    echo "success deleted image";
                   }
                }
                $img=rand(0,500). '_' .$imageName;
                move_uploaded_file($imageTmp,"../uploads/" . $img );
            }else{
                // echo"emptyyyyyyyy of product";
                $img=$oldProductImg;
                // $img='gggg';
            }
            echo $img .'ggg';
            $query="UPDATE products SET product_name='$name' ,category_id=$category_id ,price=$price,small_desc='$small_desc',img='$img' ,productDescription='$description' WHERE id='$productId'";
            // $query="UPDATE products SET product_name='hhh' ,category_id=17 ,price=44 ,small_desc='fff',img='hh',productDescription='ffffff' WHERE id='32'";
            $result=mysqli_query($connection,$query);
        }
    }
    ?>
    <!-- end uppdate product data  -->

    <form method="POST" action="<?php __DIR__ ?>" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['id']  ?>" name="productId" >
        <input type="hidden" value="<?php echo $row['img']  ?>" name="oldProductImg" >
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);margin: 40px 0px 0px 0px;" for="input_name"
                class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10" style="margin: 40px 0px 0px 0px;">
                <input  value="<?php  if(isset($row['product_name'])) { echo $row['product_name'] ; } ?>"  type="text" name="name" placeholder="enter the Product Name..." class="form-control"
                    id="input_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputCategory"
                class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <select class="form-select" id="inputCategory" name="category_id" aria-label="Default select example">
                    <!-- <option selected>Open this select menu</option> -->
                    <?php 
                     @$categoryQuery="SELECT id,CategoryName FROM categories";
                     @$categoryResult=mysqli_query($connection,$categoryQuery);
                     while($categoryRow=mysqli_fetch_assoc($categoryResult)){
                        ?>
                    <option value="<?php echo $categoryRow['id'] ?>"  <?php if($categoryRow['id'] == $row['category_id']){ ?>selected <?php } ?> ><?php echo $categoryRow['CategoryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">Product price</label>
            <div class="col-sm-10">
                <!-- <input name="price" type="number" placeholder="enter the price..." class="form-control" id="inputprice"  value="<?php  if(isset($row['price'])) { echo $row['price'] ; } ?>" > -->
                <input value="<?php  if(isset($row['price'])) { echo $row['price'] ; } ?>"  type="number" name="price" placeholder="enter the Product price..." class="form-control"
                id="inputprice">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputsmall_desc"
                class="col-sm-2 col-form-label">small_desc</label>
            <div class="col-sm-10">
                <input value="<?php  if(isset($row['small_desc'])) { echo $row['small_desc'] ; } ?>"  name="small_desc" type="text" placeholder="enter the small_desc..." class="form-control"
                    id="inputsmall_desc">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="formFile" class="col-sm-2 col-form-label">Product
                image</label>
            <div class="col-sm-10">
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputdescription"
                class="col-sm-2 col-form-label">description</label>
            <div class="col-sm-10">
                <textarea  name="description" class="form-control" placeholder="enter the description..."
                    id="inputdescription" rows="3"><?php  if(isset($row['productDescription'])) { echo $row['productDescription'] ; } ?></textarea>
            </div>
        </div>
        <button type="submit" name="editProduct" class="btn btn-primary" style="margin-left:12px;">Submit</button>
    </form>
</div>