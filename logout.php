<?php
// Start the session to access session data
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // If the user is logged in, destroy the session to log them out
    session_destroy();

    // Redirect the user to the login page or any other appropriate page after logout
    header("Location: login.html"); // Replace "login.html" with the actual login page URL
    exit();
} else {
    // If the user is not logged in, simply redirect them to the login page
    header("Location: login.html"); // Replace "login.html" with the actual login page URL
    exit();
}
?>