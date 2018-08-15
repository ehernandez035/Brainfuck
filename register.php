<?php
require_once "config.php";
require_once "datuBase.php";

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

if (!preg_match("/[A-Z0-9a-z._%+\\-]+@[A-Za-z0-9.\\-]+\\.[A-Za-z]{2,64}/", $email)) {
    echo "1";
    die();
}
if (isUsernameTaken($username, $email)){
    echo "-2";
    die();
}

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($mysqli->connect_error) {
    echo "2"; // error connecting to mysql
    die();
}

if ($stmt = $mysqli->prepare("INSERT INTO users VALUES username=?")) {
    $stmt->bind_param("s", $username);
    $result = $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows != 0) {
        $stmt->bind_result($pass_encrypt, $uid);
        $stmt->fetch();
        if (password_verify($pass, $pass_encrypt)) {
            echo "1";
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

