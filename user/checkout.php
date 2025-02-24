<?php
include('header.php');
?>

<section class="checkout_section layout_padding">
    <div class="container">
        <div class="row">
            <!-- Left Column - Checkout Details -->
            <div class="col-md-7">
                <div class="checkout-form-container">
                    <h2>Checkout Details</h2>
                    <form action="" method="post" class="checkout-form">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Delivery Address</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="payment-method">
                            <h4>Payment Method</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="cod" checked>
                                <label class="form-check-label" for="cod">
                                    Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>
                       <a href="thankyou.php"><button type="submit" class="btn btn-primary checkout-btn">Place Order</button>
                       </a>
                    </form>
                </div>
            </div>
            
            <!-- Right Column - Order Summary -->
            <div class="col-md-5">
                <div class="order-summary">
                    <h2>Order Summary</h2>
                    <div class="order-items">
                        <!-- Sample Product -->
                        <div class="order-item">
                            <div class="product-image">
                                <img src="images/p-1.png" alt="Product">
                            </div>
                            <div class="product-details">
                                <h4>Gold Ring</h4>
                                <p class="price">₹25,000</p>
                                <div class="quantity">Quantity: 1</div>
                            </div>
                        </div>
                        <!-- Add more products here -->
                    </div>
                    <div class="order-total">
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <span>₹25,000</span>
                        </div>
                        <div class="delivery">
                            <span>Delivery</span>
                            <span>₹100</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>₹25,100</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.checkout_section {
    padding: 90px 0;
    background-color: #f8f9fa;
}

.checkout-form-container, .order-summary {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.checkout-form-container h2, .order-summary h2 {
    color: #333;
    margin-bottom: 30px;
    font-weight: 600;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 8px;
    color: #555;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 12px;
}

.form-control:focus {
    border-color: #f0b23e;
    box-shadow: 0 0 0 0.2rem rgba(240, 178, 62, 0.25);
}

.payment-method {
    margin: 25px 0;
    padding: 20px 0;
    border-top: 1px solid #eee;
}

.payment-method h4 {
    margin-bottom: 15px;
    color: #333;
}

.checkout-btn {
    background-color: #f0b23e;
    border: none;
    padding: 12px 30px;
    font-weight: 600;
    width: 100%;
    margin-top: 20px;
}

.checkout-btn:hover {
    background-color: #e5a832;
}

.order-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.product-image {
    width: 80px;
    margin-right: 15px;
}

.product-image img {
    width: 100%;
    border-radius: 5px;
}

.product-details h4 {
    margin: 0 0 5px;
    color: #333;
    font-size: 16px;
}

.price {
    color: #f0b23e;
    font-weight: 600;
    margin: 5px 0;
}

.quantity {
    color: #666;
    font-size: 14px;
}

.order-total {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #eee;
}

.subtotal, .delivery, .total {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
}

.total {
    font-weight: 600;
    font-size: 18px;
    color: #333;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #eee;
}

@media (max-width: 768px) {
    .checkout_section {
        padding: 50px 0;
    }
    
    .col-md-7, .col-md-5 {
        margin-bottom: 30px;
    }
}
</style>

<?php
include('footer.php');
?>