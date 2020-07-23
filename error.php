<?php
if(isset($_GET['currentgameId'])){
    if($_GET['currentgameId'] == '???'){
        ?>
        <script type="text/javascript">
            alert('Error! Something Went Wrong, Please Try Again.');
            window.location.href="game.php";
        </script>
        <?php
    }
}else if(isset($_GET['noquestions'])){
    if($_GET['noquestions'] == '???'){
        unset($_SESSION['played_questions']);
        if(!isset($_SESSION['played_questions'])){
            ?>
            <script type="text/javascript">
                alert('Error! No Questions Available at the Moment, Please Try Another Category');
                window.location.href="game.php";
            </script>
            <?php
        }
    }
}