<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM attendance WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = $_POST['student_name'];
    $attendance_date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "UPDATE attendance SET student_name='$student_name', date='$date', status='$status' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance Record</title>
</head>
<body>
    <h1>Edit Attendance Record</h1>
    <form method="POST">
        <label>Student Name:</label>
        <input type="text" name="student_name" value="<?php echo $row['student_name']; ?>" required><br>
        <label>Attendance Date:</label>
        <input type="date" name="attendance_date" value="<?php echo $row['date']; ?>" required><br>
        <label>Status:</label>
        <select name="status" required>
            <option value="Present" <?php echo ($row['status'] == 'Present') ? 'selected' : ''; ?>>Present</option>
            <option value="Absent" <?php echo ($row['status'] == 'Absent') ? 'selected' : ''; ?>>Absent</option>
        </select><br>
        <input type="submit" value="Update Record">
    </form>
    <a href="index.php">Back to Records</a>
</body>
</html>

<?php $conn->close(); ?>