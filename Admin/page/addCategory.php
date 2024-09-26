<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Add Category</h1>
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
    @$CategoryName =$_POST['CategoryName'];
    @$CategoryImage =$_POST['img'];
    @$imageName=$_FILES['img']['name'];
    @$imageTmp=$_FILES['img']['tmp_name'];
    @$addCat=$_POST['addCat'];
    if(isset($addCat)){
        if(empty($CategoryName)){
            echo"please enter category name";
        }elseif($imageName == ''){
            echo"please enter category image";
        }else{
            $img=rand(0,500). '_' .$imageName;
            move_uploaded_file($imageTmp,"../uploads/cat/" . $img );
            $query="INSERT INTO categories (CategoryName , img) VALUES('$CategoryName','$img')";
            $result=mysqli_query($connection,$query);
            echo"category added";
        }
    }
    ?>
    <form method="POST" action="dashboard.php?page=addCategory" enctype="multipart/form-data"
        style="margin: 40px 0px 10px 12px;">
        <!-- <div class="mb-3"  >
            <label for="category_name1" class="form-label" style="color: var(--app-content-main-color);margin: 40px 0px 10px 12px;" >Category Name</label>
            <input style="margin-left:12px;" name="CategoryName" type="text" class="form-control" id="category_name1" aria-describedby="Category_name">
            <div style="margin-left:12px;" id="Category_name" class="form-text">We'll never share your email with anyone else.</div>
        </div> -->
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="formFile" class="col-sm-2 col-form-label">Category
                Name</label>
            <div class="col-sm-10">
                <input name="CategoryName" type="text" class="form-control" id="category_name1"
                    aria-describedby="Category_name" placeholder="enter Category Name...">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="formFile" class="col-sm-2 col-form-label">Category
                image</label>
            <div class="col-sm-10">
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
        </div>
        <button type="submit" name="addCat" class="btn btn-primary" style="margin-left:12px;">Submit</button>
    </form>
</div>