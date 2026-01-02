<?php
include ('ownerheader.php');
?>
<?php
include 'admiin.php';


// Handle delete request
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM orders WHERE id = $id");
    header("Location: order_page.php");
    exit();
}

// Fetch orders from database
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <style>
        .tank {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 80%;
            background: white;
            padding: 20px;
            padding-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h2{
            padding-bottom: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .delete {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete:hover {
            background: darkred;
        }
    </style>
</head>
<body style=" background-image: url('PHP assets/bg.gif');">
    <div class="tank">
    <div class="container">
        <h2>Order List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['customer_id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><img src="<?php echo $row['product_image']; ?>" alt="Product Image"></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><a class="delete" href="remove_order.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    </div>
</body>
</html>