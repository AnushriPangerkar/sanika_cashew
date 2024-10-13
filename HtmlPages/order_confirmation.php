<?php 
include('config.php');
include('header.php');

?>

<?php
// Include database connection file
require_once 'db.php';

// Start session
session_start();

// Check if data is passed from the order details page
if (isset($_POST['customer_name']) && isset($_POST['customer_address']) && isset($_POST['delivery_date']) && isset($_POST['cart'])) {
    
    // Retrieve customer and order details
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $delivery_date = $_POST['delivery_date'];
    $cart = json_decode($_POST['cart'], true);  // Cart data
    $total_amount = $_POST['total_amount'];

    // Insert order into the `orders` table
    foreach ($cart as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];

        // Insert order into the database
        $sql_order = "INSERT INTO orders (product_id, quantity, order_date, delivery_date, customer_name, customer_address, total_price) 
                      VALUES ($product_id, $quantity, CURDATE(), '$delivery_date', '$customer_name', '$customer_address', $total_amount)";
        $conn->query($sql_order);

        // Reduce product stock accordingly
        $sql_update_stock = "UPDATE products SET stock = stock - $quantity WHERE id = $product_id";
        $conn->query($sql_update_stock);
    }

} else {
    die("Order data is missing.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="confirmation-container">
        <h1>Order Confirmation</h1>
        <p>Thank you for your purchase, <?php echo $customer_name; ?>!</p>

        <div class="order-summary">
            <h3>Order Summary</h3>

            <table>
                <div class="table-container">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <?php
                        // Fetch product name and price from the database
                        $sql_product = "SELECT name, price FROM products WHERE id = " . $item['id'];
                        $result = $conn->query($sql_product);
                        $product = $result->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>₹<?php echo number_format($product['price'], 2); ?></td>
                            <td>₹<?php echo number_format($item['quantity'] * $product['price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Grand Total: ₹<?php echo number_format($total_amount, 2); ?></h3>
            <p><strong>Delivery Date:</strong> <?php echo $delivery_date; ?></p>
            <p><strong>Delivery Address:</strong> <?php echo $customer_address; ?></p>
        </div>
        
        <a href="index.php" class="btn">Back to Home</a>
    </div>

</body>
</html>

<?php 
include('footer.php');
?>