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
      <form method="POST">
          <div class="card">
            <div class="card-body">
            <div class="col-sm-3">
                <select class="form-control" name="select" id="">
                    <option value="clone">Clone</option>
                    <option value="delete">Delete</option>
                    <option value="draft">Draft</option>
                    <option value="published">Publish</option>
                </select>
                <br>
                <span>
                    <input class="btn btn-light px-5" type="submit" value="Apply">
                    <a style="margin-left:10px;" href="add_post.php"> Add New</a>
                </span>
            </div>
              <h5 class="card-title text-center">TAGS
                <p><?php ?></p>
              </h5>
			  <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col"><input type="checkbox" onclick="checkAll('Boxes', this);"></th>
                    <th scope="col">Id</th>
                    <th scope="col">Post</th>
                    <th scope="col">Author</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php 

                    $query = " SELECT * FROM comment_tags ";
                    $result = Query($query);
                    confirm($result);

                    while($row = fetch_data($result))
                    {
                        $Id = $row['id'];
                        $PostId = $row['post_id'];
                        $CommentId = $row['comment_id'];
                        $TagId = $row['tag_id'];
                        $Author = $row['author'];
                        $Date = $row['date'];
                        $Content = substr($row['content'], 0,50);

                ?>
                  <tr>
                    <th scope="row"><input type="checkbox" name="checkBoxArray[]" class="Boxes" value="<?php echo $Id; ?>"></th>
                    <th scope="row"><?php echo $Id; ?></th>
                    <td><?php
                    
                        $sql = " SELECT * FROM forum WHERE id=$PostId ";
                        $find = Query($sql);
                        confirm($find);

                        while($rows = fetch_data($find))
                        {
                            $Title = $rows['title'];

                            echo $Title;
                        }
                    
                    ?></td>
                    <td><?php echo $Author; ?></td>
                    <td><?php 
                    
                        $sqlquery = " SELECT * FROM comments WHERE id=$CommentId ";
                        $comment = Query($sqlquery);
                        confirm($comment);

                        while($comRow = fetch_data($comment))
                        {
                            $ComAuthor = $comRow['author'];

                            echo $ComAuthor;
                        }
                    
                    ?></td>
                    <td><?php echo $Content; ?>...</td>
                    <td><?php echo $Date; ?></td>
                    <td><a href="../comment-details.php?replyTag=<?php echo $Id; ?>">View</a></td>
                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Post?');" href="forum.php?delete=<?php echo $Id; ?>">Delete</a></td>
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