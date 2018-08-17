<?php
require_once "components.php";
require_once "datuBase.php";
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    header("Location: index.php");
    die();
}
$points = getPoints($userid);
?>
<!doctype html>
<html>
<head>
    <?php printHeader(); ?>
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
        for ($i = 0; $i < count($xml->ACHIEVEMENT); $i += 3) {
            ?>
            <div class="row ml-3 mr-3">
                <?php
                for ($j = 0; $j < min(3, count($xml->ACHIEVEMENT) - $i); $j++) {
                    $achievement = $xml->ACHIEVEMENT[$i + $j];
                    $unlocked = $achievement->UNLOCK < $points;
                    ?>
                    <div class="col-4">
                        <div class="card mb-3" style="height: calc(100% - 1rem);"
                             id="achievement-<?= $achievement->TITLE ?>">
                            <div class="card-header">
                                <h5 class="card-title"><?= $unlocked ? $achievement->TITLE : "Locked" ?></h5>
                            </div>
                            <img class="card-img-top"
                                 src="img/achievements/<?= $unlocked ? $achievement->ID : "Locked" ?>.png"
                                 alt="achievement image">
                            <div class="card-body">
                                <p class="card-text"><?= $unlocked ? $achievement->DESCRIPTION : "???" ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item font-weight-bold"><?= $unlocked ? $achievement->UNLOCK : "???" ?>
                                    pts.
                                </li>
                            </ul>
                            <div class="card-footer">
                                <small class="text-muted">Unlocked:</small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
