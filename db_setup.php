<?php
$servername = "localhost";
$username = "ssingh59";
$password = "vQgkJaD5";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

?>


