<?php 
include("header.php");
include("connection.php");

if(isset($_GET['id'])){
    $product_id = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['name'];
        $product_image = "../admin/" . $row['image_url'];
        $product_price = $row['price'];
        $product_description = $row['description'];
    }
} 
?>

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
<!-- Replace Static Content with PHP -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                <div class="product-image-container">
                    <div class="product-image">
                        <img src="<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" class="img-fluid main-image">
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title"><?php echo $product_name; ?></h1>

                    <div class="product-price">
                        <h2>PKR <?php echo $product_price; ?></h2>
                    </div>

                    <div class="product-description">
                        <p><?php echo $product_description; ?></p>
                    </div>

                    <div class="product-actions">
                        <div class="action-buttons">
                            <form method="post" action="cart.php" style="flex: 1;">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <button type="submit" name="add_to_cart" class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>
                            <a href="checkout.php?buy=<?php echo $product_id; ?>" class="buy-now-btn">
                                <i class="fas fa-bolt"></i>
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>
