<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
  /*
    // Database connection old DB
    $servername = "localhost";
    $username = "mango7h1_nca_it";
    $dbpassword = "Nca@256#5";
    $dbname = "mango7h1_nca_it_noida";
*/

// Database connection new SQL DB
$servername = "localhost";
$username = "u530067535_Ritesh";
$dbpassword = "#Ritesh@123";
$dbname = "u530067535_Ritesh";




    $conn = new mysqli($servername, $username, $dbpassword, $dbname);


    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM admins WHERE email = ? AND password = MD5(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $email;
        header('Location: admin_panel.php');
        exit;
    } else {
        echo "Invalid email or password.";
    }


    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


     <!-- FontAwesome CDN Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 


<link rel="stylesheet" href="/css/custom.css" />
</head>
<body>
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Enter Name" required>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>


      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Admin Panel</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button  class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
</div>


 
</body>
<script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
// const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");


sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});


sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


    </script>
</html>


