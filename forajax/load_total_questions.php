<?php
require_once('../functions/init.php');

$total_questions=0;
$gameId = clean($_GET['gameId']);

$query  = " SELECT * FROM current_game WHERE id=$gameId ";
$result = Query($query);
confirm($result);

if($row = fetch_data($result)){
    if($row['stake'] == 50){
        $total_questions = 5;
        echo $total_questions;
    }else if($row['stake'] == 100){
        $total_questions = 10;
        echo $total_questions;
    }else if($row['stake'] == 150){
        $total_questions = 15;
        echo $total_questions;
    }else if($row['stake'] == 200){
        $total_questions = 20;
        echo $total_questions;
    }
}else{
    unset($_SESSION['game-session']);
    setCookie('game-session','',time() - 100);
    ?>
    <script type="text/javascript">
        alert('Session Expired!');
        window.location='game.php';
    </script>
    <?php
}