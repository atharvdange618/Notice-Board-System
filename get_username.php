<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
} else {
    echo "Guest"; // Default value if no user is logged in
}
?>
