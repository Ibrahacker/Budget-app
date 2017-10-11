<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename ="budgetapp2_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>