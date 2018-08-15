<?php
require_once "components.php";
require_once "datuBase.php";
$topUsers=getTopPlayers();
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
    <?php foreach ($topUsers as $topUser) {
    ?>
    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header"><?php $topUser['username']?></h5>
        <span><?php $topUser['points']?></span>

    </div>
    <?php }?>


</div>

<?php printFooter();?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>

