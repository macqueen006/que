<?php
require_once('functions/init.php');

$gameId = clean($_GET['gameId']);

$query = " SELECT * FROM current_game WHERE id=$gameId ";
$result = Query($query);
confirm($result);

if($row = fetch_data($result)){
    $Stake = $row['stake'];
    $User = $row['user'];
    $Category = $row['category'];
    $SubCategory = $row['sub_category'];
}else{
    redirect("404.php");
}

if($Stake == 50){
    $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(50,1000,0,1000,'$User',5,0,0,'$Category','$SubCategory','Canceled',now()) ";
    $result = Query($query);
    confirm($result);

    if($result){
        $query = " DELETE FROM current_game WHERE id=$gameId ";
        $result = Query($query);
        confirm($result);

        if($result){
            unset($_SESSION['answer']);
            unset($_SESSION['game-question-no']);
            unset($_COOKIE['game-session']);
            setcookie('game-session','',time() - 50);
            ?>
            <script type="text/javascript">
                alert('Success! Game Canceled Successfully.');
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}else if($Stake == 100){
    $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(100,1500,0,1500,'$User',10,0,0,'$Category','$SubCategory','Canceled',now()) ";
    $result = Query($query);
    confirm($result);

    if($result){
        $query = " DELETE FROM current_game WHERE id=$gameId ";
        $result = Query($query);
        confirm($result);

        if($result){
            ?>
            <script type="text/javascript">
                alert('Success! Game Canceled Successfully.');
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}else if($Stake == 150){
    $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(150,2000,0,2000,'$User',15,0,0,'$Category','$SubCategory','Canceled',now()) ";
    $result = Query($query);
    confirm($result);

    if($result){
        $query = " DELETE FROM current_game WHERE id=$gameId ";
        $result = Query($query);
        confirm($result);

        if($result){
            ?>
            <script type="text/javascript">
                alert('Success! Game Canceled Successfully.');
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}else if($Stake == 200){
    $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(200,2500,0,2500,'$User',20,0,0,'$Category','$SubCategory','Canceled',now()) ";
    $result = Query($query);
    confirm($result);

    if($result){
        $query = " DELETE FROM current_game WHERE id=$gameId ";
        $result = Query($query);
        confirm($result);

        if($result){
            ?>
            <script type="text/javascript">
                alert('Success! Game Canceled Successfully.');
                window.location.href="index.php";
            </script>
            <?php
        }
    }
}