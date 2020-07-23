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
            if(isset($_GET['stake']) && isset($_GET['edit']) && isset($_GET['Cat']) && isset($_GET['Sub'])){
                $Stake = clean($_GET['stake']);
                $QuestionId = clean($_GET['edit']);
                $SubCategory = clean($_GET['Sub']);
                $Category = clean($_GET['Cat']);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php team_edit_questions();  ?>
                            <header class="panel-heading">
                                Edit Question Under <?php echo $Category . '(' . $SubCategory . ')'; ?>
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                    <form method="POST" role="form">
                                        <label for="">Stake Price *</label>
                                        <br>
                                        <?php
                                        if($Stake == 50){
                                            $query = " SELECT * FROM quiz50 WHERE id=$QuestionId ";
                                            $result = Query($query);
                                            confirm($result);

                                            while($quiz = fetch_data($result)){
                                                $Question = $quiz['question'];
                                                $ChoiceA = $quiz['choiceA'];
                                                $ChoiceB = $quiz['choiceB'];
                                                $ChoiceC = $quiz['choiceC'];
                                                $ChoiceD = $quiz['choiceD'];
                                                $Answer = $quiz['answer'];
                                            }
                                            ?>
                                            <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="50" disabled>
                                            <?php
                                        }else if($Stake == 100){
                                            $query = " SELECT * FROM quiz100 WHERE id=$QuestionId ";
                                            $result = Query($query);
                                            confirm($result);

                                            while($quiz = fetch_data($result)){
                                                $Question = $quiz['question'];
                                                $ChoiceA = $quiz['choiceA'];
                                                $ChoiceB = $quiz['choiceB'];
                                                $ChoiceC = $quiz['choiceC'];
                                                $ChoiceD = $quiz['choiceD'];
                                                $Answer = $quiz['answer'];
                                            }
                                            ?>
                                            <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="100" disabled>
                                            <?php
                                        }else if($Stake == 150){
                                            $query = " SELECT * FROM quiz150 WHERE id=$QuestionId ";
                                            $result = Query($query);
                                            confirm($result);

                                            while($quiz = fetch_data($result)){
                                                $Question = $quiz['question'];
                                                $ChoiceA = $quiz['choiceA'];
                                                $ChoiceB = $quiz['choiceB'];
                                                $ChoiceC = $quiz['choiceC'];
                                                $ChoiceD = $quiz['choiceD'];
                                                $ChoiceE = $quiz['choiceE'];
                                                $Answer = $quiz['answer'];
                                            }
                                            ?>
                                            <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="150" disabled>
                                            <?php
                                        }else if($Stake == 200){
                                            $query = " SELECT * FROM quiz200 WHERE id=$QuestionId ";
                                            $result = Query($query);
                                            confirm($result);

                                            while($quiz = fetch_data($result)){
                                                $Question = $quiz['question'];
                                                $ChoiceA = $quiz['choiceA'];
                                                $ChoiceB = $quiz['choiceB'];
                                                $ChoiceC = $quiz['choiceC'];
                                                $ChoiceD = $quiz['choiceD'];
                                                $ChoiceE = $quiz['choiceE'];
                                                $Answer = $quiz['answer'];
                                            }
                                            ?>
                                            <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="200" disabled>
                                            <?php
                                        }
                                        ?>
                                        <hr>
                                        <label for="">Question *</label>
                                        <input type="text" class="form-control" name="question" value="<?php if(isset($Question)){echo $Question;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice A *</label>
                                        <input type="text" class="form-control" name="choiceA" value="<?php if(isset($ChoiceA)){echo $ChoiceA;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice B *</label>
                                        <input type="text" class="form-control" name="choiceB" value="<?php if(isset($ChoiceB)){echo $ChoiceB;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice C *</label>
                                        <input type="text" class="form-control" name="choiceC" value="<?php if(isset($ChoiceC)){echo $ChoiceC;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice D *</label>
                                        <input type="text" class="form-control" name="choiceD" value="<?php if(isset($ChoiceD)){echo $ChoiceD;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <?php
                                        if($Stake == 150 || $Stake == 200){
                                            ?>
                                            <label for="">Choice E *</label>
                                            <input type="text" class="form-control" name="choiceE" value="<?php if(isset($ChoiceE)){echo $ChoiceE;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                            <hr>
                                        <?php } ?>
                                        <label for="">Answer *</label>
                                        <input type="text" class="form-control" name="answer" value="<?php if(isset($Answer)){echo $Answer;} ?>" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <div class="text-right">
                                            <input type="button" value="Cancel" class="btn btn-lg btn-danger">
                                            <input type="reset" value="Reset" class="btn btn-lg btn-warning">
                                            <input type="submit" value="Update" class="btn btn-lg btn-primary" name="update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <?php
            }else if(isset($_GET['Stake']) && isset($_GET['SubId']) && isset($_GET['CatId'])){
                $Stake = clean($_GET['Stake']);
                $SubId = clean($_GET['SubId']);
                $CatId = clean($_GET['CatId']);

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
                    }
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php team_create_questions(); ?>
                            <header class="panel-heading">
                                Add A Question Under <?php echo $Category . '(' . $SubCategory . ')'; ?>
                            </header>
                            <div class="panel-body">
                                <div class="position-center">
                                    <form method="POST" role="form">
                                        <label for="">Stake Price *</label>
                                        <br>
                                        <?php
                                            if($Stake == 50){
                                                ?>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="50" disabled>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="100" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">'
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="150" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">'
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="200" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">'
                                                <?php
                                            }else if($Stake == 100){
                                                ?>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="50" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="100" disabled>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="150" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="200" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <?php
                                            }else if($Stake == 150){
                                                ?>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="50" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="100" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="150" disabled>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="200" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <?php
                                            }else if($Stake == 200){
                                                ?>
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="50" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="100" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-default" value="150" onclick="redirect_stake_question(this.value,<?php echo $CatId; ?>,<?php echo $SubId; ?>);">
                                                <input type="button" style="width:20%;height: 100px;" class="btn btn-secondary" value="200" disabled>
                                                <?php
                                            }
                                        ?>
                                        <hr>
                                        <label for="">Question *</label>
                                        <input type="text" class="form-control" name="question" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice A *</label>
                                        <input type="text" class="form-control" name="choiceA" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice B *</label>
                                        <input type="text" class="form-control" name="choiceB" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice C *</label>
                                        <input type="text" class="form-control" name="choiceC" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <label for="">Choice D *</label>
                                        <input type="text" class="form-control" name="choiceD" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <?php
                                            if($Stake == 150 || $Stake == 200){
                                        ?>
                                        <label for="">Choice E *</label>
                                        <input type="text" class="form-control" name="choiceE" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <?php } ?>
                                        <label for="">Answer *</label>
                                        <input type="text" class="form-control" name="answer" style="border: none;border-bottom: 1px solid grey;" required>
                                        <hr>
                                        <div class="text-right">
                                            <input type="button" value="Cancel" class="btn btn-lg btn-danger">
                                            <input type="reset" value="Reset" class="btn btn-lg btn-warning">
                                            <input type="submit" value="Create" class="btn btn-lg btn-primary" name="create">
                                        </div>
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
                                Choose A Stake to Add Or Edit A Question
                            </header>
                            <div class="panel-body">
                                <div class="">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $query = " SELECT * FROM game_sub_categories ";
                                        $result = Query($query);
                                        confirm($result);

                                        while($row = fetch_data($result)){
                                            $Id = $row['id'];
                                            $Title = $row['title'];
                                            $CategoryId = $row['category_id'];

                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $Id; ?></th>
                                                <td><?php echo $Title; ?></td>
                                                <?php
                                                $query = " SELECT * FROM game_categories WHERE id=$CategoryId ";
                                                $check = Query($query);
                                                confirm($check);

                                                while($rows = fetch_data($check))
                                                {
                                                    ?>
                                                    <td><?php echo $rows['title']; ?></td>
                                                <?php }
                                                $query = " SELECT * FROM game_categories WHERE id=$CategoryId";
                                                $Amo = Query($query);
                                                confirm($Amo);

                                                while($P = fetch_data($Amo))
                                                {
                                                    ?>
                                                    <td><?php echo '₦'.$P['stake']; ?></td>
                                                <td><a href="add_question.php?CatId=<?php echo $CategoryId; ?>&SubId=<?php echo $Id; ?>&Stake=<?php echo $P['stake']; ?>">select</a></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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
        function redirect_stake_question(stake,CatId,SubId){
            if(stake == 50){
                window.location.href="add_question.php?CatId="+ CatId +"&SubId="+ SubId +"&Stake="+ stake;
            }else if(stake == 100){
                window.location.href="add_question.php?CatId="+ CatId +"&SubId="+ SubId +"&Stake="+ stake;
            }else if(stake == 150){
                window.location.href="add_question.php?CatId="+ CatId +"&SubId="+ SubId +"&Stake="+ stake;
            }else if(stake == 200){
                window.location.href="add_question.php?CatId="+ CatId +"&SubId="+ SubId +"&Stake="+ stake;
            }
        }
    </script>
    <?php require_once('includes/footer.php'); ?>