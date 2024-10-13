<?php 
include('config.php');
include('header.php');

?>

<?php
// Include database connection file
require_once 'db.php';

// Start session to track user order
session_start();

// Check if cart data is available in the URL
if (isset($_GET['cart'])) {
    // Decode the cart data from JSON
    $cart = json_decode(urldecode($_GET['cart']), true);

    $total_amount = 0;
    $products_ordered = [];

    // Loop through each product in the cart
    foreach ($cart as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];

        // Fetch product details (name and price) from the database
        $sql_product = "SELECT name, price FROM products WHERE id = $product_id";
        $result = $conn->query($sql_product);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $products_ordered[] = [
                'name' => $product['name'],
                'quantity' => $quantity,
                'price' => $product['price'],
                'total_price' => $quantity * $product['price']
            ];

            // Calculate total amount
            $total_amount += $quantity * $product['price'];
        }
    }

} else {
    die("No cart data found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="order-summary">
        <h1>Order Details</h1>

        <?php if (!empty($products_ordered)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products_ordered as $product): ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>₹<?php echo number_format($product['price'], 2); ?></td>
                            <td>₹<?php echo number_format($product['total_price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Grand Total: ₹<?php echo number_format($total_amount, 2); ?></h3>

            <!-- Collect customer details in a form -->
            <form action="order_confirmation.php" method="POST">
                <h2>Customer Details</h2><br>
                <label for="customer_name">Name:</label>
                <input type="text" id="customer_name" name="customer_name" required><br><br>

                <label for="customer_address">Address:</label>
                <textarea id="customer_address" name="customer_address" required></textarea><br><br>

                <label for="delivery_date">Delivery Date:</label>
                <input type="date" id="delivery_date" name="delivery_date" required><br><br>

                <!-- Pass the cart data to the confirmation page -->
                <input type="hidden" name="cart" value='<?php echo json_encode($cart); ?>'>
                <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">

                <!-- Submit button to confirm the order -->
                <button type="submit">Confirm Order</button>
            </form>

        <?php else: ?>
            <p>No products found in the cart.</p>
        <?php endif; ?>

    </div>

</body>
</html>

<?php 
include('footer.php');
?>