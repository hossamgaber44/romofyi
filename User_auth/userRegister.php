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
    <title>User Registration</title>
    <style>
        .error_message {
            font-size: 13px;
            color: red;
        }
    </style>
</head>

<body>
    <?php 
        @$user_name=$_POST['name'];
        @$user_email=$_POST['email'];
        @$user_password=$_POST['password'];
        @$user_Submit=$_POST['userSubmit'];
        @$errormsg=['name'=>'','email'=>'','password'=>''];
        if(isset($user_Submit)){
            @$checkUserEmailQuery="SELECT email FROM `users` WHERE email='$user_email' ";
            @$checkUserEmailResult=mysqli_query($connection,$checkUserEmailQuery);
            @$checkUserEmailRow=mysqli_fetch_assoc($checkUserEmailResult);
            // echo $checkUserEmailRow;
            // echo $checkUserEmailRow['email'];

            if(empty($user_name)){
                $errormsg['name']= "please enter the Name";
            }
            if(empty($user_password)){
                $errormsg['password']= "please enter the password";
            }
            if(empty($user_email)){
                $errormsg['email']= "please enter the email";
            }
            if(isset($checkUserEmailRow)){
                $errormsg['email']= "email already used";
            }else{
                // echo "cccccc";
                $query="SELECT * FROM `admins` WHERE email='$user_email' AND password='$user_password' ";
                $query=" INSERT INTO `users`(`name`, `email`,`password`) VALUES ('$user_name','$user_email','$user_password') ";
                $result=mysqli_query($connection,$query);

                $getUserIdQuery="SELECT * FROM `users` WHERE email='$user_email' AND password='$user_password' ";
                $getUserIdResult=mysqli_query($connection,$getUserIdQuery);
                $getUserIdRow=mysqli_fetch_assoc($getUserIdResult);
                    $_SESSION['user_email']=$user_email;
                    $_SESSION['user_id']=$getUserIdRow['id'];

                    header("REFRESH:2 ;URL=../index.php");
            }
        }
    ?>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="<?php __DIR__ ?>" method="POST">
                    <div class="login__field">
                        <span class="error_message"><?php echo $errormsg['name'] ?></span>
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="name" placeholder="User name...">
                    </div>
                    <div class="login__field">
                        <span class="error_message"><?php echo $errormsg['email'] ?></span>
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" name="email" placeholder="User Email...">
                    </div>
                    <div class="login__field">
                        <span class="error_message"><?php echo $errormsg['password'] ?></span>
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password...">
                    </div>
                    <button class="button login__submit" type="submit" name="userSubmit" id="userSubmit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div style="font-size: 15px; text-align: center;">
                Already a member?<a href="./userLogin.php" >Login Here</a>
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