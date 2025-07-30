<?php
// Database connection new SQL DB
$servername = "localhost";
$username = "u530067535_Ritesh";
$password = "#Ritesh@123";
$dbname = "u530067535_Ritesh";


// Establishing a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$certificates = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $enrollment_id = $_POST['enrollment_id'];
   
    $sql = "SELECT * FROM certificate WHERE enrollment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
   
    $stmt->close();
   
    // Prevent form resubmission on refresh
    echo "<script>window.location = window.location.pathname + '?enrollment_id=' + encodeURIComponent('$enrollment_id');</script>";
    exit;
} elseif (isset($_GET['enrollment_id'])) {
    $enrollment_id = $_GET['enrollment_id'];
   
    $sql = "SELECT * FROM certificate WHERE enrollment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $enrollment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
   
    $stmt->close();
} else {
    $sql = "SELECT * FROM certificate";
    $result = $conn->query($sql);
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Certificate</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        form input, form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .sync-btn {
            background-color: #28a745;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }
        .sync-btn:hover {
            background-color: #218838;
        }
        .certificate-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .certificate-table th, .certificate-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .certificate-table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Certificate</h1>
        <form action="" method="POST">
            <input type="text" id="enrollment_id" name="enrollment_id" placeholder="Enter Enrollment ID" required>
            <button type="submit" name="search">Search</button>
            <button type="button" class="sync-btn" onclick="window.location.href=window.location.pathname">🔄</button>
        </form>
       
        <table class="certificate-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Enrollment ID</th>
                    <th>Certificate Number</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($certificates)): ?>
                    <?php foreach ($certificates as $certificate): ?>
                    <tr>
                        <td><?php echo $certificate['name']; ?></td>
                        <td><?php echo $certificate['enrollment_id']; ?></td>
                        <td><?php echo $certificate['cert_no']; ?></td>
                        <td><?php echo $certificate['department']; ?></td>
                        <td><?php echo $certificate['start_date']; ?></td>
                        <td><?php echo $certificate['end_date']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center; color: red;">No certificate found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>



