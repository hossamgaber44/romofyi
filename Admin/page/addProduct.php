<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Add Product</h1>
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
    <?php 
    @$addProduct=$_POST['addProduct'];
    @$name =$_POST['name'];
    @$category_id =$_POST['category_id'];
    @$price=$_POST['price'];
    @$small_desc =$_POST['small_desc'];
    @$img=$_POST['img'];
    @$description =$_POST['description'];
    @$imageName=$_FILES['img']['name'];
    @$imageTmp=$_FILES['img']['tmp_name'];
    if(isset($addProduct)){
        if(empty($name) || empty($category_id) || empty($price) ||empty($small_desc) || empty($description)){
            echo"please enter all data of product";
        }else{
            $img=rand(0,500). '_' .$imageName;
            move_uploaded_file($imageTmp,"../uploads/" . $img );
            // echo"category added";
        }
            $query="INSERT INTO products (product_name,category_id,price,small_desc,img,productDescription ) VALUES('$name',$category_id,$price,'$small_desc','$img','$description' );";
            $result=mysqli_query($connection,$query);
    }
    ?>
    <form method="POST" action="dashboard.php?page=addProduct" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);margin: 40px 0px 0px 0px;" for="input_name"
                class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10" style="margin: 40px 0px 0px 0px;">
                <input type="text" name="name" placeholder="enter the Product Name..." class="form-control"
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
                     while($row=mysqli_fetch_assoc($categoryResult)){
                        ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['CategoryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">Product price</label>
            <div class="col-sm-10">
                <input name="price" type="number" placeholder="enter the price..." class="form-control" id="inputprice">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputsmall_desc"
                class="col-sm-2 col-form-label">small_desc</label>
            <div class="col-sm-10">
                <input name="small_desc" type="text" placeholder="enter the small_desc..." class="form-control"
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
                <textarea name="description" class="form-control" placeholder="enter the description..."
                    id="inputdescription" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" name="addProduct" class="btn btn-primary" style="margin-left:12px;">Submit</button>
    </form>
</div>