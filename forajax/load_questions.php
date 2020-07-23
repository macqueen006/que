<?php
require_once('../functions/init.php');

$question="";
$choiceA="";
$choiceB="";
$choiceC="";
$choiceD="";
$answer="";
$count=0;
$ans="";

$gameId = clean($_GET['gameId']);

$query  = " SELECT * FROM current_game WHERE id=$gameId ";
$result = Query($query);
confirm($result);

if($currentRow = fetch_data($result)){
    $stake = $currentRow['stake'];
    $user = $currentRow['user'];
    $cat = $currentRow['category'];
    $sub = $currentRow['sub_category'];
}

$no = $_GET['no'];
$gameQuestionNo = $_SESSION['game-question-no'];
$username = $_SESSION['loginID'];

if(isset($stake) && isset($cat) && isset($sub) && isset($gameQuestionNo) && isset($gameId)){
    foreach ($_SESSION['game-question-no'] as $ar){
        $ShuffledQuestion = mt_rand($ar,$ar);
    }

//    if($ShuffledQuestion){
        if($stake == 50){
            $query = " SELECT * FROM quiz50 WHERE id=$ShuffledQuestion  ";
            $result = Query($query);
            confirm($result);

            if($row = fetch_data($result)){
                $questionId = $row['id'];
                $question = $row['question'];
                $choiceA = $row['choiceA'];
                $choiceB = $row['choiceB'];
                $choiceC = $row['choiceC'];
                $choiceD = $row['choiceD'];

                display_questions1($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$ShuffledQuestion);
            }

            $playedQuery = " SELECT * FROM played_questions WHERE stake=$stake AND question_id=$ShuffledQuestion ";
            $playedResult = Query($playedQuery);
            confirm($playedResult);

            if(!fetch_data($playedResult)){
                $query = " INSERT INTO played_questions(user,question_id,stake,date) VALUES('$user',$ShuffledQuestion,$stake,now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
                    unset($_SESSION['game-question-no'][$ShuffledQuestion]);
                }
            }
        }else if($stake == 100){
            $query = " SELECT * FROM quiz100 WHERE id=$ShuffledQuestion  ";
            $result = Query($query);
            confirm($result);

            if($row = fetch_data($result)){
                $questionId = $row['id'];
                $question = $row['question'];
                $choiceA = $row['choiceA'];
                $choiceB = $row['choiceB'];
                $choiceC = $row['choiceC'];
                $choiceD = $row['choiceD'];

                display_questions1($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$ShuffledQuestion);
            }else{
                $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(100,1500,0,1500,'$user',10,0,0,'$cat','$sub','Canceled',now()) ";
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
                                <script type="text/javascript">
                                    alert('Error! You have Tampered With Your Questions and This Level Has Therefore Been Canceled.');
                                    window.location.href="index.php";
                                </script>
                                <?php
                            }
                        }
                    }
                }
            }

            $playedQuery = " SELECT * FROM played_questions WHERE stake=$stake AND question_id=$ShuffledQuestion ";
            $playedResult = Query($playedQuery);
            confirm($playedResult);

            if(!fetch_data($playedResult)){
                $query = " INSERT INTO played_questions(user,question_id,stake,date) VALUES('$user',$ShuffledQuestion,$stake,now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
                    unset($_SESSION['game-question-no'][$ShuffledQuestion]);
                }
            }
        }else if($stake == 150){
            $query = " SELECT * FROM quiz150 WHERE id=$ShuffledQuestion  ";
            $result = Query($query);
            confirm($result);

            if($row = fetch_data($result)){
                $questionId = $row['id'];
                $question = $row['question'];
                $choiceA = $row['choiceA'];
                $choiceB = $row['choiceB'];
                $choiceC = $row['choiceC'];
                $choiceD = $row['choiceD'];
                $choiceE = $row['choiceE'];

                display_questions2($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$choiceE,$ShuffledQuestion);
            }else{
                $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(150,2000,0,2000,'$user',15,0,0,'$cat','$sub','Canceled',now()) ";
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
                                <script type="text/javascript">
                                    alert('Error! You have Tampered With Your Questions and This Level Has Therefore Been Canceled.');
                                    window.location.href="index.php";
                                </script>
                                <?php
                            }
                        }
                    }
                }
            }

            $playedQuery = " SELECT * FROM played_questions WHERE stake=$stake AND question_id=$ShuffledQuestion ";
            $playedResult = Query($playedQuery);
            confirm($playedResult);

            if(!fetch_data($playedResult)){
                $query = " INSERT INTO played_questions(user,question_id,stake,date) VALUES('$user',$ShuffledQuestion,$stake,now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
                    unset($_SESSION['game-question-no'][$ShuffledQuestion]);
                }
            }
        }else if($stake == 200){
            $query = " SELECT * FROM quiz200 WHERE id=$ShuffledQuestion  ";
            $result = Query($query);
            confirm($result);

            if($row = fetch_data($result)){
                $questionId = $row['id'];
                $question = $row['question'];
                $choiceA = $row['choiceA'];
                $choiceB = $row['choiceB'];
                $choiceC = $row['choiceC'];
                $choiceD = $row['choiceD'];
                $choiceE = $row['choiceE'];

                display_questions2($question,$questionId,$choiceA,$choiceB,$choiceC,$choiceD,$choiceE,$ShuffledQuestion);
            }else{
                $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(200,2500,0,2500,'$user',20,0,0,'$cat','$sub','Canceled',now()) ";
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
                                <script type="text/javascript">
                                    alert('Error! You have Tampered With Your Questions and This Level Has Therefore Been Canceled.');
                                    window.location.href="index.php";
                                </script>
                                <?php
                            }
                        }
                    }
                }
            }

            $playedQuery = " SELECT * FROM played_questions WHERE stake=$stake AND question_id=$ShuffledQuestion ";
            $playedResult = Query($playedQuery);
            confirm($playedResult);

            if(!fetch_data($playedResult)){
                $query = " INSERT INTO played_questions(user,question_id,stake,date) VALUES('$user',$ShuffledQuestion,$stake,now()) ";
                $result = Query($query);
                confirm($result);

                if($result){
                    unset($_SESSION['game-question-no'][$ShuffledQuestion]);
                }
            }
        }
//    }else{
//        if($stake == 50){
//            $query = " INSERT INTO game_results(stake,stake_win,win,lose,user,total_questions,correct_answers,wrong_answers,category,sub_category,status,date) VALUES(50,1000,0,1000,'$user',5,0,0,'$cat','$sub','Canceled',now()) ";
//            $result = Query($query);
//            confirm($result);
//
//            if($result){
//                $query = " DELETE FROM current_game WHERE id=$gameId ";
//                $result = Query($query);
//                confirm($result);
//
//                if($result){
//                    if(isset($_SESSION['game-question-no'])){
//                        unset($_SESSION['game-question-no']);
//                        if(isset($_COOKIE['game-session'])){
//                            unset($_COOKIE['game-session']);
//                            setcookie('game-session','',time() - 50);
//                            ?>
<!--                            <script type="text/javascript">-->
<!--                                alert('Error! You have Tampered With Your Questions and This Level Has Therefore Been Canceled.');-->
<!--                                window.location.href="index.php";-->
<!--                            </script>-->
<!--                            --><?php
//                        }
//                    }
//                }
//            }
//        }
//    }
}