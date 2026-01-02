<?php
include 'admiin.php';
// Check if ID is set in URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Delete the order from database
    $query = "DELETE FROM orders WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Order deleted successfully!'); window.location.href='orders.php';</script>";
    } else {
        echo "<script>alert('Error deleting order: " . $conn->error . "'); window.location.href='orders.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='orders.php';</script>";
}

$conn->close();
?>
