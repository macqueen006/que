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
                            <h5 class="card-title text-center">GAME CATEGORIES
                                <?php edit_game_category(); delete_game_category(); ?>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Stake</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM game_categories ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $Id = $row['id'];
                                        $Title = $row['title'];
                                        $stake = $row['stake'];
                                        $Time = $row['game_time_in_secs'];
                                        $Date = $row['date'];

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $Id; ?></th>
                                            <td><?php echo $Title; ?></td>
                                            <td><?php echo '₦'.$stake;?></td>
                                            <td><?php echo $Time; ?></td>
                                            <td><?php echo $Date; ?></td>
                                            <td><a href="game_categories.php?edit=<?php echo $Id; ?>">Edit</a></td>
                                            <td><a onclick="javascript: return confirm('Are you sure you want to delete this Category?');" href="game_categories.php?delete=<?php echo $Id; ?>">Delete</a></td>
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
                                <p><?php add_game_category(); ?></p>
                            </div>
                            <hr>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="input-6">Title*</label>
                                    <?php

                                    if(isset($_GET['editCat']))
                                    {
                                        $CatId = clean($_GET['editCat']);

                                        $query = " SELECT * FROM game_categories WHERE id=$CatId ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($row = fetch_data($result))
                                        {
                                            $editTitle = $row['title'];
                                            $editStake = $row['stake'];
                                            $editTime = $row['game_time_in_secs'];
                                        }
                                        else
                                        {
                                            redirect("game_categories.php");
                                        }
                                    }

                                    ?>
                                    <input type="text" value="<?php if(isset($editTitle)){echo $editTitle;} ?>" class="form-control form-control-rounded" name="title" id="input-6" placeholder="Enter A Title"><br>
                                    <label for="">Stake*</label>
                                    <select name="stake" id="input-6" class="form-control form-control-rounded">
                                        <?php

                                            if(isset($editStake))
                                            {
                                                if($editStake == 50)
                                                {
                                                    echo '<option value="'. $editStake .'">'. $editStake .'</option>';
                                                    echo '<option value="100">100</option>';
                                                    echo '<option value="150">150</option>';
                                                    echo '<option value="200">200</option>';
                                                }
                                                else if ($editStake == 100)
                                                {
                                                    echo '<option value="'. $editStake .'">'. $editStake .'</option>';
                                                    echo '<option value="50">50</option>';
                                                    echo '<option value="150">150</option>';
                                                    echo '<option value="200">200</option>';
                                                }
                                                else if ($editStake == 150)
                                                {
                                                    echo '<option value="'. $editStake .'">'. $editStake .'</option>';
                                                    echo '<option value="50">50</option>';
                                                    echo '<option value="100">100</option>';
                                                    echo '<option value="200">200</option>';
                                                }
                                                else if ($editStake == 200)
                                                {
                                                    echo '<option value="'. $editStake .'">'. $editStake .'</option>';
                                                    echo '<option value="50">50</option>';
                                                    echo '<option value="100">100</option>';
                                                    echo '<option value="150">150</option>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<option value="50">50</option>';
                                                echo '<option value="100">100</option>';
                                                echo '<option value="150">150</option>';
                                                echo '<option value="200">200</option>';
                                            }

                                        ?>
                                    </select><br>
                                    <label for="">Time*</label>
                                    <input type="text" value="<?php if(isset($editTime)){echo $editTime;} ?>" name="time" class="form-control form-control-rounded" id="input-6" placeholder="Enter Time in Seconds">
                                </div>
                                <div class="form-group">
                                    <?php

                                    if(isset($editTitle))
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

            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">GAME SUB CATEGORIES
                                <?php edit_sub_game_category(); delete_sub_game_category(); ?>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM game_sub_categories ";
                                    $result = Query($query);
                                    confirm($result);

                                    while($row = fetch_data($result))
                                    {
                                        $SubId = $row['id'];
                                        $SubTitle = $row['title'];
                                        $SubCategoryId = $row['category_id'];

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $SubId; ?></th>
                                            <td><?php echo $SubTitle; ?></td>
                                            <?php

                                                $query = " SELECT * FROM game_categories WHERE id=$SubCategoryId ";
                                                $check = Query($query);
                                                confirm($check);

                                                while($rows = fetch_data($check))
                                                {
                                                    $SubCategory = $rows['title'];

                                            ?>
                                            <td><?php echo $SubCategory; ?></td>
                                            <?php }?>
                                            <td><a href="game_categories.php?editSub=<?php echo $SubId; ?>">Edit</a></td>
                                            <td><a onclick="javascript: return confirm('Are you sure you want to delete this Category?');" href="game_categories.php?deleteSub=<?php echo $SubId; ?>">Delete</a></td>
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
                            <div class="card-title text-center">ADD SUB CATEGORY
                                <p><?php add_sub_game_category(); ?></p>
                            </div>
                            <hr>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="input-6">Title*</label>
                                    <?php

                                    if(isset($_GET['editSub']))
                                    {
                                        $SubCatId = clean($_GET['editSub']);

                                        $query = " SELECT * FROM game_sub_categories WHERE id=$SubCatId ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($row = fetch_data($result))
                                        {
                                            $editSubTitle = $row['title'];
                                            $editSubCatId = $row['category_id'];

                                            $query = " SELECT * FROM game_categories WHERE id=$editSubCatId ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($rows = fetch_data($result))
                                            {
                                                $editCategory = $rows['title'];
                                            }
                                        }
                                        else
                                        {
                                            redirect("game_categories.php");
                                        }
                                    }

                                    ?>
                                    <input type="text" value="<?php if(isset($editSubTitle)){echo $editSubTitle;} ?>" class="form-control form-control-rounded" name="subtitle" id="input-6" placeholder="Enter A Title"><br>
                                    <label for="">Category*</label>
                                    <select name="category" id="" class="form-control form-control-rounded">
                                        <?php

                                            if(isset($editCategory))
                                            {
                                                $query = " SELECT * FROM game_categories WHERE id=$editSubCatId ";
                                                $result = Query($query);
                                                confirm($result);

                                                while($row = fetch_data($result))
                                                {
                                                    echo '<option name="category" value="'. $row['id'] .'">'. $row['title'] .' '. $row['stake'] .'</option>';

                                                    $query = " SELECT * FROM game_categories ";
                                                    $check = Query($query);
                                                    confirm($check);

                                                    while($rows = fetch_data($check))
                                                    {
                                                        if($rows['title'] !== $row['title'])
                                                        {
                                                            echo '<option name="category" value="' . $rows['id'] . '">' . $rows['title'] .' '. $row['stake'] . '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $query = " SELECT * FROM game_categories ";
                                                $result = Query($query);
                                                confirm($result);

                                                while($row = fetch_data($result))
                                                {
                                                    echo '<option name="category" value="'. $row['id'] .'">'. $row['title'] .' '. $row['stake'] .'</option>';
                                                }
                                            }

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php

                                    if(isset($editSubTitle))
                                    {
                                        echo '<button name="updateSub" type="submit" class="btn btn-light btn-round px-5"><i class="zmdi zmdi-assignment"></i> Update Category</button>';
                                    }
                                    else
                                    {
                                        echo '<button name="addSub" type="submit" class="btn btn-light btn-round px-5"><i class="zmdi zmdi-assignment"></i> Add Category</button>';
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