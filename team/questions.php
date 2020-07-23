<?php
require_once('../functions/init.php');
require_once('includes/header.php');
require_once('includes/topnav.php');
require_once('includes/sidenav.php');

if(logged_in()) {
    $loginID = $_SESSION['loginID'];
    $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
    $result = Query($query);

    if ($row = fetch_data($result)) {
        $Username = $row['username'];
    }
}else{
    redirect("login.php");
}
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <?php
                    if(isset($_GET['stake'])){
                        $Stake = clean($_GET['stake']);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Questions
                            </header>
                            <?php team_delete_questions(); ?>
                            <div class="panel-body">
                                <div class="">
                                    <form role="form">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="50" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="100" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="150" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="200" onclick="select_stake(this.value);">
                                        <hr>
                                            <center>
                                                <a href="add_question.php" class="btn btn-default">Add New?</a>
                                            </center>
                                        <hr>
                                        <table class="table table-responsive table-hover">
                                            <thead>
                                            <?php
                                                if($Stake == 50 || $Stake == 100){
                                            ?>
                                                <tr>
                                                    <td>Id</td>
                                                    <td>Question</td>
                                                    <td>ChoiceA</td>
                                                    <td>ChoiceB</td>
                                                    <td>ChoiceC</td>
                                                    <td>ChoiceD</td>
                                                    <td>Answer</td>
                                                    <td>Category</td>
                                                    <td>Sub_Category</td>
                                                    <td>Date</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            <?php
                                                }else if($Stake == 150 || $Stake == 200){
                                            ?>
                                                <tr>
                                                    <td>Id</td>
                                                    <td>Question</td>
                                                    <td>ChoiceA</td>
                                                    <td>ChoiceB</td>
                                                    <td>ChoiceC</td>
                                                    <td>ChoiceD</td>
                                                    <td>ChoiceE</td>
                                                    <td>Answer</td>
                                                    <td>Category</td>
                                                    <td>Sub_Category</td>
                                                    <td>Date</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            <?php
                                                }else{
                                                    redirect("../404.php");
                                                }
                                            ?>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if($Stake == 50){
                                                    $query = " SELECT * FROM quiz50 WHERE creator='$Username' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    while($quiz = fetch_data($result)){
                                                        $QuestionId = $quiz['id'];
                                                        $Question = $quiz['question'];
                                                        $ChoiceA = $quiz['choiceA'];
                                                        $ChoiceB = $quiz['choiceB'];
                                                        $ChoiceC = $quiz['choiceC'];
                                                        $ChoiceD = $quiz['choiceD'];
                                                        $Answer = $quiz['answer'];
                                                        $Category = $quiz['category'];
                                                        $SubCategory = $quiz['sub_category'];
                                                        $Date = $quiz['date'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $QuestionId; ?></td>
                                                    <td><?php echo $Question; ?></td>
                                                    <!-- Choice A -->
                                                    <?php
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice B -->
                                                    <?php
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice C -->
                                                    <?php
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice D -->
                                                    <?php
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Answer -->
                                                    <?php
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }
                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo date_format1($Date); ?></td>
                                                    <td>
                                                        <a href="add_question.php?edit=<?php echo $QuestionId; ?>&stake=50&Cat=<?php echo $Category; ?>&Sub=<?php echo $SubCategory; ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="questions.php?delete=<?php echo $QuestionId; ?>&stake=50" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            <?php
                                                    }
                                                }else if($Stake == 100){
                                                    $query = " SELECT * FROM quiz100 WHERE creator='$Username' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    while($quiz = fetch_data($result)){
                                                        $QuestionId = $quiz['id'];
                                                        $Question = $quiz['question'];
                                                        $ChoiceA = $quiz['choiceA'];
                                                        $ChoiceB = $quiz['choiceB'];
                                                        $ChoiceC = $quiz['choiceC'];
                                                        $ChoiceD = $quiz['choiceD'];
                                                        $Answer = $quiz['answer'];
                                                        $Category = $quiz['category'];
                                                        $SubCategory = $quiz['sub_category'];
                                                        $Date = $quiz['date'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $QuestionId; ?></td>
                                                    <td><?php echo $Question; ?></td>
                                                    <!-- Choice A -->
                                                    <?php
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice B -->
                                                    <?php
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice C -->
                                                    <?php
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice D -->
                                                    <?php
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Answer -->
                                                    <?php
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }
                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo date_format1($Date); ?></td>
                                                    <td>
                                                        <a href="add_question.php?edit=<?php echo $QuestionId; ?>&stake=100&Cat=<?php echo $Category; ?>&Sub=<?php echo $SubCategory; ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="questions.php?delete=<?php echo $QuestionId; ?>&stake=100" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            <?php
                                                    }
                                                }else if($Stake == 150){
                                                    $query = " SELECT * FROM quiz150 WHERE creator='$Username' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    while($quiz = fetch_data($result)){
                                                        $QuestionId = $quiz['id'];
                                                        $Question = $quiz['question'];
                                                        $ChoiceA = $quiz['choiceA'];
                                                        $ChoiceB = $quiz['choiceB'];
                                                        $ChoiceC = $quiz['choiceC'];
                                                        $ChoiceD = $quiz['choiceD'];
                                                        $ChoiceE = $quiz['choiceE'];
                                                        $Answer = $quiz['answer'];
                                                        $Category = $quiz['category'];
                                                        $SubCategory = $quiz['sub_category'];
                                                        $Date = $quiz['date'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $QuestionId; ?></td>
                                                    <td><?php echo $Question; ?></td>
                                                    <!-- Choice A -->
                                                    <?php
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice B -->
                                                    <?php
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice C -->
                                                    <?php
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice D -->
                                                    <?php
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice E -->
                                                    <?php
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Answer -->
                                                    <?php
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }
                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo date_format1($Date); ?></td>
                                                    <td>
                                                        <a href="add_question.php?edit=<?php echo $QuestionId; ?>&stake=150&Cat=<?php echo $Category; ?>&Sub=<?php echo $SubCategory; ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="questions.php?delete=<?php echo $QuestionId; ?>&stake=150" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            <?php
                                                    }
                                                }else if($Stake == 200){
                                                    $query = " SELECT * FROM quiz200 WHERE creator='$Username' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    while($quiz = fetch_data($result)){
                                                        $QuestionId = $quiz['id'];
                                                        $Question = $quiz['question'];
                                                        $ChoiceA = $quiz['choiceA'];
                                                        $ChoiceB = $quiz['choiceB'];
                                                        $ChoiceC = $quiz['choiceC'];
                                                        $ChoiceD = $quiz['choiceD'];
                                                        $ChoiceE = $quiz['choiceE'];
                                                        $Answer = $quiz['answer'];
                                                        $Category = $quiz['category'];
                                                        $SubCategory = $quiz['sub_category'];
                                                        $Date = $quiz['date'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $QuestionId; ?></td>
                                                    <td><?php echo $Question; ?></td>
                                                    <!-- Choice A -->
                                                    <?php
                                                    if (strpos($ChoiceA, '.jpg') || strpos($ChoiceA, '.png') || strpos($ChoiceA, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceA . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceA . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice B -->
                                                    <?php
                                                    if (strpos($ChoiceB, '.jpg') || strpos($ChoiceB, '.png') || strpos($ChoiceB, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceB . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceB . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice C -->
                                                    <?php
                                                    if (strpos($ChoiceC, '.jpg') || strpos($ChoiceC, '.png') || strpos($ChoiceC, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceC . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceC . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice D -->
                                                    <?php
                                                    if (strpos($ChoiceD, '.jpg') || strpos($ChoiceD, '.png') || strpos($ChoiceD, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceD . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceD . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Choice E -->
                                                    <?php
                                                    if (strpos($ChoiceE, '.jpg') || strpos($ChoiceE, '.png') || strpos($ChoiceE, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $ChoiceE . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $ChoiceE . '</td>';
                                                    }
                                                    ?>
                                                    <!-- Answer -->
                                                    <?php
                                                    if (strpos($Answer, '.jpg') || strpos($Answer, '.png') || strpos($Answer, '.jfif') !== false) {
                                                        echo '<td><img src="../images/game/' . $Answer . '" width="80" height="60"></td>';
                                                    } else {
                                                        echo '<td>' . $Answer . '</td>';
                                                    }
                                                    ?>
                                                    <td><?php echo $Category; ?></td>
                                                    <td><?php echo $SubCategory; ?></td>
                                                    <td><?php echo date_format1($Date); ?></td>
                                                    <td>
                                                        <a href="add_question.php?edit=<?php echo $QuestionId; ?>&stake=200&Cat=<?php echo $Category; ?>&Sub=<?php echo $SubCategory; ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td><a onclick="javascript: return confirm('Are you sure you want to delete this Question?');" href="questions.php?delete=<?php echo $QuestionId; ?>&stake=200" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <?php
                    }else{
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Select A Stake Amount
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                    <form role="form">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="50" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="100" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="150" onclick="select_stake(this.value);">
                                        <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="200" onclick="select_stake(this.value);">
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <?php
                    }
                ?>

                <!-- page end-->
            </div>
        </section>
        <script type="text/javascript">
            function select_stake(stake){
                if(stake == 50){
                    window.location.href="questions.php?stake="+stake;
                }else if(stake == 100){
                    window.location.href="questions.php?stake="+stake;
                }else if(stake == 150){
                    window.location.href="questions.php?stake="+stake;
                }else if(stake == 200){
                    window.location.href="questions.php?stake="+stake;
                }
            }
        </script>
<?php require_once('includes/footer.php'); ?>
