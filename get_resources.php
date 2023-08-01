<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "notices_resources";
$dbport = "3307";

$mysqli = new mysqli($servername, $username, $password, $dbname, $dbport);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM resources ORDER BY title DESC";
$result = $mysqli->query($sql);

$resources = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($resources);
?>