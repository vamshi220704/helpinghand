<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - HelpingHands</title>
</head>
<body>
    <h1>Welcome to HelpingHands</h1>
    <p>You are logged in as <?php echo $_SESSION['user']; ?>.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
