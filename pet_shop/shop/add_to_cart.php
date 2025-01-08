<?php
session_start();

// For testing, hardcode user_id temporarily if not logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Set a dummy user ID for testing
}
$user_id = $_SESSION['user_id'];
// Database connection
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "petbondhu"; // Your database name

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Assuming you have a session with the user_id stored
session_start();
$user_id = $_SESSION['user_id']; // User ID should be set when the user logs in

// Fetch product details from the form
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$product_id = $_POST['product_id'];

// Check if the product is already in the cart
$query = "SELECT * FROM petbondhu_cart WHERE user_id = ? AND product_name = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("is", $user_id, $product_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Product is already in the cart, update quantity
    $update_query = "UPDATE petbondhu_cart SET quantity = quantity + 1 WHERE user_id = ? AND product_name = ?";
    $stmt = $mysqli->prepare($update_query);
    $stmt->bind_param("is", $user_id, $product_name);
    $stmt->execute();
} else {
    // Product not in the cart, insert new entry
    $insert_query = "INSERT INTO petbondhu_cart (user_id, product_name, price, quantity) VALUES (?, ?, ?, 1)";
    $stmt = $mysqli->prepare($insert_query);
    $stmt->bind_param("isdi", $user_id, $product_name, $price);
    $stmt->execute();
}

// Redirect to the cart page to see the updated cart
header("Location: cart.php");
exit;

?>
