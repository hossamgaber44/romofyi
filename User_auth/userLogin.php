<?php 
session_start();
@include('../connection/connected.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Admin/admin_Style/Admin_Login_Style.css">
    <title>user Login</title>

</head>

<body>
    <?php 
        @$user_email=$_POST['email'];
        @$user_password=$_POST['password'];
        @$user_Submit=$_POST['userSubmit'];
        if(isset($user_Submit)){
            if(empty($user_email)){
                // echo '<script> alert("please enter the email") </script> ';
            }elseif(empty($user_password)){
                // echo '<script> alert("please enter the password") </script> ';
            }else{
                $query="SELECT * FROM `users` WHERE email='$user_email' AND password='$user_password' ";
                $result=mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($result);
                if(mysqli_num_rows($result)==1){
                    $_SESSION['user_email']=$user_email;
                    $_SESSION['user_id']=$row['id'];
                    header("REFRESH:2 ;URL=../index.php");
                }else{
                    // echo '<script> alert("login fail") </script> ';
                    header("REFRESH");
                }
            }
        }
    ?>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="<?php __DIR__ ?>" method="POST"  >
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" placeholder="User Email...">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password...">
                    </div>
                    <button class="button login__submit" type="submit" name="userSubmit" id="userSubmit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div style="font-size: 15px; text-align: center;">
                    Not a member?<a href="./userRegister.php" >Register Now</a>
                </div>
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