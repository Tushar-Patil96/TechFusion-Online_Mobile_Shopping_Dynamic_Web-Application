<?php
include 'admiin.php'; // Connect to database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash the password for security



    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO customer (username, password, email, contact, address) VALUES (?, ?, ?, ?, ? )");
    $stmt->bind_param("sssss", $username, $password, $email, $contact, $address);
    
    if ($stmt->execute()) {
        // Redirect to the main page after successful signup
        header("Location: index.php");
        exit(); // Ensure script stops after redirect
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up TechFusion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="thumbnails\mainlogo.png">

    <link rel="stylesheet" href="Signup.css">
</head>
<body style="background: url('extras/signup-gif.gif');   background-size: cover;">



     <!--First Portion-->

    <header class="head">
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
        <a href="Account.php">Account</a>
    </header>



<!--Second Portion-->

    <div class="container">
        <div class="image"><img src="thumbnails/mainlogo.png" alt="Logo" ></div>

        <div class="logoname"><h1>Tech Fusion</h1></div>

        <div class="search-box">
            <form action="">
                <input type="text" name="search" id="srch" placeholder="search">
                <button type="submit">  <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
                
        </div>


        <div class="menu">
                <ul class="navbar">
                    <li class="home"><a href="index.php">Home</a></li>
                    <li class="hotdeals"><a href="index.php#carousel-body">Hot Deals</a></li>
                    <li class="new"><a href="index.php#mob-body" >New Phones</a></li>
                    <li class="categories"><a href="index.php#mob-body">Categories</a></li>
                    <li class="accesories"><a href="index.php#wrapper-body">Accesories</a></li>
                    <li><div class="wish">
                        <i class="fa-regular fa-heart"></i></div>
                    </li>
                    <li> <div class="cart">
                        <i class="fa-solid fa-cart-shopping"></i></div>
                    </li>
                </ul>
        </div>    
    </div>






<div class="form-container">
    <div class="form-item" style="background-color: black">
        <h2>Sign Up</h2>
        <form action="Signup.php" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="number" id="contact" name="contact" placeholder="Enter your contact number" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
            </div>
            
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</div>    



<div class="footer">
    <div class="footer-container">
        <div class="row">
            <!-- About Us Section -->
            <div class="col">
                <h5>About Us</h5>
                <p>We are a leading mobile shop offering the latest smartphones, accessories, and gadgets at competitive prices. Our mission is to provide exceptional service and quality products to our customers.</p>
            </div>

            <!-- Terms and Contact Section -->
            <div class="col">
                <h5>Useful Links</h5>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <!-- Additional Information -->
            <div class="col">
                <h5>Information</h5>
                <ul>
                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                    <li><a href="faq.php">FAQs</a></li>
                    <li><a href="support.php">Support</a></li>
                </ul>
            </div>

            <div class="col">
                <h5>Contact Us</h5>
                <ul>
                    <li><a href="https://www.instagram.com/panchal_vaibhav03?igsh=MTZlNzNoOXpsY3Yzcw=="><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/tushar-surose"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; 2025 Mobile Shop. All rights reserved.</p>
        </div>
    </div>
</div>



    
</body>
</html>
