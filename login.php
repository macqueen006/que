<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <?php display_message(); ?>
                    <form method="POST">
                        <fieldset class="p-4">
                            <label for="">Username, Email or Phone*</label>
                            <input type="text" name="username" id="username" class="form-control" required/>
                            <br>
                            <?php
                              login_uname_validation();
                            ?>
                            <label for="">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" required/>
                            <?php
                              login_pass_validation();
                            ?>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" name="remember" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-secondary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                            <a class="mt-3 d-block  text-secondary" href="recover.php">Forgot Password?</a>
                            <a class="mt-3 d-inline-block text-secondary" href="register.php">Register Now</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('includes/footer.php'); ?>