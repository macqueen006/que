<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <?php
                        if(!isset($_GET['regId'])){
                            if(isset($_GET['refer-code']))
                            {
                                if(!isset($_POST['register']))
                                {
                                    if(check_code($_GET['refer-code'])){
                                        setcookie('referral-code',$_GET['refer-code'],time() + 300);
                                    }
                                    else{
                                        ?>
                                        <script type="text/javascript">
                                            alert('Error! Invalid referral code, please check the code and try again. or Register Freshly?');
                                        </script>
                                        <?php
                                    }
                                }
                            }
                    ?>
                    <div class="border border">
                        <h3 class="bg-gray p-4">Choose Registration Method</h3>
                        <h3 class="bg-gray p-4"><b>Free:</b> Register Free on this Platform and get ₦50 to start playing games instantly and start winning awards. <a href="register.php?regId=free" class="text-primary"><u>Register Now</u></a></h3>
                        <h3 class="bg-gray p-4"><b>₦200:</b> Register with ₦200 on this Platform and get ₦300 to start playing games instantly and start winning awards. <a href="register.php?regId=200" class="text-primary"><u>Register Now</u></a></h3>
                    </div>
                    <?php
                        }else{
                            if($_GET['regId'] == 'free'){
                                $regId = clean($_GET['regId']);
                            }else if($_GET['regId'] == '200'){
                                $regId = clean($_GET['regId']);
                            }
                    ?>
                    <div class="border border">
                        <h3 class="bg-gray p-4">Welcome! Please Register to Start.</h3>
                        <?php
                            if($regId == 'free')
                                echo '<h6 class="bg-gray p-4">Registration fee: Free</h6>';
                            else if($regId == '200')
                                echo '<h6 class="bg-gray p-4">Registration fee: ₦200 <br>After this page, you will be redirected to a payment page for registration before activation. See terms and conditions for more.</h6>';
                        ?>
                        <?php if(!empty(user_validation())){ ?>
                                <h3 class="bg-gray p-4"><?php user_validation();?></h3>
                          <?php  }; ?>
                        <form method="POST">
                            <fieldset class="p-4">
                                <?php
                                if(isset($_COOKIE['referral-code'])){
                                    $referCode = $_COOKIE['referral-code'];

                                    $query = " SELECT * FROM users WHERE md5(username)='$referCode' ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($row = fetch_data($result)){
                                        ?>
                                        <label for="">Referral ID*</label>
                                        <input type="text" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                                        <input type="hidden" name="refer-code" value="<?php echo $referCode; ?>">
                                        <br>
                                        <?php 
                                    }
                                }
                                ?>
                                <label for="">Firstname*</label>
                                <p id="firstNote"><b>Note! Firstname must contain only letter and the first must be in caps. Example: <span style="color:gold;">John</span></b></p>
                                <p id="firstLess"><b>Firstname cannot be less than 2 letters.</b></p>
                                <p id="firstWarn"><b>Make sure Firstname contains only letter and the first must be in caps. Example: <span style="color:gold;">John</span></b></p>
                                <input id="firstname" name="firstname" type="text" class="form-control" onfocus="checkf();" oninput="fname();" maxlength="250" minlength="2" required><br>
                                <label for="">Lastname*</label>
                                <p id="lastNote"><b>Note! Lastname must contain only letter and the first must be in caps. Example: <span style="color:gold;">Doe</span></b></p>
                                <p id="lastLess"><b>Lastname cannot be less than 2 letters.</b></p>
                                <p id="lastWarn"><b>Make sure Lastname contains only letter and the first must be in caps. Example: <span style="color:gold;">Doe</span></b></p>
                                <input type="text" id="lastname" name="lastname" class="form-control" onfocus="checkl();" oninput="lname();" maxlength="250" minlength="2" required><br>
                                <label for="">Gender*</label>
                                <select name="gender" class="form-control w-100" id="gender" required>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                                </select>
                                <br>
                                <br>
                                <label for="">Email*</label>
                                <p id="emailNote"><b>Note! Email must contain special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
                                <p id="emailWarn"><b>Make sure Email contains special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
                                <input id="email" name="email" type="email" class="form-control" onfocus="checke();" oninput="e_mail();" required><br>
                                <label for="">Tel*</label>
                                <p id="telNote"><b>Note! Tel must contain only numbers and must be 11 characters long. Example: <span style="color:gold;">09087365672</span></b></p>
                                <p id="telWarn"><b>Make sure Tel contains only numbers and must be 11 characters long. Example: <span style="color:gold;">09087365672</span></b></p>
                                <input id="phone" name="phone" type="tel" class="form-control" minlength="10" maxlength="11" onfocus="checkt();" oninput="p_hone();" required><br>
                                <label for="">Username*</label>
                                <p id="userNote"><b>Note! Username can only contain letters, numbers, underscores and dashes. Example: <span style="color:gold;">John_1-0</span></b></p>
                                <p id="userLess"><b>Username can't be less than 5 characters.</b></p>
                                <input id="username" name="username" type="text" class="form-control" onfocus="checku();" oninput="uname();" minlength="5" maxlength="30" required><br>
                                <label for="">Password*</label>
                                <p id="passNote"><b>Note! Password must contain atleast small letters, one capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
                                <p id="passWarn"><b>Make sure Password contains atleast small letters, a capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
                                <input id="password" name="password" type="password" class="form-control" onfocus="checkp();" oninput="pass();" required><br>
                                <label for="">Confirm Password*</label>
                                <p id="passMatch"><b>Passwords don't Match!</b></p>
                                <input id="cpassword" name="cpassword" type="password" class="form-control" onfocus="checkcp();" oninput="cpass();" required><br>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input id="accept" name="termcond" type="checkbox" id="registering" class="mt-1" onclick="accepts();">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-secondary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" name="register" id="bit" class="btn btn-outline-secondary">Register Now</button>
                                <br>
                                <label for="Member" class="px-2 float-right">Already a Member? <a class="text-secondary font-weight-bold" href="login.php">Login</a></label>
                            </fieldset>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php require_once('includes/footer.php'); ?>