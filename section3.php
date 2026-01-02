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

    <style>
        
.section3-body{
box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.3);
margin-top: 30px;
text-align: center;
}

.section3-body .section3-h2{
text-decoration: underline;
color: #333;
text-align: center;
font-weight: 700;
margin-top: 40px;
}

.mobile-container {
    padding-top: 5px; 
    padding-bottom: 25px; 
    display: flex; 
    flex-wrap: wrap; 
    justify-content: center; 
}

.mobile-card {
    width: 250px; 
    border: 1px solid #ddd; 
    border-radius: 10px;
    padding: 10px; 
    margin: 10px; 
    box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
    text-align: center; 
    background-color: #fff;
}

.mobile-card img { 
    width: 100%; 
    border-radius: 10px; 
}

.introh2 {
    margin: 5px 0;
    font-size: 1.2rem;
}

.filter {  
    margin-bottom: 20px;
    text-align: end;
    margin-top: 20px;
    margin-right: 40px; 
}

.buutton {  
    display: inline-block;
    padding: 10px 20px;
    font-size: 0.9rem;
    color: white;
    background: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none; 
}

.buutton:hover {
    background: #0056b3; 
}

.labeel{
    margin-right: 10px;
    font-size: 1rem;
    font-weight: 500;
}

.labeel-btn{
    padding: 8px 20px; 
    font-size: 0.9rem;
    text-decoration: none;
    cursor: pointer;
    color: #ddd;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
    font-weight: 700;
    background: #007bff;
}

.label-btn:hover{
    background: #0056b3;
}

.price{
    margin: 10px 0;
    color: red;
    font-size: large;
}
.introtext{
    margin: 10px 0;
    color: #777;
    font-size: 0.9rem;
}

    </style>


    <title> TechFusion - Online Mobile Shopping Website </title>

</head>
<body>


<?php
include 'admiin.php';

// Get selected brand filter
$brand_filter = isset($_GET['brand']) ? $_GET['brand'] : '';

// Fetch mobiles from database
$sql = "SELECT * FROM products";
if ($brand_filter) {
    $sql .= " WHERE brand = '$brand_filter' ";
}
$result = $conn->query($sql);

// Fetch unique brands for filter dropdown
$brand_query = "SELECT DISTINCT brand FROM products";
$brand_result = $conn->query($brand_query);
?>


<div class="section3-body">
    <h2 class="section3-h2">Categories</h2>

    <!-- Brand Filter Dropdown -->
    <form method="GET" class="filter">
        <label for="brand" class="labeel">Filter by Brand:</label>
        <select name="brand" class="labeel" id="brand">
            <option value="">All</option>
            <?php while ($brand = $brand_result->fetch_assoc()) { ?>
                <option value="<?php echo $brand['brand']; ?>" <?php if ($brand_filter == $brand['brand']) echo "selected"; ?>>
                    <?php echo $brand['brand']; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" class="labeel-btn" onclick="window.location.hash = '#brand'; ">Filter</button>
    </form>

    <div class="mobile-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="mobile-card">
                <img src="<?php echo $row['image']; ?>" alt="Mobile Image">
                <h2 class="introh2"><?php echo $row['name']; ?></h2>
                <p class="introtext"><?php echo $row['intro']; ?></p>
                <p class="price"><?php echo $row['price']; ?></p>

                <!-- Buy Now Button -->
                <form action="product.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="buutton" name="detail">Buy Now</button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
