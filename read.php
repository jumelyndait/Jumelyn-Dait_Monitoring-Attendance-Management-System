<?php
include 'db.php';

// Fetch attendance records
$sql = "SELECT * FROM `attendance` WHERE 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Management System</title>
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
            <li><a href="dashboard.php">Dashboard</></li>
            <li><a href="create.php">Add Attendance Record</a></li>
            <li><a href="read.php">View Records</a></li>
            <li><a href="contact us.php">Contact Us</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1 class="title is-3">Attendance Records</h1>
        <a class="button is-primary" href="create.php">Add Attendance Record</a>
        <table class="table is-striped is-bordered is-hoverable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a class="button is-info is-small" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="button is-danger is-small" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>