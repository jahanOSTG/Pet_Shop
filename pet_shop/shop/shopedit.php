<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petbondhu";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle form submissions (Add, Modify, Delete)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle "Add Product"
    if (isset($_POST['add_product'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        // File upload handling
        $target_dir = "vendor/img/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image_name = basename($_FILES["image_url"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            $image_url = $image_name;
        } else {
            echo "Failed to upload image.";
            exit;
        }

        $stmt = $mysqli->prepare("INSERT INTO petbondhu_shop (id, product_name, price, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isds", $id, $product_name, $price, $image_url);
        $stmt->execute();
        echo "Product added successfully!";
    }

    // Handle "Modify Product"
    if (isset($_POST['modify_product'])) {
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        $stmt = $mysqli->prepare("UPDATE petbondhu_shop SET product_name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $product_name, $price, $id);
        $stmt->execute();
        echo "Product updated successfully!";
    }

    // Handle "Delete Product"
    if (isset($_POST['delete_product'])) {
        $id = $_POST['id'];
        $stmt = $mysqli->prepare("DELETE FROM petbondhu_shop WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "Product deleted successfully!";
    }
}

// Fetch all products for display
$result = $mysqli->query("SELECT * FROM petbondhu_shop");
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Shop</title>
    <link rel="stylesheet" href="shop.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../image/shopbg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1, h2 {
            color: azure;
            background-color: orange;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            margin: 20px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        h1:hover, h2:hover {
            background-color: #ff9800;
            transform: scale(1.02);
        }

        .form-card, .product-section {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            margin: 10px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            transition: all 0.5s ease;
        }

        form label, form input, form button {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        form input, form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: orange;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #ff9800;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        th {
            background-color: orange;
            color: white;
        }

        img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Products</h1>

        <!-- Add Product Section -->
        <h2 onclick="toggleSection('add')">Add New Product</h2>
        <div class="form-card product-section" id="add">
            <form action="shopedit.php" method="POST" enctype="multipart/form-data">
                <label>Product ID:</label>
                <input type="number" name="id" required>
                <label>Product Name:</label>
                <input type="text" name="product_name" required>
                <label>Price:</label>
                <input type="number" step="0.01" name="price" required>
                <label>Image:</label>
                <input type="file" name="image_url" accept="image/*" required>
                <button type="submit" name="add_product">Add Product</button>
            </form>
        </div>

        <!-- Modify Product Section -->
        <h2 onclick="toggleSection('modify')">Modify Product</h2>
        <div class="form-card product-section" id="modify">
            <form action="shopedit.php" method="POST">
                <label>Product ID (to modify):</label>
                <input type="number" name="id" required>
                <label>New Product Name:</label>
                <input type="text" name="product_name" required>
                <label>New Price:</label>
                <input type="number" step="0.01" name="price" required>
                <button type="submit" name="modify_product">Modify Product</button>
            </form>
        </div>

        <!-- Delete Product Section -->
        <h2 onclick="toggleSection('delete')">Delete Product</h2>
        <div class="form-card product-section" id="delete">
            <form action="shopedit.php" method="POST">
                <label>Product ID (to delete):</label>
                <input type="number" name="id" required>
                <button type="submit" name="delete_product">Delete Product</button>
            </form>
        </div>

        <!-- Current Products Section -->
        <h2 onclick="toggleSection('current')">Current Products</h2>
        <div class="product-section" id="current">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td>৳<?php echo $row['price']; ?></td>
                    <td><img src="vendor/img/<?php echo $row['image_url']; ?>" alt="Product Image"></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script>
        function toggleSection(id) {
            var section = document.getElementById(id);
            if (section.style.display === "none" || section.style.display === "") {
                section.style.display = "block";
            } else {
                section.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
$mysqli->close();
?>
