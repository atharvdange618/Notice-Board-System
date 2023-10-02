<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the application name, new name, new date, new status and new notes from the POST request
    $applicationName = $_POST['application_name'];
    $newName = $_POST['new_name'];
    $newDate = $_POST['new_date'];
    $newStatus = $_POST['new_status'];
    $newNotes = $_POST['new_notes'];

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

    // Update application data in the database
    $sql = "UPDATE user_applications SET 
    company_name = '$newName', 
    application_date = '$newDate', 
    application_status = '$newStatus', 
    application_notes = '$newNotes' 
WHERE company_name = '$applicationName'";

    if ($mysqli->query($sql) === TRUE) {
        echo "Application updated successfully";
    } else {
        echo "Error updating application: " . $mysqli->error;
    }

    $mysqli->close();
}
?>