<?php
require_once "config.php";
require_once "datuBase.php";

$pos = $_GET["current_pos"];
$pos=$pos*10;

if ($stmt = $mysqli->prepare("SELECT username, (SUM(pointsL1)+ SUM(pointsL2)) AS points FROM users GROUP BY userid ORDER BY points DESC, username ASC LIMIT 10 OFFSET ?")) {
    $stmt->bind_param("i", $pos);
    if ($stmt->execute()) {
        $stmt->store_result();
        $stmt->bind_result($username, $points);
        $users = array();
        while ($stmt->fetch()) {
            $users[] = array("username" => $username, "points" => $points);
        }
        echo json_encode($users);
    } else {
        http_response_code(500);
        echo $mysqli->error;
        echo $stmt->error;
        die();
    }
}
