<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
// $servername = "localhost";
// $username = "mango7h1_nca_it";
// $password = "Nca@256#5";
// $dbname = "mango7h1_nca_it_noida";


$servername = "localhost";
$username = "u530067535_Ritesh";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";

// Create the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch courses
$sql = "SELECT id, course_heading, about_course, course_rate, course_photo, Course_duration FROM Course_Details";
$result = $conn->query($sql);

// Check if the query returned results
if ($result === false) {
    die("SQL error: " . $conn->error);
}

// Initialize an array to store courses
$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

// Return the courses in JSON format
header('Content-Type: application/json');
echo json_encode([
    "success" => true,
    "courses" => $courses
]);

// Close the database connection
$conn->close();
?>
