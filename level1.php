<?php
require_once "components.php";
require_once "datuBase.php";
session_start();
if (isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Level 1</title>
    <style>
body {
    background-color: dimgrey;
            text-align: center;
        }

        h1 {
    font-family: monospace;
            color: white;
            font-size: 30pt;
        }

        p {
    text-align: center;
        }

        #gameBox {
            width: 500px;
            height: 500px;
            margin-right: auto;
            margin-left: auto;
            background-color: white;
            border-color: dimgrey;
            position: relative;
        }

        .buttonGame {
    width: 50px;
            height: 50px;
        }

        .badButtonGame {
    width: 50px;
            height: 50px;
            border-width: 4px;
            border-color: red;
        }

        .hidden {
    display: none;
}

        #lose {
            color: red;
        }

    </style>
    <script>
        // Set the date we're counting down to
        var start;
        var boxesLeft;
        var x;
        var difficulty;
        var timervalue;
        var score;

        // Update the count down every 1 second
        function lose() {
            clearInterval(x);
            document.getElementById("timer").innerHTML = 0;
            document.getElementById("gameBox").classList.add("hidden");
            document.getElementById("lose").classList.remove("hidden");
            document.getElementById("gameBox").innerHTML = "";
            if (difficulty > 1) document.getElementById("nextButton").classList.remove("hidden");
            if (difficulty > 1) document.getElementById("start").innerHTML = "Try again!";
        }

        function win() {
            clearInterval(x);
            difficulty++;
            startGame();
        }

        function drawBox(bad=false) {
            if (!bad && difficulty > 1) {
                if (Math.random() < 0.5) {
                    drawBox(true);
                }
                timervalue -= 10;
                if (timervalue < 500) timervalue = 500;
            }
            if (!bad) boxesLeft--;
            var gameBox = document.getElementById("gameBox");
            var button = document.createElement("button");
            if (bad) {
                button.className = "badButtonGame";
            } else {
                button.className = "buttonGame";
            }
            var x = Math.random() * 450;
            var y = Math.random() * 450;
            button.style = "position: absolute;left:" + x + "px; top:" + y + "px;background-color: rgb(" + Math.round(Math.random() * 245) + "," + Math.round(Math.random() * 245) + "," + Math.round(Math.random() * 245) + ");";
            if (!bad) {
                button.onclick = nextButton;
            } else {
                button.onclick = lose;
            }
            gameBox.appendChild(button);
        }

        function nextButton() {
            var current = new Date().getTime();
            var elapsed = current - start;
            if (difficulty == 0) {
                score += (timervalue - elapsed) * 10;
            } else if (difficulty == 1) {
                score += (timervalue - elapsed) * 30;
            } else {
                score += (timervalue - elapsed) * 60;
            }
            document.getElementById("score").innerHTML = "Score: " +score;
            document.getElementById("gameBox").innerHTML = '';
            if (boxesLeft > 0) {
                start = new Date().getTime();
                drawBox();
            } else {
                win();
            }


        }

        function reset() {
            score = 0;
            document.getElementById("score").innerHTML = "Score: 0";
            difficulty = 0;
            startGame();
        }

        function startGame() {

            document.getElementById("gameBox").innerHTML = "";
            start = new Date().getTime();
            document.getElementById("gameBox").classList.remove("hidden");
            document.getElementById("lose").classList.add("hidden");

            if (difficulty == 0) {
                boxesLeft = 10;
                timervalue = 2000;
                document.getElementById("timer").style = "background-color: green;";
            } else if (difficulty == 1) {
                boxesLeft = 15;
                timervalue = 1000;
                document.getElementById("timer").style = "background-color: orange;";
            } else {
                timervalue = 1000;
                boxesLeft = 10000000;
                document.getElementById("timer").style = "background-color: red;";
            }


            drawBox();
            x = setInterval(function () {
                var current = new Date().getTime();
                var elapsed = current - start;

                if (elapsed > timervalue) {
                    lose();
                    <?php updatePointsL1($userid, getPoints($userid))?>

                } else {
                    document.getElementById("timer").innerHTML = timervalue - elapsed;
                }
            }, 1);


        }
    </script>
</head>
<body>

<?php printNav() ?>

<h1>Level 1</h1>

<span>Click the numbers in order before the timer gets to 0!</span>
<div style="display: inline-block">
    <h1 id="timer">2000</h1>
</div>
<div id="gameBox">

</div>
<h2 id="lose" class="hidden">
You lose!
</h2>
<div class="text-center">
    <h1 id="score" class="font-weight-bold">Score: 0</h1>
</div>
<button class="btn btn-primary" id="start" onclick="reset()">Start  <i class="material-icons" style="vertical-align: middle;">
        play_circle_outline
    </i></button>
<button class="btn btn-primary" id="nextButton" onclick="window.location.replace('level2.php')">Next  <i class="material-icons" style="vertical-align: middle;">
        navigate_next
    </i></button>

<?php printFooter(); ?>


<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>
