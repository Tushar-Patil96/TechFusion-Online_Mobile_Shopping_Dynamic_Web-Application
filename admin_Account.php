<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="thumbnails\mainlogo.png">
    <link rel="stylesheet" href="Account.css">
    <title> TechFusion - Online Mobile Shopping Website </title>

</head>
<body>

<!--First Portion-->

    <header class="head">
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
        <a href="admin_Account.php">Account</a>
        <a href="Manage.php">Manage</a>
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
                        <li class="home"><a href="index.html">Home</a></li>
                        <li class="hotdeals"><a href="/index.html#carousel-body">Hot Deals</a></li>
                        <li class="new"><a href="/index.html#mob-body" >New Phones</a></li>
                        <li class="categories"><a href="/index.html#brand-body">Categories</a></li>
                        <li class="accesories"><a href="/index.html#wrapper-body">Accesories</a></li>
                        <li><div class="wish">
                            <i class="fa-regular fa-heart"></i></div>
                        </li>
                        <li> <div class="cart">
                            <i class="fa-solid fa-cart-shopping"></i></div>
                    </li>
                    </ul>
            
            </div>    
        </div>


<?php
session_start();
include 'admiin.php';

if (isset($_SESSION['customer_id'])) {
    // User is logged in, proceed with the page content
    // Display username or any other data
}else{
    echo "<script>
    alert('You must log in first!');
    window.location.href = 'login.php';
  </script>";
  exit();
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM customer WHERE id = $id");
    header("Location: admin_Account.php");
    exit();
}


// Handle role update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_role'])) {
    $id = $_POST['user_id'];
    $role = $_POST['role'];
    $conn->query("UPDATE customer SET role = '$role' WHERE id = $id");
    header("Location: admin_Account.php");
    exit();
}


// Fetch users from database
$result = $conn->query("SELECT * FROM customer");
?>

    <div class="admin-container">
        <h2>Admin Panel - Manage Users</h2>
        <h2><?php echo"Welcome :  $_SESSION[username]"; ?></h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Privilege</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td>
                    <form method="POST" action="admin_Account.php">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <select name="role">
                            <option value="user" <?php echo ($row['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                            <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                        
                    
                </td>
                <td>
                <button type="submit" name="update_role" class="update-btn">Update</button>
            </form>
                    <a href="admin_Account.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    <button style="
            margin-left: 50%;
            align-items: center;
            margin-top: 20px;
            text-decoration: none;
            border: 0.3px solid #007bff;
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            background-color: red;
            cursor: pointer;"  onclick="window.location ='logout.php'">Logout</button>

    </div>
</body>
</html>
