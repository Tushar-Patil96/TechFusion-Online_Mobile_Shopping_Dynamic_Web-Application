<?php
include('PHP assets/header.php');
?>
<?php

include "admiin.php"; // Database connection

// Check if product is stored in session
if (!isset($_SESSION['buy'][0])) {
    die("No product selected for order!");
}

// Retrieve product details from session
$product = $_SESSION['buy'][0];

// Handle Order Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_SESSION['customer_id']; // Ensure user is logged in
    $quantity = $_POST['quantity'];

    // Insert order into database
    $insert_query = "INSERT INTO orders (customer_id, id, product_name, product_image, quantity, price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("iissis", $customer_id, $product['id'], $product['name'], $product['image'], $quantity, $product['price']);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully!'); window.location='account.php';</script>";
    } else {
        echo "<script>alert('Error placing order!');</script>";
    } 
}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Product</title>
    <link rel="stylesheet" href="order.css">
</head>
<body style=" background-image: url('PHP assets/bg.gif'); ">
    <h2>Order Product</h2>
    <form  style="padding-top:100px; background-color: white;" method="POST">
        <img src="<?php echo $product['image']; ?> " width="300">
        <p style="color: black;"><strong>Product:</strong> <?php echo $product['name']; ?></p>
        <p style="color: black;"><strong>Price:</strong> <?php echo $product['price']; ?></p>
        <label>Quantity:</label>
        <input type="number" name="quantity" min="1" value="1" required>
        <button class="button" type="submit">Place Order</button>
    </form>
</body>
</html>
