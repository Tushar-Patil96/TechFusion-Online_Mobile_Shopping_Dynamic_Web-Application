
<?php
$servername = "localhost";  // XAMPP default
$username = "root";         // Default XAMPP user
$password = "";             // Default password (empty)
$dbname = "fusionshop";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn){
    //echo"Connected Successfully!!";
}
else{
    echo "Connection Failed" .mysqli_connect_error();
}
?>

