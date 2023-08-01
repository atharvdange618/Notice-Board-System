<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noticeTitle = $_POST["noticeTitle"];
    $noticeContent = $_POST["noticeContent"];

    // Replace these values with your actual database credentials
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "INSERT INTO notices (title, content) VALUES ('$noticeTitle', '$noticeContent')";

    if ($mysqli->query($sql)) {
        echo "Notice submitted successfully!";
    } else {
        die("Error executing the statement: " . $mysqli->error);
    }

    $mysqli->close();
}
?>
