<?php

    //****************************************** ADMIN FUNCTIONS* ***************************************************************/

    // Ticket Code Create Function
    function create_ticket(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $Code = clean($_POST['code']);
            $Price = clean($_POST['price']);

            $query = " SELECT * FROM tickets WHERE code=$Code ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result)){
                echo warning_validation(" Sorry... Code Already Exists! Input Another ");
            }
            else{
                $query = " INSERT INTO tickets(code,price,date) VALUES($Code,$Price,now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
                    ?>
                        <script type="text/javascript">
                            alert("Ticket Created!");
                            window.location.href = "ticket_generate.php";
                        </script>
                    <?php
                }
            }
        }
    }

    // Delete Code Ticket Function
    function delete_ticket(){
        if(isset($_GET['delete'])){
            $Id = $_GET['delete'];

            $query = " SELECT * FROM tickets WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " DELETE FROM tickets WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Ticket Deleted Successfully!");
                            window.location.href = "ticket_generate.php";
                        </script>
                    <?php
                }
            }
            else
            {
                redirect("../404.php");
            }
        }
    }

    // Add Question Function
    function add_question()
    {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['TextAdd']) && isset($_GET['Id']))
        {
            $CategoryId = clean($_GET['Id']);

            $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
            $result = Query($query);
            confirm($result);

            if($rows = fetch_data($result))
            {
                $Stake = $rows['stake'];
                $Category = $rows['title'];

                // Stake 50 Questions...
                if($Stake == 50)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz50(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 100 Questions...
                else if($Stake == 100)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz100(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 150 Questions...
                else if($Stake == 150)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz150(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 200 Questions...
                else if($Stake == 200)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz200(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
            }
        }
        else if(isset($_POST['ImageAdd']) && isset($_GET['Id']))
        {
            $CategoryId = clean($_GET['Id']);

            $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
            $result = Query($query);
            confirm($result);

            if($rows = fetch_data($result)) {
                $Stake = $rows['stake'];
                $Category = $rows['title'];

                // Stake 50 Questions...
                if ($Stake == 50)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz50(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 100 Questions...
                else if ($Stake == 100)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz100(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 150 Questions...
                else if ($Stake == 150)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $ChoiceE = $_FILES['imgE']['name'];
                    // image file directory
                    $targetE = "../images/game/" . basename($ChoiceE);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgE']['tmp_name'], $targetE);


                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz150(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 200 Questions...
                else if ($Stake == 200)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $ChoiceE = $_FILES['imgE']['name'];
                    // image file directory
                    $targetE = "../images/game/" . basename($ChoiceE);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgE']['tmp_name'], $targetE);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $SubCategory = $row['title'];

                        $query = " INSERT INTO quiz200(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Added Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
            }
        }
    }
    }

    // Add Question Function
    function edit_question()
    {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['TextUpdate']) && isset($_GET['editCat']) && isset($_GET['editQue']) && isset($_GET['editSub']))
        {
            $CategoryId = clean($_GET['editCat']);
            $QuestionId = clean($_GET['editQue']);
            $SubCategory = clean($_GET['editSub']);

            $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
            $result = Query($query);
            confirm($result);

            if($rows = fetch_data($result))
            {
                $Stake = $rows['stake'];

                // Stake 50 Questions...
                if($Stake == 50)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 100 Questions...
                else if($Stake == 100)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz100 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 150 Questions...
                else if($Stake == 150)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz150 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 200 Questions...
                else if($Stake == 200)
                {
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz200 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
            }
        }
        else if(isset($_POST['ImageUpdate']) && isset($_GET['ImgQue']) && isset($_GET['ImgCat']) && isset($_GET['ImgSub']))
        {
            $CategoryId = clean($_GET['ImgCat']);
            $QuestionId = clean($_GET['ImgQue']);
            $SubCategory =clean($_GET['ImgSub']);

            $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
            $result = Query($query);
            confirm($result);

            if($rows = fetch_data($result)) {
                $Stake = $rows['stake'];

                // Stake 50 Questions...
                if ($Stake == 50)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 100 Questions...
                else if ($Stake == 100)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz100 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 150 Questions...
                else if ($Stake == 150)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $ChoiceE = $_FILES['imgE']['name'];
                    // image file directory
                    $targetE = "../images/game/" . basename($ChoiceE);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgE']['tmp_name'], $targetE);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz150 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
                // Stake 200 Questions...
                else if ($Stake == 200)
                {
                    $Question = escape($_POST['imgQuestion']);

                    // Get image name
                    $ChoiceA = $_FILES['imgA']['name'];
                    // image file directory
                    $targetA = "../images/game/" . basename($ChoiceA);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgA']['tmp_name'], $targetA);

                    // Get image name
                    $ChoiceB = $_FILES['imgB']['name'];
                    // image file directory
                    $targetB = "../images/game/" . basename($ChoiceB);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgB']['tmp_name'], $targetB);

                    // Get image name
                    $ChoiceC = $_FILES['imgC']['name'];
                    // image file directory
                    $targetC = "../images/game/" . basename($ChoiceC);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgC']['tmp_name'], $targetC);

                    // Get image name
                    $ChoiceD = $_FILES['imgD']['name'];
                    // image file directory
                    $targetD = "../images/game/" . basename($ChoiceD);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgD']['tmp_name'], $targetD);

                    // Get image name
                    $ChoiceE = $_FILES['imgE']['name'];
                    // image file directory
                    $targetE = "../images/game/" . basename($ChoiceE);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgE']['tmp_name'], $targetE);

                    // Get image name
                    $Answer = $_FILES['imgAnswer']['name'];
                    // image file directory
                    $targetAn = "../images/game/" . basename($Answer);
                    // Move temporary file to directory
                    move_uploaded_file($_FILES['imgAnswer']['tmp_name'], $targetAn);

                    $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if ($row = fetch_data($result))
                    {
                        $Category = $row['title'];

                        $query = " UPDATE quiz200 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer',category='$Category',sub_category='$SubCategory',date=now() WHERE id=$QuestionId ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            ?>
                                <script type="text/javascript">
                                    alert("Question Updated Successfully!");
                                    window.location.href = "../admin/add_game.php?Id=<?php echo $CategoryId; ?>";
                                </script>
                            <?php
                        }
                    }
                    else
                    {
                        redirect("../404.php");
                    }
                }
            }
        }
    }
    }

    // Users Progress Bar
    function actUsers_check($activeUsers)
    {
        if($activeUsers <= 20)
        {
            echo 'style="width:3%"';
        }
        else if($activeUsers <= 40)
        {
            echo 'style="width:6%"';
        }
        else if($activeUsers <= 60)
        {
            echo 'style="width:9%"';
        }
        else if($activeUsers <= 80)
        {
            echo 'style="width:12%"';
        }
        else if($activeUsers <= 100)
        {
            echo 'style="width:15%"';
        }
        else if($activeUsers <= 120)
        {
            echo 'style="width:18%"';
        }
        else if($activeUsers <= 140)
        {
            echo 'style="width:21%"';
        }
        else if($activeUsers <= 160)
        {
            echo 'style="width:24%"';
        }
    }

    // View Profile Info From Admin ////// Undone...
    function view_profile()
    {
        if(isset($_GET['view']))
        {

        }
    }

    // Add Post Forum Function
    function add_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['create']))
            {
                $Title = clean($_POST['title']);
                $Content = clean($_POST['content']);
                $Status = clean($_POST['status']);
                $Tags = clean($_POST['tags']);
                $Category = clean($_POST['category']);

                // Get image name
                $Image = $_FILES['file']['name'];

                // image file directory
                $target = "../images/forum/".basename($Image);

                if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
                {
                    $query = " INSERT INTO forum(title,content,status,tags,category_id,image,date) VALUES('$Title','$Content','$Status','$Tags','$Category','$Image',now()) ";
                    $result = Query($query);
                    confirm($result);

                    if($result)
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Success! Post Updated Successfully.');
                            window.location.href="forum.php";
                        </script>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <script type="text/javascript">
                        alert('Error! Image Failed to Upload! Please Try Again Later.');
                    </script>
                    <?php
                }
            }
        }
    }

    // Edit Post Function
    function edit_post()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['update']) && isset($_GET['edit']))
            {
                $Id = clean($_GET['edit']);
                $Title = escape($_POST['title']);
                $Content = escape($_POST['content']);
                $Status = clean($_POST['status']);
                $Tags = clean($_POST['tags']);
                $Category = clean($_POST['category']);

                $query = " SELECT * FROM categories WHERE cat_title='$Category' ";
                $check = Query($query);
                confirm($check);

                if($row = fetch_data($check))
                {
                    $Category_id = $row['cat_id'];
                }

                // Get image name
                $Image = $_FILES['file']['name'];

                if(!empty($Image))
                {

                    // image file directory
                    $target = "../images/forum/".basename($Image);

                    if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
                    {
                        $query = " UPDATE forum SET image='$Image' WHERE ID=$Id ";
                        $result = Query($query);
                        confirm($result);
                    }
                }

                $sql = " UPDATE forum SET title='$Title',content='$Content',status='$Status',category_id=$Category_id,tags='$Tags' WHERE id=$Id ";
                $result = Query($sql);
                confirm($result);

                if($result)
                {
                    ?>
                    <script type="text/javascript">
                        alert('Success! Post Updated Successfully.');
                        window.location.href="forum.php";
                    </script>
                    <?php
                }
            }
        }
    }

    // Select Post Option Function
    function select_post()
    {
        if(isset($_POST['checkBoxArray']))
        {
            foreach($_POST['checkBoxArray'] as $Id)
            {
                $select =  $_POST['select'];

                $query = " SELECT title FROM forum WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($row = fetch_data($result))
                {
                    $title = $row['title'];

                    switch($select)
                    {
                        case 'published';

                            $query = " SELECT status FROM forum WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            while($row = fetch_data($result))
                            {
                                $status = $row['status'];

                                if($status == 'draft')
                                {
                                    $query = "UPDATE forum SET status='$select' WHERE id=$Id ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($result)
                                    {
                                        ?>
                                            <script type="text/javascript">
                                                alert(" Post(s) Published Successfully!");
                                                window.location.href = "forum.php";
                                            </script>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <script type="text/javascript">
                                            alert(" Post(s) Already Published! ");
                                            window.location.href = "forum.php";
                                        </script>
                                    <?php
                                }
                            }
                            if(!fetch_data($result))
                            {
                                redirect("../404.php");
                            }

                            break;

                        case 'clone';

                            $query = "SELECT * FROM forum WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            while ($row = fetch_data($result))
                            {
                                $author = $row['author'];
                                $title = $row['title'];
                                $category_id = $row['category_id'];
                                $status = $row['status'];
                                $image = $row['image'];
                                $content = $row['content'];

                                $query = "INSERT INTO forum(category_id,title,author,date,image,content,status) VALUES($category_id,'$title','$author',now(),'$image','$content','$status') ";
                                $result = Query($query);
                                confirm($result);

                                if($result)
                                {
                                    ?>
                                        <script type="text/javascript">
                                            alert(" Post(s) Cloned Successfully! ");
                                            window.location.href = "forum.php";
                                        </script>
                                    <?php
                                }
                            }
                            if(!fetch_data($result))
                            {
                                redirect("../404.php");
                            }

                            break;

                        case 'draft';

                            $query = " SELECT status FROM forum WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            while($row = fetch_data($result))
                            {
                                $status = $row['status'];

                                if($status == 'published')
                                {
                                    $query = "UPDATE forum SET status ='$select' WHERE id=$Id ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($result)
                                    {
                                        ?>
                                            <script type="text/javascript">
                                                alert(" Post(s) Drafted Successfully! ");
                                                window.location.href = "forum.php";
                                            </script>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <script type="text/javascript">
                                            alert(" Post(s) Already Drafted! ");
                                            window.location.href = "forum.php";
                                        </script>
                                    <?php
                                }
                            }
                            if(!fetch_data($result))
                            {
                                redirect("../404.php");
                            }

                            break;


                        case 'delete';

                            $query = " SELECT * FROM forum WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            while(fetch_data($result))
                            {
                                $query = "DELETE FROM forum WHERE id=$Id ";
                                $result = Query($query);
                                confirm($result);

                                if($result)
                                {
                                    ?>
                                        <script type="text/javascript">
                                            alert(" Post(s) Deleted Successfully! ");
                                            window.location.href = "forum.php";
                                        </script>
                                    <?php
                                }
                                else
                                {
                                    echo error_validation(" Error Occurred! ");
                                }
                            }
                            if(!fetch_data($result))
                            {
                                redirect("../404.php");
                            }

                            break;
                    }
                }
            }
        }
    }

    // Delete Forum Function
    function delete_post()
    {
        if(isset($_GET['delete']))
        {
            $Id = $_GET['delete'];

            $query = " SELECT * FROM forum WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " DELETE FROM forum WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    echo approve_validation(" Post Deleted Successfully! <a href='forum.php'>Refresh?</a>");
                }
                else
                {
                    echo error_validation(" Error Occured! Please Try Again Later... ");
                }
            }
            else
            {
                echo error_validation(" Error Occured! Please Try Again Later... <a href='forum.php'>Refresh?</a> ");
            }
        }
    }

    // Add Category Function
    function add_category()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['add']))
            {
                $Title = clean($_POST['title']);

                $query = " INSERT INTO categories(cat_title) VALUES('$Title') ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    echo approve_validation(" Category Added Successfully! <a href='categories.php'>Refresh?</a> ");
                }
            }
        }
    }

    // Delete Category Function
    function delete_category()
    {
        if(isset($_GET['delete']))
        {
            $cat_id = $_GET['delete'];

            $query = " SELECT * FROM categories WHERE cat_id=$cat_id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " DELETE FROM categories WHERE cat_id=$cat_id ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    echo approve_validation(" Category Deleted Successfully! <a href='categories.php'>Refresh?</a> ");
                }
                else
                {
                    echo error_validation(" Category Not Found! ");
                }
            }
            else
            {
                echo error_validation(" Error Occured! Please Try Again Later... <a href='categories.php'>Refresh?</a> ");
            }
        }
    }

    // Edit Category Function
    function edit_category()
    {
        if(isset($_POST['update']) && isset($_GET['edit']))
        {
            $cat_id = $_GET['edit'];
            $cat_title = clean($_POST['title']);

            $query = " UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$cat_id ";
            $result = Query($query);
            confirm($result);

            if($result)
            {
                echo approve_validation(" Category Updated Successfully! <a href='categories.php'>Refresh?</a> ");
            }
            else
            {
                echo error_validation(" Error Occured! ");
            }
        }
    }

    // Add Game Category Function
    function add_game_category()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['add']))
            {
                $Title = clean($_POST['title']);
                $Stake = clean($_POST['stake']);
                $Time = clean($_POST['time']);

                $query = " INSERT INTO game_categories(title,stake,game_time_in_secs,date) VALUES('$Title',$Stake,'$Time',now()) ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Category Added Successfully!");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
        }
    }

    // Add Game Sub Category Function
    function add_sub_game_category()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['addSub']))
            {
                $Title = clean($_POST['subtitle']);
                $Category = clean($_POST['category']);

                $query = " INSERT INTO game_sub_categories(title,category_id) VALUES('$Title',$Category) ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Sub Category Added Successfully!");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
        }
    }

    // Delete Category Function
    function delete_game_category()
    {
        if(isset($_GET['delete']))
        {
            $Id = clean($_GET['delete']);

            $query = " SELECT * FROM game_categories WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " DELETE FROM game_categories WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert(" Category Deleted Successfully! ");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
            else
            {
                redirect("../404.php");
            }
        }
    }

    // Delete Sub Category Function
    function delete_sub_game_category()
    {
        if(isset($_GET['deleteSub']))
        {
            $Id = clean($_GET['deleteSub']);

            $query = " SELECT * FROM game_sub_categories WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " DELETE FROM game_sub_categories WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Sub Category Deleted Successfully!");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
            else
            {
                redirect("../404.php");
            }
        }
    }

    // Edit Sub Category Function
    function edit_sub_game_category()
    {
        if(isset($_POST['updateSub']) && isset($_GET['editSub']))
        {
            $Id = clean($_GET['editSub']);
            $Title = clean($_POST['subtitle']);
            $Category = clean($_POST['category']);

            $query = " SELECT * FROM game_sub_categories WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " UPDATE game_sub_categories SET title='$Title',category_id=$Category WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if ($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Sub Category Updated Successfully!");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
            else
            {
                redirect("../404.php");
            }
        }
    }

    // Edit Category Function
    function edit_game_category()
    {
        if(isset($_POST['update']) && isset($_GET['edit']))
        {
            $Id = clean($_GET['edit']);
            $Title = clean($_POST['title']);
            $Stake = clean($_POST['stake']);
            $Time = clean($_POST['time']);

            $query = " SELECT * FROM game_categories WHERE id=$Id ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " UPDATE game_categories SET title='$Title',stake=$Stake,game_time_in_secs='$Time',date=now() WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if ($result)
                {
                    ?>
                        <script type="text/javascript">
                            alert("Sub Category Updated Successfully!");
                            window.location.href = "game_categories.php";
                        </script>
                    <?php
                }
            }
            else
            {
                redirect("../404.php");
            }
        }
    }

    // Select NewsLetter Mail Function
    function select_newsletter_mail()
    {
        if(isset($_POST['checkBoxArray']))
        {
            foreach($_POST['checkBoxArray'] as $Id)
            {
                $select =  $_POST['select'];

                switch($select)
                {
                    case 'approved';

                        $query = " SELECT * FROM newsletter WHERE id=$Id ";
                        $result = Query($query);
                        confirm($result);

                        while($row = fetch_data($result))
                        {
                            $Header = $row['header'];
                            $Subject = $row['subject'];
                            $Message = $row['message'];
                            $status = $row['status'];

                            if($status == 'unapproved')
                            {
                                $query = " UPDATE newsletter SET status='approved' WHERE id=$Id ";
                                $result = Query($query);
                                confirm($result);

                                if($result)
                                {
                                    $newsquery = " SELECT * FROM newsletter_users ";
                                    $newsresult = Query($newsquery);
                                    confirm($newsresult);

                                    while($row = fetch_data($newsresult))
                                    {
                                        $NewsEmails = $row['email'];

                                        $Emails = array(
                                            $NewsEmails,
                                        );
                                    }

                                    $email = implode(',',$Emails);
                                    $sub = " $Subject ";
                                    $msg = " $Message ";
                                    $header = " $Header ";

                                    if(send_email($email, $sub, $msg, $header))
                                    {
                                        ?>
                                        <script type="text/javascript">
                                            alert("NewsLetter Has Been Sent to All Emails on Your List!");
                                            window.location.href = "newsletter.php";
                                        </script>
                                        <?php
                                    }
                                    else
                                    {
                                        $query = " UPDATE newsletter SET status='unapproved' WHERE id=$Id ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result)
                                        {
                                            ?>
                                            <script type="text/javascript">
                                                alert("NewsLetter Not Sent! Please Try Again Later... Newsletter Has been placed in your Pending Unapproved List for Approval.");
                                                window.location.href = "newsletter.php";
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                            }
                            else
                            {
                                ?>
                                <script type="text/javascript">
                                    alert(" NewsLetter(s) Already Approved! ");
                                    window.location.href = "newsletter.php";
                                </script>
                                <?php
                            }
                        }

                        break;

                    case 'clone';

                        $query = "SELECT * FROM forum WHERE id=$Id ";
                        $result = Query($query);
                        confirm($result);

                        while ($row = fetch_data($result))
                        {
                            $author = $row['author'];
                            $title = $row['title'];
                            $category_id = $row['category_id'];
                            $status = $row['status'];
                            $image = $row['image'];
                            $content = $row['content'];

                            $query = "INSERT INTO forum(category_id,title,author,date,image,content,status) VALUES($category_id,'$title','$author',now(),'$image','$content','$status') ";
                            $result = Query($query);
                            confirm($result);

                            if($result)
                            {
                                ?>
                                <script type="text/javascript">
                                    alert(" Post(s) Cloned Successfully! ");
                                    window.location.href = "forum.php";
                                </script>
                                <?php
                            }
                        }
                        if(!fetch_data($result))
                        {
                            redirect("../404.php");
                        }

                        break;

                    case 'delete';

                        $query = " SELECT * FROM newsletter WHERE id=$Id ";
                        $result = Query($query);
                        confirm($result);

                        while(fetch_data($result))
                        {
                            $query = "DELETE FROM newsletter WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            if($result)
                            {
                                ?>
                                <script type="text/javascript">
                                    alert(" NewsLetter(s) Has Been Deleted Successfully! ");
                                    window.location.href = "newsletter.php";
                                </script>
                                <?php
                            }
                        }

                        break;

                    case 'edit';

                        redirect("add_newsletter_mail.php?edit=$Id");
                }
            }
        }
    }

    // Compose Newsletter Mail Function
    function compose_newsletter_mail()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['create']))
            {
                $Header = escape($_POST['header']);
                $Subject = escape($_POST['subject']);
                $Message = escape($_POST['message']);
                $Status = clean($_POST['status']);
                $All = clean($_POST['all']);

                if(isset($All))
                {
                    if($Status == 'approved')
                    {
                        $query = " INSERT INTO newsletter(email,header,subject,message,status,date) VALUES('All','$Header','$Subject','$Message','$Status',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            $newsquery = " SELECT * FROM newsletter_users ";
                            $newsresult = Query($newsquery);
                            confirm($newsresult);

                            while($row = fetch_data($newsresult))
                            {
                                $NewsEmails = $row['email'];

                                $Emails = array(
                                    $NewsEmails,
                                );
                            }

                            $email = implode(',',$Emails);
                            $sub = " $Subject ";
                            $msg = " $Message ";
                            $header = " $Header ";

                            if(send_email($email, $sub, $msg, $header))
                            {
                                ?>
                                <script type="text/javascript">
                                    alert("NewsLetter Has Been Sent to All Emails on Your List!");
                                    window.location.href = "newsletter.php";
                                </script>
                                <?php
                            }
                            else
                            {
                                $query = " UPDATE newsletter SET status='unapproved' WHERE subject='$Subject' ";
                                $result = Query($query);
                                confirm($result);

                                if($result)
                                {
                                    ?>
                                    <script type="text/javascript">
                                        alert("NewsLetter Not Sent Please Try Again Later! Newsletter Has been placed in your Pending Unapproved List for Approval.");
                                        window.location.href = "newsletter.php";
                                    </script>
                                    <?php
                                }
                            }
                        }
                    }
                    else if($Status == 'unapproved')
                    {
                        $query = " INSERT INTO newsletter(email,header,subject,message,status,date) VALUES('All','$Header','$Subject','$Message','$Status',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            ?>
                            <script type="text/javascript">
                                alert("NewsLetter Has Been Added to Pending Unapproved List for Approval!");
                                window.location.href = "newsletter.php";
                            </script>
                            <?php
                        }
                        else
                        {
                            ?>
                            <script type="text/javascript">
                                alert("An Error Occurred! Please Try Again Later.");
                                window.location.href = "newsletter.php";
                            </script>
                            <?php
                        }
                    }
                }
            }
        }
    }

    // Delete NewsLetter User Function
    function delete_newsletter_user()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if(isset($_GET['delete']))
            {
                $Id = clean($_GET['delete']);

                $query = " SELECT * FROM newsletter_users WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if(fetch_data($result))
                {
                    $query = " DELETE FROM newsletter_users WHERE id=$Id ";
                    $result = Query($query);
                    confirm($result);

                    if($result)
                    {
                        ?>
                        <script type="text/javascript">
                            alert("NewsLetter User Has Been Deleted Successfully!");
                            window.location.href = "newsletter.php";
                        </script>
                        <?php
                    }
                }
                else
                {
                    redirect("../404.php");
                }
            }
        }
    }

    //****************************************** ADMIN FUNCTIONS END* **********************************************************/

    //****************************************** TEAM FUNCTIONS START* ********************************************************/
    function team_create_questions(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['create'])){
                if(isset($_GET['CatId']) && isset($_GET['SubId']) && isset($_GET['Stake']) && isset($_SESSION['loginID'])) {
                    $CatId = clean($_GET['CatId']);
                    $SubId = clean($_GET['SubId']);
                    $Stake = clean($_GET['Stake']);
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                    $loginId = $_SESSION['loginID'];
                    $query = " SELECT * FROM users WHERE username='$loginId' OR user_phone='$loginId' OR user_email='$loginId' ";
                    $result = Query($query);

                    if($row = fetch_data($result)){
                        $Username = $row['username'];

                        if($Stake == 50 || $Stake == 100){
                            $query = " SELECT * FROM game_categories WHERE id=$CatId ";
                            $result = Query($query);
                            confirm($result);

                            if($row = fetch_data($result)){
                                $Category = $row['title'];

                                $query = " SELECT * FROM game_sub_categories WHERE id=$SubId ";
                                $result = Query($query);
                                confirm($result);

                                if($rows = fetch_data($result)){
                                    $SubCategory = $rows['title'];

                                    if($Stake == 50){
                                        $query = " INSERT INTO quiz50(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,creator,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory','$Username',now()) ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result){
                                            ?>
                                            <script type="text/javascript">
                                                alert('Success! Question Created Successfully.');
                                                window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                            </script>
                                            <?php
                                        }
                                    }else if($Stake == 100){
                                        $query = " INSERT INTO quiz100(question,choiceA,choiceB,choiceC,choiceD,answer,category,sub_category,creator,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$Answer','$Category','$SubCategory','$Username',now()) ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result){
                                            ?>
                                            <script type="text/javascript">
                                                alert('Success! Question Created Successfully.');
                                                window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }else if($Stake == 150 || $Stake == 200){
                            $query = " SELECT * FROM game_categories WHERE id=$CatId ";
                            $result = Query($query);
                            confirm($result);

                            if($row = fetch_data($result)){
                                $Category = $row['title'];

                                $query = " SELECT * FROM game_sub_categories WHERE id=$SubId ";
                                $result = Query($query);
                                confirm($result);

                                if($rows = fetch_data($result)){
                                    $SubCategory = $rows['title'];

                                    if($Stake == 150){
                                        $query = " INSERT INTO quiz150(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,creator,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory','$Username',now()) ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result){
                                            ?>
                                            <script type="text/javascript">
                                                alert('Success! Question Created Successfully.');
                                                window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                            </script>
                                            <?php
                                        }
                                    }else if($Stake == 200){
                                        $query = " INSERT INTO quiz200(question,choiceA,choiceB,choiceC,choiceD,choiceE,answer,category,sub_category,creator,date) VALUES('$Question','$ChoiceA','$ChoiceB','$ChoiceC','$ChoiceD','$ChoiceE','$Answer','$Category','$SubCategory','$Username',now()) ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result){
                                            ?>
                                            <script type="text/javascript">
                                                alert('Success! Question Created Successfully.');
                                                window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Error! Please Try Uploading Again.');
                        window.location.href="add_question.php?Stake=<?php echo $_GET['Stake']; ?>&CatId=<?php echo $_GET['CatId']; ?>&SubId=<?php echo $_GET['SubId']; ?>";
                    </script>
                    <?php
                }
            }
        }
    }

    function team_edit_questions(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['update'])){
                if(isset($_GET['stake']) && isset($_GET['edit'])) {
                    $Stake = clean($_GET['stake']);
                    $QuestionId = clean($_GET['edit']);
                    $Question = escape($_POST['question']);
                    $ChoiceA = escape($_POST['choiceA']);
                    $ChoiceB = escape($_POST['choiceB']);
                    $ChoiceC = escape($_POST['choiceC']);
                    $ChoiceD = escape($_POST['choiceD']);
                    $ChoiceE = escape($_POST['choiceE']);
                    $Answer = escape($_POST['answer']);

                        if($Stake == 50){
                            $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer' WHERE id=$QuestionId ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Question Created Successfully.');
                                    window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                </script>
                                <?php
                            }
                        }else if($Stake == 100){
                            $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',answer='$Answer' WHERE id=$QuestionId ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Question Created Successfully.');
                                    window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                </script>
                                <?php
                            }
                        }else if($Stake == 150){
                            $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer' WHERE id=$QuestionId ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Question Created Successfully.');
                                    window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                </script>
                                <?php
                            }
                        }else if($Stake == 200){
                            $query = " UPDATE quiz50 SET question='$Question',choiceA='$ChoiceA',choiceB='$ChoiceB',choiceC='$ChoiceC',choiceD='$ChoiceD',choiceE='$ChoiceE',answer='$Answer' WHERE id=$QuestionId ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Question Created Successfully.');
                                    window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                                </script>
                                <?php
                            }
                        }
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Error! Please Try Updating Again.');
                        window.location.href="questions.php?Stake=<?php echo $_GET['Stake']; ?>";
                    </script>
                    <?php
                }
            }
        }
    }

    function team_delete_questions(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['stake']) && isset($_GET['delete'])) {
                $Stake = clean($_GET['stake']);
                $QuestionId = clean($_GET['delete']);

                if($Stake == 50){
                    $query = " DELETE FROM quiz50 WHERE id=$QuestionId ";
                    $result = Query($query);
                    confirm($result);

                    if($result){
                        ?>
                        <script type="text/javascript">
                            alert('Success! Question Deleted Successfully.');
                            window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                        </script>
                        <?php
                    }
                }else if($Stake == 100){
                    $query = " DELETE FROM quiz100 WHERE id=$QuestionId ";
                    $result = Query($query);
                    confirm($result);

                    if($result){
                        ?>
                        <script type="text/javascript">
                            alert('Success! Question Deleted Successfully.');
                            window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                        </script>
                        <?php
                    }
                }else if($Stake == 150){
                    $query = " DELETE FROM quiz150 WHERE id=$QuestionId ";
                    $result = Query($query);
                    confirm($result);

                    if($result){
                        ?>
                        <script type="text/javascript">
                            alert('Success! Question Deleted Successfully.');
                            window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                        </script>
                        <?php
                    }
                }else if($Stake == 200){
                    $query = " DELETE FROM quiz200 WHERE id=$QuestionId ";
                    $result = Query($query);
                    confirm($result);

                    if($result){
                        ?>
                        <script type="text/javascript">
                            alert('Success! Question Deleted Successfully.');
                            window.location.href="questions.php?stake=<?php echo $Stake; ?>";
                        </script>
                        <?php
                    }
                }
            }else{
                ?>
                <script type="text/javascript">
                    alert('Error! Please Try Updating Again.');
                    window.location.href="questions.php?Stake=<?php echo $_GET['Stake']; ?>";
                </script>
                <?php
            }
        }
    }

    function team_update_profile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['updateName'])){
                $Firstname = clean($_POST['firstname']);
                $Lastname = clean($_POST['lastname']);

                $loginID = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
                $result = Query($query);

                if($row = fetch_data($result)) {
                    $Username = $row['username'];

                    if(!empty($Firstname) && !empty($Lastname)){
                        $query = " UPDATE users SET user_firstname='$Firstname',user_lastname='$Lastname' WHERE username='$Username' ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            ?>
                            <script type="text/javascript">
                                alert('Success! Names Updated Successfully.');
                                window.location.href="profile.php";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Make Sure Fields Aren\'t Empty.');
                        </script>
                        <?php
                    }
                }
            }else if(isset($_POST['updateUsername'])){
                $Username = escape($_POST['username']);

                $loginID = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $dbUsername = $row['username'];

                    if(!empty($Username)){
                        $query = " UPDATE quiz50 SET creator='$Username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz100 SET creator='$Username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz150 SET creator='$Username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz200 SET creator='$Username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE comments SET author='$Username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE comment_tags SET author='$Username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE current_game SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE game_results SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE inbox SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE likes SET author='$Username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE money_transaction SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE online_status SET user=md5('$Username') WHERE user=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE played_questions SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE played_question_requests SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE q_money_transaction SET user='$Username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals SET referrer=md5('$Username') WHERE referrer=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals SET downlines='$Username' WHERE downlines='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals_history SET referrer=md5('$Username') WHERE referrer=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals_history SET downline='$Username' WHERE downline='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE views SET author='$Username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            $query = " UPDATE users SET username='$Username' WHERE username='$dbUsername' ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Username Updated Successfully.');
                                    window.location.href="profile.php";
                                </script>
                                <?php
                            }
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Make Sure Field Aren\'t Empty.');
                        </script>
                        <?php
                    }
                }
            }else if($_POST['updateEmail']){
                $Email = escape($_POST['email']);

                $loginID = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $Username = $row['username'];

                    if(!empty($Email)){
                        if(!email_exists($Email)){
                            if(email_change($Email,$Username)){
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Please check your Email for Activation.');
                                    window.location.href="profile.php";
                                </script>
                                <?php
                            }
                        }else{
                            ?>
                            <script type="text/javascript">
                                alert('Warning! Email Already Exists.');
                                window.location.href="profile.php";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Make Sure Field Aren\'t Empty.');
                        </script>
                        <?php
                    }
                }
            }else if($_POST['updatePhone']){
                $Phone = escape($_POST['phone']);

                $loginID = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $Username = $row['username'];

                    if(!empty($Phone)){
                        $query = " UPDATE users SET user_phone='$Phone' WHERE username='$Username' ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            ?>
                            <script type="text/javascript">
                                alert('Success! Phone Updated Successfully.');
                                window.location.href="profile.php";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Make Sure Field Aren\'t Empty.');
                        </script>
                        <?php
                    }
                }
            }
        }
    }
    //****************************************** TEAM FUNCTIONS END* *********************************************************/

    // Delete Inbox Function From Subscriber Page
    function delete_inbox()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if(isset($_GET['delete']))
            {
                $Id = clean($_GET['delete']);

                $query = " SELECT * FROM inbox WHERE id=$Id ";
                $result = Query($query);
                confirm($result);

                if(fetch_data($result))
                {
                    $query = " DELETE FROM inbox WHERE id=$Id ";
                    $result = Query($query);
                    confirm($result);

                    if($result)
                    {
                        ?>
                            <script type="text/javascript">
                                alert("Message Deleted Successfully!");
                                window.location.href = "inbox.php";
                            </script>
                        <?php
                    }
                }
                else
                {
                    redirect("404.php");
                }
            }
        }
    }

    // Sending Customer Contact Message Function
    function send_customer_contact_message()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $Name = clean($_POST['name']);
            $Email = clean($_POST['email']);
            $Message = escape($_POST['message']);

            if(!empty($Name) && !empty($Email) && !empty($Message))
            {
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
                {
                    ?>
                        <script type="text/javascript">
                            alert("Invalid Email Format! Please use a Correct Email.");
                            window.location.href = "contact.php";
                        </script>
                    <?php
                }
                else
                {
                    $query = " INSERT INTO customer_contact_message(name,email,message,date) VALUES('$Name','$Email','$Message',now()) ";
                    $result = Query($query);
                    confirm($result);

                    if ($result)
                    {
                        ?>
                            <script type="text/javascript">
                                alert("Your Message has Been Submitted! Please Keep an Eye on your Email for Responses.");
                                window.location.href = "contact-us.php";
                            </script>
                        <?php
                    }
                }
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert("Make Sure Fields Aren't Empty!");
                        window.location.href = "contact-us.php";
                    </script>
                <?php
            }
        }
    }

    // Load Tickets Function
    function load_ticket()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $Code = clean($_POST['ticket-code']);
            $username = $_SESSION['loginID'];

            $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
            $result = Query($query);

            if($row = fetch_data($result))
            {
                $dbUsername = $row['username'];

                if(empty($Code))
                {
                    ?>
                        <script type="text/javascript">
                            alert("Make Sure Field Isn't Empty!");
                            window.location.href = "ticket.php";
                        </script>
                    <?php
                }
                else if(strlen($Code) !== 16)
                {
                    ?>
                    <script type="text/javascript">
                        alert("Make Sure The Code is 16 Digits Long!");
                        window.location.href = "ticket.php";
                    </script>
                    <?php
                }
                else
                {
                    $query = " SELECT * FROM tickets WHERE code=$Code ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $Price = $row['price'];
                        $Date = $row['date'];

                        $createdDate = strtotime($Date);
                        $oneWeek = strtotime('-1 week');

                        if ($createdDate < $oneWeek)
                        {
                            ?>
                            <script type="text/javascript">
                                alert("Code Already Expired! Please Input Another.");
                                window.location.href = "ticket.php";
                            </script>
                            <?php
                        }
                        else
                        {
                            $query = " UPDATE users SET wallet=wallet+$Price WHERE username='$dbUsername' ";
                            $result = Query($query);
                            confirm($result);

                            if($result)
                            {
                                $query = " DELETE FROM tickets WHERE code=$Code ";
                                $result = Query($query);
                                confirm($result);

                                if($result)
                                {
                                    $query = " INSERT INTO money_transaction(user,transaction,amount,date) VALUES('$dbUsername','Ticket','$Price',now()) ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($result)
                                    {
                                        ?>
                                        <script type="text/javascript">
                                            alert("Wallet Has Been Topped Up With ₦<?php echo $Price; ?> Successfully!");
                                            window.location.href = "wallet.php";
                                        </script>
                                        <?php
                                    }
                                }
                            }
                            else
                            {
                                ?>
                                <script type="text/javascript">
                                    alert("Error Occurred! Please Try Again Later.");
                                    window.location.href = "ticket.php";
                                </script>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Ticket Code Isn't Correct! Please Input Right Code.");
                            window.location.href = "ticket.php";
                        </script>
                        <?php
                    }
                }
            }
        }
    }

    // Transfer Money to Q-Wallet Function
    function q_wallet_transfer()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $Amount = clean($_POST['ticket-amount']);
            $username = $_SESSION['loginID'];

            $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
            $result = Query($query);

            if($row = fetch_data($result))
            {
                $dbUsername = $row['username'];

                $query = " SELECT * FROM users WHERE username='$dbUsername' ";
                $result = Query($query);
                confirm($result);

                if($rows = fetch_data($result))
                {
                    $Wallet = $rows['wallet'];

                    if($Wallet >= $Amount)
                    {
                        $query = " UPDATE users SET q_wallet=q_wallet+$Amount, wallet=wallet-$Amount WHERE username='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        if($result)
                        {
                            $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$dbUsername','Transfer','$Amount',now()) ";
                            $result = Query($query);
                            confirm($result);

                            if($result)
                            {
                                ?>
                                <script type="text/javascript">
                                    alert("Q-Wallet Has Been Topped Up With ₦<?php echo $Amount; ?> Successfully!");
                                    window.location.href = "wallet.php";
                                </script>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Wallet Balance Not Enough! Please Top Up Your Wallet.");
                            window.location.href = "wallet.php";
                        </script>
                        <?php
                    }
                }
            }
        }
    }

    // Newsletter SignUp Function
    function newsletter_join()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['newsBtn']))
            {
                $Email = clean($_POST['news-email']);

                $query = " SELECT * FROM newsletter_users WHERE email='$Email' ";
                $result = Query($query);
                confirm($result);

                if(empty($Email))
                {
                    ?>
                    <script type="text/javascript">
                        alert("Please Make Sure The Field Isn't Empty!");
                        window.location.href = "index.php";
                    </script>
                    <?php
                }
                else if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
                {
                    ?>
                    <script type="text/javascript">
                        alert("Email is Invalid! Please Input a Correct Email!");
                        window.location.href = "index.php";
                    </script>
                    <?php
                }
                else
                {
                    if (fetch_data($result))
                    {
                        ?>
                        <script type="text/javascript">
                            alert("Email Already Exists In our Database!");
                            window.location.href = "index.php";
                        </script>
                        <?php
                    }
                    else
                    {
                        $query = " INSERT INTO newsletter_users(email,date) VALUES('$Email',now()) ";
                        $result = Query($query);
                        confirm($result);

                        if ($result)
                        {
                            $query = " INSERT INTO newsletter(header,subject,email,message,date) VALUES('From No-Reply admin@quemtech.com','QuemTech NewsLetter Join','$Email','Thank You For Signing up for our Newsletter, You will be getting latest updates from us. For any Questions, Please Write to us here on our Website http://localhost/que/contact-us.php and we will Get back to you as soon as possible.',now()) ";
                            $result = Query($query);
                            confirm($result);

                            if ($result)
                            {
                                $sub = " QuemTech NewsLetter Join ";
                                $msg = " Thank You For Signing up for our Newsletter, You will be getting latest updates from us.
                                For any Questions, Please Write to us here on our Website http://localhost/que/contact-us.php and we will Get back to you as soon as possible. ";
                                $header = " From: No-Reply admin@quemtech.com ";

                                send_email($Email, $sub, $msg, $header);

                                if (send_email($Email, $sub, $msg, $header))
                                {
                                    ?>
                                    <script type="text/javascript">
                                        alert("Thank You for Joining our Newsletter! Please Keep an Eye on Your Email.");
                                        window.location.href = "index.php";
                                    </script>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <script type="text/javascript">
                                        alert("An Error Occurred! Please Try Again Later.");
                                        window.location.href = "index.php";
                                    </script>
                                    <?php
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    // Check Deposit Amount Function
    function check_deposit_amount()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $amount = clean($_POST['amount']);
            if(empty($amount))
            {
                ?>
                <script type="text/javascript">
                    alert("Make Sure Amount Field isn't empty!");
                    window.location.href = 'deposit.php';
                </script>
                <?php
            }
            else
            {
                setcookie('deposit-amount',$amount,time() + 360);

                $username = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='".$username."' OR user_email='".$username."' OR user_phone='".$username."' ";
                $result = Query($query);

                if($row = fetch_data($result)) {
                    $email = $row['user_email'];

                    $newamount = $amount * 100;

                    redirect("payment/initialize.php?email=$email&amount=$newamount");
                }
            }
        }
    }

    //***************************** Q-GAMING FUNCTIONS* *******************************************************************//

    // Displaying Questions For Game
    function display_questions1($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$ShuffledQuestion){
      ?>
      <hr>
      <h2><?php echo $question; ?></h2>
      <br>
      <center>
          <?php
          if (strpos($choiceA, '.jpg') || strpos($choiceA, '.png') || strpos($choiceA, '.jfif') !== false) {
              ?>
              <input type="radio" name="choices" value="<?php echo $choiceA; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceA; ?>" style="width:150px;height:150px;">
              <?php
          }else{
              ?>
              <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceA; ?>">
          <?php } ?>
          <?php
          if (strpos($choiceB, '.jpg') || strpos($choiceB, '.png') || strpos($choiceB, '.jfif') !== false) {
              ?>
              <input type="radio" name="choices" value="<?php echo $choiceB; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceB; ?>" style="width:150px;height:150px;">
              <?php
          }else{
              ?>
              <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceB; ?>">
          <?php } ?>
          <?php
          if (strpos($choiceC, '.jpg') || strpos($choiceC, '.png') || strpos($choiceC, '.jfif') !== false) {
              ?>
              <input type="radio" name="choices" value="<?php echo $choiceC; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceC; ?>" style="width:150px;height:150px;">
              <?php
          }else{
              ?>
              <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceC; ?>">
          <?php } ?>
          <?php
          if (strpos($choiceD, '.jpg') || strpos($choiceD, '.png') || strpos($choiceD, '.jfif') !== false) {
              ?>
              <input type="radio" name="choices" value="<?php echo $choiceD; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceD; ?>" style="width:150px;height:150px;">
              <?php
          }else{
              ?>
              <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceD; ?>">
          <?php } ?>
      </center>
      <hr>
      <?php
    }

    // Displaying Questions For Game
    function display_questions2($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$choiceE,$ShuffledQuestion){
        ?>
        <hr>
        <h2><?php echo $question; ?></h2>
        <br>
        <center>
            <?php
            if (strpos($choiceA, '.jpg') || strpos($choiceA, '.png') || strpos($choiceA, '.jfif') !== false) {
                ?>
                <input type="radio" name="choices" value="<?php echo $choiceA; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceA; ?>" style="width:150px;height:150px;">
                <?php
            }else{
                ?>
                <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceA; ?>">
            <?php } ?>
            <?php
            if (strpos($choiceB, '.jpg') || strpos($choiceB, '.png') || strpos($choiceB, '.jfif') !== false) {
                ?>
                <input type="radio" name="choices" value="<?php echo $choiceB; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceB; ?>" style="width:150px;height:150px;">
                <?php
            }else{
                ?>
                <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceB; ?>">
            <?php } ?>
            <?php
            if (strpos($choiceC, '.jpg') || strpos($choiceC, '.png') || strpos($choiceC, '.jfif') !== false) {
                ?>
                <input type="radio" name="choices" value="<?php echo $choiceC; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceC; ?>" style="width:150px;height:150px;">
                <?php
            }else{
                ?>
                <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceC; ?>">
            <?php } ?>
            <?php
            if (strpos($choiceD, '.jpg') || strpos($choiceD, '.png') || strpos($choiceD, '.jfif') !== false) {
                ?>
                <input type="radio" name="choices" value="<?php echo $choiceD; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceD; ?>" style="width:150px;height:150px;">
                <?php
            }else{
                ?>
                <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceD; ?>">
            <?php } ?>
            <?php
            if (strpos($choiceE, '.jpg') || strpos($choiceE, '.png') || strpos($choiceE, '.jfif') !== false) {
                ?>
                <input type="radio" name="choices" value="<?php echo $choiceE; ?>" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);"> <img src="images/game/<?php echo $choiceE; ?>" style="width:150px;height:150px;">
                <?php
            }else{
                ?>
                <input type="button" class="btn btn-outline-secondary" id="choiceA" onclick="select_next(this.value,<?php echo $questionId; ?>,<?php echo $ShuffledQuestion; ?>);" value="<?php echo $choiceE; ?>">
            <?php } ?>
        </center>
        <hr>
        <?php
    }

    // Delete User Game Result
    function delete_user_game_result(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['delete'])){
                $Id = clean($_GET['delete']);

                $username = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $user = $row['username'];

                    $query = " SELECT * FROM game_results WHERE id=$Id AND user='$user' ";
                    $result = Query($query);
                    confirm($result);

                    if(fetch_data($result)){
                        $query = " DELETE FROM game_results WHERE id=$Id AND user='$user' ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            ?>
                            <script type="text/javascript">
                                alert('Result Deleted Successfully!');
                                window.location.href = "game_review.php";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Result Not Available!');
                            window.location.href = "404.php";
                        </script>
                        <?php
                    }
                }
            }
        }
    }

    // Decline User Game Result
    function decline_user_game_results(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['decline'])){
                $Id = clean($_GET['decline']);

                $username = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $user = $row['username'];

                    $query = " SELECT * FROM game_results WHERE id=$Id AND user='$user' ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result)){
                        if($row['status'] == 'pending'){
                            $query = " UPDATE game_results SET status='declined' WHERE id=$Id AND user='$user' ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                ?>
                                <script type="text/javascript">
                                    alert('Reward Declined!');
                                    window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                                </script>
                                <?php
                            }
                        }else if($row['status'] == 'accepted'){
                            ?>
                            <script type="text/javascript">
                                alert('Reward Already Claimed!');
                                window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                            </script>
                            <?php
                        }else if($row['status'] == 'declined'){
                            ?>
                            <script type="text/javascript">
                                alert('Reward Already Declined!');
                                window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Result Not Available!');
                            window.location.href = "404.php";
                        </script>
                        <?php
                    }
                }
            }
        }
    }

    // Accept User Game Result
    function accept_user_game_results(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['accept']) && isset($_GET['win'])){
                $Id = clean($_GET['accept']);
                $Win = clean($_GET['win']);

                $username = $_SESSION['loginID'];
                $query = " SELECT * FROM users WHERE username='$username' OR user_phone='$username' OR user_email='$username' ";
                $result = Query($query);

                if($row = fetch_data($result)){
                    $user = $row['username'];

                    $query = " SELECT * FROM game_results WHERE id=$Id AND user='$user' ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result)){
                        if($row['status'] == 'pending' && $row['win'] == $Win){
                            $query = " UPDATE game_results SET status='accepted' WHERE id=$Id AND user='$user' ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                $query = " UPDATE users SET wallet=wallet+$Win WHERE username='$user' ";
                                $result = Query($query);
                                confirm($result);

                                if($result){
                                    $query = " INSERT money_transaction(user,transaction,amount,status,date) VALUES('$user','Game',$Win,'success',now()) ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($result){
                                        ?>
                                        <script type="text/javascript">
                                            alert('Reward Claimed! Check your Wallet to see Reward.');
                                            window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                                        </script>
                                        <?php
                                    }
                                }
                            }
                        }else if($row['status'] == 'accepted'){
                            ?>
                            <script type="text/javascript">
                                alert('Reward Already Claimed!');
                                window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                            </script>
                            <?php
                        }else if($row['status'] == 'declined'){
                            ?>
                            <script type="text/javascript">
                                alert('Reward Already Declined!');
                                window.location.href = "game_review.php?view=<?php echo $Id; ?>";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Result Not Available!');
                            window.location.href = "404.php";
                        </script>
                        <?php
                    }
                }
            }
        }
    }

    // Check If There Are Available Questions
    function check_random_if_available($GameStake,$GameCategory,$GameSubCategory,$GameSubCategoryId,$userId){
        if($GameStake == 50){
            $query = " SELECT * FROM quiz50 WHERE category='$GameCategory' AND sub_category='$GameSubCategory' ORDER BY RAND() LIMIT 5 ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result)){
                $query = " SELECT * FROM game_sub_categories WHERE id=$GameSubCategoryId ";
                $check = Query($query);
                confirm($check);

                if($row = fetch_data($check))
                {
                    ?>
                    <article>
                        <h3 class="text-right">Player: <font color="#ffd700"><?php echo $userId; ?></font></h3>
                        <p class="text-right">The next page after this is the <font color="#ffd700"><?php echo $row['title']; ?> </font>Q/A start page which you will be charged a Amount of <?php echo $GameStake; ?> to play, Click the button below to start.</p>
                        <center>
                                <input class="btn btn-dark" type="button" onclick="check_game_session();" value="<?php echo $row['title']; ?>">
                        </center>
                    </article>
                    <?php
                }else{
//                    if(isset($_COOKIE['Stake-Amount']) && isset($_SESSION['Game-Category']) && isset($_SESSION['Game-Sub-Category']))
//                    {
//                        unset($_COOKIE['Stake-Amount']);
//                        setcookie('Stake-Amount','', time() - 300);
//
//                        unset($_SESSION['Game-Sub-Category']);
//
//                        unset($_SESSION['Game-Category']);
//                    }
                    $query  = " DELETE FROM current_game WHERE user='$userId' AND stake=$GameStake AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                    $result = Query($query);
                    confirm($result);
                    redirect("game.php");
                }
            }else{
                $query = " INSERT INTO played_question_requests(user,category,sub_category,stake,date) VALUES('$userId','$GameCategory','$GameSubCategory','$GameStake',now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
//                    unset($_COOKIE['Stake-Amount']);
//                    setcookie('Stake-Amount','', time() - 300);
//
//                    unset($_SESSION['Game-Sub-Category']);
//
//                    unset($_SESSION['Game-Category']);
                    $query  = " DELETE FROM current_game WHERE user='$userId' AND stake=$GameStake AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                    $result = Query($query);
                    confirm($result);
                    ?>
                    <script type="text/javascript">
                        alert('Not Enough Questions Available At the Moment, Please Try Again Later');
                        window.location.href = 'index.php';
                    </script>
                    <?php
                }
            }
        }
    }

    // Check Stake Amount 50
    function stake_amount50($gameStake){
        if($gameStake == 50){
            return true;
        }else{
            return false;
        }
    }

    // Check Stake Amount 100
    function stake_amount100(){
        if($_COOKIE['Stake-Amount'] == 100){
            return true;
        }else{
            return false;
        }
    }

    // Check Stake Amount 150
    function stake_amount150(){
        if($_COOKIE['Stake-Amount'] == 150){
            return true;
        }else{
            return false;
        }
    }

    // Check Stake Amount 200
    function stake_amount200(){
        if($_COOKIE['Stake-Amount'] == 200){
            return true;
        }else{
            return false;
        }
    }

    //***************************** Q-GAMING FUNCTIONS END ****************************************************************//

    //***************************** SUB FUNCTIONS* *******************************************************************//

    // Date Format Function
    function date_format1($Date){
        echo date('l jS \of F Y h:i:s A',strtotime($Date));
    }

    // Clean String Values
    function clean($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        $string = htmlentities($string);

        return $string;
    }

    // Redirect Users
    function redirect($location)
    {
        return header("location:$location");
    }

    // Set Session Message
    function set_message($msg)
    {
        if(!empty($msg))
        {
            $_SESSION['Message'] = $msg;
        }
        else
        {
            $msg = "";
        }
    }

    // Display Message Function
    function display_message()
    {
        if(isset($_SESSION['Message']))
        {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
    }

    // Generate Token
    function token_generate()
    {
        $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
        return $token;
    }

    // Generate Q_WALLET Ticket Code
    function ticket_code_generate()
    {
        $TicketCode = mt_rand(1000000000000000,9999999999999999);
        return $TicketCode;
    }

    // Generate Referral Code
    function refer_code($username)
    {
        $refer_code = $_SESSION['refer-code'] = md5($username);
        return $refer_code;
    }

    // Check Referral Code
    function check_code($Ref)
    {
        $RefCode = $Ref;
        $query = " SELECT * FROM users WHERE md5(username) = '$RefCode' ";
        $result = Query($query);
        confirm($result);

        if(fetch_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Send Email Function
    function send_email($email,$sub,$msg,$header)
    {
        return mail($email,$sub,$msg,$header);
    }

    //***************************** SUB FUNCTIONS END* *******************************************************************//

    // User Delete Downlines Function
    function user_delete_referral_history(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['delete']) && isset($_GET['ref']) && isset($_GET['page'])){
                $Id = clean($_GET['delete']);
                $Ref = clean($_GET['ref']);
                $Page = clean($_GET['page']);

                $query = " SELECT * FROM referrals WHERE id=$Ref ";
                $result = Query($query);
                confirm($result);

                if($result){
                    $query = " SELECT * FROM referrals_history WHERE id=$Id ";
                    $result = Query($query);
                    confirm($result);

                    if(fetch_data($result)){
                        $query = " DELETE FROM referrals_history WHERE id=$Id ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            ?>
                            <script type="text/javascript">
                                alert('Success! Referral Commission Deleted Successfully.');
                                window.location.href="referrals.php?view=<?php echo $Ref; ?>&page=<?php echo $Page; ?>";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('Error! Referral Commission Not Found.');
                            window.location.href="404.php";
                        </script>
                        <?php
                    }
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Error! Referral Not Found.');
                        window.location.href="404.php";
                    </script>
                    <?php
                }
            }
        }
    }

    // Game Review Table Background Color
    function game_review_background_color($resultStatus){
        if($resultStatus == 'pending'){
            echo 'bg-warning';
        }else if($resultStatus == 'accepted'){
            echo 'bg-success';
        }else if($resultStatus == 'declined'){
            echo 'bg-danger';
        }
    }

    // Game Review Status Font Color
    function game_review_font_color($Status){
        if($Status == 'pending'){
            echo 'text-warning';
        }else if($Status == 'accepted'){
            echo 'text-success';
        }else if($Status == 'declined'){
            echo 'text-danger';
        }
    }

    // Reply Comment Function
    function reply_comment()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_GET['reply']))
            {
                $CommentId = clean($_GET['reply']);
                $TagAuthor = clean($_POST['username']);
                $TagContent = escape($_POST['content']);

                $query = " SELECT * FROM comments WHERE id=$CommentId ";
                $result = Query($query);
                confirm($result);

                if($row = fetch_data($result))
                {
                    $PostId = $row['post_id'];

                    $sql = " INSERT INTO comment_tags(post_id,comment_id,author,content,date) VALUES($PostId,$CommentId,'$TagAuthor','$TagContent',now()) ";
                    $insertTag = Query($sql);
                    confirm($insertTag);

                    if($insertTag)
                    {
                        $sqlquery = " UPDATE forum SET tag_count=tag_count+1 WHERE id=$PostId ";
                        $add = Query($sqlquery);
                        confirm($add);

                        if($add)
                        {
                            redirect("comment-details.php?reply=". $CommentId ."");
                        }
                    }
                }
                else
                {
                    echo error_validation(" Error Occured! Please Try Again Later... ");
                }
            }
            else if(isset($_GET['replyTag']))
            {
                $TagId = clean($_GET['replyTag']);
                $TagAuthor = clean($_POST['username']);
                $TagContent = escape($_POST['content']);
                $CommentId = clean($_POST['comment_id']);

                $query = " SELECT * FROM comments WHERE id=$CommentId ";
                $result = Query($query);
                confirm($result);

                if($row = fetch_data($result))
                {
                    $PostId = $row['post_id'];

                    $sql = " INSERT INTO comment_tags(post_id,comment_id,tag_id,author,content,date) VALUES($PostId,$CommentId,$TagId,'$TagAuthor','$TagContent',now()) ";
                    $insertTag = Query($sql);
                    confirm($insertTag);

                    if($insertTag)
                    {
                        $sqlquery = " UPDATE forum SET tag_count=tag_count+1 WHERE id=$PostId ";
                        $add = Query($sqlquery);
                        confirm($add);

                        if($add)
                        {
                            redirect("comment-details.php?reply=". $CommentId ."");
                        }
                    }
                }
                else
                {
                    echo error_validation(" Error Occured! Please Try Again Later... ");
                }
            }
        }
    }

    // Add Comment Function
    function add_comment()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_GET['post']))
            {
                $Username = clean($_POST['username']);
                $Content = escape($_POST['content']);
                $PostId = clean($_GET['post']);

                $query = " INSERT INTO comments(post_id,author,content,date) VALUES($PostId,'$Username','$Content',now()) ";
                $result = Query($query);
                confirm($result);

                if($result)
                {
                    $sql = " UPDATE forum SET comment_count=comment_count+1 WHERE id=$PostId ";
                    $comment = Query($sql);
                    confirm($comment);

                    if($comment)
                    {
                        redirect("forum-details.php?post=". $PostId ."");
                    }
                }
                else
                {
                    echo error_validation(" Error Occured! Please Try Again Later... ");
                }
            }
        }
    }

    //**************** User Validation Functions... ********************************************************************/

    // Error Validation Function
    function error_validation($Error)
    {
        return '<div class="alert alert-danger p-2">' . $Error . '</div>';
    }

    // Approved Validation Function
    function approve_validation($approve)
    {
        return '<div class="alert alert-success p-2">' . $approve . '</div>';
    }

    // Warning Validation Function
    function warning_validation($warn)
    {
        return '<div class="alert alert-warning p-2">' . $warn . '</div>';
    }

    // Email Exists Function
    function email_exists($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $result = Query($sql);

        if(fetch_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // UserName Exists Function
    function uName_exists($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = Query($sql);
        confirm($result);

        if(fetch_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Phone Exists Function
    function phone_exists($phone)
    {
        $sql = "SELECT * FROM users WHERE user_phone = '$phone'";
        $result = Query($sql);

        if(fetch_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Edit Profile Function
    function edit_profile()
    {
        if(isset($_GET['loginID']))
        {
            $username = $_GET['loginID'];
        }
    }

    // Update Profile Function
    function update_profile()
    {
        if(isset($_SESSION['loginID']) == isset($_GET['loginID']))
        {
            $user = $_GET['loginID'];

            $query = " SELECT * FROM users WHERE username='$user' OR user_phone='$user' OR user_email='$user' ";
            $result = Query($query);
            confirm($result);

            if($row = fetch_data($result)){
                $dbUsername = $row['username'];

                if(isset($_POST['updateName']))
                {
                    $firstname = clean($_POST['firstname']);
                    $lastname = clean($_POST['lastname']);
                    $gender = clean($_POST['gender']);

                    $sql = " UPDATE users SET user_firstname='$firstname',user_lastname='$lastname',user_gender='$gender',profile_update=now() WHERE username='$dbUsername' ";
                    $result = Query($sql);
                    confirm($result);

                    if($result)
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Success! Profile Name Updated.');
                            window.location.href="user-profile.php?loginID=<?php echo $user; ?>";
                        </script>
                        <?php
                    }
                }
                else if(isset($_POST['updateImage']))
                {
                    // Get image name
                    $image = $_FILES['image']['name'];

                    // image file directory
                    $target = "images/user/".basename($image);

                    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
                    {
                        $sql = " UPDATE users SET user_image='$image',profile_update=now() WHERE username='$dbUsername' ";
                        $result = Query($sql);
                        confirm($result);

                        if($result)
                        {
                            ?>
                            <script type="text/javascript">
                                alert('Success! Profile Image Updated.');
                                window.location.href="user-profile.php?loginID=<?php echo $user; ?>";
                            </script>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Error! Profile Image Failed to Upload, Please try again Later.');
                            window.location.href="user-profile.php?loginID=<?php echo $user; ?>";
                        </script>
                        <?php
                    }
                }
                else if(isset($_POST['updateEmail']))
                {
                    $email = clean($_POST['email']);

                    if(email_exists($email))
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Email Already Exists in the Database, Please pick Another.');
                            window.location.href="user-profile.php?loginID=<?php echo $user; ?>";
                        </script>
                        <?php
                    }
                    else
                    {
                        if(email_change($email,$dbUsername))
                        {
                            ?>
                            <script type="text/javascript">
                                alert('Success! Profile Email Updated, Please check your email for Reactivation');
                                window.location.href="logout.php";
                            </script>
                            <?php
                        }
                    }
                }
                else if(isset($_POST['updateUsername']))
                {
                    $username = clean($_POST['username']);

                    if(uName_exists($username)){
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Username Already Exists in the Database, Please pick Another.');
                            window.location.href="user-profile.php?loginID=<?php echo $user; ?>";
                        </script>
                        <?php
                    }else{
                        $query = " UPDATE quiz50 SET creator='$username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz100 SET creator='$username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz150 SET creator='$username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE quiz200 SET creator='$username' WHERE creator='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE comments SET author='$username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE comment_tags SET author='$username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE current_game SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE game_results SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE inbox SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE likes SET author='$username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE money_transaction SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE online_status SET user=md5('$username') WHERE user=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE played_questions SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE played_question_requests SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE q_money_transaction SET user='$username' WHERE user='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals SET referrer=md5('$username') WHERE referrer=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals SET downlines='$username' WHERE downlines='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals_history SET referrer=md5('$username') WHERE referrer=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE referrals_history SET downline='$username' WHERE downline='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        $query = " UPDATE views SET author='$username' WHERE author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        if($result){
                            $query = " UPDATE users SET username='$username' WHERE username='$dbUsername' ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                setcookie('loginID',$username, time() + 86400);
                                $_SESSION['loginID'] = $username;
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Profile Username Updated Successfully.');
                                    window.location.href="user_profile.php?loginID=<?php echo $user; ?>";
                                </script>
                                <?php
                            }
                        }
                    }
                }
                else if(isset($_POST['updatePhone']))
                {
                    $phone = clean($_POST['phone']);

                    if(!empty($phone))
                    {
                        if(phone_exists($phone))
                        {
                            ?>
                            <script type="text/javascript">
                                alert('Warning! Phone Already Exists in the Database, Please pick Another.');
                                window.location.href="user_profile.php?loginID=<?php echo $user; ?>";
                            </script>
                            <?php
                        }
                        else
                        {
                            $query = " UPDATE users SET user_phone='$phone' WHERE username='$dbUsername' ";
                            $result = Query($query);
                            confirm($result);

                            if($result)
                            {
                                ?>
                                <script type="text/javascript">
                                    alert('Success! Profile Phone Updated Successfully.');
                                    window.location.href="user_profile.php?loginID=<?php echo $user; ?>";
                                </script>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Warning! Make sure phone field isn\'t Empty.');
                            window.location.href="user_profile.php?loginID=<?php echo $user; ?>";
                        </script>
                        <?php
                    }
                }
                else if(isset($_POST['updatePass']))
                {
                    $password = clean($_POST['password']);
                    $cpassword = clean($_POST['cpassword']);

                    $PaMax = 30;

                    // Password
                    if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$password))
                    {
                        $Errors[] = " Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter, one numeric digit and one special character ";
                    }

                    if(strlen($password) > $PaMax)
                    {
                        $Errors[] = " Password Field Cannot Be More Than {$PaMax}  Characters ";
                    }

                    // Confirm Password
                    if($password !== $cpassword)
                    {
                        $Errors[] = " Make sure Both Passwords Match ";
                    }

                    if(!empty($Errors))
                    {
                        foreach($Errors as $Error)
                        {
                            echo error_validation($Error);
                        }
                    }
                    else
                    {
                        if(pass_change($password,$dbUsername))
                        {
                            ?>
                            <script type="text/javascript">
                                alert('Success! Profile Password Updated Successfully.');
                                window.location.href="user_profile.php?loginID=<?php echo $user; ?>";
                            </script>
                            <?php
                        }
                    }
                }
            }
        }
        else
        {
            redirect("index.php");
        }
    }

    // Password Change Function
    function pass_change($password,$user)
    {
        $password = escape($password);
        $user = escape($user);

        $Pass = md5($password);

        $sql = " UPDATE users SET user_password='$Pass',profile_update=now() WHERE username='$user' ";
        $result = Query($sql);
        confirm($result);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Email Change Function
    function email_change($email,$user)
    {
        $email = escape($email);
        $user = escape($user);

        $Validation_Code = md5($user + microtime());

        $sql = " UPDATE users SET user_email='$email',Validation_Code='$Validation_Code',user_active='0',profile_update=now() WHERE username='$user' ";
        $result = Query($sql);
        confirm($result);

        if($result)
        {
            $sub = " QuemTech Email Activation ";
            $msg = " Please Click the link below to Activate your account.
            http://localhost/que/activate.php?Email=$email&Code=$Validation_Code ";
            $header = " From No-Reply admin@quemtech.com";

            send_email($email,$sub,$msg,$header);

            return true;
        }
        else
        {
            echo error_validation(" Error Occurred! Please Try Again Later.. ");
        }
    }

    // User Registration Function
    function user_registration($FName,$LName,$Gend,$Ph,$EMail,$UName,$PassW)
    {
        $FirstName = escape($FName);
        $LastName = escape($LName);
        $Gender = escape($Gend);
        $Phone = escape($Ph);
        $Email = escape($EMail);
        $UserName = escape($UName);
        $Pass = escape($PassW);

        if(email_exists($Email))
        {
            return true;
        }
        else if(uName_exists($UserName))
        {
            return true;
        }
        else
        {
            $PassWord = md5($Pass);
            $Validation_Code = md5($UserName + microtime());

            $sql = " INSERT INTO users(user_firstname, user_lastname, user_gender, user_phone, user_email, username, user_password, Validation_Code, user_active, user_role, date) VALUES('$FirstName', '$LastName', '$Gender', '$Phone', '$Email', '$UserName', '$PassWord', '$Validation_Code', '0', 'subscriber', now()) ";
            $result = Query($sql);
            confirm($result);

            $sub = " QuemTech Account Activation ";
            $msg = " Welcome to QuestionMark Technologies. Before you begin, Account Activation is very important, Please Click the link below to Activate your account.
            http://localhost/que/activate.php?Email=$Email&Code=$Validation_Code ";
            $header = " From No-Reply admin@quemtech.com";

            send_email($Email,$sub,$msg,$header);

            return true;
        }
    }

    // User Referral Registration Function
    function user_ref_registration($FName,$LName,$Gend,$Ph,$EMail,$UName,$PassW,$RefCode)
    {
        $FirstName = escape($FName);
        $LastName = escape($LName);
        $Gender = escape($Gend);
        $Phone = escape($Ph);
        $Email = escape($EMail);
        $UserName = escape($UName);
        $Pass = escape($PassW);
        $Ref_Code = escape($RefCode);

        if(email_exists($Email))
        {
            return true;
        }
        else if(uName_exists($UserName))
        {
            return true;
        }
        else
        {
            $PassWord = md5($Pass);
            $Validation_Code = md5($UserName + microtime());

            $sql = " INSERT INTO users(user_firstname, user_lastname, user_gender, user_phone, user_email, username, user_password, Validation_Code, user_active, user_role, date) VALUES('$FirstName', '$LastName', '$Gender', '$Phone', '$Email', '$UserName', '$PassWord', '$Validation_Code', '0', 'subscriber', now()) ";
            $result = Query($sql);
            confirm($result);

            $sqlquery = " SELECT * FROM users WHERE md5(username) = '$Ref_Code' ";
            $check = Query($sqlquery);
            confirm($check);

            if(fetch_data($check))
            {
                $query = " INSERT INTO referrals(downlines,referrer,refer_date) VALUES('$UserName','$Ref_Code',now())";
                $final = Query($query);
                confirm($final);

                $sub = " QuemTech Account Activation ";
                $msg = " Welcome to QuestionMark Technologies. Before you begin, Account Activation is very important, Please Click the link below to Activate your account.
                http://localhost/que/activate.php?Email=$Email&Code=$Validation_Code ";
                $header = " From No-Reply admin@quemtech.com";

                send_email($Email,$sub,$msg,$header);
            }

            return true;
        }
    }

    // Activation Function
    function activate()
    {
        if($_SERVER['REQUEST_METHOD'] == "GET")
        {
            $Email = $_GET['Email'];
            $Code = $_GET['Code'];

            $sql = " SELECT * FROM users WHERE user_email = '$Email' AND Validation_code = '$Code' ";
            $result = Query($sql);
            confirm($result);

            $query = "SELECT * FROM users WHERE user_email = '$Email' AND Validation_Code = '0' ";
            $check = Query($query);
            confirm($check);

            if(fetch_data($result)){
                $sqlquery = " UPDATE users SET user_active = '1', Validation_Code = '0' WHERE user_email = '$Email' AND Validation_Code = '$Code' ";
                $result = Query($sqlquery);
                confirm($result);

                $query = " SELECT * FROM users WHERE user_email='$Email' ";
                $Inresult = Query($query);
                confirm($Inresult);

                if($row = fetch_data($Inresult))
                {
                    $lastname = $row['user_lastname'];
                    $username = $row['username'];

                    $inboxquery = " INSERT INTO inbox(subject,header,message,user,date) VALUES('QuemTech Activation','QuemTech Email Activation',
                    'Hello $lastname, Your Email has been Validated and therefore your Account is now Active.','$username',now()) ";
                    $inboxresult = Query($inboxquery);
                    confirm($inboxresult);

                    if($inboxresult)
                    {
                        ?>
                        <script type="text/javascript">
                            alert('Success! Your Account is Activated Successfully.');
                            window.location.href="login.php";
                        </script>
                        <?php
                    }
                }
            }
            else if(fetch_data($check))
            {
                ?>
                <script type="text/javascript">
                    alert('Warning! Your Account is Already Activated.');
                    window.location.href="login.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                    alert('Error! Your Account With Current Email Does Not Exist, Please Check the Correct Email used to Register.');
                </script>
                <?php
                echo error_validation(" Error! Your Account With Current Email Does Not Exist, Please Check the Correct Email used to Register. ");
            }
        }
    }

    // User Registration Validation
    function user_validation()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $firstname = clean($_POST['firstname']);
            $lastname = clean($_POST['lastname']);
            $gender = clean($_POST['gender']);
            $phone = clean($_POST['phone']);
            $email = clean($_POST['email']);
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $cpassword = clean($_POST['cpassword']);
            $RefCode = clean($_POST['refer-code']);

            $Errors = [];

            $NaMax = 20;
            $NaMin = 02;

            $PhMax = 11;
            $PhMin = 11;

            $Max = 30;
            $Min = 05;

            $PaMax = 30;

            // Firstname
            if(!preg_match("/^[A-Z][a-z]+$/", $firstname))
            {
                $Errors[] = " Firstname Field Must Contain Only letters and First Letter Must Be A Capital Letter ";
            }
            if(strlen($firstname) < $NaMin)
            {
                $Errors[] = " Firstname Field Cannot Be Less Than {$NaMin}  Characters ";
            }

            if(strlen($firstname) > $NaMax)
            {
                $Errors[] = " Firstname Field Cannot Be More Than {$NaMax}  Characters ";
            }

            // Lastname
            if(!preg_match("/^[A-Z][a-z]+$/", $lastname))
            {
                $Errors[] = " Lastname Field Must Contain Only letters and First Letter Must Be A Capital Letter ";
            }
            if(strlen($lastname) < $NaMin)
            {
                $Errors[] = " Lastname Field Cannot Be Less Than {$NaMin}  Characters ";
            }

            if(strlen($lastname) > $NaMax)
            {
                $Errors[] = " Last Name Field Cannot Be More Than {$NaMax}  Characters ";
            }

            // Phone
            if(!preg_match("/^[0-9]*$/",$phone))
            {
                $Errors[] = " Phone Field Must Contain Only Digits ";
            }

            if(strlen($phone) < $PhMin)
            {
                $Errors[] = " Phone Field Cannot Be Less Than {$PhMin}  Characters ";
            }

            if(strlen($phone) > $PhMax)
            {
                $Errors[] = " Phone Field Cannot Be More Than {$PhMax}  Characters ";
            }

            if(phone_exists($phone))
            {
                $Errors[] = " Phone Number Already Exists In Our Database ";
            }

            if(empty($gender))
            {
                $Errors[] = " Please Select a Gender ";
            }

            // Username
            if(!preg_match("/^[a-zA-Z,0-9-_]+$/",$username))
            {
                $Errors[] = " Username Field Can Only Contain Letters, Digits, Underscores and Dashes ";
            }

            if(strlen($username) < $Min)
            {
                $Errors[] = " Username Field Cannot Be Less Than {$Min}  Characters ";
            }

            if(strlen($username) > $Max)
            {
                $Errors[] = " Username Field Cannot Be More Than {$Max}  Characters ";
            }

            if(uName_exists($username))
            {
                $Errors[] = " Username Already Exists In Our Database ";
            }

            // Email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $Errors[] = " Invalid Email Format ";
            }

            if(email_exists($email))
            {
                $Errors[] = " Email Already Exists In Our Database ";
            }

            // Password
            if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/",$password))
            {
                $Errors[] = " Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter, one numeric digit and one special character ";
            }

            if(strlen($password) > $PaMax)
            {
                $Errors[] = " Password Field Cannot Be More Than {$PaMax}  Characters ";
            }

            // Confirm Password
            if($password !== $cpassword)
            {
                $Errors[] = " Make sure Both Passwords Match ";
            }

            if(!empty($Errors))
            {
                foreach($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
            else
            {
                if(!empty($RefCode))
                {
                    if(user_ref_registration($firstname,$lastname,$gender,$phone,$email,$username,$password,$RefCode))
                    {
                        $inboxquery = " INSERT INTO inbox(subject,header,message,user,date) VALUES('QuemTech Welcome','QuemTech Account Creation',
                        'Hello $lastname, QuemTech welcomes you on board. You are now a Registered user and therefore have access to all our platforms. To learn about our services, please do visit the About us Page from your navigation. Any Complaints so far, Please Hit the customer review link from your dashboard whenever signed In, Warm Welcome from QuestionMark Technologies.','$username',now()) ";
                        $inboxresult = Query($inboxquery);
                        confirm($inboxresult);

                        if($inboxresult)
                        {
                            $query = " SELECT * FROM users WHERE md5(username)='$RefCode' ";
                            $result = Query($query);
                            confirm($result);

                            if ($row = fetch_data($result)) {
                                $createdDate = strtotime($row['date']);
                                $oneWeek = strtotime('-1 week');
                                $dbRefUser = $row['username'];

                                if ($createdDate > $oneWeek)
                                {
                                    $sql = " UPDATE users SET referrals=referrals+1,q_wallet=q_wallet+50 WHERE md5(username)='$RefCode' ";
                                    $result = Query($sql);
                                    confirm($result);

                                    $query = " INSERT INTO q_money_transaction(user,transaction,amount,status,date) VALUES('$dbRefUser','referral commission',50,'success',now()) ";
                                    $result = Query($query);
                                    confirm($result);

                                    if($result){
                                        $query = " INSERT INTO referrals_history(referrer,downline,transaction,commission,date) VALUES('$RefCode','$username','referral commission',50,now()) ";
                                        $result = Query($query);
                                        confirm($result);

                                        if($result){
                                            echo approve_validation(" Your Registration is Successful, Please do check you email for Activation. ");
                                        }
                                    }
                                }else{
                                    $sql = " UPDATE users SET referrals=referrals+1 WHERE md5(username)='$RefCode' ";
                                    $result = Query($sql);
                                    confirm($result);

                                    if($result){
                                        echo approve_validation(" Your Registration is Successful, Please do check you email for Activation. ");
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        echo error_validation(" Your Account Not Registered, Please Try Again! ");
                    }
                }
                else
                {
                    if(user_registration($firstname,$lastname,$gender,$phone,$email,$username,$password))
                    {
                        $inboxquery = " INSERT INTO inbox(subject,header,message,user,date) VALUES('QuemTech Welcome','QuemTech Account Creation',
                        'Hello $lastname, QuemTech welcomes you on board. You are now a Registered user and therefore have access to all our platforms. To learn about our services, please do visit the About us Page from your navigation. Any Complaints so far, Please Hit the customer review link from your dashboard whenever signed In, Warm Welcome from QuestionMark Technologies.','$username',now()) ";
                        $inboxresult = Query($inboxquery);
                        confirm($inboxresult);

                        if($inboxresult)
                        {
                            $query = " INSERT INTO q_money_transaction(user,transaction,amount,status,date) VALUES('$username','Registration Commission',50,'success',now()) ";
                            $result = Query($query);
                            confirm($result);

                            if($result){
                                echo approve_validation(" Your Registration is Successful, Please do check you email for Activation. ");
                            }
                        }
                    }
                    else
                    {
                        echo error_validation(" Your Account Not Registered, Please Try Again! ");
                    }
                }
            }
        }
    }

    //**************** User Validation Functions End... ********************************************************************/

    //************** Recover Password Functions ************************************************************************************/
    function recover_password()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
                $email = clean($_POST['email']);

                if(email_exists($email))
                {
                    $query = " SELECT * FROM users WHERE user_email='$email' ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result))
                    {
                        $active = $row['user_active'];

                        if($active == 1)
                        {
                            $code = mt_rand(100000,999999);
                            setcookie('temp-code',$code,time() + 300);

                            $sql = " UPDATE users SET Validation_Code='$code' WHERE user_email='$email' ";
                            Query($sql);

                            $Subject = " QuemTech Password Reset ";
                            $Message = " Your Password Reset Code is $code ";
                            $header = " From No-Reply admin@quemtech.com";

                            if(send_email($email,$Subject,$Message,$header))
                            {
                                redirect("code.php?Email=$email");
                            }else{
                                echo error_validation(" Email Not Sent! Please Try Again Later ");
                            }
                        }
                        else
                        {
                            echo error_validation(" User Not Active! Please activate your account First ");
                        }
                    }

                }
                else
                {
                    echo error_validation(" Email Does Not Exist in Our Database! ");
                }
            }
            else
            {
                redirect("index.php");
            }
        }
    }

    // Validation Code Functions
    function validation_code()
    {
        if(isset($_COOKIE['temp-code']))
        {
            if(!isset($_GET['Email']) && !isset($_GET['Code']))
            {
                redirect("index.php");
            }
            else if(empty($_GET['Email']) && empty($_GET['Code']))
            {
                redirect("index.php");
            }
            else
            {
                if(isset($_POST['recover-code']))
                {
                    $Code = $_POST['recover-code'];
                    $Email = $_GET['Email'];

                    $query = " SELECT * FROM users WHERE Validation_Code='$Code' AND user_email='$Email' ";
                    $result = Query($query);

                    if(fetch_data($result))
                    {
                        setcookie('temp_code',$Code,time() + 300);
                        redirect("reset.php?Email=$Email&Code=$Code");
                    }
                    else
                    {
                        echo error_validation(" Your Code is Wrong! ");
                    }
                }
            }
        }
        else
        {
            echo error_validation(" Your Code Has Expired! ");
        }
    }

    function reset_password()
    {
        if(isset($_COOKIE['temp_code']))
        {
            if(isset($_GET['Email']) && isset($_GET['Code']))
            {
                if(isset($_SESSION['token']) && isset($_POST['token']))
                {
                    if($_SESSION['token'] == $_POST['token'])
                    {
                        if($_POST['Npassword'] == $_POST['CNpassword'])
                        {
                            $Password = md5($_POST['Npassword']);
                            $Email = $_GET['Email'];
                            $query = "UPDATE users SET user_password = '".$Password."', Validation_Code = '0' WHERE user_email = '".$Email."'";
                            $result = Query($query);

                            if($result)
                            {
                                set_message('<div class="alert alert-success"> Password Has Been Updated Successfully! <a href="login.php">Login</a></div>');
                            }
                            else
                            {
                                set_message('<div class="alert alert-danger"> Something Went Wrong! Try again Later... </div>');
                            }
                        }
                        else
                        {
                            set_message('<div class="alert alert-danger"> Password Not Matched! </div>');
                        }
                    }
                }
            }
            else
            {
                set_message('<div class="alert alert-danger"> Code or Email Not Matched! </div>');
            }
        }
        else
        {
            redirect("recover.php");
            echo '<script>alert(" Session Expired! ");</script>';
        }
    }

    //************** Recover Password Functions End *******************************************************************************/

    //*********************************** LOGIN VALIDATIONS *********************************************************************************************/

    // User Login Validation
    function login_uname_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);

            if(empty($username))
            {
                $Errors[] = " Please Enter Your Username ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
        }
    }

    function login_pass_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $remember = isset($_POST['remember']);

            if(empty($password))
            {
                $Errors[] = " Please Enter Your Password ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
            else
            {
                if(sub_login($username,$password,$remember))
                {
                    if(isset($_GET['post'])){
                        $post = $_GET['post'];
                        redirect("forum-details.php?post=" . $post);
                    }else{
                        redirect("dashboard.php");
                    }
                }
                else
                {
                    if(!isset($_GET['attempt'])){
                        redirect("login.php?attempt=1");
                        echo error_validation(" Please Enter Correct Username or Password ");
                    }else{
                        if($_GET['attempt'] == 2){
                            redirect("recover.php?attempt=3");
                        }else if($_GET['attempt'] == 1){
                            redirect("login.php?attempt=2");
                            echo error_validation(" Please Enter Correct Username or Password ");
                        }else if($_GET['attempt'] == 2){
                            redirect("login.php?attempt=3");
                            echo error_validation(" Please Enter Correct Username or Password ");
                        }else{
                            redirect("recover.php?attempt=3");
                        }
                    }
                }
            }
        }
    }

    // User Login Validation
    function login_ad_uname_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);

            if(empty($username))
            {
                $Errors[] = " Please Enter Your Username ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
        }
    }

    function login_ad_pass_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $remember = isset($_POST['remember']);

            if(empty($password))
            {
                $Errors[] = " Please Enter Your Password ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
            else
            {
                if(admin_login($username,$password,$remember))
                {
                    if(isset($_GET['post']))
                    {
                        $post = $_GET['post'];
                        redirect("../forum-details.php?post=" . $post);
                    }
                    else
                    {
                        redirect("index.php");
                    }
                }
                else
                {
                    echo error_validation(" Please Enter Correct Username or Password ");
                }
            }
        }
    }

    // User Team Login Validation
    function login_team_uname_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);

            if(empty($username))
            {
                $Errors[] = " Please Enter Your Username ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
        }
    }

    function login_team_pass_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = clean($_POST['username']);
            $password = clean($_POST['password']);
            $remember = isset($_POST['remember']);

            if(empty($password))
            {
                $Errors[] = " Please Enter Your Password ";
            }

            if(!empty($Errors))
            {
                foreach ($Errors as $Error)
                {
                    echo error_validation($Error);
                }
            }
            else
            {
                if(team_login($username,$password,$remember))
                {
                    if(isset($_GET['post']))
                    {
                        $post = $_GET['post'];
                        redirect("../forum-details.php?post=" . $post);
                    }
                    else
                    {
                        redirect("index.php");
                    }
                }
                else
                {
                    echo error_validation(" Please Enter Correct Username or Password ");
                }
            }
        }
    }

    // Admin Login Function
    function admin_login($username,$password,$remember)
    {
        $query = " SELECT * FROM users WHERE username='$username' OR user_email='$username' OR user_phone='$username' AND user_active = '1' ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            $dbUsername = $row['username'];
            $dbPassword = $row['user_password'];

            if(md5($password) == $dbPassword)
            {
                if($remember == true)
                {
                    setcookie('loginID',$username, time() + 86400);
                }

                $_SESSION['loginID'] = $username;

                $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') ";
                $result = Query($query);
                confirm($result);

                if(fetch_data($result))
                {
                    $query = " UPDATE online_status SET start=1,end=0,date=now() WHERE user=md5('$dbUsername') ";
                    $result = Query($query);
                    confirm($result);
                }
                else
                {
                    $query = " INSERT INTO online_status(user,start,end,date) VALUES(md5('$dbUsername'),1,0,now()) ";
                    $result = Query($query);
                    confirm($result);
                }

                return true;
            }
            else
            {
                return false;
            }
        }
    }

    // Team Login Function
    function team_login($username,$password,$remember)
    {
        $query = " SELECT * FROM users WHERE username='$username' OR user_email='$username' OR user_phone='$username' ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            if($row['user_active'] == 1) {
                $dbUsername = $row['username'];
                $dbPassword = $row['user_password'];

                if (md5($password) == $dbPassword) {
                    if ($remember == true) {
                        setcookie('loginID', $username, time() + 86400);
                    }

                    $_SESSION['loginID'] = $username;

                    $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') ";
                    $result = Query($query);
                    confirm($result);

                    if(fetch_data($result)) {
                        $query = " UPDATE online_status SET start=1,end=0,date=now() WHERE user=md5('$dbUsername') ";
                        $result = Query($query);
                        confirm($result);
                    } else {
                        $query = " INSERT INTO online_status(user,start,end,date) VALUES(md5('$dbUsername'),1,0,now()) ";
                        $result = Query($query);
                        confirm($result);
                    }

                    return true;
                } else {
                    return false;
                }
            }else{
                ?>
                <script type="text/javascript">
                    alert('Error! User Account Not Activated Yet, Please Check your Email on How to Activate or Contact us For Help on this Issue.');
                    window.location.href="login.php";
                </script>
                <?php
            }
        }
    }

    // Subscriber Login Function
    function sub_login($username,$password,$remember)
    {
        $query = " SELECT * FROM users WHERE username='$username' OR user_email='$username' OR user_phone='$username' AND user_active = '1' AND user_role='subscriber' ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            $dbUsername = $row['username'];
            $dbPassword = $row['user_password'];

            if(md5($password) == $dbPassword)
            {
                if($remember == true)
                {
                    setcookie('loginID',$username, time() + 86400);
                }

                $_SESSION['loginID'] = $username;

                $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') ";
                $result = Query($query);
                confirm($result);

                if(fetch_data($result))
                {
                    $query = " UPDATE online_status SET start=1,end=0,date=now() WHERE user=md5('$dbUsername') ";
                    $result = Query($query);
                    confirm($result);
                }
                else
                {
                    $query = " INSERT INTO online_status(user,start,end,date) VALUES(md5('$dbUsername'),1,0,now()) ";
                    $result = Query($query);
                    confirm($result);
                }

                return true;
            }
            else
            {
                return false;
            }
        }
    }

    // Admin Logged in Function
    function admin_logged_in()
    {
        $query = " SELECT * FROM users WHERE username='".$_SESSION['loginID']."' OR user_email='".$_SESSION['loginID']."' OR user_phone='".$_SESSION['loginID']."' AND user_active = 1 ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            if($row['user_role'] == 'admin')
            {
                $dbUsername = $row['username'];

                if(isset($_SESSION['loginID']) || isset($_COOKIE['loginID']))
                {
                    $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') AND start=1 ";
                    $result = Query($query);
                    confirm($result);

                    return true;
                }
            }
            else
            {
                return false;
            }
        }
    }

    // Team Logged in Function
    function team_logged_in()
    {
        $query = " SELECT * FROM users WHERE username='".$_SESSION['loginID']."' OR user_email='".$_SESSION['loginID']."' OR user_phone='".$_SESSION['loginID']."' AND user_active = 1 ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            if($row['user_role'] == 'team')
            {
                $dbUsername = $row['username'];

                if(isset($_SESSION['loginID']) || isset($_COOKIE['loginID']))
                {
                    $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') AND start=1 ";
                    $result = Query($query);
                    confirm($result);

                    return true;
                }
            }
            else
            {
                return false;
            }
        }
    }

    // Main Logged in Function
    function logged_in()
    {
        $query = " SELECT * FROM users WHERE username='".$_SESSION['loginID']."' OR user_phone='".$_SESSION['loginID']."' OR user_email='".$_SESSION['loginID']."' AND user_active=1 ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            $dbUsername = $row['username'];

            if(isset($_SESSION['loginID']) || isset($_COOKIE['loginID']))
            {
                $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') AND start=1 ";
                $result = Query($query);
                confirm($result);

                return true;
            }
            else
            {
                return false;
            }
        }
    }

    // Subscriber Logged in Function
    function sub_logged_in()
    {
        $query = " SELECT * FROM users WHERE username='".$_SESSION['loginID']."' OR user_phone='".$_SESSION['loginID']."' OR user_email='".$_SESSION['loginID']."' AND user_active=1 ";
        $result = Query($query);

        if($row = fetch_data($result))
        {
            if($row['user_role'] == 'subscriber')
            {
                $dbUsername = $row['username'];

                if(isset($_SESSION['loginID']) || isset($_COOKIE['loginID']))
                {
                    $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') AND start=1 ";
                    $result = Query($query);
                    confirm($result);

                    return true;
                }
            }
            else
            {
                return false;
            }
        }
    }

    //*********************************** LOGIN VALIDATIONS *********************************************************************************************/