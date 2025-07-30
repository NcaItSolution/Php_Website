<?php
// Database connection old Database
// $username = "mango7h1_nca_it";
//$password = "Nca@256#5";
//$dbname = "mango7h1_nca_it_noida";

// Database connection new  Database Connection
$servername = "localhost";
//$username = "Dheeraj_ncait";
//$username = "Ritesh_ncait";
$username = "u530067535_Ritesh";
//$password = "Dheeraj@123";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the course coursename from URL
$coursename = isset($_GET['coursename']) ? $_GET['coursename'] : 0;

// Fetch course details by coursename
$sql = "SELECT course_heading, about_course, course_rate, course_photo, course_duration FROM coursedetails WHERE coursename = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $coursename);
$stmt->execute();
$result = $stmt->get_result();
//$course = $result->fetch_assoc();

// Check if the course exists
if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
    
} else {
    header("HTTP/1.0 404 Not Found");
    include('404.php'); // Create a custom 404 page
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['course_heading']); ?> - Course Details</title>
    <!-- Add your CSS and other resources -->
     <style>
        /* General Styles */
        .body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }

        .card {
            border: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .card-header {
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-body img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* Typography */
        .h1, p {
            margin: 0 0 10px;
        }

        .p {
            line-height: 1.8;
            font-size: 16px;
        }

        .strong {
            font-weight: bold;
            color: #007bff;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="h3"><?php echo htmlspecialchars($course['course_heading']); ?></h1>
            </div>
            <div class="card-body">
                <!-- Course Image -->
                <img src="admin/<?php echo htmlspecialchars($course['course_photo']); ?>" alt="Course Image" class="img-fluid mb-4 rounded shadow">
                
                <p><strong>Course Rate:</strong> INR <?php echo htmlspecialchars($course['course_rate']); ?></p>
                <p><strong>Duration:</strong> <?php echo htmlspecialchars($course['course_duration']); ?></p>
                <p><strong>About the Course:</strong></p>
                <p><?php echo nl2br(htmlspecialchars($course['about_course'])); ?></p>

                <!-- Add a Button -->
                <a href="enroll.php?coursename=<?php echo $course; ?>" class="btn btn-primary">Enroll Now</a>
            </div>
            <div class="card-footer text-muted">
                <p>Last updated on: <?php echo date("d M Y"); ?></p>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>






