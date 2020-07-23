<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<?php

if(!logged_in())
{
    redirect("login.php");
    set_message('<h3 style="color:white;" class="bg-danger p-4 text-center">Login First to Access Q-Gaming</h3>');
}
else if(logged_in() == true && isset($_SESSION['loginID']))
{
    $loginID = clean($_SESSION['loginID']);

    $query = " SELECT * FROM users WHERE username='$loginID' OR user_email='$loginID' OR user_phone='$loginID' ";
    $result = Query($query);
    confirm($result);

    if($row = fetch_data($result))
    {
        $userId = $row['username'];
    }
}

?>

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
			<div id="hideCat" class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <?php

                if(!isset($_GET['stake']) && !isset($_GET['CatId']) && !isset($_GET['StakeId']) && !isset($_GET['gameStake']) && !isset($_GET['gameCat']) && !isset($_GET['gameSubCat']))
                {

                ?>
                <!-- Article 01 -->
                <article>
                    <h3 class="text-right">Welcome <font color="#ffd700"><?php echo $userId; ?></font> to the
                        Q/A Section.</h3>
                    <p class="text-right">Please kindly click an amount to Stake before Starting...</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Amount of Stake</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                $query = " SELECT * FROM stake ";
                                $result = Query($query);
                                confirm($result);

                                while($row = fetch_data($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><a href="game.php?stake=<?php echo $row['amount']; ?>"><input type="button" value="select" class="btn btn-dark"></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </article>
                <?php } ?>
			</div>
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <?php

                if(isset($_GET['stake'])){
                    $StakeAmount = clean($_GET['stake']);

                    $query = " SELECT * FROM game_categories WHERE stake=$StakeAmount ";
                    $result = Query($query);
                    confirm($result);

                    if(fetch_data($result)){
                        ?>
                        <!-- Article 01 -->
                        <article>
                        <h3 class="text-right">Player: <font color="#ffd700"><?php echo $userId; ?></font></h3>
                        <p class="text-right">Please kindly select a Category to Start</p>

                        <div class="table-responsive">
                        <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>No</td>
                            <td>Category</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $query = " SELECT * FROM game_categories WHERE stake=$StakeAmount ";
                        $result = Query($query);
                        confirm($result);

                        while ($row = fetch_data($result)) {
                            $CategoryId = $row['id'];
                            $Category = $row['title'];

                            ?>
                            <tr>
                                <td><?php echo $CategoryId; ?></td>
                                <td><?php echo $Category; ?></td>
                                <td><a href="game.php?StakeId=<?php echo $StakeAmount; ?>&CatId=<?php echo $CategoryId; ?>"><input type="button"
                                                                                            value="select"
                                                                                            class="btn btn-dark"></a>
                                </td>
                            </tr>
                            <?php

                        }
                    }
                    else
                    {
                        echo warning_validation(" No Sub Categories Found! Please do click the link to Pick Another <a class='float-right' href='game.php'>Click Me!</a> ");
                    }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </article>
                    <?php

                }
                else if(isset($_GET['StakeId']) && isset($_GET['CatId'])) {
                    $CatId = clean($_GET['CatId']);
                    $stake = clean($_GET['StakeId']);

                    $query = " SELECT * FROM game_categories WHERE id=$CatId ";
                    $check = Query($query);
                    confirm($check);

                    if ($rows = fetch_data($check)) {
                        ?>
                        <article>
                            <h3 class="text-right">Player: <font color="#ffd700"><?php echo $userId; ?></font></h3>
                            <p class="text-right">Please kindly select a Sub Category under <font
                                        color="#ffd700"><?php echo $rows['title']; ?></font> to Start</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Category</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $query = " SELECT * FROM game_sub_categories WHERE category_id=$CatId ";
                                    $result = Query($query);
                                    confirm($result);

                                    while ($row = fetch_data($result)) {
                                        $SubId = $row['id'];
                                        $SubCategory = $row['title'];

                                        ?>
                                        <tr>
                                            <td><?php echo $SubId; ?></td>
                                            <td><?php echo $SubCategory; ?></td>
                                            <td><a href="game.php?gameStake=<?php echo $stake; ?>&gameCat=<?php echo $CatId; ?>&gameSubCat=<?php echo $SubId; ?>"><input type="button"
                                                                                                        value="select"
                                                                                                        class="btn btn-dark"></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </article>
                    <?php }
                    else
                    {
                        echo warning_validation(" No Sub Categories Found! Please do click the link to Pick Another <a class='float-right' href='game.php'>Click Me!</a> ");
                    }

                }
                else if(isset($_GET['gameStake']) && isset($_GET['gameCat']) && isset($_GET['gameSubCat'])){
                    $GameCategoryId = clean($_GET['gameCat']);
                    $GameSubCategoryId = clean($_GET['gameSubCat']);
                    $GameStake = clean($_GET['gameStake']);

                    $query  = " SELECT * FROM game_categories WHERE id=$GameCategoryId ";
                    $result = Query($query);
                    confirm($result);

                    if($row = fetch_data($result)){
                        $GameCategory = $row['title'];

                        $query  = " SELECT * FROM game_sub_categories WHERE id=$GameSubCategoryId ";
                        $result = Query($query);
                        confirm($result);

                        if($rows = fetch_data($result)){
                            $GameSubCategory = $rows['title'];
                        }
                    }

                    $query = " SELECT * FROM game_sub_categories WHERE id=$GameSubCategoryId ";
                    $check = Query($query);
                    confirm($check);

                    if(fetch_data($check)){
                        $query  = " SELECT * FROM current_game WHERE user='$userId' AND stake=$GameStake AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                        $result = Query($query);
                        confirm($result);

                        if($row = fetch_data($result)){
                            $query  = " UPDATE current_game SET user='$userId',stake=$GameStake,category='$GameCategory',sub_category='$GameSubCategory',date=now() WHERE user='$userId' AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                            $result = Query($query);
                            confirm($result);
                        }else{
                            $query  = " INSERT INTO current_game(stake,user,category,sub_category,date) VALUES($GameStake,'$userId','$GameCategory','$GameSubCategory',now()) ";
                            $result = Query($query);
                            confirm($result);
                        }
                    }

                    $query  = " SELECT * FROM current_game WHERE user='$userId' AND stake=$GameStake AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                    $result = Query($query);
                    confirm($result);

                    if($currentRow = fetch_data($result)){
                        $GameCategory = $currentRow['category'];
                        $GameSubCategory = $currentRow['sub_category'];

                        // Check If There Are Available Questions
                        check_random_if_available($GameStake,$GameCategory,$GameSubCategory,$GameSubCategoryId,$userId);
                    }else{
                        $query  = " DELETE FROM current_game WHERE user='$userId' AND stake=$GameStake AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
                        $result = Query($query);
                        confirm($result);

                        ?>
                    <script type="text/javascript">
                        alert("Error!");
                        window.location.href="game.php";
                    </script>
                        <?php
//                        redirect("game.php");
                    }
                }
                ?>
            </div>
		</div>
	</div>
</section>

<script type="text/javascript">
function check_game_session(){
    <?php
    $query  = " SELECT * FROM current_game WHERE user='$userId' AND stake='$GameStake' AND category='$GameCategory' AND sub_category='$GameSubCategory' ";
    $result = Query($query);
    confirm($result);

    if($row = fetch_data($result)){
        if(stake_amount50($row['stake']) == true) {
            $query = " SELECT * FROM played_questions WHERE user='$userId' AND stake=$GameStake ";
            $result = Query($query);
            confirm($result);

            while ($rowA = fetch_data($result)) {
                if (!isset($_SESSION['played_questions'][$rowA['question_id']])) {
                    $_SESSION['played_questions'][$rowA['question_id']] = $rowA['question_id'];
                }
            }

            $query = " SELECT * FROM quiz50 WHERE category='".$row['category']."' AND sub_category='".$row['sub_category']."' ORDER BY RAND() LIMIT 5 ";
            $result = Query($query);
            confirm($result);

            while($rowB = fetch_data($result)){
                if (isset($_SESSION['played_questions'][$rowB['id']])) {
                    if($rowB['id'] == $_SESSION['played_questions'][$rowB['id']]) {
                        $_SESSION['game-question-no'][$rowB['id']] = $rowB['id'];
                        setcookie('game-session', token_generate(), time() + 50);
                        ?>
                        set_game_session('<?php echo $GameSubCategory; ?>','<?php echo $row['id'] ?>');
                        <?php
                    }else{
                        unset($_SESSION['played_questions']);
                        ?>
                        window.location.href="error.php?noquestions=???";
                        <?php
                    }
                }
            }
        }
    }else{
        ?>
        window.location.href = "error.php?currentgameId=???";
        <?php
    }
    ?>
}
function set_game_session(game_category,gameId){
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            window.location.href="play_game.php?gameId="+gameId;
        }
    };
    xmlhttp.open("GET","forajax/set_game_session.php?gameId="+gameId,true);
    xmlhttp.send(null);
}
</script>

<?php require_once('includes/footer.php'); ?>
