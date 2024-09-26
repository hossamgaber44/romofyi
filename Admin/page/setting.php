<div class="app-content">
    <div class="app-content-header mt-4">
        <h1 class="app-content-headerText">Setting</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
        <a href="dashboard.php" class="app-content-headerButton"
            style="text-decoration: none; line-height: 31px;">Back</a>
    </div>
    <?php 
    @$Open_hour=$_POST['Open_hour'];
    @$close_hour =$_POST['close_hour'];
    @$call_us =$_POST['call_us'];
    @$email=$_POST['email'];
    @$facebook=$_POST['facebook'];
    @$twitter=$_POST['twitter'];
    @$linkedin=$_POST['linkedin'];
    @$instagram=$_POST['instagram'];
    @$whatsApp=$_POST['whatsApp'];
    @$updateSetting =$_POST['updateSetting'];
    @$errormsg=['Open_hour'=>'','close_hour'=>'','call_us'=>'','email'=>'','facebook'=>'','twitter'=>'','linkedin'=>'','instagram'=>'','whatsApp'=>''];
    if(isset($updateSetting)){
        if(empty($Open_hour)){
            $errormsg['Open_hour']='the Open_hour is required...';
        }
        if(empty($close_hour)){
            $errormsg['close_hour']='the close_hour is required...';
        }
        if(empty($call_us)){
            $errormsg['call_us']='the call_us is required...';
        }
        if(empty($email)){
            $errormsg['email']='the email is required...';
        }
        if(empty($facebook)){
            $errormsg['facebook']='facebook Link is required...';
        }
        if(empty($twitter)){
            $errormsg['twitter']='twitter Link is required...';
        }
        if(empty($linkedin)){
            $errormsg['linkedin']='linkedin Link is required...';
        }
        if(empty($instagram)){
            $errormsg['instagram']='instagram Link is required...';
        }
        if(empty($whatsApp)){
            $errormsg['whatsApp']='whatsApp Link is required...';
        }else{
            $query="UPDATE `setting` SET `Open_hour`='$Open_hour',`close_hour`='$close_hour',`call_us`='$call_us',`email`='$email',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$twitter',`instagram`='$twitter',`whatsApp`='$whatsApp' WHERE id=1";
            $result=mysqli_query($connection,$query);
        }
    }
    ?>
    <?php 
        $settingQuery="SELECT * FROM setting WHERE id=1";
        $settingResult=mysqli_query($connection,$settingQuery);
        $settingRow=mysqli_fetch_assoc($settingResult);
    ?>
    <form method="POST" action="<?php __DIR__ ?>" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);margin: 40px 0px 0px 0px;" for="input_name"
                class="col-sm-2 col-form-label">Open_hour</label>
            <div class="col-sm-10" style="margin: 40px 0px 0px 0px;">
                <input type="time" value="<?php echo $settingRow['Open_hour'] ?>" name="Open_hour" placeholder="enter the Open_hour..." class="form-control"
                    id="input_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="input_name"
                class="col-sm-2 col-form-label">close_hour</label>
            <div class="col-sm-10">
                <input type="time" value="<?php echo $settingRow['close_hour'] ?>" name="close_hour" placeholder="enter the close_hour..." class="form-control"
                    id="input_name">
            </div>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">call_us</label>
            <div class="col-sm-10">
                <input name="call_us" value="<?php echo $settingRow['call_us'] ?>" type="number" placeholder="enter the call_us Number..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['call_us'] ?></span>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['email'] ?>" name="email" type="email" placeholder="enter the call_us Number..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['email'] ?></span>
        </div>
        <!--  -->
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">facebook</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['facebook'] ?>" name="facebook" type="text" placeholder="enter facebook Link..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['facebook'] ?></span>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">twitter</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['twitter'] ?>" name="twitter" type="text" placeholder="enter twitter Link ..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['twitter'] ?></span>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">linkedin</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['linkedin'] ?>" name="linkedin" type="text" placeholder="enter linkedin Link..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['linkedin'] ?></span>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">instagram</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['instagram'] ?>" name="instagram" type="text" placeholder="enter instagram Link..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['instagram'] ?></span>
        </div>
        <div class="mb-3 row">
            <label style="color: var(--app-content-main-color);" for="inputprice"
                class="col-sm-2 col-form-label">Whats App</label>
            <div class="col-sm-10">
                <input value="<?php echo $settingRow['whatsApp'] ?>" name="whatsApp" type="text" placeholder="enter Whats App Link..." class="form-control" id="inputprice">
            </div>
            <label class="col-sm-2" style="opacity: 0;" ></label>
            <span class="col-sm-10 mt-1" style="color: red;font-size: 13px;" class="error_message"><?php echo $errormsg['whatsApp'] ?></span>
        </div>
        <button type="submit" name="updateSetting" class="btn btn-primary" style="margin-left:12px;">Submit</button>
    </form>
</div>