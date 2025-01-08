<?php
$server = "localhost"; // Replace with your database server
$username = "root";    // Replace with your database username
$password = "";        // Replace with your database password
$database = "petbondhu"; // Replace with your database name

// Create a connection
$connect = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
