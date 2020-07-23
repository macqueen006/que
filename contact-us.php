<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!-- page title -->
<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Contact Us</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- page title -->

<!-- contact us start-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Contact Us</h5>
                    <h1 class="pt-3">Hello! what's on your mind?</h1>
                    <p class="pt-3 pb-5">We are available to help you out anytime, Just feel free to drop your reviews, questions and complaints if you have any.</p>
                </div>
            </div>
            <div class="col-md-6">
                <form method="POST">
                    <?php send_customer_contact_message(); ?>
                    <fieldset class="p-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 py-2">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-lg-6 pt-2">
                                    <label for="email">Email*</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <label for="message">Message*</label>
                        <textarea name="message" class="border w-100 p-3 mt-3 mt-lg-4" required></textarea>
                        <div class="btn-group float-right">
                            <button type="submit" class="btn btn-outline-secondary mt-2 float-right">SUBMIT</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- contact us end -->

<?php require_once('includes/footer.php'); ?>