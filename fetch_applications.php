<?php
// Replace these database credentials with your own
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch applications data from the database
$sql = "SELECT id, companyName, applicationDate, applicationStatus, applicationNotes FROM applications";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data from the database and store it in an array
    $applications = array();
    while ($row = $result->fetch_assoc()) {
        $applications[] = array(
            "id" => $row["id"],
            "companyName" => $row["companyName"],
            "applicationDate" => $row["applicationDate"],
            "applicationStatus" => $row["applicationStatus"],
            "applicationNotes" => $row["applicationNotes"]
        );
    }

    // Convert the array to JSON format and send it as the response
    header("Content-Type: application/json");
    echo json_encode($applications);
} else {
    echo "No applications found.";
}

$conn->close();
?>