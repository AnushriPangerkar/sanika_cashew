<?php
session_start();
require_once 'db.php'; // Database connection

// Get product ID and quantity from AJAX
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// If cart session doesn't exist, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the product is already in the cart, if so, update the quantity
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
} else {
    // Add new product to cart
    $_SESSION['cart'][$product_id] = [
        'product_id' => $product_id,
        'quantity' => $quantity,
        'price' => $price
    ];
}

echo "Product added to cart.";
?>
