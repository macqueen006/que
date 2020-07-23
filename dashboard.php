<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--==================================
=            User Profile            =
===================================-->
<?php

  if(logged_in() == true)
  {
    $username = $_SESSION['loginID'];
    $query = " SELECT * FROM users WHERE username='".$username."' OR user_phone='".$username."' OR user_email='".$username."' ";
    $result = Query($query);

    if($row = fetch_data($result))
    {
      $dbfirstname = $row['user_firstname'];
      $dblastname = $row['user_lastname'];
      $dbrole = $row['user_role'];
      $dbdate = $row['date'];
      $dbImage = $row['user_image'];
      $dbReferrals = $row['referrals'];
      $dbQWallet = $row['q_wallet'];
      $dbWallet = $row['wallet'];
      $dbUsername = $row['username'];
    }

?>
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user">
              <!-- User Image -->
              <div class="image d-flex justify-content-center">
                  <a href="images/user/<?php echo $dbImage; ?>"><img src="images/user/<?php echo $dbImage; ?>" alt=""></a>
              </div>
            <!-- User Name -->
            <h5 class="text-center">Hi! <?php echo $dbfirstname; ?></h5>
              <hr>
              <P class="widget-header text-right">Q-Wallet: ₦<?php echo number_format(round($dbQWallet,2),2); ?>
                  <br>Wallet: ₦<?php echo number_format(round($dbWallet,2),2); ?></P>
            <center><a href="user-profile.php?loginID=<?php echo $username; ?>" class="btn btn-transparent">Edit Profile</a></center>
          </div>

          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href="referrals.php"><i class="fa fa-user"></i> Referrals <span>
                <?php
                    $sql = " SELECT referrals FROM users WHERE username='$dbUsername' ";
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
                    $sql = " SELECT * FROM inbox WHERE status='unread' AND user='$dbUsername'  ";
                    $result = Query($sql);
                    confirm($result);

                    if(fetch_data($result))
                    {
                        echo '<span>';

                        $inboxCount = row_count($result);

                        if($inboxCount)
                        {
                            echo $inboxCount;
                        }

                        echo '</span>';
                    }
                ?>
              </a></li>
              <li><a href="wallet.php"><i class="fa fa-google-wallet"></i> Wallet</a></li>
                <li><a href="game_review.php"><i class="fa fa-gamepad"></i>Game Results
                        <?php
                        $gameQuery = " SELECT * FROM game_results WHERE status='pending' AND user='$dbUsername'  ";
                        $gameResult = Query($gameQuery);
                        confirm($gameResult);

                        if(fetch_data($gameResult))
                        {
                            echo '<span>';

                            $game_results = row_count($gameResult);

                            if($game_results)
                            {
                                echo $game_results;
                            }

                            echo '</span>';
                        }
                        ?>
                    </a></li>
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
          <h3 class="widget-header">My Dashboard</h3>
          <table class="table table-hover product-dashboard-table">
            <tbody>
                <tr>
                    <?php
                        $query = " SELECT * FROM inbox WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);
                        $allInbox = row_count($result);
                    ?>
                    <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                        <a href="inbox.php"><h3 id="dash1" class="text-right">Inbox: <?php echo $allInbox; ?></h3></a>
                        <p class="text-right">You have <?php echo $inboxCount; ?> unread message(s)</p>
                    </div>
                </tr>
              <tr>
                  <div class="jumbotron" onmouseover="dashon4();" onmouseleave="dashoff4();">
                      <a href="referrals.php"><h3 id="dash4" class="text-right">Referrals: <?php echo $dbReferrals; ?></h3></a>
                      <p class="text-right">You have <?php echo $dbReferrals; ?> referral(s)</p>
                  </div>
              </tr>
              <tr>
                    <?php
                        $query = " SELECT * FROM game_results WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);
                        $gameCount = row_count($result);
      
                        $query = " SELECT * FROM game_results WHERE user='$dbUsername' AND status='pending' ";
                        $result = Query($query);
                        confirm($result);
                        $gameStatusCount = row_count($result);
                    ?>
                    <div class="jumbotron" onmouseover="dashon5();" onmouseleave="dashoff5();">
                        <a href="game_review.php"><h3 id="dash5" class="text-right">Game Results: <?php echo $gameCount; ?></h3></a>
                        <p class="text-right">You have <?php echo $gameStatusCount; ?> pending game result(s)</p>
                    </div>
                </tr>
              <tr>
                  <?php
                  $query = " SELECT * FROM q_money_transaction WHERE user='$dbUsername' ";
                  $result = Query($query);
                  confirm($result);
                  $qMoney = row_count($result);
                  ?>
                  <div class="jumbotron" onmouseover="dashon2();" onmouseleave="dashoff2();">
                      <a href="wallet.php"><h3 id="dash2" class="text-right">Q-Wallet Balance: ₦<?php echo number_format($dbQWallet,2); ?></h3></a>
                      <p class="text-right">You have ₦<?php echo number_format($dbQWallet,2); ?></p>
                      <hr>
                      <p class="text-right">You have <?php echo number_format($qMoney); ?> Transaction(s)</p>
                  </div>
              </tr>
              <tr>
                  <?php
                  $query = " SELECT * FROM money_transaction WHERE user='$dbUsername' ";
                  $result = Query($query);
                  confirm($result);
                  $Money = row_count($result);
                  ?>
                  <div class="jumbotron" onmouseover="dashon3();" onmouseleave="dashoff3();">
                      <a href="wallet.php"><h3 id="dash3" class="text-right">Wallet Balance: ₦<?php echo number_format($dbWallet,2); ?></h3></a>
                      <p class="text-right">You have ₦<?php echo number_format($dbWallet,2); ?></p>
                      <hr>
                      <p class="text-right">You have <?php echo number_format($Money); ?> Transaction(s)</p>
                  </div>
              </tr>
            </tbody>
          </table>

        </div>

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<?php }

  else
  {
      redirect("login.php");
      set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access Dashboard</h3>');
  }

  ?>

    <script type="text/javascript">
        function dashon1()
        {
            document.getElementById("dash1").style = "color:white;";
        }
        function dashoff1()
        {
            document.getElementById("dash1").style = "color:black";
        }
        function dashon2()
        {
            document.getElementById("dash2").style = "color:white;";
        }
        function dashoff2()
        {
            document.getElementById("dash2").style = "color:black";
        }
        function dashon3()
        {
            document.getElementById("dash3").style = "color:white;";
        }
        function dashoff3()
        {
            document.getElementById("dash3").style = "color:black";
        }
        function dashon4()
        {
            document.getElementById("dash4").style = "color:white;";
        }
        function dashoff4()
        {
            document.getElementById("dash4").style = "color:black";
        }
        function dashon5()
        {
            document.getElementById("dash5").style = "color:white;";
        }
        function dashoff5()
        {
            document.getElementById("dash5").style = "color:black";
        }
    </script>

<?php require_once('includes/footer.php'); ?>