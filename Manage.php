<?php
include('ownerheader.php');
?>
<?php
include 'admiin.php';




// Handle Deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM products WHERE id = $id";
    $conn->query($delete_query);
    header("Location: Manage.php"); // Refresh page after deletion
}

// Handle Addition
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $intro = $_POST['intro'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Store image URL or path

    $insert_query = "INSERT INTO products (brand, intro, name, price, image) VALUES ('$brand', '$intro', '$name', '$price', '$image')";
    $conn->query($insert_query);
    header("Location: Manage.php"); // Refresh page after insertion
}

// Fetch all mobiles
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Mobiles</title>
    <style>
        .manage-body { font-family: Arial, sans-serif; text-align: center; background-color: #f5f5f5; }
        .manage-container { width: 80%; margin: auto; background: #fff;  padding-top: 180px  !important; padding: 20px; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: #28a745; color: white; }
        .manage-form { display: flex; justify-content: center; margin-top: 20px; gap: 10px; }
        .form-input, select, .add-btn { padding: 8px; border: 1px solid #ddd; border-radius: 5px; }
        .button { background-color: #dc3545; color: white; border: none; padding: 8px 12px; cursor: pointer; text-decoration: none; border-radius: 7px;}
        .button:hover { background-color: #c82333; }
    </style>
</head>
<body>
<div class="manage-body">
    <div class="manage-container" >
        <h2>Manage Mobiles</h2>

        <!-- Add Mobile Form -->
        <form class="manage-form" method="POST">
            <input class="form-input" type="text" name="brand" placeholder="Brand" required>
            <input class="form-input" type="text" name="intro" placeholder="Intro" required>
            <input class="form-input" type="text" name="name" placeholder="Name" required>
            <input class="form-input" type="text" name="price" placeholder="Price" step="0.01" required>
            <input class="form-input" type="text" name="image" placeholder="Image URL" required>
            <button class="add-btn" type="submit" style="background: #007bff; color:#fff">Add Mobile</button>
        </form>

        <!-- Mobile List Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Intro</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['intro']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" width="50"></td>
                    <td>
                        <a href="manage.php?delete=<?php echo $row['id']; ?>" class="button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
