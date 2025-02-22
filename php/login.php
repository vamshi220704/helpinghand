<?php
session_start();
include 'db.php'; // Ensure this file uses MySQLi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use MySQLi prepared statements
    $query = "SELECT * FROM signup WHERE email=?";
    $stmt = $conn->prepare($query); // MySQLi prepare statement
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email); // Bind parameter correctly
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Invalid email or password!";
    }

    $stmt->close(); // Close statement
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HelpingHands</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="login-section">
        <div class="container">
            <div class="login-form">
                <h2>Login to HelpingHands</h2>
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="signup-link">Don't have an account? <a href="signup.php" style="color: black;">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
