<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project_joinyou";

// Create a connection
$con = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($con->connect_error) {
    die("Server Error!");
}
?>