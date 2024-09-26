<div class="blue_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact section -->
 <?php
 @$user_id=$_SESSION['user_id'];
 @$name=$_POST['name'];
 @$phone=$_POST['phone'];
 @$email=$_POST['email'];
 @$address=$_POST['address'];
 @$message=$_POST['message'];
 @$send_Message=$_POST['send_Message'];
 @$errormsg=['name'=>'','phone'=>'','email'=>'','address'=>'','message'=>''];
 if(isset($send_Message)){
    if(empty($name)){
        $errormsg['name']='the name is required...';
    }
    if(empty($phone)){
        $errormsg['phone']='the phone is required...';
    }
    if(empty($email)){
        $errormsg['email']='the email is required...';
    }
    if(empty($address)){
        $errormsg['address']='the address is required...';
    }
    if(empty($message)){
        $errormsg['message']='the message is required...';
    }else{
        @$contactQuery="INSERT INTO `contact`(`user_id`, `name`, `email`, `address`,`phone`, `message`) VALUES ('$user_id','$name','$email','$address','$phone','$message')";
        @$contactResult=mysqli_query($connection ,$contactQuery);
    }
 }
 ?>
<div id="contact" class="contact">
    <div class="con_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <form id="request" class="main_form mt-4" method="POST" action="<?php __DIR__ ?>" >
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <span class="error_message"><?php echo $errormsg['name'] ?></span>
                                <input class="contactus" placeholder="Name..." type="type" name="name">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="error_message"><?php echo $errormsg['phone'] ?></span>
                                <input class="contactus" placeholder="Phone Number..." type="number" name="phone">
                            </div>
                            <div class="col-md-6 col-sm-6">
                            <span class="error_message"><?php echo $errormsg['email'] ?></span>
                                <input class="contactus" placeholder="Email..." type="type" name="email">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="error_message"><?php echo $errormsg['address'] ?></span>
                                <input class="contactus" placeholder="Address..." type="type" name="address">
                            </div>
                            <div class="col-md-12">
                                <span class="error_message"><?php echo $errormsg['message'] ?></span>
                                <textarea style=" padding: 12px 14px; min-height: 111px;" class="contactusmess" placeholder="Message..." name="message"></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <button class="send_btn" name="send_Message" >Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact section -->