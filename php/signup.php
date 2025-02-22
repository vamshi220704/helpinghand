<?php
ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpinghands";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirmPassword'] ?? '');

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        die("Error: All fields are required.");
    }

    if ($password !== $confirmPassword) {
        die("Error: Passwords do not match.");
    }

    $check_stmt = $conn->prepare("SELECT id FROM signup WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        die("Error: Email is already registered.");
    }
    $check_stmt->close();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO signup (name, email, password) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location:login.html");
            exit();
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - HelpingHands</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        /* Links */
.signup-link, .login-link {
    text-align: center;
    margin-top: 15px;
    font-size: 16px;
}
/* Header styling */
header {
    padding: 20px 0;
    background: #3CC78F; /* Semi-transparent background */
    text-align: center;
}

header .logo img {
    max-width: 200px;
    margin: 0 auto;
}

.signup-link a, .login-link a {
    color: #fff;
    text-decoration: none;
}

.signup-link a:hover, .login-link a:hover {
    text-decoration: underline;
}

/* Footer */
footer {
    background: rgba(0, 0, 0, 0.7); /* Dark footer */
    color: white;
    padding: 20px 0;
    text-align: center;
    position: absolute;
    width: 100%;
    bottom: 0;
}

footer p {
    margin: 0;
}

/* Responsive design for mobile devices */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }

    .login-form, .signup-form {
        padding: 20px;
    }

    button {
        font-size: 16px;
    }
}
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-area">
            <div class="container">
                <div class="logo">
                    <a href="index.html"><img src="img/Untitled_design__5_-removebg-preview.png" alt="HelpingHands"></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Signup Form Section -->
    <div class="signup-section">
        <div style="text-align:center;" class="container">
            <div class="signup-form">
            <br><br>
                <h2 >Sign Up for HelpingHands</h2>
                <form action="signup.php" method="post">
                    <br><br>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required placeholder="enter name" title="enter name">
                    <br><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required placeholder="enter email" title="enter email">
                    <br><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required placeholder="enter password" title="enter password">
                    <br><br>
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" required placeholder="enter confirmPassword" title="enter confirm password">
                    <br><br>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <p class="login-link">Already have an account? <a href="login.html" style="color: black;">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer_top">
            <div class="container">
                <p>HelpingHands &copy; 2025 All rights reserved</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/main.js"></script>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Handle form validation and submission
            alert("Sign Up Successful!");
            window.location.href = "home.html"; 
        });
    </script>
</body>
</html>

