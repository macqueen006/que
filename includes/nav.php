<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.html">
						<img src="images/logoo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
                            
                            <?php

                                if(logged_in())
                                {

                            ?>

                            <li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" id="navigate-main" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu" id="navigate-bar">
                                    <a class="dropdown-item" id="navigate-links" href="dashboard.php">Dashboard</a>
                                    <a class="dropdown-item" id="navigate-links" href="user-profile.php?loginID=<?php echo $_SESSION['loginID']; ?>">My Profile</a>
								</div>
							</li>

                            <?php

                                }

                            ?>

							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" id="navigate-main" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu" id="navigate-bar">
									<a class="dropdown-item" id="navigate-links" href="about-us.php">About Us</a>
									<a class="dropdown-item" id="navigate-links" href="contact-us.php">Contact Us</a>
									<a class="dropdown-item" id="navigate-links" href="forum.php">Q-Forum</a>
                                    <a class="dropdown-item" id="navigate-links" href="game.php">Q-Gaming</a>
								</div>
							</li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link dropdown-toggle" id="navigate-main" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Transactions <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu" id="navigate-bar">
                                    <a class="dropdown-item" id="navigate-links" href="deposit.php">Deposit</a>
                                    <a class="dropdown-item" id="navigate-links" href="withdraw.php">Withdraw</a>
                                    <a class="dropdown-item" id="navigate-links" href="ticket.php">Ticket Top-Up</a>
                                    <a class="dropdown-item" id="navigate-links" href="transfer-to-q-wallet.php">Ticket Transfer</a>
                                </div>
                            </li>
                        </ul>
                        <?php 

                            if(logged_in() == false)
                            {
                        
                        ?>

                        <ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" id="logout-link" href="login.php">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link login-button" id="logout-link" href="register.php">Register</a>
							</li>
						</ul>

                        <?php

                            }
                            else
                            {

                        ?>

                        <ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" id="logout-link" href="logout.php">Logout</a>
							</li>
						<?php

								$Username = $_SESSION['loginID'];

								$sql = " SELECT * FROM users WHERE username='$Username' OR user_phone='$Username' OR user_email='$Username' ";
								$result = Query($sql);
								confirm($result);

								if($row = fetch_data($result))
								{
									$dbWallet = $row['wallet'];

						?>
							<li class="nav-item">
								<a class="nav-link login-button" id="logout-link" href="wallet.php">₦<?php echo number_format(round($dbWallet,2),2); ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="ad-listing.html"><i class="fa fa-plus-circle"></i> Add Listing</a>
							</li>
						</ul>

                        <?php
								}
                            }

                        ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>