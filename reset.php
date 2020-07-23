<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Reset Password</h3>
                    <h3 class="bg-gray p-4"><?php   reset_password();
                                                    display_message(); ?>
                    </h3>
                    <form method="POST">
                        <fieldset class="p-4">
                            <label for="">New Password*</label>
                            <p id="passNote"><b>Note! Password must contain atleast small letters, one capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
                            <p id="passWarn"><b>Make sure Password contains atleast small letters, a capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
                            <input type="password" id="password" name="Npassword" class="form-control" minlength="7" maxlength="30" onfocus="recovP();" oninput="pass();" required/><br>
                            <label for="">Confirm New Password*</label>
                            <p id="passMatch"><b>Passwords don't Match!</b></p>
                            <input type="password" id="cpassword" name="CNpassword" class="form-control" minlength="7" maxlength="30" onfocus="recovC();" oninput="cpass();" required/>
                            <input type="hidden" name="token" value="<?php echo token_generate(); ?>">
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Set Password</button>
                            <a class="mt-3 d-block text-danger" href="login.php">Cancel?</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('includes/footer.php'); ?>