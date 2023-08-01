<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Replace these with your database credentials
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the application data from the form
    $companyName = $_POST["companyName"];
    $applicationDate = $_POST["applicationDate"];
    $applicationStatus = $_POST["applicationStatus"];
    $applicationNotes = $_POST["applicationNotes"];

    // Insert the application data into the user_applications table
    $sql = "INSERT INTO user_applications (user_id, company_name, application_date, application_status, application_notes) VALUES ('$user_id', '$companyName', '$applicationDate', '$applicationStatus', '$applicationNotes')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Application added successfully, send a 200 OK response
        http_response_code(200);
    } else {
        // Application submission failed, send a 500 Internal Server Error response
        http_response_code(500);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>