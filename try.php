<?php
require_once('functions/init.php');

/*unset($_SESSION['played_questions']);

print_r($_SESSION['played_questions']);*/

//$query = " SELECT * FROM played_questions WHERE user='Username' AND stake=50 ";
//$result = Query($query);
//confirm($result);
//
//while($row = fetch_data($result)) {
//    if (!isset($_SESSION['played_questions'][$row['question_id']])) {
//        $_SESSION['played_questions'][$row['question_id']] = $row['question_id'];
//    }
//}
//
//    if (isset($_SESSION['played_questions'])) {
//        print_r($_SESSION['played_questions']);
//        echo '<br>';
//    }
//
//    $query = " SELECT * FROM quiz50 WHERE category='Sports' AND sub_category='BasketBall' ORDER BY RAND() LIMIT 5 ";
//    $result = Query($query);
//    confirm($result);
//
//    while ($rows = fetch_data($result)) {
//        if (isset($_SESSION['played_questions'][$rows['id']])) {
//            if($rows['id'] !== $_SESSION['played_questions'][$rows['id']]) {
//                echo $rows['id'].'<br>';
//            } else {
//                echo 'none ';
//            }
//        }
//    }
if(isset($_SESSION['game-question-no'])){
    print_r($_SESSION['game-question-no']);
}
if(isset($_COOKIE['game-session'])){
    echo $_COOKIE['game-session'];
}
if(isset($_COOKIE['answer'])){
    echo $_COOKIE['answer'];
}
//unset($_SESSION['game-question-no']);
//unset($_SESSION['answer']);
//unset($_COOKIE['game-session']);
//setcookie('game-session','',time() - 50);

?>
<!--<script>-->
<!--    var CurrentYear = new Date().getUTCFullYear()-->
<!--    document.write(CurrentYear)-->
<!--</script>-->
