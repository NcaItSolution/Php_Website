
<?php
// Database connection old Database
// $username = "mango7h1_nca_it";
// $password = "Nca@256#5";
// $dbname = "mango7h1_nca_it_noida";

// Database connection new Databade
    $servername = "localhost";
    $username = "u530067535_Ritesh";
    $password = "#Ritesh@123";
    $dbname = "u530067535_Ritesh";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, coursename, course_heading, about_course, course_rate, course_photo, course_duration  FROM coursedetails"; 
//$sql = "SELECT id, coursename, course_heading, about_course, course_rate, course_photo, course_duration  FROM coursedetails";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NCA IT SOLUTION</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

     <!--Favicon -->
    <link href="img/favicon.ico" rel="icon">

     <!--Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

     <!--Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!--Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

     <!--Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

     <!--Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .courses-item img {
            border-bottom: 3px solid #007bff; 
        }
        .courses-item .btn-primary {
            border-radius: 50px; 
            font-weight: bold;  
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
            transition: all 0.3s ease;
        }
        .courses-item .btn-primary:hover {
            background-color: #0056b3;
            color: #fff;
            transform: scale(1.1);  
        }
    </style>
</head>

<body>
<?php include("header.php"); ?>
   
   <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s" style="height: 650px; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/Coursesbanner1.jpg') center center no-repeat; background-size: cover;">
        <div class="container h-100 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1 class="display-4 text-white animated slideInDown mb-4">Courses</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> 
    
     <!-- Courses Start -->
    <div class="container-xl py-9">
        <div class="container">
            <div class="text-center mx-auto mb-9 wow fadeInUp" data-wow-delay="0.1s" style="max-width:400px;">
            <h4 class="text-primary text-uppercase mb-2"> Our Trending Courses</h4>
                <!--<h3 class="display-7 mb-4">Our Courses</h3>-->
            </div>
            <div class="row g-4 justify-content-center">
            <?php
                // Check if there are results
            if ($result->num_rows > 0) {
                // Loop through each course and display it
                while($row = $result->fetch_assoc()) {
            ?>
    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
        <div class="text-center p-4 pt-0">
            <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">INR.
                <?php echo htmlspecialchars($row['course_rate']); ?></div>
            <h5 class="mb-3"><?php echo htmlspecialchars($row['course_heading']); ?></h5>
            <!--<p><?php echo htmlspecialchars($row['about_course']); ?></p>-->
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>Beginner</li>
                <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>
                <?php echo htmlspecialchars($row['course_duration']); ?></li>
            </ol>
        </div>
        <div class="position-relative mt-auto">
            <img class="img-fluid w-100" src="admin/<?php echo htmlspecialchars($row['course_photo']); ?>" alt="">
            <div class="text-center my-3">
           <a class="btn btn-primary px-4 py-2" href="coursesdetails.php?coursename=<?php echo $row['coursename']; ?>">View Syllabus</a>
            </div>
        </div>
    </div>
</div>
           <?php
                }
            } else {
                echo "No courses available.";
            }
           // Close connection
            $conn->close();
            ?>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <?php include("footer.php"); ?>

     Back to Top 
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

     JavaScript Libraries 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

     Template Javascript 
    <script src="js/main.js"></script>
</body>
</html>
