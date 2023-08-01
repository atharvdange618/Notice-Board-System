<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Create a connection to the database
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'notices_resources', '3307');

    // Check the connection
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the user input from the login form
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Query to fetch the user from the database
    $sql = "SELECT * FROM users WHERE username = '$input_username'";
    $result = mysqli_query($mysqli, $sql);

    // Check if the user exists
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        // Verify the password
        if (password_verify($input_password, $stored_password)) {
            // Password is correct, user is logged in
            session_start();
            $_SESSION["username"] = $input_username;
            header("Location: dashboard.html"); // Redirect to the dashboard page
            exit();
        } else {
            // Password is incorrect
            header("Location: login.html?error=invalid_credentials"); // Redirect back to the login page with an error message
            exit();
        }
    } else {
        // User does not exist
        header("Location: login.html?error=invalid_credentials"); // Redirect back to the login page with an error message
        exit();
    }

    // Close the database connection
    mysqli_close($mysqli);
}
?>