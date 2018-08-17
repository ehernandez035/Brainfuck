<?php
require_once "config.php";
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if ($mysqli->connect_error) {
    echo 2;
    die();
}


function getPlayersByScore()
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT username, (SUM(pointsL1)+ SUM(pointsL2)) AS points FROM users GROUP BY userid ORDER BY points DESC")) {
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($username, $points);
            $users = array();
            while ($stmt->fetch()) {
                $users[] = array("username" => $username, "points" => $points,);
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
            $stmt->bind_result($userid, $username, $email, $password, $pointsL1, $pointsL2 );
            $users = array();
            while ($stmt->fetch()) {
                $users[] = array("userid" => $userid, "username" => $username, "email" => $email, "password" => $password, "pointsL1" => $pointsL1, "pointsL2" => $pointsL2);
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

function getPoints($userid)
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT (SUM(pointsL1)+ SUM(pointsL2)) AS points FROM users WHERE userid=?")) {
        $stmt->bind_param("i", $userid);
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($points);
            $stmt->fetch();
            return $points;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}
function updatePointsL1($userid, $points)
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("UPDATE users as p1 SET p1.pointsL1=? WHERE users.userid=?")) {
        if ($stmt->execute()) {
            $stmt->bind_param("ii", $points, $userid);
            return;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}
function updatePointsL2($userid, $points)
{
    global $mysqli;
    if ($stmt = $mysqli->prepare("UPDATE users as p1 SET p1.pointsL1=? WHERE users.userid=?")) {
        if ($stmt->execute()) {
            $stmt->bind_param("ii", $points, $userid);
            return;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}

function lastUserByPoints(){
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT username, (SUM(pointsL1)+ SUM(pointsL2)) AS points FROM users GROUP BY userid ORDER BY points ASC, username DESC LIMIT 1")) {
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($username, $points);
            $stmt->fetch();
            return $username;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}

function firstUserByPoints(){
    global $mysqli;
    if ($stmt = $mysqli->prepare("SELECT username, (SUM(pointsL1)+ SUM(pointsL2)) AS points FROM users GROUP BY userid ORDER BY points DESC, username ASC LIMIT 1")) {
        if ($stmt->execute()) {
            $stmt->store_result();
            $stmt->bind_result($username, $points);
            $stmt->fetch();
            return $username;
        } else {
            http_response_code(500);
            echo $mysqli->error;
            return null;
        }
    }
}