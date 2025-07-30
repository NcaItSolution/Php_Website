<?php
// Database configuration
// $servername = "localhost";
// $username = "mango7h1_nca_it";
// $password = "Nca@256#5";
// $dbname = "mango7h1_nca_it_noida";

$servername = "localhost";
$username = "u530067535_Ritesh";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
