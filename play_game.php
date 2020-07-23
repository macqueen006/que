<?php

require_once('functions/init.php');

if(!logged_in()) {
    redirect("login.php");
    set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access Q-Gaming</h3>');
}
if(logged_in() == true && isset($_SESSION['loginID']) && isset($_GET['gameId']) && isset($_COOKIE['game-session'])){
    $loginID = clean($_SESSION['loginID']);
    $gameId = clean($_GET['gameId']);

    $query = " SELECT * FROM users WHERE username='$loginID' OR user_email='$loginID' OR user_phone='$loginID' ";
    $result = Query($query);
    confirm($result);

    if($row = fetch_data($result))
    {
        $userId = $row['username'];

        $query  = " SELECT * FROM current_game WHERE id=$gameId ";
        $result = Query($query);
        confirm($result);

        if($rows = fetch_data($result)){
            $Category = $rows['category'];
            $SubCategory = $rows['sub_category'];
            $Stake = $rows['stake'];
        }
    }
}else{
//    ?>
<!--    <script type="text/javascript">-->
<!--        alert('Error! Session Expired Or Game was Interrupted and Progress was Lost.');-->
<!--        window.location.href="game.php";-->
<!--    </script>-->
<!--    --><?php
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
                        <div class="text-right" id="countdowntimer" style="display: block;"></div>
                        <hr>
                        <div id="game-slot" style="position: center;">
                            <div>
                                <h3 class="text-right" style="font-weight:bolder;font-size:larger;"><span id="current_question">0</span>/<span id="total_questions">10</span></h3>
                            </div>
                                <div id="load_questions">

                                </div>
                                <div class="text-center">
                                    <a href="cancel_game.php?gameId=<?php echo $gameId; ?>" onclick="javascript: return confirm('Are You sure You Want to Cancel the Game? All Progress Will be Lost And Rewards Won\'t be Claimed.');" class="btn btn-danger">Cancel</a>
                                </div>
                        </div>
                        <hr>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function load_total_questions(){
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("total_questions").innerHTML=xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","forajax/load_total_questions.php?gameId=<?php echo $gameId; ?>",true);
            xmlhttp.send(null);
        }

        var questionNo = "1";
        load_questions(questionNo);
        function load_questions(questionNo){
            document.getElementById("current_question").innerHTML=questionNo;
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    if(xmlhttp.responseText == "over"){
                        window.location="result.php?gameId=<?php echo $gameId; ?>";
                    }else{
                        document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                        load_total_questions();
                    }
                }
            };
            xmlhttp.open("GET","forajax/load_questions.php?gameId=<?php echo $gameId; ?>&no=" + questionNo,true);
            xmlhttp.send(null);
        }

        function load_next(){
            <?php
            if($Stake == 50){
            ?>
                if(questionNo < "5")
                {
                    questionNo=eval(questionNo)+1;
                    load_questions(questionNo);
                    renew_game_session();
                }
                else
                {
                    questionNo="5";
                    load_questions(questionNo);
                }
            <?php
            }else if($Stake == 100){
            ?>
                if(questionNo < "10")
                {
                    questionNo=eval(questionNo)+1;
                    load_questions(questionNo);
                    renew_game_session();
                }
                else
                {
                    questionNo="10";
                    load_questions(questionNo);
                }
            <?php
            }else if($Stake == 150){
            ?>
                if(questionNo < "15")
                {
                    questionNo=eval(questionNo)+1;
                    load_questions(questionNo);
                    renew_game_session();
                }
                else
                {
                    questionNo="15";
                    load_questions(questionNo);
                }
            <?php
            }else if($Stake == 200){
            ?>
                if(questionNo < "20")
                {
                    questionNo=eval(questionNo)+1;
                    load_questions(questionNo);
                    renew_game_session();
                }
                else
                {
                    questionNo="20";
                    load_questions(questionNo);
                }
            <?php
            }
            ?>
        }

        function select_next(choiceValue,questionId,shuffledQuestion){
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    <?php
                        if($Stake == 50){
                    ?>
                        if(questionNo < "5")
                        {
                            questionNo=eval(questionNo)+1;
                            load_questions(questionNo);
                            renew_game_session();
                        }
                        else
                        {
                            questionNo="5";
                            window.location="result.php?gameId=<?php echo $gameId; ?>";
                        }
                    <?php
                    }else if($Stake == 100){
                    ?>
                        if(questionNo < "10")
                        {
                            questionNo=eval(questionNo)+1;
                            load_questions(questionNo);
                            renew_game_session();
                        }
                        else
                        {
                            questionNo="10";
                            window.location="result.php?gameId=<?php echo $gameId; ?>";
                        }
                    <?php
                    }else if($Stake == 150){
                    ?>
                        if(questionNo < "15")
                        {
                            questionNo=eval(questionNo)+1;
                            load_questions(questionNo);
                            renew_game_session();
                        }
                        else
                        {
                            questionNo="15";
                            window.location="result.php?gameId=<?php echo $gameId; ?>";
                        }
                    <?php
                    }else if($Stake == 200){
                    ?>
                        if(questionNo < "20")
                        {
                            questionNo=eval(questionNo)+1;
                            load_questions(questionNo);
                            renew_game_session();
                        }
                        else
                        {
                            questionNo="20";
                            window.location="result.php?gameId=<?php echo $gameId; ?>";
                        }
                    <?php
                    }
                    ?>
                }
            };
            xmlhttp.open("GET","forajax/save_answer.php?questionId=" + questionId + "&value=" + choiceValue + "&ShuffledQuestion=" + shuffledQuestion,true);
            xmlhttp.send(null);
        }

        function renew_game_session()
        {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                }
            };
            xmlhttp.open("GET","forajax/set_game_session.php?gameId=<?php echo $gameId; ?>",true);
            xmlhttp.send(null);
        }
    </script>

<script type="text/javascript">
setInterval(function(){
    timer();
},1000);

function timer()
{
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if(xmlhttp.responseText == "00:00:00"){
                <?php
                    if($Stake == 50){
                ?>
                    if(questionNo < "5") {
                        load_next();
                        renew_game_session();
                    }else{
                        window.location="result.php?gameId=<?php echo $gameId; ?>";
                    }
                <?php
                }else if($Stake == 100){
                ?>
                    if(questionNo < "10") {
                        load_next();
                        renew_game_session();
                    }else{
                        window.location="result.php?gameId=<?php echo $gameId; ?>";
                    }
                <?php
                }else if($Stake == 150){
                ?>
                    if(questionNo < "15") {
                        load_next();
                        renew_game_session();
                    }else{
                        window.location="result.php?gameId=<?php echo $gameId; ?>";
                    }
                <?php
                }else if($Stake == 200){
                ?>
                    if(questionNo < "20") {
                        load_next();
                        renew_game_session();
                    }else{
                        window.location="result.php?gameId=<?php echo $gameId; ?>";
                    }
                <?php
                }
                ?>
            }
            document.getElementById('countdowntimer').innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_timer.php",true);
    xmlhttp.send(null);
}
</script>

<?php require_once('includes/footer.php'); ?>