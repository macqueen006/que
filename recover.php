<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Recover Password</h3>
                    <h6 class="bg-gray p-4"><?php recover_password(); display_message(); ?></h6>
                    <form method="POST">
                        <fieldset class="p-4">
                            <label for="">Email*</label>
                            <p id="emailNote"><b>Note! Email must contain special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
                            <p id="emailWarn"><b>Make sure Email contains special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
                            <input type="email" id="email" name="email" onfocus="recovE();"  oninput="e_mail();" class="form-control" required/>
                            <input type="hidden" name="token" value="<?php echo token_generate(); ?>">
                            <button type="submit" class="d-block py-3 px-5 bg-secondary text-white border-0 rounded font-weight-bold mt-3">Recover</button>
                            <a class="mt-3 d-block text-danger" href="login.php">Cancel?</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('includes/footer.php'); ?>