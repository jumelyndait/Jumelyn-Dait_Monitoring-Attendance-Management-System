<?php
include 'db.php'; // Include the database connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance (student_name, date, status) VALUES ('$student_name', '$date', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Attendance Record</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="title is-4">Navigation</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="create.php">Add Attendance</a></li>
            <li><a href="read.php">View Records</a></li>
            <li><a href="login.php" class="has-text-danger">Logout</a></li> <!-- Added Logout link -->
        </ul>
    </div>

    <div class="main-content">
        <h1 class="title is-3">Add Attendance Record</h1>
        <form method="POST">
            <label class="label">Student Name:</label>
            <input class="input" type="text" name="student_name" required>
            <br>
            <label class="label">Date:</label>
            <input class="input" type="date" name="date" required>
            <br>
            <label class="label">Status:</label>
            <div class="select">
                <select name="status" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                   
                </select>
            </div>
            <br>
            <input class="button is-link" type="submit" value="Add Record">
        </form>
        <a class="button is-info" href="read.php">View Records</a>
    </div>
</body>
</html>