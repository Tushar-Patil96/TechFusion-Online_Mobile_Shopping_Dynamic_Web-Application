<?php
session_start();

if (isset($_GET['type']) && isset($_GET['index'])) {
    $type = $_GET['type'];
    $index = $_GET['index'];

    if ($type == "cart") {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
        echo "<script>alert('Item removed from Cart!'); window.location='cart.php';</script>";
    } elseif ($type == "wishlist") {
        unset($_SESSION['wishlist'][$index]);
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Re-index array
        echo "<script>alert('Item removed from Wishlist!'); window.location='wishlist.php';</script>";
    }
}
?>
