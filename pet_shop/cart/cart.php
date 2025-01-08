<?php
session_start();

// Check if the cart session is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle adding products to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => 1,
            'image_url' => $image_url
        );
    }
}

// Handle removing products from the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'remove') {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
}

// Handle refreshing/clearing the cart
if (isset($_POST['refresh_cart'])) {
    $_SESSION['cart'] = array();
}

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

?>

<?php include('../header/header.php'); ?> <!-- Header Section -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../cart/cart.css">
</head>
<body style="background-color:rgb(244, 183, 0);">

<!-- Funny GIF above the Cart Items -->
<div class="funny-gif">
    <img src="../image/supermarket-mart.gif" alt="Funny Cart Gif">
</div>

<!-- Cart Section -->
<div class="cart-container">
    <h1>Your Cart</h1>

    <!-- Refresh Cart Button -->
    <form method="POST" action="cart.php">
        <button type="submit" name="refresh_cart" class="refresh-btn">Clear Cart</button>
    </form>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <div class="cart-items">
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <div class="cart-item">
                    <!-- Product Image -->
                    <img src="../shop/vendor/img/<?php echo $item['image_url']; ?>" alt="<?php echo $item['product_name']; ?>" class="cart-item-image">
                    
                    <div class="cart-item-details">
                        <h3><?php echo $item['product_name']; ?></h3>
                        <p>Price: ৳<?php echo $item['price']; ?></p>
                        <p>Quantity: <?php echo isset($item['quantity']) ? $item['quantity'] : 1; ?></p>
                        <p>Total: ৳<?php echo $item['price'] * (isset($item['quantity']) ? $item['quantity'] : 1); ?></p>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="action" value="remove">
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-total">
            <h2>Total Price: ৳<?php echo $total_price; ?></h2>
            <!-- Link to Checkout -->
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
