<?php require_once('includes/header.php'); ?>

<!-- Start wrapper-->
<div id="wrapper">
 
 <?php require_once('includes/sidenav.php'); ?>
 
 <?php require_once('includes/topnav.php'); ?>

<?php
$query = " SELECT * FROM users WHERE user_role='subscriber' ";
$result = Query($query);
$UsersCount = row_count($result);
?>
 
 <div class="clearfix"></div>
     
   <div class="content-wrapper">
     <div class="container-fluid">
 
   <!--Start Dashboard Content-->

   <div class="col-lg-12">
      <form method="POST">
          <div class="card">
            <div class="card-body">
            <div class="col-sm-3">
                <select class="form-control" name="select" id="">
                    <option value="delete">Delete</option>
                    <option value="view">View</option>
                </select>
                <br>
                <span>
                    <input class="btn btn-light px-5" type="submit" value="Apply">
                    <a style="margin-left:10px;" href="add_post.php"> Add New</a>
                </span>
            </div>
              <h5 class="card-title text-center">USERS()
                <p><?php ?></p>
              </h5>
			  <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col"><input type="checkbox" onclick="checkAll('Boxes', this);"></th>
                    <th scope="col">Id</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Image</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Role</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Profile Update</th>
                    <th scope="col">Wallet</th>
                    <th scope="col">Q_Wallet</th>
                    <th scope="col">Referrals</th>
                  </tr>
                </thead>
                <tbody>
                <?php 

                    $query = " SELECT * FROM users WHERE user_role='subscriber' ";
                    $result = Query($query);
                    confirm($result);

                    while($row = fetch_data($result))
                    {
                        $Id = $row['user_id'];
                        $Firstname = $row['user_firstname'];
                        $Lastname = $row['user_lastname'];
                        $Username = $row['username'];
                        $Image = $row['user_image'];
                        $Gender = $row['user_gender'];
                        $Phone = $row['user_phone'];
                        $Email = $row['user_email'];
                        $Status = $row['user_active'];
                        $Role = $row['user_role'];
                        $CrDate = $row['date'];
                        $UpDate = $row['profile_update'];
                        $Wallet = $row['wallet'];
                        $QWallet = $row['q_wallet'];
                        $Referrals = $row['referrals'];

                ?>
                  <tr>
                    <th scope="row"><input type="checkbox" name="checkBoxArray[]" class="Boxes" value="<?php echo $Id; ?>"></th>
                    <th scope="row"><?php echo $Id; ?></th>
                    <td><a href="profile.php?view=<?php echo $Id; ?>"><?php echo $Firstname; ?></a></td>
                    <td><?php echo $Lastname; ?></td>
                    <td><?php echo $Username; ?></td>
                    <?php

                        if(empty($Image))
                        {
                            echo '<td><i class="fa fa-user"></i></td>';
                        }
                        else
                        {

                    ?>
                    <td><img src="../images/user/<?php echo $Image; ?>" style="height:50px;width:70px;" alt=""></td>
                    <?php } ?>
                    <td><?php echo $Gender; ?></td>
                    <td><?php echo $Phone; ?></td>
                    <td><?php echo $Email; ?></td>
                    <?php 

                        if($Status == 1)
                        {
                            echo '<td>Active</td>';
                        }
                        else
                        {
                            echo '<td>Not Active</td>';
                        }

                    ?>
                    <td><?php echo $Role; ?></td>
                    <td><?php echo $CrDate; ?></td>
                    <td><?php echo $UpDate; ?></td>
                    <td><?php echo $Wallet; ?></td>
                    <td><?php echo $QWallet; ?></td>
                    <td><?php echo $Referrals; ?></td>
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