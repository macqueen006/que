<?php require_once('includes/header.php'); ?>

<?php

if(admin_logged_in() == false)
{
    redirect("login.php");
}

?>

    <!-- Start wrapper-->
    <div id="wrapper">

<?php require_once('includes/sidenav.php'); ?>

<?php require_once('includes/topnav.php'); ?>

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->

            <div class="col-lg-12">
                <form method="POST">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">SELECT A GAME CATEGORY TO ADD OR EDIT QUESTIONS</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col"></th>
                                        <th scope="col">Select</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM game_sub_categories ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $Id = $row['id'];
                                        $Title = $row['title'];
                                        $CategoryId = $row['category_id'];

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $Id; ?></th>
                                            <td><?php echo $Title; ?></td>
                                            <?php
                                                $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                                                $check = Query($query);
                                                confirm($check);

                                                while($rows = fetch_data($check))
                                                {
                                            ?>
                                            <td><?php echo $rows['title']; ?></td>
                                            <?php }
                                                $query = " SELECT * FROM game_categories WHERE id=$CategoryId";
                                                $Amo = Query($query);
                                                confirm($Amo);

                                                while($P = fetch_data($Amo))
                                                {
                                            ?>
                                            <td><?php echo '₦'.$P['stake']; ?></td>
                                            <?php } ?>
                                            <?php
                                                $query = " SELECT * FROM game_categories WHERE id=$CategoryId";
                                                $Co = Query($query);
                                                confirm($Co);

                                                while($rowA = fetch_data($Co))
                                                {
                                                    $Stake = $rowA['stake'];

                                                    if($Stake == 50)
                                                    {
                                                        $query = " SELECT * FROM quiz50 WHERE sub_category='$Title' ";
                                                        $result1 = Query($query);
                                                        $Count = row_count($result1);
                                                    }
                                                    else if($Stake == 100)
                                                    {
                                                        $query = " SELECT * FROM quiz100 WHERE sub_category='$Title' ";
                                                        $result1 = Query($query);
                                                        $Count = row_count($result1);
                                                    }
                                                    else if($Stake == 150)
                                                    {
                                                        $query = " SELECT * FROM quiz150 WHERE sub_category='$Title' ";
                                                        $result1 = Query($query);
                                                        $Count = row_count($result1);
                                                    }
                                                    else if($Stake == 200)
                                                    {
                                                        $query = " SELECT * FROM quiz200 WHERE sub_category='$Title' ";
                                                        $result1 = Query($query);
                                                        $Count = row_count($result1);
                                                    }
                                            ?>
                                            <td><?php echo $Count; ?></td>
                                            <?php } ?>
                                            <td><a href="add_game.php?Id=<?php echo $CategoryId; ?>">select</a></td>
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