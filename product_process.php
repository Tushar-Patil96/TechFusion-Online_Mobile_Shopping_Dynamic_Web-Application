<?php
session_start();
include 'admiin.php'; // Database connection

if (!isset($_POST['id'])) {
    die("Product ID is missing!");
}

// Fetch product details from form submission
$product = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'description' => $_POST['intro'],
    'ram' => $_POST['ram'],
    'color' => $_POST['color'],
    'quantity' => $_POST['quantity'],
    'image' => $_POST['image'] // Image URL or Base64 encoded
];

$customer_id = $_SESSION['customer_id'] ?? null; // Ensure customer is logged in

if (!$customer_id) {
    die("Please login to continue.");
}

// Initialize session arrays if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}
if (!isset($_SESSION['buy'])) {
    $_SESSION['buy'] = [];
}

// Handle different actions: Cart, Wishlist, Buy Now
if (isset($_POST['cart'])) {
    $_SESSION['cart'][] = $product;
    echo "<script>alert('Added to Cart!'); window.location='cart.php';</script>";
} elseif (isset($_POST['wishlist'])) {
    $_SESSION['wishlist'][] = $product;
    echo "<script>alert('Added to Wishlist!'); window.location='wishlist.php';</script>";
} elseif (isset($_POST['buy'])) {
    $_SESSION['buy'] = [$product]; // Store single product in buy session
    echo "<script>window.location='order.php';</script>";
}
?>
