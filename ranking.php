<?php
require_once "components.php";
require_once "datuBase.php";
$topUsers = getPlayersByScore();
$currentPos = 1;
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

    <h1 class="mb-3">Brainfuck</h1>
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>Position</th>
                <th>Username</th>
                <th>Points</th>
            </tr>
            <?php

            for ($i = 0; $i < max($currentPos * 10, count($topUsers) - $currentPos * 10); $i++) {
                $topUser = $topUsers[$i];
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $topUser['username'] ?></td>
                    <td><?= $topUser['points'] ?></td>
                </tr>
                <?php

            }
            ?>
        </table>
        <div class="text-center">
            <button class="btn btn-secondary invisible" id="prevButton-<?= $currentPos ?>" type="submit"><i
                        class="material-icons">
                    keyboard_arrow_left
                </i></button>
            <button class="btn btn-secondary" id="nextButton" type="button"><i
                        class="material-icons">
                    keyboard_arrow_right
                </i></button>
        </div>
    </div>

</div>

<?php printFooter(); ?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>
<script>
    var currentPos = 0;
    $('#nextButton').on('click', function () {
        currentPos++;
        $.ajax({
            dataType:"json",
            url: "getUsersByRankingPos.php",
            type: "get",
            data: {
                current_pos: currentPos
            },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr) {
                alert("An error has happened.");
            }
        });
    });

    function hideButton(buttonId) {
        document.getElementById(buttonId).style.visibility = 'hidden';
    }
</script>

</body>

