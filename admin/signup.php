<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Database connection old DB
   // $servername = "localhost";
   // $username = "mango7h1_nca_it";
    //$dbpassword = "Nca@256#5";
    //$dbname = "mango7h1_nca_it_noida";
    
    
    // Database connection new DB
$servername = "localhost";
$username = "u530067535_Ritesh";
$dbpassword = "#Ritesh@123";
$dbname = "u530067535_Ritesh";



    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Hash the password
    $hashedPassword = md5($password);

    // Insert into database
    $sql = "INSERT INTO admins (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $hashedPassword);

/*
    if ($stmt->execute()) {
        echo "Sign-up successful. <a href='login.php'>Go to Login</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    
*/

if ($stmt->execute()) {
    echo "✅ Sign-up successful. Redirecting...";
    header("Location: login.php"); // Redirect to login page
    exit(); // Stop script execution after redirect
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
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        .signup-container {
            background: linear-gradient(45deg ,#098dc1,60% ,#f417de);
            border-radius: 20px
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 500px;
            text-align: center;
        }
        .signup-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .signup-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .signup-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form method="POST" action="">
            <input type="name" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button> <br/>
            <div class="my-3">
            Already have account <a class="text-white" href="/pro/admin/login.php">Login</a>
            </div>
        </form>

        </form>
    </div>
</body>
</html>


<!--<!DOCTYPE html>-->
<!--<style>-->
<!--@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,500&display=swap');-->
<!--*{-->
<!--    margin: 0;-->
<!--    padding: 0;-->
<!--    font-family: "poppins";-->
<!--}-->
<!--body{-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    min-height: 100vh;-->
<!--    background: linear-gradient(45deg ,#098dc1,60% ,#f417de);-->
    
    
<!--}-->
<!--body{-->
<!--    background-image: url(images/background.jpg);-->
<!--    background-size: cover;-->
<!--    background-repeat: no-repeat;-->
<!--    height: 100vh;-->
<!--  }-->
  
<!--.container{-->
<!--    height: 650px;-->
<!--    width: 410px;-->
<!--    background: #eee;-->
<!--    border-radius: 15px;-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    flex-direction: column;-->
<!--    overflow: hidden;-->
<!--    position: relative;-->
<!--}-->
<!--.Form{-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    flex-direction: column;-->

<!--}-->

<!--.login-form{-->
<!--    position: absolute;-->
<!--    transform: translateX(0px);-->
<!--    transition: .5s ease;-->

<!--}-->
<!--.login-form.active{-->
<!--    transform: translateX(-410px);-->
<!--}-->

<!--.Register-form{-->
<!--    transform: translateX(410px);-->
<!--    transition: .5s ease;-->
    
<!--}-->
<!--.Register-form.active{-->
<!--    transform: translateX(0);-->
<!--}-->
<!--h2{-->
<!--    color: #333;-->
<!--    font-size: 32px;-->
<!--}-->
<!--.input-box{-->
<!--    margin: 45px 0;-->
<!--    height: 40px;-->
<!--    width: 300px;-->
<!--    border-bottom: 2px solid rgba(0,0,0,.5);-->
<!--    position: relative;-->
<!--}-->
<!--.input-box input{-->
<!--    width: 90%;-->
<!--    height: 100%;-->
<!--    float: right;-->
<!--    border: none;-->
<!--    outline: none;-->
<!--    font-size: 15px;-->
<!--    color: rgba(0,0,0,.9);-->
  
<!--    padding: 5px 0;-->
<!--    background: transparent;-->
<!--}-->
<!--.input-box label{-->
<!--    position: absolute;-->
<!--    left: 0;-->
<!--    transform: translateY(-56%);-->
<!--    font-size: 15px;-->
<!--    font-weight: 500;-->
<!--    color: #333;-->
<!--}-->
<!--.input-box i{-->
<!--    position: absolute;-->
<!--    left: 0px;-->
<!--    transform: translateY(75%);-->
<!--    font-size: 22px;-->
<!--    color: rgba(0,0,0,.5);-->
<!--}-->
<!--input::placeholder{-->
<!--    font-size: 13px;-->
<!--}-->
<!--input#checked{-->
<!--    margin-right: 3px;-->
<!--}-->
<!--.forgot-section{-->
<!--    display: flex;-->
<!--    justify-content: space-between;-->
<!--    width: 100%;-->
<!--    margin-top: -20px;-->
<!--}-->
<!--.forgot-section span{-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    font-size: 13px;-->
<!--}-->
<!--.forgot-section span a{-->
<!--    color: #333;-->
<!--    text-decoration: none;-->
<!--}-->
<!--.btn{-->
<!--    width: 100%;-->
<!--    height: 40px;-->
<!--    margin-top: 20px;-->
<!--    border-radius: 50px;-->
<!--    border: none;-->
<!--    outline: none;-->
<!--    background: linear-gradient(45deg ,#098dc1,60% ,#f417de);-->
<!--    font-size: 19px;-->
<!--    font-weight: 500;-->
<!--    color: #eee;-->
<!--    position: relative;-->
<!--    cursor: pointer;-->
<!--    z-index: 1;-->
<!--    overflow: hidden;-->
<!--}-->
<!--.btn::before{-->
<!--    content: "";-->
<!--    position: absolute;-->
<!--    left: 0;-->
<!--    top: 0%;-->
<!--    height: 100%;-->
<!--    width: 00%;-->
<!--    background: linear-gradient(45deg ,#f417de,60% ,#098dc1);-->
<!--    transition: .5s ease;-->
<!--    z-index: -1;-->
<!--}-->
<!--.btn:hover{-->
<!--    color: #eee;-->
<!--}-->
<!--.btn:hover:before{-->
<!--width: 100%;-->
<!--}-->

<!--p{-->
<!--    color: rgba(0,0,0,.5);-->
<!--    font-size: 13px;-->
<!--    font-weight: 500;-->
<!--    margin: 25px 0;-->
<!--}-->
<!--.social-media{-->
<!--    display: flex;-->
<!--}-->
<!--.social-media i{-->
<!--    font-size: 28px;-->
<!--    margin-left: 15px;-->
<!--    padding: 5px;-->
<!--    cursor: pointer;-->
<!--    transition: .3s;-->
<!--}-->

<!--.social-media i:nth-child(1){-->
<!--    color: #eee;-->
<!--    background: #1822dd;-->
<!--    border-radius: 50%;-->
<!--    border: 2px solid #eee;-->
<!--}-->
<!--.social-media i:nth-child(1):hover{-->
<!--    background: #eee;-->
<!--    color: #1822dd;-->
<!--    border: 2px solid #1822dd;-->
<!--}-->
<!--.social-media i:nth-child(2){-->
<!--    color: #eee;-->
<!--    background: #f00;-->
<!--    border-radius: 50%;-->
<!--    border: 2px solid #eee;-->
<!--}-->
<!--.social-media i:nth-child(2):hover{-->
<!--    background: #eee;-->
<!--    color: #f00;-->
<!--    border: 2px solid #f00;-->
<!--}-->
<!--.social-media i:nth-child(3){-->
<!--    color: #eee;-->
<!--    background: #098dc1;-->
<!--    border-radius: 50%;-->
<!--    border: 2px solid #eee;-->
<!--}-->
<!--.social-media i:nth-child(3):hover{-->
<!--    background: #eee;-->
<!--    color: #098dc1;-->
<!--    border: 2px solid #098dc1;-->
<!--}-->
<!--.RegisteBtn a{-->
<!--    text-decoration: none;-->
<!--    font-size: 14px;-->
<!--}-->


<!--@media(max-width: 768px){-->
<!--    .container{-->
<!--        height: 500px;-->
<!--        width: 380px;-->
<!--    }-->
<!--    h2{-->
<!--        font-size: 26px;-->
<!--    }-->
<!--    .input-box{-->
<!--        margin: 34px 0;-->
<!--        height: 35px;-->
<!--        width: 300px;-->
<!--    }-->
<!--    .input-box label{-->
<!--        font-size: 13px;-->
    
<!--    }-->
<!--    .input-box input{-->
<!--        font-size: 13px;-->
<!--    }-->
<!--    .input-box i{-->
 
<!--        font-size: 18px;-->

<!--    }-->
<!--    input::placeholder{-->
<!--        font-size: 13px;-->
<!--    }-->
<!--    .forgot-section span{-->
<!--        font-size: 12px;-->
<!--    }-->
<!--    input#checked{-->
<!--        margin-right: 2px;-->
<!--        height: 15px;-->
<!--    }-->
<!--    .btn{-->
<!--        height: 35px;-->
<!--        font-size: 15px;-->
<!--    }-->
<!--    p{-->
<!--        font-size: 11px;-->
<!--    }-->
<!--    .social-media i{-->
<!--        font-size: 20px;-->
       
<!--    }-->
<!--    .RegisteBtn a{-->
<!--        text-decoration: none;-->
<!--        font-size: 13px;-->
<!--    }-->

<!--}-->
<!--@media(max-width: 480px){-->
<!--    .container{-->
<!--        height: 450px;-->
<!--        width: 310px;-->
<!--    }-->
<!--    h2{-->
<!--        font-size: 22px;-->
<!--    }-->
<!--    .input-box{-->
<!--        margin: 20px 0;-->
<!--        height: 35px;-->
<!--        width: 220px;-->
<!--    }-->
<!--    .input-box label{-->
<!--        font-size: 12px;-->
    
<!--    }-->
<!--    .input-box input{-->
<!--        font-size: 12px;-->
<!--    }-->
<!--    .input-box i{-->
 
<!--        font-size: 16px;-->

<!--    }-->
<!--    input::placeholder{-->
<!--        font-size: 10px;-->
<!--    }-->
<!--    .forgot-section span{-->
<!--        font-size: 9px;-->
<!--    }-->
<!--    input#checked{-->
<!--        margin-right: 2px;-->
<!--        height: 10px;-->
<!--    }-->
<!--    .btn{-->
<!--        height: 25px;-->
<!--        font-size: 12px;-->
<!--    }-->
<!--    p{-->
<!--        font-size: 11px;-->
<!--    }-->
<!--    .social-media i{-->
<!--        font-size: 18px;-->
       
<!--    }-->
<!--    .RegisteBtn a{-->
<!--        text-decoration: none;-->
<!--        font-size: 11px;-->
<!--    }-->

<!--}-->
<!--@media(max-width:365px){-->
<!--    .container{-->
<!--        height: 420px;-->
<!--        width: 280px;-->
<!--    }-->
<!--    h2{-->
<!--        font-size: 18px;-->
<!--    }-->
<!--    .input-box{-->
<!--        margin: 20px 0;-->
<!--        height: 35px;-->
<!--        width: 200px;-->
<!--    }-->
<!--    .social-media i{-->
<!--        font-size: 16px;-->
       
<!--    }-->
<!--    .RegisteBtn a{-->
<!--        text-decoration: none;-->
<!--        font-size: 9px;-->
<!--    }-->
 
<!--}-->

<!--</style>-->

<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>NCA IT SOLUTION</title>-->
<!--    <link rel="stylesheet" href="style.css">-->
<!--    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>-->
<!--</head>-->
<!--<body>-->
<!--    <div class="container">-->
<!--        <div class="Form login-form">-->
<!--        <h2>Login</h2>-->
<!--        <form action="#">-->
<!--            <div class="input-box">-->
<!--                <i class='bx bxs-user'></i>-->
<!--                <label for="#">Username</label>-->
<!--                <input type="text" placeholder="Enter Your Username*">-->
               
               
<!--            </div>-->
<!--            <div class="input-box">-->
<!--                <i class='bx bxs-envelope' ></i>-->
<!--                <input type="text" placeholder="Enter Your Password*">-->
<!--                <label for="#">Password</label>-->
              
<!--            </div>-->
<!--            <div class="forgot-section">-->
<!--                <span><input type="checkbox" name="" id="checked">Remember Me</span>-->
<!--                <span><a href="#">Forgot Password ?</a></span>-->
<!--            </div>-->
<!--            <button class="btn">Login</button>-->
<!--        </form>-->
<!--        <p>Or Sign up using</p>-->
<!--        <div class="social-media">-->
<!--            <i class='bx bxl-facebook'></i>-->
<!--            <i class='bx bxl-google'></i>-->
<!--            <i class='bx bxl-twitter'></i>-->
<!--        </div>-->
<!--        <p class="RegisteBtn RegiBtn"><a href="#">Register Now</a></p>-->
<!--    </div>-->
<!--    <div class="Form Register-form">-->
<!--        <h2>Register</h2>-->
<!--        <form action="#">-->
<!--            <div class="input-box">-->
<!--                <i class='bx bxs-user'></i>-->
<!--                <label for="#">Username</label>-->
<!--                <input type="text" placeholder="Enter Your Username*">-->
               
               
<!--            </div>-->
<!--            <div class="input-box">-->
<!--                <i class='bx bxs-envelope' ></i>-->
<!--                <input type="text" placeholder="Enter Your Email*">-->
<!--                <label for="#">Email</label>-->
<!--            </div>-->
<!--            <div class="input-box">-->
<!--                <i class='bx bxs-envelope' ></i>-->
<!--                <input type="text" placeholder="Enter Your Password*">-->
<!--                <label for="#">Password</label>-->
<!--            </div>-->
<!--            <div class="forgot-section">-->
<!--                <span><input type="checkbox" name="" id="checked">Remember Me</span>-->
<!--                <span><a href="#">Forgot Password ?</a></span>-->
<!--            </div>-->
<!--            <button class="btn" class="loginBtn">Register</button>-->
<!--        </form>-->
<!--        <p>Or Sign up using</p>-->
<!--        <div class="social-media">-->
<!--            <i class='bx bxl-facebook'></i>-->
<!--            <i class='bx bxl-google'></i>-->
<!--            <i class='bx bxl-twitter'></i>-->
<!--        </div>-->
<!--        <p class="LoginBtn"><a href="#">Login Now</a></p>-->
<!--    </div>-->
<!--</div>-->
<script>
    const container=document.querySelector(".container") ;
    const loginForm=document.querySelector('.login-form')
    const RegisterForm=document.querySelector('.Register-form');
    const RegiBtn=document.querySelector('.RegiBtn');
    const LoginBtn=document.querySelector('.LoginBtn');
    RegiBtn.addEventListener('click',()=>{
        RegisterForm.classList.add('active');
        loginForm.classList.add('active')
    })
    LoginBtn.addEventListener('click',()=>{
        RegisterForm.classList.remove('active');
        loginForm.classList.remove('active')
    })
</script>
</body>
</html>

