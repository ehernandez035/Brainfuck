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

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($mysqli->connect_error) {
    echo "2"; // error connecting to mysql
    die();
}

if ($stmt = $mysqli->prepare("INSERT INTO users(username, email, password) VALUES (?,?,?)")) {
    $stmt->bind_param("sss", $username, $email, password_hash($password, PASSWORD_BCRYPT));
    if(!$stmt->execute()){
        echo "-2";//username or email already used
        die();
    }
} else {
    echo "-1";
    die();

}
header("Location: index.php?success=1");
die();
