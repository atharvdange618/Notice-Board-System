<?php
// Set error_reporting to display all errors
error_reporting(E_ALL);
// Set display_errors to 1 to display errors on the page
ini_set('display_errors', 1);

// Start the session
session_start();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Set the server connection parameters
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "notices_resources";
    $dbport = "3307";

    // Create a new connection to the database
    $mysqli = new mysqli($servername, $username, $password, $dbname, $dbport);

    // Check the connection
    if ($mysqli->connect_error) {
        // Database connection failed, exit the script
        die("Database connection failed: " . $mysqli->connect_error);
    }

    // Get the application data from the form
    $username = $_POST["username"]; // Use 'username' field from the form
    $companyName = $_POST["companyName"];
    $applicationDate = $_POST["applicationDate"];
    $applicationStatus = $_POST["applicationStatus"];
    $applicationNotes = $_POST["applicationNotes"];

    // Insert the application data into the user_applications table
    $sql = "INSERT INTO user_applications (username, company_name, application_date, application_status, application_notes) VALUES ('$username', '$companyName', '$applicationDate', '$applicationStatus', '$applicationNotes')";

    // Execute the query
    if ($mysqli->query($sql) === TRUE) {
        // Application added successfully, send a 200 OK response
        http_response_code(200);
    } else {
        // Application submission failed, send a 500 Internal Server Error response
        http_response_code(500);
    }

    // Close the database connection
    $mysqli->close();
}