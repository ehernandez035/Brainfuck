<?php
require_once "components.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="margin-bottom: 100px">

<?php printNav();?>
<div class="container mt-3">

    <h1>Brainfuck</h1>


    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header">Level 1</h5>
        <div class="card-body">
            <i class="material-icons">
                play_circle_outline
            </i>
            <p class="card-text">Try to click the squares as soon as they appear. If you are not quick enough you will loose.</p>
            <a class='btn btn-primary' href="level1.php">Play!</a>
        </div>
    </div>
    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header">Level 2</h5>
        <div class="card-body">
            <i class="material-icons">
                play_circle_outline
            </i>
            <p class="card-text">Collect all the squares before they fall.</p>
            <a class='btn btn-primary' href="level2.php">Play!</a>
        </div>
    </div>

</div>

<?php printFooter();?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>
</html>