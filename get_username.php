<?php
session_start(); // Start the session

// Check if the user is logged in by checking the session variable
if (isset($_SESSION['username'])) {
    // If the user is logged in, echo their username
    echo $_SESSION['username'];
} else {
    // If the user is not logged in, echo "Guest"
    echo "Guest"; // Default value if no user is logged in
}
?>