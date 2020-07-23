<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<?php

if(!logged_in())
{
    redirect("login.php");
    set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access The Page</h3>');
}

?>

    <!--==================================
    =            User Profile            =
    ===================================-->
    <section class="dashboard section">
        <!-- Container Start -->
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <div class="sidebar">
                        <?php

                        if(logged_in() == true){
                            $username = $_SESSION['loginID'];
                            $query = " SELECT * FROM users WHERE username='".$username."' OR user_email='".$username."' OR user_phone='".$username."' ";
                            $result = Query($query);
                            confirm($result);

                            if($row = fetch_data($result))
                            {
                                $dbfirstname = $row['user_firstname'];
                                $dbUsername = $row['username'];
                                $dblastname = $row['user_lastname'];
                                $dbrole = $row['user_role'];
                                $dbdate = $row['date'];
                                $dbImage = $row['user_image'];
                                $dbQWallet = $row['q_wallet'];
                                $dbWallet = $row['wallet'];
                            }

                        ?>
                        <!-- User Widget -->
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="images/user/<?php echo $dbImage; ?>" alt="">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center"><?php echo $dbfirstname . ' ' . $dblastname; ?></h5>
                            <p class="text-center">Joined <?php echo date('l jS \of F Y h:i:s A',strtotime($dbdate)); ?></p>
                            <hr>
                            <P class="widget-header text-right">Q-Wallet: ₦<?php echo number_format(round($dbQWallet,2),2); ?>
                                <br>Wallet: ₦<?php echo number_format(round($dbWallet,2),2); ?></P>
                            <center><a href="user-profile.php?loginID=<?php echo $username; ?>" class="btn btn-transparent">Edit Profile</a></center>
                        </div>

                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li class="active"><a href="referrals.php"><i class="fa fa-user"></i> Referrals <span>
                                <?php
                                    $sql = " SELECT referrals FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                                    $result = Query($sql);

                                    if($row = fetch_data($result))
                                    {
                                        $Referrals = $row['referrals'];

                                        if($Referrals > 0)
                                        {
                                            echo $Referrals;
                                        }
                                        else
                                        {
                                            echo '0';
                                        }
                                    }
                                    ?>
                          </span></a></li>
                                <li><a href="inbox.php"><i class="fa fa-envelope"></i>Inbox
                                        <?php
                                            $sql = " SELECT * FROM inbox WHERE status='unread'  ";
                                            $result = Query($sql);
                                            confirm($result);

                                            if(fetch_data($result))
                                            {
                                                echo '<span>';

                                                $count = row_count($result);

                                                if($count)
                                                {
                                                    echo $count;
                                                }

                                                echo '</span>';
                                            }
                                        ?>
                                    </a></li>
                                <li><a href="wallet.php"><i class="fa fa-google-wallet"></i> Wallet</a></li>
                                <li><a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a></li>
                                <li><a href="logout.php"><i class="fa fa-cog"></i> Logout</a></li>
                                <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete
                                        Account</a></li>
                            </ul>
                        </div>

                        <!-- delete-account modal -->
                        <!-- delete account popup modal start-->
                        <!-- Modal -->
                        <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body text-center">
                                            <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                                            <h6 class="py-2">Are you sure you want to delete your account? This process cannot be undone.</h6>
                                            <p>Tell us why you want to Delete your Account</p>
                                            <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                                        </div>
                                        <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- delete account popup modal end-->
                        <!-- delete-account modal -->

                    </div>
                </div>
                <?php
                    if(isset($_GET['view'])){

                        $RefId = $_GET['view'];

                        $query = " SELECT * FROM referrals WHERE id=$RefId ";
                        $result = Query($query);
                        confirm($result);

                        if($row = fetch_data($result)){
                            $RefDownline = $row['downlines'];
                        }
                ?>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header text-right"><a href="refer-code.php" class="btn btn-main-sm">Refer</a></h3>
                        <table class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Downline</th>
                                <th>Transaction</th>
                                <th>Commission</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $per_page = 4;

                            if(isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }
                            else
                            {
                                $page = 1;
                            }

                            if($per_page == '' || $page == 1)
                            {
                                $page_1 = 0;
                            }
                            else
                            {
                                $page_1 = ($page * $per_page) - $per_page;
                            }

                            $query = " SELECT * FROM referrals_history WHERE referrer=md5('$dbUsername') AND downline='$RefDownline'  ORDER BY id DESC ";
                            $result = Query($query);
                            confirm($result);
                            $count = row_count($result);

                            $count = ceil($count / $per_page);

                            $sql = "SELECT * FROM referrals_history WHERE referrer=md5('$dbUsername') AND downline='$RefDownline' ORDER BY id DESC LIMIT $page_1, $per_page ";
                            $check = Query($sql);
                            confirm($check);

                            while($row = fetch_data($check))
                            {
                                $Id = $row['id'];
                                $DownLine = $row['downline'];
                                $Transaction = $row['transaction'];
                                $Commission = $row['commission'];
                                $Date = $row['date'];
                        ?>
                                <tr>
                                    <td><?php echo $DownLine; ?></td>
                                    <td><?php echo $Transaction; ?></td>
                                    <td><?php echo ' ₦' .$Commission; ?></td>
                                    <td><?php print date("r", strtotime($Date)); ?></td>
                                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Referral Commission? Note: Only the History will be Deleted and Nothing Else');" href="referrals_history.php?delete=<?php echo $Id; ?>&ref=<?php echo $RefId; ?>&page=<?php echo $page; ?>" class="text-info">Delete</a></td>
                                </tr>
                            <?php } if(!fetch_data($result) && (!row_count($check)>= 1)){ echo '<h3 class="widget-header text-right">You have no Commission(s) From '.$RefDownline.' Yet.</h3>'; }else{echo '<p class="text-right">'.row_count($result).' Commission(s) From '.$RefDownline.'</p>';} ?>
                            </tbody>
                        </table>

                    </div>

                    <!-- pagination -->
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                if($page > 1){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="referrals.php?page=<?php echo $page-1; ?>&view=<?php echo $RefId; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php
                                }

                                for($i =1; $i <= $count; $i++)
                                {
                                    if($i == $page){
                                        echo "<li class='page-item active'><a class='page-link' href='referrals.php?page={$i}&view={$RefId}'>{$i}</a></li>";
                                    }else{
                                        echo "<li><a class='page-link' href='referrals.php?page={$i}&view={$RefId}'>{$i}</a></li>";
                                    }
                                }

                                if($i>$page_1){
                                    if($count){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="referrals.php?page=<?php echo $page+1; ?>&view=<?php echo $RefId; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php } } ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination -->
                <?php
                    }else{
                ?>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Recently Favorited -->
                    <div class="widget dashboard-container my-adslist">
                        <h3 class="widget-header text-right"><a href="refer-code.php" class="btn btn-main-sm">Refer</a></h3>
                        <table class="table table-responsive product-dashboard-table product-table">
                            <thead>
                            <?php
                                $query = " SELECT * FROM users WHERE username='$dbUsername' ";
                                $result = Query($query);
                                confirm($result);

                                if($row = fetch_data($result)) {
                                    $referrals = $row['referrals'];

                                    if ($referrals > 0) {
                                        ?>
                                        <tr>
                                            <th>Image</th>
                                            <th>User Details</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </thead>
                            <tbody>
                            <?php

                            $per_page = 5;

                            if(isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }
                            else
                            {
                                $page = 1;
                            }

                            if($per_page == '' || $page == 1)
                            {
                                $page_1 = 0;
                            }
                            else
                            {
                                $page_1 = ($page * $per_page) - $per_page;
                            }

                            $query = " SELECT * FROM users WHERE username='$dbUsername' ";
                            $result = Query($query);
                            confirm($result);

                            if($row = fetch_data($result))
                            {
                                $referrals = $row['referrals'];

                                if($referrals > 0)
                                {
                                    $query = " SELECT * FROM referrals WHERE referrer = md5('$dbUsername') ORDER BY id DESC ";
                                    $result = Query($query);
                                    confirm($result);
                                    $count = row_count($result);

                                    $count = ceil($count / $per_page);

                                    $sql = " SELECT * FROM referrals WHERE referrer = md5('$dbUsername') ORDER BY id DESC LIMIT $page_1, $per_page ";
                                    $check = Query($sql);
                                    confirm($check);

                                    while($row = fetch_data($check))
                                    {
                                        $dbId = $row['id'];
                                        $dbDownlines = $row['downlines'];
                                        $dbRefId = $row['referrer'];
                                        $dbRefDate = $row['refer_date'];

                                        $sqlquery = " SELECT * FROM users WHERE username='$dbDownlines' ";
                                        $try = Query($sqlquery);
                                        confirm($try);

                                        while($rows = fetch_data($try))
                                        {
                                            $last = $rows['user_lastname'];
                                            $Img = $rows['user_image'];
                                            $Active = $rows['user_active'];

                                        }

                                        ?>
                                        <tr>
                                            <td class="product-thumb">
                                                <?php

                                                if(empty($Img))
                                                {
                                                    echo '<i id="img" class="fa fa-user text-center px-3"></i>';
                                                }
                                                else
                                                {
                                                    echo '<img width="80px" height="auto" src="images/user/'. $Img.'" alt="Image"></td>';
                                                }

                                                ?>
                                            <td class="product-details">
                                                <h3 class="title"><?php echo $dbDownlines. ' ' .$last; ?></h3>
                                                <span class="add-id"><strong>Ref ID:</strong> <?php echo $dbRefId; ?></span>
                                                <span><strong>Referred on: </strong><time><?php print date("r", strtotime($dbRefDate)); ?></time> </span>
                                            </td>
                                            <td class="product-category"><span class="status active">
                                                    <?php

                                                    if($Active == 1)
                                                    {
                                                        echo 'Active';
                                                    }
                                                    else
                                                    {
                                                        echo 'Not Active';
                                                    }

                                                    ?>
                                                </span></td>
                                            <td class="action" data-title="Action">
                                                <div class="">
                                                    <ul class="list-inline justify-content-center">
                                                        <li class="list-inline-item">
                                                            <a data-toggle="tooltip" data-placement="top" title="View Commissions" class="view" href="referrals.php?view=<?php echo $dbId; ?>">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } if(fetch_data($result) && (row_count($check) >= 1)){echo '<p class="text-right">'.row_count($check).' Referral(s)</p>';} }else{ echo '<h3 class="widget-header text-right">You have no Referral(s) Yet. <a class="text-warning" href="refer-code.php">Start Referring?</a></h3>'; } } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- pagination -->
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                    if($page > 1){
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="referrals.php?page=<?php echo $page-1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                    }

                                    for($i =1; $i <= $count; $i++)
                                    {
                                        if($i == $page){
                                            echo "<li class='page-item active'><a class='page-link' href='referrals.php?page={$i}'>{$i}</a></li>";
                                        }else{
                                            echo "<li><a class='page-link' href='referrals.php?page={$i}'>{$i}</a></li>";
                                        }
                                    }

                                    if($i>$page_1){
                                        if($count){
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="referrals.php?page=<?php echo $page+1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination -->
                    <?php
                        }
                    }
                    else
                    {
                        redirect("login.php");
                        set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access Wallet</h3>');
                    }

                    ?>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </section>


<?php require_once('includes/footer.php'); ?>