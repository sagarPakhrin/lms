<?php
session_start();
$servername = "localhost";
$username = "";

// Create connection
$conn = new mysqli('localhost','root','password','ipproject');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
