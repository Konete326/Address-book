<?php include('header.php'); ?>

<section class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image-container">
                    <div class="product-image">
                        <img src="images/ring-img.jpg" alt="Diamond Ring" class="img-fluid main-image">
                        <div class="image-zoom-lens"></div>
                    </div>
                    <div class="image-thumbnails mt-3">
                        <img src="images/ring-img.jpg" alt="Diamond Ring" class="thumbnail active">
                        <img src="images/i-2.png" alt="Diamond Ring" class="thumbnail">
                        <img src="images/i-3.png" alt="Diamond Ring" class="thumbnail">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <div class="product-details">
                    <span class="category">Luxury Collection</span>
                    <h1 class="product-title">Diamond Engagement Ring</h1>
                    
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(4.5/5)</span>
                    </div>

                    <div class="product-price">
                        <span class="original-price">$1,599.00</span>
                        <h2>$1,299.00</h2>
                        <span class="discount-badge">Save 20%</span>
                    </div>

                    <div class="product-description">
                        <p>Elegant 14K white gold engagement ring featuring a stunning 1-carat round brilliant diamond center stone.</p>
                        <ul class="features-list">
                            <li><i class="fas fa-check"></i> Certified Diamond</li>
                            <li><i class="fas fa-check"></i> Free Sizing</li>
                            <li><i class="fas fa-check"></i> Lifetime Warranty</li>
                        </ul>
                    </div>

                    <div class="product-actions">
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <div class="quantity-controls">
                                <button class="qty-btn minus"><i class="fas fa-minus"></i></button>
                                <input type="number" class="qty-input" value="1" min="1" max="10">
                                <button class="qty-btn plus"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <a href="cart.php"><button class="add-to-cart-btn">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            </a>
                            <a href="checkout.php"><button class="buy-now-btn">
                                <i class="fas fa-bolt"></i>
                                Buy Now
                            </button>
                            </a>
                        </div>
                    </div>

                    <div class="additional-info">
                        <div class="info-item">
                            <i class="fas fa-truck"></i>
                            <span>Free Shipping</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-undo"></i>
                            <span>30-Day Returns</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.product_section {
    padding: 80px 0;
    background: linear-gradient(135deg, #363636 0%, #1a1a1a 100%);
    color: #ffffff;
}

.product-image-container {
    background: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    height: 600px;
}

.product-image {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.2);
}

.main-image {
    max-height: 100%;
    width: auto;
    object-fit: contain;
    transition: transform 0.5s ease;
}

.main-image:hover {
    transform: scale(1.1);
}

.image-thumbnails {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    justify-content: center;
}

.thumbnail {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    background: rgba(255, 255, 255, 0.1);
}

.thumbnail:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.thumbnail.active {
    border: 2px solid #ffd700;
    box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
}

.product-details {
    background: rgba(255, 255, 255, 0.05);
    padding: 40px;
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.category {
    color: #ffd700;
    font-size: 0.9em;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.product-title {
    font-size: 2.5em;
    margin: 15px 0;
    color: #ffffff;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.product-rating {
    color: #ffd700;
    margin: 15px 0;
}

.product-price {
    margin: 25px 0;
    position: relative;
}

.original-price {
    color: #999;
    text-decoration: line-through;
    font-size: 1.2em;
}

.product-price h2 {
    color: #ffd700;
    font-size: 2.5em;
    font-weight: 700;
    margin: 5px 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.discount-badge {
    background: linear-gradient(45deg, #ffd700, #ff9000);
    color: #333;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.9em;
    margin-left: 10px;
    font-weight: bold;
}

.features-list {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.features-list li {
    margin: 12px 0;
    color: #fff;
    display: flex;
    align-items: center;
}

.features-list i {
    color: #ffd700;
    margin-right: 10px;
}

.quantity-selector {
    margin: 25px 0;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-top: 10px;
}

.qty-btn {
    width: 45px;
    height: 45px;
    border: none;
    border-radius: 50%;
    background: linear-gradient(45deg, #ffd700, #ff9000);
    color: #333;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1.2em;
}

.qty-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.qty-input {
    width: 70px;
    height: 45px;
    text-align: center;
    border: 2px solid #ffd700;
    border-radius: 25px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 1.2em;
}

.action-buttons {
    display: flex;
    gap: 20px;
    margin: 30px 0;
}

.add-to-cart-btn, .buy-now-btn {
    flex: 1;
    padding: 15px 30px;
    border: none;
    border-radius: 30px;
    font-size: 1.1em;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.add-to-cart-btn {
    background: linear-gradient(45deg, #ffd700, #ff9000);
    color: #333;
}

.buy-now-btn {
    background: transparent;
    color: #ffd700;
    border: 2px solid #ffd700;
}

.add-to-cart-btn:hover, .buy-now-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.additional-info {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.info-item {
    text-align: center;
    flex: 1;
    padding: 0 15px;
}

.info-item i {
    font-size: 1.8em;
    color: #ffd700;
    margin-bottom: 10px;
}

.info-item span {
    display: block;
    color: #fff;
    font-size: 0.9em;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@media (max-width: 768px) {
    .product-image-container {
        height: auto;
        margin-bottom: 30px;
    }

    .product-image {
        height: 350px;
    }

    .product-title {
        font-size: 2em;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .additional-info {
        flex-direction: column;
        gap: 20px;
    }

    .thumbnail {
        width: 70px;
        height: 70px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls
    const minusBtn = document.querySelector('.minus');
    const plusBtn = document.querySelector('.plus');
    const qtyInput = document.querySelector('.qty-input');

    minusBtn.addEventListener('click', () => {
        let value = parseInt(qtyInput.value);
        if (value > 1) {
            qtyInput.value = value - 1;
        }
    });

    plusBtn.addEventListener('click', () => {
        let value = parseInt(qtyInput.value);
        if (value < 10) {
            qtyInput.value = value + 1;
        }
    });

    // Thumbnail click handling
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.querySelector('.main-image');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.src = thumb.src;
                mainImage.style.opacity = '1';
            }, 300);
        });
    });

    // Add hover effect for buttons
    const buttons = document.querySelectorAll('.add-to-cart-btn, .buy-now-btn');
    buttons.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.style.transform = 'translateY(-3px)';
        });
        button.addEventListener('mouseout', () => {
            button.style.transform = 'translateY(0)';
        });
    });
});
</script>

<?php include('footer.php'); ?>