<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="img/favicon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
 <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
  
  @media (max-width: 576px) {
      
      .fadeInUp1{
          width:340px;
      }
  }
  
  </style>
</head>

<body>
<?php
   include("header.php");
?>
 

    
    
    <title>Dynamic Certificate Generator</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
    <center>
 <?PHP include("menu.php"); ?>
<?php include("mainmenu.php");  ?>
    
 <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s" style="height: 500px; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/certificationbanner1.jpg') center center no-repeat; background-size: cover;">
       <div class="container h-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Internship Certificate</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="index.php">Go to Page Home</a></li>
                </ol>
            </nav>
        </div>
       </div>
    </div> 
    
    <h1  style="margin-top: 150px; ">Generate Your Internship Certificate</h1>

    <!-- Input Field for Enrollment ID -->
    <label for="enrollment_id">Enter Enrollment ID:</label>
    <input type="text" id="enrollment_id" placeholder="e.g., NIS20251100">
    <button style="margin-top: 25px; background-color:blue; color:white;" onclick="fetchCertificateDetails()">Fetch Details</button>
 
    <!-- Preview of the Certificate -->
 <div id="certificate" style="border: 1px solid #000; padding: 20px; margin-top: 20px; width: 60%;">
    <h2>Certificate of Internship</h2>
    <p>This certificate is proudly presented to:</p>
    <h3 id="student_name">[Name]</h3>
    <p>For completing their internship in <strong id="department">[Department]</strong>.</p>
    <p><strong>Enrollment No:</strong> <span id="enrollment_no">[Enrollment No]</span></p>
    <p><strong>Certificate No:</strong> <span id="cert_no">[Certificate No]</span></p>
    <p><strong>From:</strong> <span id="start_date">[Start Date]</span> to <span id="end_date">[End Date]</span></p>
    <!--<p><strong>Founder & CEO:</strong>Ritesh</p>-->
</div>


    <!-- Button to Generate PDF -->
 <form action="generate_certificate.php" method="POST">
    <input type="hidden" id="name_input" name="name">
    <input type="hidden" id="enrollment_input" name="enrollment_no">
    <input type="hidden" id="cert_input" name="cert_no">
    <input type="hidden" id="department_input" name="department"> <!-- Department फ़ील्ड -->
    <input type="hidden" id="start_date_input" name="start_date"> <!-- Start Date फ़ील्ड -->
    <input type="hidden" id="end_date_input" name="end_date"> <!-- End Date फ़ील्ड -->
    <button style="margin-top: 25px; background-color:blue; color:white;" type="submit">Download Certificate as PDF</button>
</form>

</center>
    <script>
       function fetchCertificateDetails() {
    const enrollmentID = document.getElementById('enrollment_id').value;

    $.ajax({
        url: 'fetch_certificate.php', // PHP script that will fetch data from the database
        type: 'POST',
        data: { enrollment_id: enrollmentID },
        success: function(response) {
            const data = JSON.parse(response);

            if (data.error) {
                alert(data.error);
            } else {
                // Update certificate preview
                document.getElementById('student_name').textContent = data.name;
                document.getElementById('enrollment_no').textContent = data.enrollment_id;
                document.getElementById('cert_no').textContent = data.cert_no;
                document.getElementById('department').textContent = data.department;
                document.getElementById('start_date').textContent = data.start_date;
                document.getElementById('end_date').textContent = data.end_date;

                // Update hidden fields for the form submission
                document.getElementById('name_input').value = data.name;
                document.getElementById('enrollment_input').value = data.enrollment_id;
                document.getElementById('cert_input').value = data.cert_no;
                document.getElementById('department_input').value = data.department;
                document.getElementById('start_date_input').value = data.start_date;
                document.getElementById('end_date_input').value = data.end_date;
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}

    </script>
    <footer>
  <!-- footer -->
 <?php include("footer.php") ?>
  <!-- //footer -->
</footer>
</body>
</html>
