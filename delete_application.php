<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicationName = $_POST['application_name'];

    // Create a database connection
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "notices_resources";
    $dbport = "3307";
    
    $mysqli = new mysqli($servername, $username, $password, $dbname, $dbport);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Delete application from the database
    $sql = "DELETE FROM user_applications WHERE company_name = '$applicationName'";
    if ($mysqli->query($sql) === TRUE) {
        echo "Application deleted successfully";
    } else {
        echo "Error deleting application: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
