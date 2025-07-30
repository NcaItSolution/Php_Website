<?php
// Database connection
include('db_config.php'); // Include your database configuration file

// Get the course data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

$course_id = $data['id'];
$course_heading = $data['course_heading'];
$course_rate = $data['course_rate'];
$about_course = $data['about_course'];
$course_duration = $data['course_duration'];
$course_photo = $data['course_photo']; // Assuming this is a file upload

// Check if course_id is valid
if (isset($course_id) && is_numeric($course_id)) {
    // Prepare the SQL statement to update the course details
    $query = "UPDATE coursedetails SET course_heading = ?, course_rate = ?, about_course = ?, course_duration = ?, course_photo = ? WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters to the statement
        $stmt->bind_param("sssssi", $course_heading, $course_rate, $about_course, $course_duration, $course_photo, $course_id);
        
        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Course updated successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to update course"]);
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
