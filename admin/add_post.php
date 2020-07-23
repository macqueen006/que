<?php require_once('includes/header.php'); ?>

<!-- Start wrapper-->
<div id="wrapper">
 
 <?php require_once('includes/sidenav.php'); ?>
 
 <?php require_once('includes/topnav.php'); ?>
 
 <div class="clearfix"></div>
     
   <div class="content-wrapper">
     <div class="container-fluid">
      
   <!--Start Dashboard Content-->

   <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">CREATE NEW POST</h5>
              <p><?php edit_post(); add_post(); ?></p>
			  <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                    <?php 

                        if(isset($_GET['edit']))
                        {
                            $Id = $_GET['edit'];

                            $query = " SELECT * FROM forum WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            if($row = fetch_data($result))
                            {
                                $Title = $row['title'];
                                $Image = $row['image'];
                                $Content = $row['content'];
                                $Category_id = $row['category_id'];
                                $Status = $row['status'];
                                $Tags = $row['tags'];
                            }
                        }

                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Title</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="title" type="text" value="<?php if(isset($Title)) {echo $Title;} ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Image</label>
                            <div class="col-lg-6">
                                <?php 

                                    if(isset($Image))
                                    {
                                        echo '<img style="width:60px;height:50px;" src="../images/forum/'. $Image .'">';
                                    }

                                ?>
                                <input class="form-control" type="file" name="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Content</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" name="content" id="" cols="30" rows="10"><?php if(isset($Content)) {echo $Content;} ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Tags</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="tags" value="<?php if(isset($Tags)) {echo $Tags;} ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Category</label>
                            <div class="col-lg-6">
                                <?php 

                                    if(isset($Category_id))
                                    {
                                        $sql = " SELECT * FROM categories WHERE cat_id=$Category_id ";
                                        $result = Query($sql);
                                        confirm($result);

                                        if($row = fetch_data($result))
                                        {
                                            $main_id = $row['cat_id'];
                                            $main_title = $row['cat_title'];
                                        }
                                ?>
                                <select class="form-control" name="category" id="">
                                    <option value="<?php echo $main_title; ?>"><?php echo $main_title; ?></option>
                                    <?php

                                        $sql = " SELECT * FROM categories ";
                                        $result = Query($sql);
                                        confirm($result);

                                        while($row = fetch_data($result))
                                        {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                    ?>
                                    <option value="<?php echo $cat_title; ?>"><?php echo $cat_title; ?></option>
                                    <?php } ?>
                                </select>        

                                <?php
                                    }
                                    else
                                    {

                                ?>
                                <select class="form-control" name="category" id="">
                                    <?php

                                        $sql = " SELECT * FROM categories ";
                                        $result = Query($sql);
                                        confirm($result);

                                        while($row = fetch_data($result))
                                        {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];

                                    ?>
                                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Status</label>
                            <div class="col-lg-6">
                                <?php 

                                    if(isset($Status))
                                    {
                                        if($Status == 'published')
                                        {
                                            
                                ?>
                                <select name="status" class="form-control" id="">
                                    <option value="<?php echo $Status; ?>">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                                    <?php 
                                    
                                        }
                                        else if($Status == 'draft')
                                        {

                                    ?>
                                <select class="form-control" name="status" id="">
                                    <option value="<?php echo $Status; ?>">Drafted</option>
                                    <option value="published">Publish</option>
                                </select>
                                <?php 
                                
                                        }
                                    }
                                    else
                                    {

                                ?>
                                <select class="form-control" name="status" id="">
                                    <option value="draft">Draft</option>
                                    <option value="published">Publish</option>
                                </select>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <?php

                                    if(isset($Title))
                                    {

                                ?>
                                <input type="submit" name="update" class="btn btn-primary" value="Update">
                                <?php 
                                
                                    }
                                    else
                                    {
                                
                                ?>
                                <input type="submit" class="btn btn-primary" value="Create">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </tbody>
              </table>
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

    <script type="text/javascript">
        tinymce.init({selector:'textarea'});
    </script>
   
   <?php require_once('includes/footer.php'); ?>