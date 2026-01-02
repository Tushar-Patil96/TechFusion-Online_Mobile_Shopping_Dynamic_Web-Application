<?php
include 'admiin.php';
session_start();

if (isset($_SESSION['customer_id'])) {
    // Display username or any other data
}else{
    echo "<script>
    alert('You must log in first!');
    window.location.href = 'login.php';
  </script>";
  exit();
}



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
    <link rel="icon" href="thumbnails\mainlogo.png">
    <title> TechFusion - Online Mobile Shopping Website </title>

    <link rel="stylesheet" href="wishcart.css">
</head>
<body>

<header class="head">
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
        <a href="Account.php">Account</a>
    </header>



<!--Second Portion-->

    <div class="headcontainer">
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
                            <i onclick="window.location='wishlist.php';" class="fa-regular fa-heart"></i></div>
                        </li>
                        <li> <div class="cart">
                            <i onclick="window.location='cart.php';"  class="fa-solid fa-cart-shopping"></i></div>
                    </li>
                    </ul>
            
            </div>    
    </div>



    <div class="container">
    <a class="continue" href="index.php">Continue Shopping</a>
    <h2>Your Shopping Cart</h2>
    
    <br><br>

    <?php if (!empty($_SESSION['cart'])): ?>
        <table border="1">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>RAM</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>

            <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                <tr>
                    <td><img src="<?php echo $item['image']; ?>" width="80"></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo ($item['price']); ?></td>
                    <td><?php echo $item['ram']; ?></td>
                    <td><?php echo $item['color']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>
                        <a class="continue" href="remove.php?type=cart&index=<?php echo $key; ?>">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p >Your cart is empty.</p>
    <?php endif; ?>
    </div>
</body>
</html>
