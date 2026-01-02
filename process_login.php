<?php
session_start();
include 'admiin.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Fetch user details
    $stmt = $conn->prepare("SELECT id, username, email, password, role FROM customer WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];


       

        if ($password === $stored_password) {
            // Store session data
            $_SESSION['customer_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            $redirect_page = ($row['role'] == 'admin') ? "owner.php" : "index.php";
            header("Location: $redirect_page");
            exit();
          }
        


            // Redirect with error message
            header("Location: login.php?error=Invalid username or password");
            exit();
        }
        header("Location: login.php?error=Invalid username or password");
        exit();
        
}
?>
