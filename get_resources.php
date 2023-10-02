<?php
// Set the server name, username, password, and database name
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "notices_resources";
$dbport = "3307";

// Create a new connection to the MySQL database
$mysqli = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create a SQL query to select all resources from the resources table and order them by title in descending order
$sql = "SELECT * FROM resources ORDER BY title DESC";
$result = $mysqli->query($sql);

// Create an array to store the resources
$resources = array();

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Loop through the results and add each resource to the array
    while ($row = $result->fetch_assoc()) {
        $resources[] = $row;
    }
}

// Close the connection to the MySQL database
$mysqli->close();

// Set the content type of the response to JSON
header('Content-Type: application/json');
// Encode the resources array as a JSON string and send it as the response
echo json_encode($resources);
?>