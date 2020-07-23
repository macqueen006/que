<?php require_once('includes/header.php'); ?>

    <!-- Start wrapper-->
    <div id="wrapper">

<?php require_once('includes/sidenav.php'); ?>

<?php require_once('includes/topnav.php'); ?>

<?php
$query = " SELECT * FROM newsletter_users ";
$result = Query($query);
$UsersCount = row_count($result);

$query = " SELECT * FROM newsletter ";
$result = Query($query);
$mailCount = row_count($result);
?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->

            <div class="col-lg-12">
                <form method="POST">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">NEWSLETTER USERS(<?php echo $UsersCount; ?>)
                                <p><?php delete_newsletter_user(); ?></p>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM newsletter_users ORDER BY id DESC ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $Id = $row['id'];
                                        $Email = $row['email'];
                                        $Date = $row['date'];

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $Id; ?></th>
                                            <td><?php echo $Email; ?></td>
                                            <td><?php echo $Date; ?></td>
                                            <td><a onclick="javascript: return confirm('Are you sure you want to delete this User From NewsLetter?');" href="newsletter.php?delete=<?php echo $Id; ?>">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-12">
                <form method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-3">
                                <select class="form-control" name="select" id="">
                                    <option value="delete">Delete</option>
                                    <option value="edit">Edit</option>
                                    <option value="approved">Approve</option>
                                </select>
                                <br>
                                <span>
                    <input class="btn btn-light px-5" type="submit" value="Apply">
                    <a style="margin-left:10px;" href="add_newsletter_mail.php"> Compose <i class="fa fa-plus-circle"></i></a>
                </span>
                            </div>
                            <h5 class="card-title text-center">NEWSLETTER MAIL(<?php echo $mailCount; ?>)
                                <p><?php select_newsletter_mail(); ?></p>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" onclick="checkAll('Boxes', this);"></th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Header</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM newsletter ORDER BY id DESC ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $Id = $row['id'];
                                        $Email = $row['email'];
                                        $Header = $row['header'];
                                        $Subject = $row['subject'];
                                        $Message = substr($row['message'],0,33);
                                        $Status = $row['status'];
                                        $Date = $row['date'];

                                        ?>
                                        <tr>
                                            <th scope="row"><input type="checkbox" name="checkBoxArray[]" class="Boxes" value="<?php echo $Id; ?>"></th>
                                            <th scope="row"><?php echo $Id; ?></th>
                                            <td><?php echo $Email; ?></td>
                                            <td><?php echo $Header; ?></td>
                                            <td><?php echo $Subject; ?></td>
                                            <td><?php if(strlen($Message) >= 33){
                                                    echo $Message . '...';
                                                }else{
                                                    echo $Message;
                                                }
                                                ?></td>
                                            <td><?php echo $Status; ?></td>
                                            <td><?php echo $Date; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--End Row-->

        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

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