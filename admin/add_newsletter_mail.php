<?php require_once('includes/header.php'); ?>

    <!-- Start wrapper-->
    <div id="wrapper">

<?php require_once('includes/sidenav.php'); ?>

<?php require_once('includes/topnav.php'); ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">CREATE NEW MAIL</h5>
                        <p><?php compose_newsletter_mail(); ?></p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                <?php

                                if(isset($_GET['edit']))
                                {
                                    $Id = $_GET['edit'];

                                    $query = " SELECT * FROM newsletter WHERE id=$Id ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($row = fetch_data($result))
                                    {
                                        $Header = $row['header'];
                                        $Subject = $row['subject'];
                                        $Status = $row['status'];
                                        $Message = $row['message'];
                                    }
                                    else
                                    {
                                        redirect("../404.php");
                                    }
                                }

                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Header *</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="header" type="text" value="<?php if(isset($Header)) {echo $Header;}else{echo 'From: No-Reply admin@quemtech.com';} ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Subject *</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="subject" type="text" value="<?php if(isset($Subject)) {echo $Subject;}1 ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Message *</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="message" id="" cols="30" rows="10"><?php if(isset($Message)) {echo $Message;} ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                        <div class="col-lg-6">
                                            <?php

                                            if(isset($Status))
                                            {
                                                if($Status == 'unapproved')
                                                {
                                                    ?>
                                                    <select name="status" class="form-control">
                                                        <option value="<?php echo $Status; ?>">Unapproved</option>
                                                        <option value="approved">Approve</option>
                                                    </select>
                                                    <?php
                                                }
                                                else if($Status == 'approved')
                                                {
                                                    ?>
                                                    <select class="form-control" name="status">
                                                        <option value="<?php echo $Status; ?>">Approved</option>
                                                        <option value="unapproved">Disapprove</option>
                                                    </select>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <select class="form-control" name="status" id="">
                                                    <option value="approved">Approve</option>
                                                    <option value="unapproved">Disapprove</option>
                                                </select>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Send To *</label>
                                        <div class="col-lg-9">
                                            <label for="all">All </label>
                                            <input type="radio" name="all" checked>
                                            <input type="button" class="btn btn-secondary" value="select other">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-danger" value="Cancel">
                                            <?php

                                            if(isset($Header))
                                            {
                                                ?>
                                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <input type="submit" class="btn btn-dark" name="create" value="Create">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->

            <!--End Dashboard Content-->

            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                Copyright © 2018 Dashtreme Admin
            </div>
        </div>
    </footer>
    <!--End footer-->

        <?php require_once('includes/footer.php'); ?>