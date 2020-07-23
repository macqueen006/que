<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<?php

if(!logged_in())
{
    redirect("login.php");
    set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access The Page</h3>');
}

?>

<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
                <?php
                    if(logged_in() == true)
                    {
                        $username = $_SESSION['loginID'];
                        $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                        $result = Query($query);
                        confirm($result);

                        if($row = fetch_data($result)){
                            $dbfirstname = $row['user_firstname'];
                            $dblastname = $row['user_lastname'];
                            $dbrole = $row['user_role'];
                            $dbdate = $row['date'];
                            $dbImage = $row['user_image'];
                            $dbWallet = $row['wallet'];
                            $dbUsername = $row['username'];
                            $dbQWallet = $row['q_wallet'];
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
                            <li><a href="referrals.php"><i class="fa fa-user"></i> Referrals <span>
                        <?php
                        $sql = " SELECT referrals FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                        $result = Query($sql);
                        confirm($result);

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
                            <li class="active"><a href="inbox.php"><i class="fa fa-envelope"></i>Inbox
                                    <?php
                                    $sql = " SELECT * FROM inbox WHERE status='unread' AND user='$dbUsername'  ";
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
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <?php delete_inbox(); ?>
          <table class="table table-responsive product-dashboard-table">
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
                
                $query = " SELECT * FROM inbox WHERE user='$dbUsername' ORDER BY id DESC ";
                $result = Query($query);
                confirm($result);
                $count = row_count($result);

                $count = ceil($count / $per_page);

                $sql = "SELECT * FROM inbox WHERE user='$dbUsername' ORDER BY id DESC LIMIT $page_1, $per_page ";
                $check = Query($sql);
                confirm($check);

                while($row = fetch_data($check))
                {
                    $Id = $row['id'];
                    $Subject = $row['subject'];
                    $Header = $row['header'];
                    $Message = substr($row['message'], 0,100);
                    $Date = $row['date'];
            ?>
              <tr>
                <td class="product-details">
                  <h3 class="title"><?php echo $Header;
                    if($row['status'] == 'unread')
                    {
                        echo '<span style="color:green;" class="float-right">new</span>';
                    }
                  ?></h3>
                  <span><p><?php echo $Message; ?></p></span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <a data-toggle="tooltip" data-placement="top" title="view" class="view" href="inbox-details.php?Message=<?php echo $Id; ?>">
                          <i class="fa fa-eye"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a class="delete" onclick="javascript: return confirm('Are you sure you want to delete this Inbox Message?');" data-toggle="tooltip" data-placement="top" title="Delete" href="inbox.php?delete=<?php echo $Id; ?>">
                          <i class="fa fa-trash"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
                  <?php } if(fetch_data($result) && (row_count($check) >= 1)){echo '<p class="text-right">'.row_count($result).' Inbox Message(s)</p>';}else{echo '<p class="widget-header text-right">No Inbox Message(s)!</p>';} ?>
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
                                    <a class="page-link" href="inbox.php?page=<?php echo $page-1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                            }

                            for($i =1; $i <= $count; $i++)
                            {
                                if($i == $page){
                                    echo "<li class='page-item active'><a class='page-link' href='inbox.php?page={$i}'>{$i}</a></li>";
                                }else{
                                    echo "<li><a class='page-link' href='inbox.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if($i>$page_1){
                                if($count){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="inbox.php?page=<?php echo $page+1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php } } ?>
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->
                    <?php } ?>
      </div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>


<?php require_once('includes/footer.php'); ?>