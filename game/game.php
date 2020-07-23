<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Quick Quiz - Play</title>
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="game.css" />
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/TimeCircles.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/TimeCircles.css">
</head>
<body>
<div class="container">
    <div id="game" class="justify-center flex-column">
        <center><div id="exam-timer" data-timer="10" style="max-width:200px;width:100%;height:40%;"></div></center>
        <h2 id="question">What is the answer to this questions?</h2>
        <div class="choice-container">
            <p class="choice-prefix">A</p>
            <p class="choice-text" data-number="1">Choice 1</p>
        </div>
        <div class="choice-container">
            <p class="choice-prefix">B</p>
            <p class="choice-text" data-number="2">Choice 2</p>
        </div>
        <div class="choice-container">
            <p class="choice-prefix">C</p>
            <p class="choice-text" data-number="3">Choice 3</p>
        </div>
        <div class="choice-container">
            <p class="choice-prefix">D</p>
            <p class="choice-text" data-number="4">Choice 4</p>
        </div>
        <div class="choice-container">
            <button></button>
        </div>
    </div>
</div>
<script src="game.js"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#exam-timer').TimeCircles({
            time:{
                Days:{
                    show:false
                },
                Hours:{
                    show:false
                },
                Minutes:{
                    show:false
                },
                Seconds:{
                    show:true
                }
            }
        });

        setInterval(function(){
            var remaining_time = $('#exam-timer').TimeCircles().getTime();
            if(remaining_time < 1)
            {
                // alert('Exam Time Over');
                //location.reload();
            }
        },1000)
    });
</script>