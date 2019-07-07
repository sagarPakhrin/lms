<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "password";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
