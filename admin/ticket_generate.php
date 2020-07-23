<?php require_once('includes/header.php'); ?>

    <!-- Start wrapper-->
    <div id="wrapper">

<?php require_once('includes/sidenav.php'); ?>

<?php require_once('includes/topnav.php'); ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->

            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">TICKETS
                                <?php delete_ticket(); ?>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Expiry</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM tickets ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $Id = $row['id'];
                                        $Price = $row['price'];
                                        $Code = $row['code'];
                                        $Date = $row['date'];

                                        $createdDate = strtotime($Date);
                                        $oneWeek = strtotime('-1 week');

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $Id; ?></th>
                                            <td><?php echo '₦'.$Price; ?></td>
                                            <td><?php echo $Date; ?></td>
                                            <td><?php

                                                if($createdDate > $oneWeek)
                                                {
                                                    //it's sooner than one week
                                                    $TimeLeft = $createdDate - $oneWeek;
                                                    $DaysLeft = floor($TimeLeft / 86400); // 86400 = seconds per day
                                                    $HoursLeft = floor(($TimeLeft - $DaysLeft * 86400) / 3600); // 3600 = seconds per hour

                                                    echo "Still $DaysLeft days(s), $HoursLeft hour(s)";
                                                }
                                                else
                                                {
                                                    // Delete Ticket AFter one week no use...
                                                    $query = " DELETE FROM tickets WHERE id=$Id ";
                                                    $result = Query($query);
                                                    confirm($result);
                                                }

                                            ?></td>
                                            <td><a onclick="javascript: return confirm('Are you sure you want to delete this Ticket?');" href="ticket_generate.php?delete=<?php echo $Id; ?>">Delete</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">GENERATE TICKET CODE
                                <p><?php create_ticket(); ?></p>
                            </div>
                            <hr>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="">Code*</label>
                                    <input type="text" name="code" value="<?php echo ticket_code_generate(); ?>" class="form-control text-center form-control-rounded" id="input-6" readonly>
                                    <label for="input-6">Price*</label>
                                    <select name="price" class="form-control form-control-rounded">
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                        <option value="400">400</option>
                                        <option value="500">500</option>
                                        <option value="600">600</option>
                                        <option value="700">700</option>
                                        <option value="800">800</option>
                                        <option value="900">900</option>
                                        <option value="1000">1000</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-light btn-round px-5"><i class="fa fa-code"></i> Create Ticket</button>
                                </div>
                            </form>
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