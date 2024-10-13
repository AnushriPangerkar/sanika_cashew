document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productCard = this.parentElement;
            const productName = productCard.querySelector('h3').textContent;
            const productWeight = productCard.querySelector('.product-weight').value;
            const quantity = productCard.querySelector('.quantity-input').value;

            // Add the selected product details to the cart (you can store it in localStorage or a cart array)
            console.log(`Added to cart: ${productName}, Weight: ${productWeight}, Quantity: ${quantity}`);
            
            // You can then proceed to call the backend to store in the database
            // or handle any other cart functionality.
        });
    });
});
