<?php
include 'db.php'; // Include your database connection

// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the id from the URL and convert it to an integer

    // Prepare the SQL delete statement
    $sql = "DELETE FROM attendance WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter
        $stmt->bind_param("i", $id); // "i" indicates that the parameter is an integer
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}

// Close the database connection
$conn->close();

// Redirect back to the records page (optional)
header("Location: read.php");
exit;
?>s