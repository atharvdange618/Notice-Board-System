<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values of the form elements
    $noticeTitle = $_POST["noticeTitle"];
    $noticeContent = $_POST["noticeContent"];

    // Replace these values with your actual database credentials
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    // Check if the connection to the database is successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Execute the query to insert the notice into the database
    $sql = "INSERT INTO notices (title, content) VALUES ('$noticeTitle', '$noticeContent')";

    // Check if the query was successful
    if ($mysqli->query($sql)) {
        echo "Notice submitted successfully!";
    } else {
        die("Error executing the statement: " . $mysqli->error);
    }

    // Close the connection to the database
    $mysqli->close();
}
?>