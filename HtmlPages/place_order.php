<?php
session_start();
require_once 'db.php'; // Database connection

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$delivery_date = $_POST['delivery_date'];

// Update product stock in the database
$sql_update_stock = "UPDATE products SET stock = stock - ? WHERE id = ?";
$stmt = $conn->prepare($sql_update_stock);
$stmt->bind_param("ii", $quantity, $product_id);
$stmt->execute();

// Insert the order into the `orders` table
$sql_insert_order = "INSERT INTO orders (product_id, quantity, order_date, delivery_date) VALUES (?, ?, NOW(), ?)";
$stmt_order = $conn->prepare($sql_insert_order);
$stmt_order->bind_param("iis", $product_id, $quantity, $delivery_date);
$stmt_order->execute();

// Clear the product from the session cart
unset($_SESSION['cart'][$product_id]);

// Redirect to an order confirmation page
header('Location: order_confirmation.php');
?>
