<?php
// Database connection
include('db_config.php'); // Include your database configuration file

// Get the course ID from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$course_id = $data['id'];

// Check if course_id is valid
if (isset($course_id) && is_numeric($course_id)) {
    // Prepare the SQL statement to delete the course from the Course_Details table
    $query = "DELETE FROM Course_Details WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the course ID parameter to the statement
        $stmt->bind_param("i", $course_id);
        
        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Course deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete course"]);
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
