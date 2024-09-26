<?php
   include('include/header.php');
?>

<!--start page content -->
<?php 
   if(isset($_GET['page'])){
         $page=$_GET['page'];
         if(file_exists('user_page/' . $page . '.php')){
            include('user_page/' . $page . '.php');
         }else{
            echo"<h5>page not found</h5>";
         }
   }else{
         include('user_page/index_content.php');
   }
   ?>
<!-- end page content -->


<?php
   include('include/footer.php');
?>