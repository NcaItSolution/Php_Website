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

// Get form data
$enrollment_id = $_POST['enrollment_id'];
$name = $_POST['name'];
$department = $_POST['department'];
$cert_no = $_POST['cert_no'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Prepare the SQL query
$sql = "INSERT INTO certificate (enrollment_id, name, department, cert_no, start_date, end_date) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ssssss", $enrollment_id, $name, $department, $cert_no, $start_date, $end_date);

// Execute the statement
if ($stmt->execute()) {
    echo "Certificate details added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
