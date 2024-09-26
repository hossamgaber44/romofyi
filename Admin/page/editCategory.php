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
    @$id=$_GET['id'];
    if(isset($id)){
        $query="SELECT * FROM categories WHERE id='$id' ";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
    }else{
        // header("location:page=categories");
        // exit;
    }
    ?>

    <?php 
    @$CategoryName =$_POST['CategoryName'];
    @$CategoryImage =$_POST['img'];
    @$oldCategoryImg=$_POST['oldCategoryImg'];
    @$imageName=$_FILES['img']['name'];
    @$imageTmp=$_FILES['img']['tmp_name'];
    @$editCat=$_POST['editCat'];
    @$catId=$_POST['catId'];
    if(isset($editCat)){
        if(empty($CategoryName)){
            echo"please enter category name";
            // echo"<script>alert('ss')</script>";
        }else{
            if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
                // echo"pleassssssssssss of product";
                @$image_path="../uploads/cat/".$oldCategoryImg;
                if(file_exists($image_path)){
                   if(unlink($image_path)){
                    echo "success deleted image";
                   }
                }
                $img=rand(0,500). '_' .$imageName;
                move_uploaded_file($imageTmp,"../uploads/cat/" . $img );
            }else{
                $img=$oldCategoryImg;
            }
            echo $img .'ggg';
            // 

            $query="UPDATE categories SET CategoryName='$CategoryName' ,img='$img' WHERE id='$catId'";
            $result=mysqli_query($connection,$query);
        }
    }
    ?>
    <form method="POST" action="<?php __DIR__ ?>" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['id']  ?>" name="catId">
        <input type="hidden" value="<?php echo $row['img']  ?>" name="oldCategoryImg">
        <div class="mb-3 row">
            <label for="category_name1" class="col-sm-2 col-form-label"
                style="color: var(--app-content-main-color);margin: 40px 0px 10px;">Category Name</label>
            <!-- <label style="color: var(--app-content-main-color);" for="formFile" class="col-sm-2 col-form-label">Category Name</label> -->
            <div class="col-sm-10">
                <input value="<?php  if(isset($row['CategoryName'])) { echo $row['CategoryName'] ; } ?>"
                    name="CategoryName" type="text" class="form-control" id="category_name1" 
                    aria-describedby="Category_name" style="margin: 40px 0px 10px;" >
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="formFile" class="col-sm-2 col-form-label">Category
                image</label>
            <div class="col-sm-10">
                <input name="img" class="form-control" type="file" id="formFile">
            </div>
        </div>
        <button type="submit" name="editCat" class="btn btn-primary" style="margin-left:12px;">Submit</button>
    </form>
</div>