<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Create a database connection
    $servername = "127.0.0.1";
    $dbUsername = "root";
    $password = "";
    $dbname = "notices_resources";
    $dbport = "3307";

    $mysqli = new mysqli($servername, $dbUsername, $password, $dbname, $dbport);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch applications from the database
    $sql = "SELECT * FROM user_applications WHERE username = '$username' ORDER BY company_name";
    $result = $mysqli->query($sql);

    if ($result) {
        $applications = array();
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }

        // Return applications data as JSON response
        header('Content-Type: application/json');
        echo json_encode($applications);
    } else {
        error_log("Database error: " . $mysqli->error); // Log the error message
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('error' => 'Database error'));
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $mysqli->close();
} else {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(array('error' => 'User not logged in'));
}
?>
