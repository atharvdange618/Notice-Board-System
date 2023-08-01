<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    // Check the connection
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the user input from the signup form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    $input_email = $_POST["email"];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    // Query to insert the new user into the database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$input_username', '$hashed_password', '$input_email')";

    // Execute the query
    if (mysqli_query($mysqli, $sql)) {
        // Signup successful, send a 200 OK response
        http_response_code(200);
    } else {
        // Signup failed, send a 500 Internal Server Error response
        http_response_code(500);
    }

    // Close the database connection
    mysqli_close($mysqli);
}
?>