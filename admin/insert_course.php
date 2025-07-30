<?php
// Database connection
// $servername = "localhost";
// $username = "mango7h1_nca_it";
// $password = "Nca@256#5";
// $dbname = "mango7h1_nca_it_noida";

$servername = "localhost";
$username = "u530067535_Ritesh";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set
    if (isset($_POST['course_heading'])) {
        $course_heading = $_POST['course_heading'];
        $course_rate = $_POST['course_rate'];
        $about_course = $_POST['about_course'];
        $course_duration = $_POST['course_duration'];

        // Handle file upload (course photo)
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["course_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        if (getimagesize($_FILES["course_photo"]["tmp_name"]) === false) {
            $response['message'] = "File is not an image.";
        } elseif ($_FILES["course_photo"]["size"] > 500000) {
            $response['message'] = "Sorry, your file is too large.";
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $response['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Move the uploaded file
            if (move_uploaded_file($_FILES["course_photo"]["tmp_name"], $target_file)) {
                // Prepare SQL query to insert data
                $sql = "INSERT INTO Course_Details (course_heading, about_course, course_rate, course_photo, course_duration)
                        VALUES (?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiss", $course_heading, $about_course, $course_rate, $target_file, $course_duration);

                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['course_heading'] = $course_heading;
                    $response['course_rate'] = $course_rate;
                    $response['about_course'] = $about_course;
                    $response['course_duration'] = $course_duration;
                    $response['course_photo_url'] = $target_file; // Return the URL of the uploaded image
                } else {
                    $response['message'] = "Error inserting course data.";
                }
            } else {
                $response['message'] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $response['message'] = "All fields are required.";
    }
}

// Return response as JSON
echo json_encode($response);

// Close the connection
$conn->close();
?>
