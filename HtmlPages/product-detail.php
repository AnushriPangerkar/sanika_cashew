<?php 
include('config.php');
include('header.php');

if(isset($_GET['id'])) {

    $id = $_GET['id'];

}
?>

    <div class="container">

    <nav aria-label="breadcrumb" class="pt-4 pb-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="products.php">Product</a></li>
    
  </ol>
</nav>

        <div class="row" >
        <?php
        // Fetch products from the database
        //require_once 'db.php';  // Database connection

        $sql = "SELECT * FROM products where id = ".$id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3">
                <div class="product-card" >
                    <a href="product-detail.php?id='.$row["id"].'"><img src="./pictures/'.$row["pimage"].'" alt="Raw Cashews"></a>
                    <h3>' . $row["name"] . ' - ' . $row["weight"] . '</h3>

                    
                    <p>' . $row["description"] . '</p>
                    

                    <p>Price: ₹' . $row["price"] . '</p>
                    <p>Stock: ' . $row["stock"] . '</p>
                    <input type="number" value="0" min="1" max="' . $row["stock"] . '" id="quantity_' . $row["id"] . '">
                    <button class="add-to-cart-btn" onclick="addToCart(' . $row["id"] . ', ' . $row["price"] . ')">Add to Cart</button>
                </div></div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
        </div>
    </div>

    <!-- Add a single "Buy Now" button after all products -->
    <div class="buy-now-container">
        <button id="buy-now-button" class="btn btn-primary" style="display:none; background-color: #d96f21;" onclick="buyNow()">Buy Now</button>
    </div>

    <script>
        // Array to track selected products
        let cart = [];

        // Function to add product to cart
        function addToCart(productId, price) {
            let quantity = document.getElementById('quantity_' + productId).value;
            // Check if product is already in the cart
            let productIndex = cart.findIndex(product => product.id === productId);

            if (productIndex === -1) {
                // If product is not in the cart, add it
                cart.push({ id: productId, quantity: quantity, price: price });
            } else {
                // If product is already in the cart, update its quantity
                cart[productIndex].quantity = quantity;
            }

            // Show the "Buy Now" button after adding any product to the cart
            document.getElementById('buy-now-button').style.display = "inline-block";
        }

        // Function to buy now, redirect to order details page with cart details
        function buyNow() {
            // Convert cart array to JSON string to pass via URL
            let cartData = JSON.stringify(cart);
            window.location.href = "orderdetails.php?cart=" + encodeURIComponent(cartData);
        }
    </script>

<?php 
include('footer.php');
?>
