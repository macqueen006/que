<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<?php
					if(logged_in())
					{
						if(isset($_GET['loginID']))
						{
							$username = $_GET['loginID'];

							$query = " SELECT * FROM users WHERE username='$username' OR user_email='$username' OR user_phone='$username' ";
							$result = Query($query);
							confirm($result);

							if($row = fetch_data($result))
							{
								$dbFirstname = $row['user_firstname'];
								$dbLastname = $row['user_lastname'];
								$dbImage = $row['user_image'];
								$dbUsername = $row['username'];
								$dbPassword = $row['user_password'];
								$dbGender = $row['user_gender'];
								$dbPhone = $row['user_phone'];
								$dbEmail = $row['user_email'];
								$dbDate = $row['date'];
								$dbProUpdate = $row['profile_update'];
                                $dbPhoneActive = $row['phone_active'];
					?>
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="images/user/<?php echo $dbImage; ?>" alt="">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo $dbFirstname . ' ' . $dbLastname; ?></h5>
                        <p>Created <?php echo date_format1($dbDate); ?></p>
                        <hr>
						<p>Updated <?php print date_format1($dbProUpdate); ?></p>
					</div>
					<!-- Dashboard Links -->
					<div class="widget dashboard-links">
						<ul>
							<li><a class="my-1 d-inline-block" href="">Savings Dashboard</a></li>
							<li><a class="my-1 d-inline-block" href="">Saved Offer <span>(5)</span></a></li>
							<li><a class="my-1 d-inline-block" href="">Favourite Stores <span>(3)</span></a></li>
							<li><a class="my-1 d-inline-block" href="">Recommended</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					<p><?php edit_profile(); update_profile(); ?></p>
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>
							<form method="POST" enctype="multipart/form-data">
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name">First Name</label>
									<input type="text" name="firstname" class="form-control" oninput="fname();" id="firstname" value="<?php echo $dbFirstname; ?>">
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Last Name</label>
									<input type="text" name="lastname" class="form-control" id="lastname" oninput="lname();" value="<?php echo $dbLastname; ?>">
								</div>
								<!-- Checkbox -->
								<div class="form-group">
									<label for="comunity-name">Gender</label>
									<select name="gender" id="" class="form-control float-right">
										<?php

											if($dbGender == 'male')
											{

										?>
										<option value="<?php echo $dbGender; ?>">Male</option>
										<option value="female">Female</option>
										<option value="other">Other</option>
										<?php

											}
											else if($dbGender == 'female')
											{

										?>
										<option value="<?php echo $dbGender; ?>">Female</option>
										<option value="male">Male</option>
										<option value="other">Other</option>
										<?php

											}
											else if($dbGender == 'other')
											{

										?>
										<option value="<?php echo $dbGender; ?>">Other</option>
										<option value="female">Female</option>
										<option value="male">Male</option>
										<?php

											}

										?>
									</select>
								</div>
								<!-- Submit button -->
								<button type="submit" name="updateName" class="btn btn-outline-secondary">Save My Changes</button>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form method="POST">
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
                                <p id="passNote"><b>Note! Password must contain atleast small letters, one capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
                                <p id="passWarn"><b>Make sure Password contains atleast small letters, a capital letter, a number and a special character... Example: <span style="color:gold;">patterN1*</span></b></p>
								<input type="password" class="form-control" id="password" name="password" onfocus="checkp();" oninput="pass();">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
                                <p id="passMatch"><b>Passwords don't Match!</b></p>
								<input type="password" class="form-control" id="cpassword" name="cpassword" onfocus="checkcp();" oninput="cpass();">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="updatePass" class="btn btn-outline-secondary">Change Password</button>
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Phone</h3>
						<form method="POST">
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password" style="<?php if($dbPhoneActive == 0){echo 'color:red;';} ?>"><?php if($dbPhoneActive == 1){echo 'Current Phone';}else{echo 'Phone Not Active!!!';} ?></label>
								<input type="tel" class="form-control" style="<?php if($dbPhoneActive == 0){echo 'color:red;';} ?>" value="<?php echo $dbPhone; ?>" disabled>
							</div>
                            <?php
                                if($dbPhoneActive == 1){
                            ?>
							<!-- Phone -->
							<div class="form-group">
								<label for="zip-code">New Phone</label>
								<input type="tel" class="form-control" name="phone" id="phone" oninput="p_hone();" minlength="10" maxlength="11">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="updatePhone" class="btn btn-outline-secondary">Change Number</button>
                            <?php
                                }else{
                            ?>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-outline-secondary">Activate Number</button>
                            <?php } ?>
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Username -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Username</h3>
						<form method="POST">
							<!-- User Name -->
							<div class="form-group">
								<label for="comunity-name">Current Username</label>
								<input type="text" class="form-control" value="<?php echo $dbUsername; ?>" disabled>
							</div>
							<!-- User Name -->
							<div class="form-group">
                                <label for="">Username*</label>
                                <p id="userNote"><b>Note! Username can only contain letters, numbers, underscores and dashes. Example: <span style="color:gold;">John_1-0</span></b></p>
                                <p id="userLess"><b>Username can't be less than 5 characters.</b></p>
								<input type="text" name="username" class="form-control" id="username" onfocus="checku();" oninput="uname();">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="updateUsername" class="btn btn-outline-secondary">Change Username</button>
						</form>
					</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<!-- Change Email Address -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Update Profile Image</h3>
						<form method="POST" enctype="multipart/form-data">
							<!-- File chooser -->
							<div class="form-group choose-file d-inline-flex">
								<i id="img" class="fa fa-user text-center px-3"></i>
								<input type="file" name="image" class="form-control-file mt-2 pt-1" id="img2">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="updateImage" class="btn btn-outline-secondary">Update Image</button>
						</form>
					</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<!-- Change Email Address -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Edit Email Address</h3>
						<form method="POST">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-email">Current Email</label>
								<input type="email" class="form-control" value="<?php echo $dbEmail; ?>" disabled>
							</div>
							<!-- New email -->
							<div class="form-group">
                                <label for="">New Email*</label>
                                <p id="emailNote"><b>Note! Email must contain special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
                                <p id="emailWarn"><b>Make sure Email contains special characters and must be valid. Example: <span style="color:gold;">john@example.com</span></b></p>
								<input type="email" class="form-control" id="email" name="email" oninput="e_mail();" onfocus="checke();">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="updateEmail" class="btn btn-outline-secondary">Change email</button>
								<?php

									}
									else
									{
										?>
                                        <script type="text/javascript">
                                            alert('Error! User Not Available.');
                                            window.location.href="index.php";
                                        </script>
                                        <?php
									}
								}
							}
							else
							{
								redirect("login.php");
								set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access User Profile Page</h3>');
							}
							
						?>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once('includes/footer.php'); ?>