<?php

// $servername = "localhost";
// $username = "mango7h1_nca_it";
// $password = "Nca@256#5";
// $dbname = "mango7h1_nca_it_noida";

$servername = "localhost";
$username = "u530067535_Ritesh";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";

// Establishing a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the enrollment_id from the request (e.g., from the AJAX call)
$enrollment_id = $_POST['enrollment_id']; // or $_GET['enrollment_id']

// Prepare the SQL query
$sql = "SELECT id, enrollment_id, name, department, cert_no, start_date, end_date 
        FROM certificate 
        WHERE enrollment_id = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the enrollment_id parameter to the SQL query
$stmt->bind_param("s", $enrollment_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if any data is returned
if ($result->num_rows > 0) {
    // Fetch the data as an associative array
    $row = $result->fetch_assoc();
    
    // Output the data as JSON
    echo json_encode($row);
} else {
    // If no data found, return an error message
    echo json_encode(["error" => "No certificate found for this Enrollment ID"]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
