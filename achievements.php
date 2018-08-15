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
        <h5>Achievements</h5>
        <?php
        $xml = simplexml_load_file("achievements.xml", "SimpleXMLElement", LIBXML_NOCDATA);

        foreach ($xml->ACHIEVEMENT as $achievement) {
            ?>
            <div class="card mb-3" style="width: 18rem;" id="achievement-<?php echo $achievement->TITLE ?>">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $achievement->TITLE ?></h5>
                </div>
                <img class="card-img-top" src="img/Bomb.png" alt="bomba image">
                <div class="card-body">
                    <p class="card-text"><?php echo $achievement->DESCRIPTION ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $achievement->UNLOCK ?></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<?php printFooter(); ?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>
<script>

</script>

</body>
