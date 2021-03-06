<?php
require_once "config.php";
session_start();
$user = $_POST["username"];
$pass = $_POST["password"];

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($mysqli->connect_error) {
    echo "2"; // error connecting to mysql
    die();
}

if ($stmt = $mysqli->prepare("SELECT password, userid FROM users WHERE username=?")) {
    $stmt->bind_param("s", $user);
    $result = $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows != 0) {
        $stmt->bind_result($pass_encrypt, $uid);
        $stmt->fetch();
        if (password_verify($pass, $pass_encrypt)) {
            $_SESSION["userid"]=$uid;
            header("Location:menu.php");
            die();
        } else {
            echo "0";
            die();
        }
    } else {
        echo "-1";
        die();
    }

}