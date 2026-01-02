<?php
session_start();
include 'admiin.php'; // Include database connection file

// Ensure the user is logged in
if (!isset($_SESSION['customer_id'])) {
    echo "<script>
        alert('You must log in first!');
        window.location.href = 'login.php';
    </script>";
    exit();
}

$user_id = $_SESSION['customer_id'];

// Fetch user information
$query = "SELECT username, email, address FROM customer WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email,  $address);
$stmt->fetch();
$stmt->close();

// Fetch wishlist items
$wishlist_query = "SELECT product_id FROM wishlist WHERE customer_id = ?";
$wishlist_stmt = $conn->prepare($wishlist_query);
$wishlist_stmt->bind_param("i", $user_id);
$wishlist_stmt->execute();
$wishlist_stmt->bind_result($product_name);
$wishlist_items = [];
while ($wishlist_stmt->fetch()) {
    $wishlist_items[] = $product_name;
}
$wishlist_stmt->close();

// Fetch orders
$order_query = "SELECT product_name, product_image, quantity, price FROM orders WHERE customer_id = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("i", $user_id);
$order_stmt->execute();
$order_stmt->bind_result($order_name, $order_image, $order_quantity, $order_price);
$orders = [];
while ($order_stmt->fetch()) {
    $orders[] = [
        'name' => $order_name,
        'image' => $order_image,
        'quantity' => $order_quantity,
        'price' => $order_price
    ];
}
$order_stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="thumbnails/mainlogo.png">
    
    <link rel="stylesheet" href="account3.css">
    <title> TechFusion - Online Mobile Shopping Website </title>
</head>
<body>

<!--First Portion-->
<header class="head">
    <a href="login.php">Login</a>
    <a href="Signup.php">Signup</a>
    <a href="Account.php">Account</a>
</header>

<!--Second Portion-->
<div class="headcontainer">
    <div class="image"><img src="thumbnails/mainlogo.png" alt="Logo"></div>
    <div class="logoname"><h1>Tech Fusion</h1></div>
    <div class="search-box">
        <form action="">
            <input type="text" name="search" id="srch" placeholder="search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="menu">
        <ul class="navbar">
            <li class="home"><a href="index.php">Home</a></li>
            <li class="hotdeals"><a href="index.php#carousel-body">Hot Deals</a></li>
            <li class="new"><a href="index.php#mob-body">New Phones</a></li>
            <li class="categories"><a href="index.php#mob-body">Categories</a></li>
            <li class="accesories"><a href="index.php#wrapper-body">Accessories</a></li>
            <li><div class="wish">
                <i onclick="window.location='wishlist.php';" class="fa-regular fa-heart"></i>
            </div></li>
            <li><div class="cart">
                <i onclick="window.location='cart.php';" class="fa-solid fa-cart-shopping"></i>
            </div></li>
        </ul>
    </div>    
</div>

<!-- Account Container -->
<div class="account-container">
    <h2 class="my">My Account</h2>

    <!-- User Info Section -->
    <div class="user-info">
        <img src="thumbnails/account.png" alt="Profile Pic">
        <h2>Username: <?php echo htmlspecialchars($username); ?></h2>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
    </div>
    
    <!-- Wishlist Section -->
    <div class="wishlist">
        <h3 onclick="window.location='wishlist.php';">Wishlist</h3>
        <ul>
            <?php foreach ($wishlist_items as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <!-- Address Section -->
    <div class="address">
        <h3>Address</h3>
        <p><?php echo htmlspecialchars($address); ?></p>
    </div>

    <!-- My Orders Section -->
    <div class="orders" style=" padding: 20px ;
    border-bottom: 1px solid #1e1f29;">
        <h3 onclick="window.location='orders.php';"  style=" color: #007bff;
    margin-bottom: 10px;">My Orders</h3>
        <ul style=" list-style-type:none;">
            <?php if (count($orders) > 0): ?>
                <?php foreach ($orders as $order): ?>
                    <li style="padding-bottom: 20px;">
                        <img src="<?php echo htmlspecialchars($order['image']); ?>" width="50">
                        <?php echo htmlspecialchars($order['name']); ?> -  
                        <?php echo $order['quantity']; ?> x 
                        <?php echo $order['price']; ?>
                    </li>
                <li style="color: green; font-weight:500;">Order will be delivered soon !</li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No orders yet.</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Logout Button -->
    <div class="logout-btn">
        <a href="logout.php">Logout</a>
    </div>
</div>
</body>
</html>
