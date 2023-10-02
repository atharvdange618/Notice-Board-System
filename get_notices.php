<?php
// Set the server name, username, password, and database name
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "notices_resources";
$dbport = "3307";

// Create a new connection to the server
$mysqli = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create a SQL query to select all data from the notices table and order it by title in descending order
$sql = "SELECT * FROM notices ORDER BY title DESC";
$result = $mysqli->query($sql);

// Create an array to store the data
$notices = array();

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Loop through the results and add them to the array
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }
}

// Close the connection
$mysqli->close();

// Set the content type to JSON and echo the array
header('Content-Type: application/json');
echo json_encode($notices);
?>