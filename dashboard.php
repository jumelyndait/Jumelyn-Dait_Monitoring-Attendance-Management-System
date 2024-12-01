<?php
include 'db.php'; // Include the database connection

// Fetch attendance statistics
$total_students = 0;
$total_present = 0;
$total_absent = 0;
$total_late = 0;

// Count total students
$result = $conn->query("SELECT COUNT(DISTINCT student_name) AS total FROM attendance");
if ($result) {
    $row = $result->fetch_assoc();
    $total_students = $row['total'];
}

// Count attendance status
$result = $conn->query("SELECT status, COUNT(*) AS count FROM attendance GROUP BY status");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == 'Present') {
            $total_present = $row['count'];
        } elseif ($row['status'] == 'Absent') {
            $total_absent = $row['count'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #f5f5f5;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .box {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #ffffff;
        }      
        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .summary-item {
            flex: 1;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #e6f7ff;
            margin: 0 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .summary-item h3 {
            margin: 0;
            color: #007bff;
        
            
        }
        .button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 class="title is-4">Navigation</h2>
        <ul>
            <li><a class="has-text-weight-semibold" href="dashboard.php">Dashboard</a></li>
            <li><a class="has-text-weight-semibold" href="create.php">Add Attendance</a></li>
            <li><a class="has-text-weight-semibold" href="read.php">View Records</a></li>
            <li><a class="has-text-danger has-text-weight-semibold" href="login.php">Logout</a></li>
        </ul>

    </div>

    <div class="main-content">
        <h1 class="title is-3">Dashboard</h1>
        <div class="box">
            <h2 class="title is-4">Attendance Summary</h2>
            <p>Total Students: <strong><?php echo $total_students; ?></strong></p>
            <p>Total Present: <strong><?php echo $total_present; ?></strong></p>
            <p>Total Absent: <strong><?php echo $total_absent; ?></strong></p>
            
        </div>
        <a class="button is-info" href="create.php">Add Attendance Record</a>
        <a class="button is-info" href="read.php">View Attendance Records</a>
    </div>
</body>
</html>