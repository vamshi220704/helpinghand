
<?php
// Handle the form submission when the user clicks "Save"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Simple validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone)) {
        $errorMessage = "Please fill in all fields.";
    } else {
        // Simulate saving data (you can save to a database or file)
        $successMessage = "Profile Saved!<br><br>First Name: $firstName<br>Last Name: $lastName<br>Email: $email<br>Phone: $phone";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HelpingHands</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/Untitled_design__6_-removebg-preview.png">
    <!-- CSS links (same as before) -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Center profile container */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            justify-content: center;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            top: 120px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            width: 100%;
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .save-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .save-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/Untitled_design__5_-removebg-preview.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="home.html">home</a></li>
                                        <li><a href="About.html">About</a></li>
                                        <li><a href="#">Categories<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blooddonation.html">BloodDonation</a></li>
                                                <li><a href="clothes.html">Clothes</a></li>
                                                <li><a href="food.html">Food</a></li>
                                                <li><a href="toys.html">toys</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="profile.html">Profile</a></li>
                                    </ul>
                                </nav>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="makeadonate.html" class="donate-button">Make a Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <h2>Profile Page</h2>

        <!-- Display any success or error message -->
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php elseif (isset($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="input-group">
                <label for="first-name">First Name:</label>
                <input type="text" name="first-name" id="first-name" value="<?php echo isset($firstName) ? $firstName : ''; ?>" placeholder="Enter first name">
            </div>
            <div class="input-group">
                <label for="last-name">Last Name:</label>
                <input type="text" name="last-name" id="last-name" value="<?php echo isset($lastName) ? $lastName : ''; ?>" placeholder="Enter last name">
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Enter email">
            </div>
            <div class="input-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" id="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Enter phone number">
            </div>
            <button type="submit" class="save-btn">Save</button>
        </form>
    </div>

</body>

</html>
