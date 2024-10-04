<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    // Unset the session variables
    unset($_SESSION["logged_in"]);
    unset($_SESSION["email"]);

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: index.php"); // Replace with your login page URL
    exit;
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php"); // Replace with your login page URL
    exit;
}
?>