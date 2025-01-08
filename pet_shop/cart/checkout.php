<?php
session_start();

// If the cart is empty, redirect to the shop page
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: shop.php');
    exit();
}

// Handle the checkout process here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../checkout/checkout.css">
</head>
<body>

<div class="checkout-container">
    <h1>Checkout</h1>

    <p>Thank you for shopping with us! Please fill in your details to complete the order.</p>

    <!-- Checkout Form (Add fields as needed) -->
    <form action="finalize_checkout.php" method="post">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="email" name="email" placeholder="Your Email" required><br><br>
        <input type="text" name="address" placeholder="Your Address" required><br><br>
        <button type="submit" class="submit-btn">Complete Purchase</button>
    </form>
</div>

</body>
</html>
