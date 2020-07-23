<?php require_once('includes/header.php'); ?>

    <!-- Start wrapper-->
    <div id="wrapper">

<?php require_once('includes/sidenav.php'); ?>

<?php require_once('includes/topnav.php'); ?>

<?php

    if(isset($_GET['Id']))
    {
        $CategoryId = clean($_GET['Id']);

        $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
        $result = Query($query);
        confirm($result);

        if ($row = fetch_data($result)) {
            $SubCategory = $row['title'];

            $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
            $check = Query($query);
            confirm($check);

            if($rows = fetch_data($check))
            {
                $Category = $rows['title'];
                $Stake = $rows['stake'];
            }
        } else {
            redirect("game.php");
            echo error_validation(" Category Doesn't Exist! ");
        }

        ?>

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Add Question With Text
                                    For <?php echo $Category . '(' . $SubCategory . ') For ₦' . $Stake; ?>
                                </div>
                                <hr>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="input-6">Question Name*</label>
                                        <input type="text" class="form-control form-control-rounded" name="question"
                                               id="input-6" placeholder="Enter Question Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice A*</label>
                                        <input type="text" class="form-control form-control-rounded" name="choiceA"
                                               id="input-7" placeholder="Enter First Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice B*</label>
                                        <input type="text" class="form-control form-control-rounded" name="choiceB"
                                               id="input-8" placeholder="Enter Second Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice C*</label>
                                        <input type="text" class="form-control form-control-rounded" name="choiceC"
                                               id="input-7" placeholder="Enter Third Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice D*</label>
                                        <input type="text" class="form-control form-control-rounded" name="choiceD"
                                               id="input-8" placeholder="Enter Fourth Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice E*</label>
                                        <input type="text" class="form-control form-control-rounded" name="choiceE"
                                               id="input-8" placeholder="Enter Fifth Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Answer*</label>
                                        <input type="text" class="form-control form-control-rounded" name="answer"
                                               id="input-8" placeholder="Enter Correct Answer">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="TextAdd" class="btn btn-light btn-round px-5"><i
                                                    class="icon-lock"></i> Add Question
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Add Question with Image
                                    For <?php echo $Category . '(' . $SubCategory . ') For ₦' . $Stake; ?></div>
                                <hr>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="input-6">Question Name*</label>
                                        <input type="text" name="imgQuestion" class="form-control form-control-rounded"
                                               id="input-6" placeholder="Enter Question Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice A*</label>
                                        <input type="file" name="imgA" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice B*</label>
                                        <input type="file" name="imgB" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice C*</label>
                                        <input type="file" name="imgC" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice D*</label>
                                        <input type="file" name="imgD" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice E*</label>
                                        <input type="file" name="imgE" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Answer*</label>
                                        <input type="file" name="imgAnswer" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="ImageAdd" class="btn btn-light btn-round px-5"><i
                                                    class="icon-lock"></i> Add Question
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-3">
                                    <select class="form-control" name="select" id="">
                                        <option value="delete">Delete</option>
                                        <option value="view">View</option>
                                    </select>
                                </div>
                                <div class="card-title text-center">ALL QUESTIONS()</div>
                                <hr>
                                <p class="text-center"><?php add_question(); ?></p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col"><input type="checkbox" onclick="checkAll('Boxes', this);">
                                            </th>
                                            <th scope="col">Id</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Choice A</th>
                                            <th scope="col">Choice B</th>
                                            <th scope="col">Choice C</th>
                                            <th scope="col">Choice D</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">SubCategory</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($Stake == 50) {
                                            $query = " SELECT * FROM quiz50 WHERE category='$Category' AND sub_category='$SubCategory' ORDER BY id DESC";
                                            $result = Query($query);
                                            confirm($result);
                                            $count = row_count($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="checkBoxArray[]"
                                                                           class="Boxes" value="<?php echo $Id; ?>">
                                                    </th>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                    <?php

                                                        if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false)
                                                        {
                                                            echo '<td><a href="add_game.php?ImgCat='. $CategoryId .'&ImgQue='. $Id .'&ImgSub=' . $SubCategory .'">Edit</a></td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td><a href="add_game.php?editCat='. $CategoryId .'&editQue='. $Id .'&editSub='. $SubCategory .'">Edit</a></td>';
                                                        }

                                                    ?>
                                                    <td>
                                                        <a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="add_game.php?CatId=<?php echo $CategoryId; ?>&QueId=<?php echo $Id; ?>&Sub=<?php echo $SubCategory; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 100) {
                                            $query = " SELECT * FROM quiz100 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="checkBoxArray[]"
                                                                           class="Boxes" value="<?php echo $Id; ?>">
                                                    </th>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                    <?php

                                                        if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false)
                                                        {
                                                            echo '<td><a href="add_game.php?ImgCat='. $CategoryId .'&ImgQue='. $Id .'&ImgSub=' . $SubCategory .'">Edit</a></td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td><a href="add_game.php?editCat='. $CategoryId .'&editQue='. $Id .'&editSub='. $SubCategory .'">Edit</a></td>';
                                                        }

                                                    ?>
                                                    <td>
                                                        <a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="add_game.php?CatId=<?php echo $CategoryId; ?>&QueId=<?php echo $Id; ?>&Sub=<?php echo $SubCategory; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 150) {
                                            $query = " SELECT * FROM quiz150 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $ChoiceE = $row['choiceE'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="checkBoxArray[]"
                                                                           class="Boxes" value="<?php echo $Id; ?>">
                                                    </th>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Choice E
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                    <?php

                                                        if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false)
                                                        {
                                                            echo '<td><a href="add_game.php?ImgCat='. $CategoryId .'&ImgQue='. $Id .'&ImgSub=' . $SubCategory .'">Edit</a></td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td><a href="add_game.php?editCat='. $CategoryId .'&editQue='. $Id .'&editSub='. $SubCategory .'">Edit</a></td>';
                                                        }

                                                    ?>
                                                    <td>
                                                        <a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="add_game.php?CatId=<?php echo $CategoryId; ?>&QueId=<?php echo $Id; ?>&Sub=<?php echo $SubCategory; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 200) {
                                            $query = " SELECT * FROM quiz200 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $ChoiceE = $row['choiceE'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="checkBoxArray[]"
                                                                           class="Boxes" value="<?php echo $Id; ?>">
                                                    </th>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Choice E
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                    <?php

                                                        if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false)
                                                        {
                                                            echo '<td><a href="add_game.php?ImgCat='. $CategoryId .'&ImgQue='. $Id .'&ImgSub=' . $SubCategory .'">Edit</a></td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td><a href="add_game.php?editCat='. $CategoryId .'&editQue='. $Id .'&editSub='. $SubCategory .'">Edit</a></td>';
                                                        }

                                                    ?>
                                                    <td>
                                                        <a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="add_game.php?CatId=<?php echo $CategoryId; ?>&QueId=<?php echo $Id; ?>&Sub=<?php echo $SubCategory; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
