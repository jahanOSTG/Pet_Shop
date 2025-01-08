<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "petbondhu"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the petbondhu_shop table
$sql = "SELECT id, product_name, price, image_url, pet_category, product_type, min_age, max_age FROM petbondhu_shop";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping History</title>
    <link rel="stylesheet" href="shop_history.css"> <!-- Link to external CSS -->
</head>
<body>
<?php include('../header/header.php'); ?> <!-- Header Section -->

<div class="shopping-history">
    <h1>Your Shopping History</h1>
    <div class="product-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Build the full image path
                $image_path = "../shop/vendor/img/" . $row['image_url'];
                
                echo "
                <div class='card'>
                    <img src='" . htmlspecialchars($image_path) . "' class='card-img-top' alt='" . htmlspecialchars($row['product_name']) . "'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . htmlspecialchars($row['product_name']) . "</h5>
                        <p class='card-text'>Price: ৳" . htmlspecialchars($row['price']) . "</p>
                        <p class='card-text'>Category: " . htmlspecialchars($row['pet_category']) . "</p>
                        <p class='card-text'>Type: " . htmlspecialchars($row['product_type']) . "</p>
                        <p class='card-text'>Age Suitability: " . htmlspecialchars($row['min_age']) . " to " . htmlspecialchars($row['max_age']) . " years</p>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found in your shopping history.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
