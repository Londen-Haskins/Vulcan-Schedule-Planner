<?php

$host = "den1.mysql4.gear.host";
$username = "vulcan";
$password = "masterchen$";
$dataUse = "vulcan";

$mysqli = new mysqli($host, $username, $password, $dataUse);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo "<br>";




?>