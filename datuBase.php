<?php
require_once "config.php";
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($mysqli->connect_error) {
    echo 2;
    die();
}


function getTopPlayers()
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT username, points FROM users ORDER BY points DESC LIMIT 10")) {
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($username, $points);
            $users = array();
            while ($stmt->fetch()) {
                $users[] = array("username" => $username, "points" => $points);
            }
            return $users;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}

function getUsers()
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT * FROM users")) {
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($userid, $username, $email, $password, $points);
            $users = array();
            while ($stmt->fetch()) {
                $users[] = array("userid" => $userid, "username" => $username, "email" => $email, "password" => $password, "points" => $points);
            }
            return $users;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}

function isEmailValid($email){
    return (!preg_match("/[A-Z0-9a-z._%+\\-]+@[A-Za-z0-9.\\-]+\\.[A-Za-z]{2,64}/", $email));
}

function isUsernameTaken($username, $email){

}