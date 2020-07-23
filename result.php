<?php
require_once('functions/init.php');
$date = date("Y-m-d H:i:s");
$_SESSION['end_time'] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[game_time] seconds"));

if(!logged_in()) {
    redirect("login.php");
    set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access Q-Gaming</h3>');
}
else if(logged_in() == true && isset($_SESSION['loginID']) && isset($_GET['gameId'])) {
    $loginID = clean($_SESSION['loginID']);
    $gameId = clean($_GET['gameId']);

    $query = " SELECT * FROM users WHERE username='$loginID' OR user_email='$loginID' OR user_phone='$loginID' ";
    $result = Query($query);
    confirm($result);

    if($row = fetch_data($result))
    {
        $userId = $row['username'];
    }

    $query  = " SELECT * FROM current_game WHERE id=$gameId ";
    $result = Query($query);
    confirm($result);

    if($rows = fetch_data($result)){
        $Category = $rows['category'];
        $SubCategory = $rows['sub_category'];
        $Stake = $rows['stake'];
    }
}

?>
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <!-- Title text -->
                <h3>Q/A SECTION</h3>
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>
<!--==================================
=            Forum Section            =
===================================-->
<section class="blog section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <!--some code here -->

                <!-- Article 01 -->
                <article>
                    <h3 class="text-right">Player: <font color="#ffd700"><?php echo $userId; ?></font></h3>
                    <h3 class="text-right">Question Category: <font color="green"><?php echo $Category . '(' . $SubCategory . ')'; ?></font></h3>
                    <div class="text-right" id="" style="display: block;"></div>
                    <hr>
                    <div id="game-slot" style="position: center;">
                        <h1 class="text-center">Game Over</h1>
                        <h3 class="text-center">Results</h3>
                        <hr>
                        <div id="show_results">
                            <?php
                                $correct = 0;
                                $wrong = 0;

                                if(isset($_SESSION['answer'])) {
                                    if($Stake == 50) {
                                        $query = " SELECT * FROM quiz50 ";
                                        $result = Query($query);
                                        confirm($result);

                                        while($row = fetch_data($result)){
                                            if (isset($_SESSION['answer'][$row['id']])) {
                                                if ($row['answer'] == $_SESSION['answer'][$row['id']]) {
                                                    $correct = $correct + 1;
                                                } else {
                                                    $wrong = $wrong + 1;
                                                }
                                            } else {
                                                $wrong = $wrong + 1;
                                            }
                                        }

                                        $count = 5;
                                        $wrong = $count - $correct;

                                        if($correct == 5){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,1000,1000,0,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);

                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 50);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                            <script type="text/javascript">
                                                                alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                            </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,1000,0,1000,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);

                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                    unset($_COOKIE['game-session']);
                                                                    setcookie('game-session','',time() - 50);

                                                                    ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                            <script type="text/javascript">
                                                                alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                            </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else if($Stake == 100) {
                                        $query = " SELECT * FROM quiz100 ";
                                        $result = Query($query);
                                        confirm($result);

                                        while($row = fetch_data($result)) {
                                            if (isset($_SESSION['answer'][$row['id']])) {
                                                if ($row['answer'] == $_SESSION['answer'][$row['id']]) {
                                                    $correct = $correct + 1;
                                                } else {
                                                    $wrong = $wrong + 1;
                                                }
                                            } else {
                                                $wrong = $wrong + 1;
                                            }
                                        }

                                        $count = 10;
                                        $wrong = $count - $correct;

                                        if($correct == 10){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,1500,1500,0,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 100);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($correct <= 9){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,1500,750,750,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 100);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($Stake <= 5){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_questions,wrong_questions,category,sub_category,status,date) VALUES($Stake,1000,0,1000,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 100);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else if($Stake == 150){
                                        $query = " SELECT * FROM quiz150 ";
                                        $result = Query($query);
                                        confirm($result);

                                        while($row = fetch_data($result)) {
                                            if (isset($_SESSION['answer'][$row['id']])) {
                                                if ($row['answer'] == $_SESSION['answer'][$row['id']]) {
                                                    $correct = $correct + 1;
                                                } else {
                                                    $wrong = $wrong + 1;
                                                }
                                            } else {
                                                $wrong = $wrong + 1;
                                            }
                                        }

                                        $count = 15;
                                        $wrong = $count - $correct;

                                        if($correct == 15){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,2000,2000,0,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 150);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($correct <= 14){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,2000,1500,500,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 150);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($Stake <= 12){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_questions,wrong_questions,category,sub_category,status,date) VALUES($Stake,2000,1000,1000,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 150);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($Stake <= 5){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_questions,wrong_questions,category,sub_category,status,date) VALUES($Stake,2000,0,2000,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 150);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else if($Stake == 200){
                                        $query = " SELECT * FROM quiz200 ";
                                        $result = Query($query);
                                        confirm($result);

                                        while($row = fetch_data($result)) {
                                            if (isset($_SESSION['answer'][$row['id']])) {
                                                if ($row['answer'] == $_SESSION['answer'][$row['id']]) {
                                                    $correct = $correct + 1;
                                                } else {
                                                    $wrong = $wrong + 1;
                                                }
                                            } else {
                                                $wrong = $wrong + 1;
                                            }
                                        }

                                        $count = 20;
                                        $wrong = $count - $correct;

                                        if($correct == 20){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,2500,2500,0,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 200);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($correct <= 19){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES($Stake,2500,1000,1000,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId' ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 200);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($Stake <= 14){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_questions,wrong_questions,category,sub_category,status,date) VALUES($Stake,2500,1250,1250,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 200);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
                                                                </script>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }else if($Stake <= 10){
                                            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_questions,wrong_questions,category,sub_category,status,date) VALUES($Stake,2500,0,2500,'$userId',$count,$correct,$wrong,'$Category','$SubCategory','pending',now()) ";
                                            $result = Query($query);
                                            confirm($result);

                                            if($result){
                                                $query = " SELECT * FROM users WHERE username='$userId' ";
                                                $result = Query($query);
                                                confirm($result);

                                                if(fetch_data($result)){
                                                    $query = " UPDATE users SET q_wallet=q_wallet-$Stake WHERE username='$userId'  ";
                                                    $result = Query($query);
                                                    confirm($result);

                                                    if($result){
                                                        $query = " INSERT INTO q_money_transaction(user,transaction,amount,date) VALUES('$userId','game',$Stake,now()) ";
                                                        $result = Query($query);
                                                        confirm($result);

                                                        if($result){
                                                            $query = " DELETE FROM current_game WHERE id=$gameId ";
                                                            $result = Query($query);
                                                            confirm($result);
                        
                                                            if($result){
                                                                if(isset($_SESSION['game-question-no'])){
                                                                    unset($_SESSION['game-question-no']);
                                                                    if(isset($_COOKIE['game-session'])){
                                                                        unset($_COOKIE['game-session']);
                                                                        setcookie('game-session','',time() - 200);

                                                                        ?>
                                                                        <div class="jumbotron" onmouseover="dashon1();" onmouseleave="dashoff1();">
                                                                            <a href="dashboard.php"><h3 id="dash1" class="text-right">Game Result Have Been Submitted. Please Check your Dashboard to View your Result.</h3></a>
                                                                            <p class="text-right">Check your <a href="dashboard.php">Dashboard</a></p>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                }
                                                            }
                                                        }else{
                                                            ?>
                                                                <script type="text/javascript">
                                                                    alert('An Error Occurred in Submitting Result, Please Try Again Later!');
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
                                        alert('Session Expired!!! If a Current Game Was Played, View your Dashboard to Check Results. Else, Play Another Game to View Results');
                                        window.location.href = "index.php";
                                    </script>
                                    <?php
                                }
                            ?>
                        </div>
                        <hr>
                        <div>
                            <center><input type="button" class="btn btn-success" id="subBtn" value="Ok">
                        </div>
                    </div>
                    <hr>
                </article>
            </div>
        </div>
    </div>
</section>
<?php

if(isset($_SESSION['answer']) || isset($_SESSION['game-question-no'])){
    unset($_SESSION['answer']);
    unset($_SESSION['game-question-no']);
}

?>
<script type="text/javascript">
    function dashon1(){
        document.getElementById("dash1").style = "color:white;";
    }
        function dashoff1(){
        document.getElementById("dash1").style = "color:black";
    }
</script>
<?php require_once('includes/footer.php'); ?>