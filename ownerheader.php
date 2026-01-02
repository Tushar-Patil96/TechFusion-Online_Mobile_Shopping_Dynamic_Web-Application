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
    <link rel="stylesheet" href="PHP assets/style.css">
    <title> TechFusion - Online Mobile Shopping Website </title>

</head>
<body>

<!--First Portion-->

    <header class="head">
        <a href="login.php">Login</a>
        <a href="Signup.php">Signup</a>
        <a href="admin_Account.php">Account</a>
        <a href="Manage.php">Manage</a>
        <a href="orders.php">Orders</a>
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
                        <li class="home"><a href="owner.php">Home</a></li>
                        <li class="hotdeals"><a href="owner.php#carousel-body">Hot Deals</a></li>
                        <li class="new"><a href="owner.php#mob-body" >New Phones</a></li>
                        <li class="categories"><a href="owner.php#brand-body">Categories</a></li>
                        <li class="accesories"><a href="owner.php#wrapper-body">Accesories</a></li>
                        <li><div class="wish">
                            <i onclick="window.location='wishlist.php';" class="fa-regular fa-heart"></i></div>
                        </li>
                        <li> <div class="cart">
                            <i onclick="window.location='cart.php';" class="fa-solid fa-cart-shopping"></i></div>
                    </li>
                    </ul>
            
            </div>    
        </div>

</body>
</html>