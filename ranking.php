<?php
require_once "components.php";
require_once "datuBase.php";
$topUsers = getPlayersByScore();
$currentPos = 1;
?>
<!doctype html>
<html>
<head>
    <?php printHeader(); ?>
</head>
<body style="margin-bottom: 100px">

<?php printNav(); ?>
<div class="container mt-3">

    <h1 class="mb-3">Brainfuck</h1>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Position</th>
                <th>Username</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody id="achievementTable">
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
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-secondary" disabled id="prevButton" type="button">
                <i class="material-icons">
                    keyboard_arrow_left
                </i>
            </button>
            <button class="btn btn-secondary" id="nextButton" type="button">
                <i class="material-icons">
                    keyboard_arrow_right
                </i>
            </button>
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
            dataType: "json",
            url: "getUsersByRankingPos.php",
            type: "get",
            data: {
                current_pos: currentPos
            },
            success: function (response) {
                $('#achievementTable').empty();
                let i = 1;
                for (let e of response.users) {
                    console.log(e);
                    let content = `<tr><td>${currentPos*10+i}</td><td>${e.username}</td><td>${e.points}</td></tr>`;
                    $('#achievementTable').append(content);
                    i++;
                }
                if (response.last) {
                    $("#nextButton").attr("disabled", "");
                }else{
                    $("#nextButton").removeAttr("disabled");
                }
                if (response.first) {
                    $("#prevButton").attr("disabled", "");
                }else{
                    $("#prevButton").removeAttr("disabled");
                }
            },
            error: function (xhr) {
                alert("An error has happened.");
            }
        });
    });

    $('#prevButton').on('click', function () {
        currentPos--;
        $.ajax({
            dataType: "json",
            url: "getUsersByRankingPos.php",
            type: "get",
            data: {
                current_pos: currentPos
            },
            success: function (response) {
                $('#achievementTable').empty();
                let i = 1;
                for (let e of response.users) {
                    console.log(e);
                    let content = `<tr><td>${currentPos*10+i}</td><td>${e.username}</td><td>${e.points}</td></tr>`;
                    $('#achievementTable').append(content);
                    i++;
                }
                if (response.first) {
                    $("#prevButton").attr("disabled", "");
                }else{
                    $("#prevButton").removeAttr("disabled");
                }
                if (response.last) {
                    $("#nextButton").attr("disabled", "");
                }else{
                    $("#nextButton").removeAttr("disabled");
                }
            },
            error: function (xhr) {
                alert("An error has happened.");
            }
        });
    });

</script>

</body>

