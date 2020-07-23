<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Enter Recovery Code</h3>
                    <h3 class="bg-gray p-4"><?php validation_code();

                        if(isset($_GET['Email']))
                        {
                            $Email = clean($_GET['Email']);

                            if(email_exists($Email))
                            {
                                $query = " SELECT * FROM users WHERE user_email='$Email' ";
                                $result = Query($query);
                                confirm($result);

                                if($row = fetch_data($result))
                                {
                                    if(strlen($row['Validation_Code']) == 6)
                                    {
                                        echo approve_validation(" Email Sent! Please Check Your Email ");
                                    }
                                }
                            }
                            else
                            {
                                redirect("recover.php");
                            }
                        }
                        else
                        {
                            redirect("recover.php");
                        }

                    ?>
                    </h3>
                    <form method="POST">
                        <fieldset class="p-4">
                            <input type="text" name="recover-code" placeholder="Recovery Code(###-###)" class="border p-3 w-100 my-2" required/>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Recover Password</button>
                            <a class="mt-3 d-block text-danger" href="login.php">Cancel?</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('includes/footer.php'); ?>