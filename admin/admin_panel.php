<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Get the first character of the logged-in email
$adminEmail = $_SESSION['admin'];
$profileInitial = strtoupper($adminEmail[0]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f9;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
        }
        .sidebar .profile {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            margin-bottom: 20px;
        }
        .sidebar .profile .icon {
            width: 60px;
            height: 60px;
            background-color: #fff;
            color: #007bff;
            font-size: 30px;
            line-height: 60px;
            border-radius: 50%;
            margin: 0 auto;
            font-weight: bold;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .sidebar ul li:hover {
            background-color: #495057;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .content h1 {
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .logout {
            margin-top: auto;
            padding: 15px 20px;
            background-color: #dc3545;
            text-align: center;
        }
        .logout a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <div class="icon"><?php echo $profileInitial; ?></div>
            <p><?php echo $adminEmail; ?></p>
        </div>
        <ul>
            <li><a href="admin_panel.php">Dashboard</a></li>
            <li><a href="adminCourse.php">Add Course</a></li>
            <li><a href="viewUser.php">View Users Certificates</a></li>
        </ul>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <h1>Welcome to the Admin Panel</h1>
        <p>Select an option from the menu to get started.</p>
        <a href="adminCourse.php" class="button">Add Course</a>
        <a href="viewUser.php" class="button">View Users</a>
        <a href="add_certificate.html" class="button">Add Certificate</a>
    </div>
</body>
</html>
