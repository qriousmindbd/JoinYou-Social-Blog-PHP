<?php
session_start();

$_SESSION = array(); // Load all session variables

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: /JoinYou/login.php");
exit();
?>