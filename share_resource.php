<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the resource title and link from the POST request
    $resourceTitle = $_POST["resourceTitle"];
    $resourceLink = $_POST["resourceLink"];

    // Create a new connection to the database
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    // Check if the connection was successful
    if ($mysqli->connect_error) {
        // If not, print an error message and exit the script
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Create an SQL query to insert the resource title and link into the database
    $sql = "INSERT INTO resources (title, file_path) VALUES ('$resourceTitle', '$resourceLink')";

    // Execute the SQL query
    if ($mysqli->query($sql)) {
        // If the query was successful, print a success message
        echo "Resource submitted successfully!";
    } else {
        // If the query was unsuccessful, print an error message and exit the script
        die("Error executing the statement: " . $mysqli->error);
    }

    // Close the database connection
    $mysqli->close();
}
?>