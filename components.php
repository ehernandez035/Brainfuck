<?php

function printFooter()
{
    ?>
    <footer class='page-footer font-small bg-primary text-light fixed-bottom'>
        <!-- Copyright -->
        <div class='footer-copyright text-center mt-3'>© 2018 Copyright:
            <a href='https://github.com/ehernandez035/' class='text-light'> All rights reserved.</a>
        </div>
        <!-- Copyright -->
        <div class='footer-copyright text-center mb-3'>Check our
            <a href='cookiePolicy.html' class='text-light'> Privacy Policy</a>
        </div>
    </footer>
    <?php
}

function printNav()
{
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Brainfuck</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="menu.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="achievements.php">Achievements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ranking.php">Rankings</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Levels
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="level1.php">Level 1</a>
                        <a class="dropdown-item" href="level2.php">Level 2</a>
                    </div>
                </li>
            </ul>
            <div class="float-right">
                <a href="logout.php">Logout <i class="material-icons" style="vertical-align: middle;">
                        exit_to_app
                    </i></a>
            </div>
        </div>
    </nav>
    <?php
}

function printHeader()
{
    ?>
    <meta charset="UTF-8">
    <title>Brainfuck</title>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
}