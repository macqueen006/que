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
                    
                    if(logged_in() == true)
                    {
                        $username = $_SESSION['loginID'];
                        $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                        $result = Query($query);

                        if($row = fetch_data($result))
                        {
                            $dbfirstname = $row['user_firstname'];
                            $dblastname = $row['user_lastname'];
                            $dbrole = $row['user_role'];
                            $dbdate = $row['date'];
                            $dbImage = $row['user_image'];
							$dbWallet = $row['wallet'];
							$dbUsername = $row['username'];
                        }

                ?>
                    <!-- User Widget -->
                    <div class="widget user-dashboard-profile">
                        <!-- User Image -->
                        <div class="profile-thumb">
                            <img src="images/user/<?php echo $dbImage; ?>" alt="" class="rounded-circle">
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"><?php echo $dbfirstname . ' ' . $dblastname; ?></h5>
                        <p>Joined  <?php print date("r", strtotime($dbdate)); ?></p>
                        <a href="user-profile.html" class="btn btn-main-sm">Edit Profile</a>
                    </div>
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <ul>
                            <li class="active">
                                <a href="wallet.php"><i class="fa fa-user"></i> Referrals</a></li>
                            <li>
                                <a href="dashboard-favourite-ads.html"><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a>
                            </li>
                            <li>
                                <a href="dashboard-archived-ads.html"><i class="fa fa-file-archive-o"></i>Archeved Ads <span>12</span></a>
                            </li>
                            <li>
                                <a href="dashboard-pending-ads.html"><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-cog"></i> Logout</a>
                            </li>
                            <li>
                                <a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete Account</a>
                            </li>
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
                                <div class="modal-body text-center">
                                    <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                                    <h6 class="py-2">Are you sure you want to delete your account?</h6>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                                </div>
                                <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
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
					<h3 style="color:green;" id="RefText" class="widget-header"></h3>
					<table class="table table-responsive product-dashboard-table">
						<tbody>
                            <h3 class="text-center">REFERRAL CODE</h3>
                            <p class="text-center">Please click the button to copy link to clipboard and share</p>
                            <input style="height:32px;" type="text" id="refCode" readonly="readonly" class="form-control text-center" name="refer-code" value="http://localhost/que/register.php?refer-code=<?php echo refer_code($dbUsername); ?>">
                            <br>
                            <center>
                                <button id="refBtn" onclick="CopyRef();" class="btn btn-dark">Copy</button>
                            </center>
						</tbody>
					</table>
				</div>
					<?php } ?>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>

    <script type="text/javascript">
        function CopyRef()
        {
          let copyText = document.getElementById("refCode");

          copyText.select();
          copyText.setSelectionRange(0,999999)

            if(document.execCommand("copy"))
            {
                document.getElementById("RefText").innerHTML = "Referral Code Copied to Clipboard!";
            }
        }
    </script>

<?php require_once('includes/footer.php'); ?>