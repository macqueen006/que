<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Account Activation</h3>
                    <?php   activate(); 
                            display_message(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('includes/footer.php'); ?>