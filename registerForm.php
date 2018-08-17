<?php
require_once "components.php";
?>
<!doctype html>
<html>
<head>
    <?php printHeader(); ?>
</head>
<body style="margin-bottom: 100px">

<?php printNav();?>
<div class="container mt-3">

    <h1>Brainfuck</h1>


    <div class="card text-center mb-3" style="margin: auto; width: 75%">
        <h5 class="card-header font-weight-bold">Create an account</h5>
        <div class="card-body">
            <form method="post" action="register.php">
                <div class="form-group">
                    <label for="username" class="font-weight-bold" >Username</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                    <small id="usernameHelp" class="form-text text-muted">Choose a username that it is not already taken.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="font-weight-bold">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            <button class='btn btn-primary' type="submit">Submit!  <i class="material-icons" style="vertical-align: middle;">
                    send
                </i></button>
            </form>
        </div>
    </div>

</div>

<?php printFooter();?>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/bootstrap.js"></script>

</body>