<?php

    }
    // Deleting Questions While Passing GET REQUESTS Parameters
    else if(isset($_GET['CatId']) && isset($_GET['QueId']) && isset($_GET['Sub']))
    {
        $CategoryId = clean($_GET['CatId']);
        $QuestionId = clean($_GET['QueId']);
        $SubCategory = clean($_GET['Sub']);

        $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
        $result = Query($query);
        confirm($result);

        if($row = fetch_data($result))
        {
            $Stake = $row['stake'];

            // Delete if Stake is 50...
            if($Stake == 50)
            {
                $query = " DELETE FROM quiz50 WHERE id=$QuestionId AND sub_category='$SubCategory' ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Question Deleted Successfully!");
                            window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                        </script>
                    <?php
                }
            }
            // Delete if Stake is 100...
            else if($Stake == 100)
            {
                $query = " DELETE FROM quiz100 WHERE id=$QuestionId AND sub_category='$SubCategory' ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Question Deleted Successfully!");
                            window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                        </script>
                    <?php
                }
            }
            // Delete if Stake is 150...
            else if($Stake == 150)
            {
                $query = " DELETE FROM quiz150 WHERE id=$QuestionId AND sub_category='$SubCategory' ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Question Deleted Successfully!");
                            window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                        </script>
                    <?php
                }
            }
            // Delete if Stake is 200...
            else if($Stake == 200)
            {
                $query = " DELETE FROM quiz200 WHERE id=$QuestionId AND sub_category='$SubCategory' ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Question Deleted Successfully!");
                            window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                        </script>
                    <?php
                }
            }
        }
        else
        {
            redirect("404.php");
        }
    }
    else if(isset($_GET['editCat']) && isset($_GET['editQue']) && isset($_GET['editSub']))
    {
        $CategoryId = clean($_GET['editCat']);
        $Id = clean($_GET['editQue']);

        $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
        $result = Query($query);
        confirm($result);

        if ($row = fetch_data($result))
        {
            $Category = $row['title'];
            $SubCategory = $row['sub_title'];
            $Stake = $row['stake'];

            // Displaying Stake 50 questions for Edit
            if($Stake == 50)
            {
                $query = " SELECT * FROM quiz50 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 100 questions for Edit
            if($Stake == 100)
            {
                $query = " SELECT * FROM quiz100 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 150 questions for Edit
            if($Stake == 150)
            {
                $query = " SELECT * FROM quiz150 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbChoiceE = $rows['choiceE'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 200 questions for Edit
            if($Stake == 200)
            {
                $query = " SELECT * FROM quiz200 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbChoiceE = $rows['choiceE'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
        }
        else
        {
            redirect("../404.php");
        }

 ?>

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-lg-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Edit Question With Text
                                    For <?php echo $Category . '(' . $SubCategory . ') For ₦' . $Stake; ?>
                                </div>
                                <hr>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="input-6">Question Name*</label>
                                        <input type="text" value="<?php if(isset($Id)){echo $dbQuestion;} ?>" class="form-control text-center form-control-rounded" name="question"
                                               id="input-6" placeholder="Enter Question Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice A*</label>
                                        <input type="text" value="<?php if(isset($Id)){echo $dbChoiceA;} ?>" class="form-control text-center form-control-rounded" name="choiceA"
                                               id="input-7" placeholder="Enter First Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice B*</label>
                                        <input type="text" value="<?php if(isset($Id)){echo $dbChoiceB;} ?>" class="form-control text-center form-control-rounded" name="choiceB"
                                               id="input-8" placeholder="Enter Second Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice C*</label>
                                        <input type="text"  value="<?php if(isset($Id)){echo $dbChoiceC;} ?>" class="form-control text-center form-control-rounded" name="choiceC"
                                               id="input-7" placeholder="Enter Third Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice D*</label>
                                        <input type="text"  value="<?php if(isset($Id)){echo $dbChoiceD;} ?>" class="form-control text-center form-control-rounded" name="choiceD"
                                               id="input-8" placeholder="Enter Fourth Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice E*</label>
                                        <input type="text"  value="<?php if(isset($Id)){echo $dbChoiceE;} ?>" class="form-control text-center form-control-rounded" name="choiceE"
                                               id="input-8" placeholder="Enter Fifth Choice">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Answer*</label>
                                        <input type="text"  value="<?php if(isset($Id)){echo $dbAnswer;} ?>" class="form-control text-center form-control-rounded" name="answer"
                                               id="input-8" placeholder="Enter Correct Answer">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="TextUpdate" class="btn btn-light btn-round px-5"><i
                                                    class="icon-lock"></i> Update Question
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center">ALL QUESTIONS</div>
                                <hr>
                                <p class="text-center"><?php edit_question(); ?></p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Choice A</th>
                                            <th scope="col">Choice B</th>
                                            <th scope="col">Choice C</th>
                                            <th scope="col">Choice D</th>
                                            <th scope="col">Choice E</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">SubCategory</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($Stake == 50) {
                                            $query = " SELECT * FROM quiz50 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 100) {
                                            $query = " SELECT * FROM quiz100 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 150) {
                                            $query = " SELECT * FROM quiz150 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $ChoiceE = $row['choiceE'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Choice E
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 200) {
                                            $query = " SELECT * FROM quiz200 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $ChoiceE = $row['choiceE'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Choice E
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->
<?php

    }
    else if(isset($_GET['ImgCat']) && isset($_GET['ImgQue']) && isset($_GET['ImgSub']))
    {
        $CategoryId = clean($_GET['ImgCat']);
        $Id = clean($_GET['ImgQue']);

        $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
        $result = Query($query);
        confirm($result);

        if ($row = fetch_data($result))
        {
            $Category = $row['title'];
            $SubCategory = $row['sub_title'];
            $Stake = $row['stake'];

            // Displaying Stake 50 questions for Edit
            if($Stake == 50)
            {
                $query = " SELECT * FROM quiz50 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 100 questions for Edit
            if($Stake == 100)
            {
                $query = " SELECT * FROM quiz100 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 150 questions for Edit
            if($Stake == 150)
            {
                $query = " SELECT * FROM quiz150 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbChoiceE = $rows['choiceE'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
            // Displaying Stake 200 questions for Edit
            if($Stake == 200)
            {
                $query = " SELECT * FROM quiz200 WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $dbQuestion = $rows['question'];
                    $dbChoiceA = $rows['choiceA'];
                    $dbChoiceB = $rows['choiceB'];
                    $dbChoiceC = $rows['choiceC'];
                    $dbChoiceD = $rows['choiceD'];
                    $dbChoiceE = $rows['choiceE'];
                    $dbAnswer = $rows['answer'];
                }
                else
                {
                    redirect("../404.php");
                }
            }
        }
        else
        {
            redirect("../404.php");
        }

 ?>

         <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-lg-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Edit Question with Image
                                    For <?php echo $Category . '(' . $SubCategory . ') For ₦' . $Stake; ?></div>
                                <hr>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="input-6">Question Name*</label>
                                        <input type="text" value="<?php if(isset($Id)){echo $dbQuestion;} ?>" name="imgQuestion" class="form-control text-center form-control-rounded"
                                               id="input-6" placeholder="Enter Question Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice A*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceA, '.jpg') || strpos($dbChoiceA, '.jpeg') || strpos($dbChoiceA, '.png') || strpos($dbChoiceA, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceA .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgA" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice B*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceB, '.jpg') || strpos($dbChoiceB, '.jpeg') || strpos($dbChoiceB, '.png') || strpos($dbChoiceB, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceB .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgB" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-7">Choice C*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceC, '.jpg') || strpos($dbChoiceC, '.jpeg') || strpos($dbChoiceC, '.png') || strpos($dbChoiceC, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceC .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgC" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <label for="input-8">Choice D*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceD, '.jpg') || strpos($dbChoiceD, '.jpeg') || strpos($dbChoiceD, '.png') || strpos($dbChoiceD, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceD .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgD" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <?php
                                        if($Stake == 150)
                                        {
                                    ?>
                                    <div class="form-group">
                                        <label for="input-8">Choice E*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceE, '.jpg') || strpos($dbChoiceE, '.jpeg') || strpos($dbChoiceE, '.png') || strpos($dbChoiceE, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceE .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgE" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <?php
                                        }
                                        else if($Stake == 200)
                                        {
                                    ?>
                                    <div class="form-group">
                                        <label for="input-8">Choice E*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbChoiceE, '.jpg') || strpos($dbChoiceE, '.jpeg') || strpos($dbChoiceE, '.png') || strpos($dbChoiceE, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbChoiceE .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgE" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for="input-8">Answer*</label><br>
                                        <?php

                                            if(isset($Id))
                                            {
                                                if(strpos($dbAnswer, '.jpg') || strpos($dbAnswer, '.jpeg') || strpos($dbAnswer, '.png') || strpos($dbAnswer, '.jijf') == true)
                                                {
                                                    echo '<img src="../images/game/'. $dbAnswer .'" width="40" height="40"><br><br>';
                                                }
                                            }

                                        ?>
                                        <input type="file" name="imgAnswer" class="form-control form-control-rounded"
                                               id="input-8">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="ImageUpdate" class="btn btn-light btn-round px-5"><i
                                                    class="icon-lock"></i> Update Question
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center">ALL QUESTIONS</div>
                                <hr>
                                <p class="text-center"><?php edit_question(); ?></p>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Choice A</th>
                                            <th scope="col">Choice B</th>
                                            <th scope="col">Choice C</th>
                                            <th scope="col">Choice D</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">SubCategory</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if ($Stake == 50) {
                                            $query = " SELECT * FROM quiz50 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 100) {
                                            $query = " SELECT * FROM quiz100 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 150) {
                                            $query = " SELECT * FROM quiz150 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } else if ($Stake == 200) {
                                            $query = " SELECT * FROM quiz200 WHERE category='$Category' AND sub_category='$SubCategory' ";
                                            $result = Query($query);
                                            confirm($result);

                                            while ($row = fetch_data($result)) {
                                                $Id = $row['id'];
                                                $Question = $row['question'];
                                                $ChoiceA = $row['choiceA'];
                                                $ChoiceB = $row['choiceB'];
                                                $ChoiceC = $row['choiceC'];
                                                $ChoiceD = $row['choiceD'];
                                                $Answer = $row['answer'];
                                                $Date = $row['date'];

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $Id; ?></th>
                                                    <td><?php echo $Question; ?></td>
                                                    <?php

                                                    // Choice A
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }

                                                    // Choice B
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }

                                                    // Choice C
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }

                                                    // Choice D
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }

                                                    // Answer
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="50"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }

                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo $Date; ?></td>
                                                </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

        <?php } ?>

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