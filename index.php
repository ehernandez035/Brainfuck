<?php
require_once "components.php";
require_once "datuBase.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brainfuck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>

<?php printNav(); ?>

<div class="container mt-3">
    <h1>Brainfuck</h1>

    <div class="card text-center" style="width: 75%">
        <div class="card-title">
            Login
        </div>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
            <span class="text-center">
            Don't have an account yet?<a href="registerForm.php">Click here</a>
        </span>
        </div>
    </div>
</div>
<?php printFooter() ?>


<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>
</html>
