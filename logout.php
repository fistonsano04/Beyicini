<?php
session_start();  // Start the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want
header("Location: login.php");
exit();
?>
