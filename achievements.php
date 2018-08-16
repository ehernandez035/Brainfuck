<?php
require_once "components.php";
require_once "datuBase.php";
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
}else{
    header("Location: index.php");
    die();
}
$points = getPoints($userid);
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
        <div class="card-header mb-3">
            <h5 class="card-title">Achievements</h5>
        </div>
        <?php
        $xml = simplexml_load_file("achievements.xml", "SimpleXMLElement", LIBXML_NOCDATA);
        for ($i = 0;
             $i < count($xml->ACHIEVEMENT);
             $i += 3) {
            if ($xml->ACHIEVEMENT->UNLOCK >= $points) {
                ?>
                <div class="row ml-3 mr-3">

                    <?php
                    for ($j = 0; $j < min(3, count($xml->ACHIEVEMENT) - $i); $j++) {
                        $achievement = $xml->ACHIEVEMENT[$i + $j];
                        ?>
                        <div class="col-4">
                            <div class="card mb-3" style="height: calc(100% - 1rem);"
                                 id="achievement-<?php echo $achievement->TITLE ?>">
                                <div class="card-header">
                                    <h5 class="card-title"><?php echo $achievement->TITLE ?></h5>
                                </div>
                                <img class="card-img-top" src="img/Bomb.png" alt="bomba image">
                                <div class="card-body">
                                    <p class="card-text"><?php echo $achievement->DESCRIPTION ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item font-weight-bold"><?php echo $achievement->UNLOCK ?>pts.
                                    </li>
                                </ul>
                                <div class="card-footer">
                                    <small class="text-muted">Unlocked:</small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="col-4">
                    <div class="card mb-3" style="height: calc(100% - 1rem);"
                         id="achievement-<?php echo $achievement->TITLE ?>">
                        <div class="card-header">
                            <h5 class="card-title">Locked</h5>
                        </div>
                        <img class="card-img-top" src="img/Bomb.png" alt="bomba image">
                        <div class="card-body">
                            <p class="card-text">???</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold">??? pts.
                            </li>
                        </ul>
                        <div class="card-footer">
                            <small class="text-muted">Unlocked:</small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<?php printFooter(); ?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>
<script>

</script>

</body>
