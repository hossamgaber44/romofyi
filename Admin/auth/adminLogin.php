<?php 
session_start();
@include('../../connection/connected.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_Style/Admin_Login_Style.css">
    <title>Admin Login</title>

</head>

<body>
    <?php 
        @$admin_email=$_POST['email'];
        @$admin_password=$_POST['password'];
        @$admin_Submit=$_POST['adminSubmit'];
        if(isset($admin_Submit)){
            if(empty($admin_email)){
                // echo '<script> alert("please enter the email") </script> ';
            }elseif(empty($admin_password)){
                // echo '<script> alert("please enter the password") </script> ';
            }else{
                $query="SELECT * FROM `admins` WHERE email='$admin_email' AND password='$admin_password' ";
                $result=mysqli_query($connection,$query);
                if(mysqli_num_rows($result)==1){
                    $_SESSION['email']=$admin_email;
                    // echo '<script> alert("success login") </script> ';
                    header("REFRESH:2 ;URL=../dashboard.php");
                }else{
                    // echo '<script> alert("login fail") </script> ';
                    header("REFRESH:2 ;URL=../../index.php");
                }
            }
        }
    ?>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="adminLogin.php" method="POST"  >
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" placeholder="User Email...">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password...">
                    </div>
                    <button class="button login__submit" type="submit" name="adminSubmit" id="adminSubmit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    <script>
        // document.getElementById('adminSubmit').addEventListener('onsubmit', function (event) {
        //     event.preventDefault();
        // });
    </script>
</body>

</html>