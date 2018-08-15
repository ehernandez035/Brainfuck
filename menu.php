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

<?php printNav(); ?>
<div class="container mt-3">

    <h1>Brainfuck</h1>


    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header">Rankings</h5>
        <div class="card-body" >
            <i class="material-icons" style="font-size: 5em">
                insert_emoticon
            </i>
        </div>
        <p class="card-text">See the top 10 players punctuation and try to catch them.</p>
        <a class='btn btn-primary' href="ranking.php">Go! <i class="material-icons" style="vertical-align: middle;">
                keyboard_arrow_right
            </i></a>
    </div>

    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header">Levels</h5>
        <div class="card-body">
            <i class="material-icons" style="font-size: 5em">
                videogame_asset
            </i>
        </div>
        <p class="card-text">Take a look to the minigames.</p>
        <a class='btn btn-primary' href="levels.php">Go! <i class="material-icons" style="vertical-align: middle;">
                keyboard_arrow_right
            </i></a>
    </div>

</div>


<?php printFooter(); ?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>

