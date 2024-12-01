<?php
// Include the database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Here, you would typically validate the credentials against your database
    // For demonstration, let's assume successful validation
    // Redirect to create.php after successful login
    header("Location: create.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="title has-text-centered">Login</h1>
        <form method="POST">
            <div class="field">
                <label class="label">Username</label>
                <div class="control">
                    <input class="input" type="text" name="username" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" required>
                </div>
            </div>
            <div class="control">
                <button class="button is-primary is-fullwidth" type="submit">Login</button>
            </div>
        </form>
        <p class="mt-3 has-text-centered">
            <a href="create.php">Don't have an account? Register here.</a>
        </p>
    </div>
</body>
</html>