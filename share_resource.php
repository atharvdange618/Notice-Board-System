<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resourceTitle = $_POST["resourceTitle"];
    $resourceLink = $_POST["resourceLink"];

    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO resources (title, file_path) VALUES ('$resourceTitle', '$resourceLink')";

    // Execute the SQL query
    if ($mysqli->query($sql)) {
        echo "Resource submitted successfully!";
    } else {
        die("Error executing the statement: " . $mysqli->error);
    }

    // Close the database connection
    $mysqli->close();
}
?>