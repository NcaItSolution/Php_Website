<?php
// Database connection
include('db_config.php'); // Include your database configuration file

// Get the course ID from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$course_id = $data['id'];

// Check if course_id is valid
if (isset($course_id) && is_numeric($course_id)) {
    // Prepare the SQL statement to fetch the course details
    $query = "SELECT * FROM Course_Details WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the course ID parameter to the statement
        $stmt->bind_param("i", $course_id);
        
        // Execute the query
        $stmt->execute();
        
        // Store the result
        $result = $stmt->get_result();
        
        // Check if the course exists
        if ($result->num_rows > 0) {
            // Fetch the course data as an associative array
            $course = $result->fetch_assoc();
            echo json_encode($course); // Return the course data
        } else {
            echo json_encode(["success" => false, "message" => "Course not found"]);
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Failed to prepare the query"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid course ID"]);
}

// Close the database connection
$conn->close();
?>
