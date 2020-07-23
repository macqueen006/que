<?php
require_once('../functions/init.php');
require_once('includes/header.php');
require_once('includes/topnav.php');
require_once('includes/sidenav.php');

if(team_logged_in()) {
    $loginID = $_SESSION['loginID'];
    $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
    $result = Query($query);

    if($row = fetch_data($result)){
        $Firstname = $row['user_firstname'];
        $Lastname = $row['user_lastname'];
        $Username = $row['username'];
        $Gender = $row['user_gender'];
        $Email = $row['user_email'];
        $Status = $row['user_active'];
        $Phone = $row['user_phone'];
        $PhoneActive = $row['phone_active'];
        $Password = $row['user_password'];
        $Date = $row['date'];
    }
}else{
    redirect("login.php");
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
                <div class="row">
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                PROFILE
                            </header>
                            <div class="panel-body">
                                <div class="">
                                    <form role="form">
                                        <!-- User Widget -->
                                        <div class="widget user">
                                            <!-- User Image -->
                                            <div class="image d-flex justify-content-center">
                                                <a href="images/2.png"><img src="images/2.png" alt="" width="200" height="200"></a>
                                            </div>
                                            <div style="padding: 20px;">
                                                <h3><?php echo $Firstname . ' ' . $Lastname; ?></h3>
                                                <hr>
                                                <p style="font-family: themify;"><b>Joined on:</b> <span><?php echo date_format1($Date); ?></span></p>
                                                <p style="font-family: themify;"><b>Status:</b> <span style="<?php if($Status == 0){echo 'color:red;';}else if($Status == 1){echo 'color:green;';} ?>"><?php if($Status == 0){echo 'Not Active';}else if($Status == 1){echo 'Active';} ?></span></p>
                                                <p style="font-family: themify;"><b>Tel:</b> <span style="<?php if($PhoneActive == 0){echo 'color:red;';}else if($PhoneActive == 1){echo 'color:green;';} ?>"><?php if(empty($Phone)){echo 'No Tel...';}else{echo $Phone;} ?></span></p>
                                                <hr>
                                                <label for="">Firstname *</label>
                                                <input type="text" class="form-control" value="<?php if(empty($Firstname)){echo 'No Firstname...';}else{echo $Firstname;} ?>" style="<?php if(empty($Firstname)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                                <hr>
                                                <label for="">Lastname *</label>
                                                <input type="text" class="form-control" value="<?php if(empty($Lastname)){echo 'No Lastname...';}else{echo $Lastname;} ?>" style="<?php if(empty($Lastname)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                                <hr>
                                                <label for="">Username *</label>
                                                <input type="text" class="form-control" value="<?php if(empty($Username)){echo 'No Username';}else{echo $Username;} ?>" style="<?php if(empty($Username)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                                <hr>
                                                <label for="">Email *</label>
                                                <input type="text" class="form-control" value="<?php if(empty($Email)){echo 'No Email...';}else{echo $Email;} ?>" style="<?php if(empty($Email)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                                <hr>
                                                <label for="">Gender *</label>
                                                <input type="text" class="form-control" value="<?php if(empty($Gender)){echo 'No Gender...';}else{if($Gender == 'male'){echo 'Male';}else if($Gender == 'female'){echo 'Female';}} ?>" style="<?php if(empty($Gender)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                                <hr>
                                                <label for="">Password *</label>
                                                <input type="password" class="form-control" value="<?php if(empty($Password)){echo 'No Password...';}else{echo $Password;} ?>" style="<?php if(empty($Password)){echo 'color:red;';} ?> border: none;border-bottom: 1px solid grey;" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                UPDATE PROFILE
                            </header>
                            <div class="panel-body">
                                <div class="">
                                    <?php team_update_profile(); ?>
                                    <form method="POST" role="form">
                                        <div style="padding: 20px;">
                                            <label for="">Firstname *</label>
                                            <input type="text" name="firstname" value="<?php echo $Firstname; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <label for="">Lastname *</label>
                                            <input type="text" name="lastname" value="<?php echo $Lastname; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <input type="submit" name="updateName" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Username *</label>
                                            <input type="text" name="username" value="<?php echo $Username; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <input type="submit" name="updateUsername" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Email *</label>
                                            <input type="email" name="email" value="<?php echo $Email; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <input type="submit" name="updateEmail" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Phone *</label>
                                            <input type="tel" name="phone" value="<?php echo $Phone; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <input type="submit" name="updatePhone" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Gender *</label>
                                            <select name="gender" class="form-control">
                                                <?php
                                                    if($Gender == 'male'){
                                                        echo '<option value="'.$Gender.'">Male</option>';
                                                        echo '<option value="female">Female</option>';
                                                    }else if($Gender == 'female'){
                                                        echo '<option value="'.$Gender.'">Female</option>';
                                                        echo '<option value="male">Male</option>';
                                                    }
                                                ?>
                                            </select>
                                            <br>
                                            <input type="submit" name="updateGender" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Image *</label>
                                            <input type="file" name="image" class="form-control">
                                            <br>
                                            <input type="submit" name="updateImage" class="btn btn-primary" value="Update">
                                            <hr>
                                            <label for="">Password *</label>
                                            <input type="password" name="password" value="<?php echo $Password; ?>" style="border: none;border-bottom: 1px solid grey;" class="form-control">
                                            <br>
                                            <input type="submit" name="updatePassword" class="btn btn-primary" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            <!-- page end-->
        </div>
    </section>
    <?php require_once('includes/footer.php'); ?>