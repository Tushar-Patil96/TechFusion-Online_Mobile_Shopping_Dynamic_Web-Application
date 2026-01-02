<?php
session_start();
include 'admiin.php';

if (!isset($_POST['id'])) {
    die("Product not found!");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['detail'])) {
    $product_id = $_POST['id'];
// Get product ID from URL


// Fetch product details
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}
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

    <title><?php echo $product['name']; ?> - Product Details</title>
    <link rel="stylesheet" href="productdetail.css">
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
        <!-- Product Image (Right Side) -->
        <div class="product-image">
        <img src="<?php echo $product['image']; ?>" alt="Product_image">
           
        </div>

        <!-- Product Details (Left Side) -->
        <div class="product-details">
            <h2><?php echo $product['name']; ?></h2>
            <p class="price"><?php echo ($product['price'] ); ?></p>
            <p><?php echo $product['intro']; ?></p>

            <form action="product_process.php" method="POST">
                <!-- Hidden Fields for Product Info -->
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                <input type="hidden" name="intro" value="<?php echo $product['intro']; ?>">
                <input type="hidden" name="image" value="<?php echo $product['image']; ?>">

                <!-- Select RAM -->
                <h4>Select RAM:</h4>
                <label><input type="radio" name="ram" value="6GB" required> 6GB</label>
                <label><input type="radio" name="ram" value="8GB"> 8GB</label>
                <label><input type="radio" name="ram" value="12GB"> 12GB</label>

                <!-- Select Color -->
                <h4>Select Color:</h4>
                <label><input type="radio" name="color" value="Black" required> Black</label>
                <label><input type="radio" name="color" value="Blue"> Blue</label>
                <label><input type="radio" name="color" value="White"> White</label>


                <h4>Quantity:</h4>
                <input type="number" name="quantity" value="1" min="1" required>


                <!-- Buttons -->
                <div class="buttons">
                    <button type="submit" name="buy" class="buy-btn">Buy Now</button>
                    <button type="submit" name="cart" class="cart-btn">Add to Cart</button>
                    <button type="submit" name="wishlist" class="wishlist-btn">Add to Wishlist</button> 
                </div>
            </form>
        </div>
    </div>
</body>
</html>
