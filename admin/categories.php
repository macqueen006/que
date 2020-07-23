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
              <h5 class="card-title text-center">CATEGORIES
                <?php edit_category(); delete_category(); display_message(); ?>
              </h5>
			  <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                
                    $query = " SELECT * FROM categories ";
                    $result = Query($query);
                    confirm($result);

                    while($row = fetch_data($result))
                    {
                       $Id = $row['cat_id'];
                       $Title = $row['cat_title'];

                ?>
                  <tr>
                    <th scope="row"><?php echo $Id; ?></th>
                    <td><?php echo $Title; ?></td>
                    <td><a href="categories.php?edit=<?php echo $Id; ?>">Edit</a></td>
                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Category?');" href="categories.php?delete=<?php echo $Id; ?>">Delete</a></td>
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
           <div class="card-title text-center">ADD CATEGORY
            <p><?php add_category(); ?></p>
           </div>
           <hr>
            <form method="POST">
           <div class="form-group">
            <label for="input-6">Title</label>
            <?php 

                if(isset($_GET['edit']))
                {
                    $cat_id = clean($_GET['edit']);

                    $query = " SELECT * FROM categories WHERE cat_id='$cat_id' ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $cat_title = $row['cat_title'];
                    }
                    else
                    {
                        redirect("categories.php");
                    }
                }

            ?>
            <input type="text" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control form-control-rounded" name="title" id="input-6" placeholder="Enter A Title">
           </div>
           <div class="form-group">
            <?php

                if(isset($cat_title))
                {
                    echo '<button name="update" type="submit" class="btn btn-light btn-round px-5"><i class="zmdi zmdi-assignment"></i> Update Category</button>';
                }
                else
                {
                    echo '<button name="add" type="submit" class="btn btn-light btn-round px-5"><i class="zmdi zmdi-assignment"></i> Add Category</button>';
                }

            ?>
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