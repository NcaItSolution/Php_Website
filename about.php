<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NCA IT SOLUTION</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Best IT training institute in Noida..." name="keywords">
    <meta content="NCA IT Solution is a premier IT training institute..." name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
            line-height: 1.7;
            background-color: #f8f9fa;
            margin: 0;
        }

        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('img/aboutbanner1.jpg') center/cover no-repeat;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-header h1 {
            color: #fff;
            font-size: 3rem;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin-top: 10px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            color: #ccc;
        }

        .section-title h6 {
            color: #0d6efd;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }

        .section-title h1 {
            font-size: 2.5rem;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .about-box {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        .about-features i {
            color: #0d6efd;
            margin-right: 10px;
        }

        .btn-primary, .btn-outline-primary {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #003f7f;
            transform: scale(1.05);
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
            transform: scale(1.05);
        }

        .certificates {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
            justify-content: center;
        }

        .certificates img {
            height: 90px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .certificates img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .section-title h1 {
                font-size: 2rem;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }

            .certificates {
                gap: 20px;
            }

            .certificates img {
                height: 70px;
            }
        }
    </style>
</head>

<body>

    <?php include("header.php"); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="text-center">
            <h1 class="animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb" class="animated slideInDown">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- About Section -->
    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="img/Software/MultipleTraining.gif" class="w-100 rounded-3 shadow-sm" alt="Multiple Training">
                    <img src="img/Software/MultipleTraining.gif" class="position-absolute top-0 start-0 border border-white rounded shadow-sm" style="width: 180px; height: 180px; transform: translate(-20px, -20px);" alt="Overlay">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-box">
                    <div class="section-title">
                        <h6>About Us</h6>
                        <h1>Master In-Demand Skills with Industry Experts</h1>
                    </div>
                    <p>Master the skills to pass your test on the first try with our expert-led course, featuring personalized feedback, comprehensive materials, practice exams, and interactive quizzes.</p>
                    <p>Enjoy flexible scheduling, guaranteed pass rate, and continuous updates. Get certified with our expert instruction, and boost your confidence with our success guarantee.</p>
                    <div class="row about-features">
                        <div class="col-sm-6"><i class="fa fa-check"></i>Comprehensive Support</div>
                        <div class="col-sm-6"><i class="fa fa-check"></i>Guaranteed Success</div>
                        <div class="col-sm-6"><i class="fa fa-check"></i>Affordable Fee</div>
                        <div class="col-sm-6"><i class="fa fa-check"></i>Best Trainers</div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a class="btn btn-primary px-4 py-2" href="#">Read More</a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-outline-primary d-flex align-items-center px-4 py-2" href="tel:+918287584509">
                                <i class="fa fa-phone-alt me-2"></i> +91-8287584509
                            </a>
                        </div>
                    </div>

                    <!-- Certificates -->
                    <div class="certificates">
                        <img src="img/iso.jpg" alt="ISO Certified">
                        <img src="img/IAF.jpg" alt="IAF Certification">
                        <img src="img/msmeservice.jpg" alt="MSME Registered">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
