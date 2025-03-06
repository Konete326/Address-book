<?php 
include("header.php");
include("connection.php");

$category_id = 10;

$subcategories_query = "SELECT id, name, image FROM categories WHERE parent_id = $category_id";
$subcategories_result = mysqli_query($con, $subcategories_query);

$subcategories = array();
while ($subcat = mysqli_fetch_assoc($subcategories_result)) {
    $subcategories[] = $subcat;
}

$search_query = "";
$search_result = [];

if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $search_sql = "SELECT * FROM products WHERE name LIKE '%$search_query%' AND category_id IN (SELECT id FROM categories WHERE parent_id = $category_id)";
    $search_result = mysqli_query($con, $search_sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += 1;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
        echo "<script>alert('Product added to cart!'); window.location.href='cosmetics.php';</script>";
    }

    if (isset($_POST['buy_now'])) {
        $product_id = $_POST['product_id'];
        $_SESSION['cart'][$product_id] = 1; 
        echo "<script>window.location.href='checkout.php';</script>";
        exit();
    }
}
?>
<style>
.search-btn {
    background-color: #ff9000;
    padding: 5px;
    padding-left: 13px;
    padding-right: 13px;
}.item_section .item_container .box .img-box img {
    width: 205px;
}
   
@media (max-width: 830px) {
    .price_section h2 {
        font-size: 19px !important;


}
}

.price_section h2 {
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    word-wrap: break-word;
    white-space: normal;
    font-size: 28px;
    font-weight: 700;
    max-width: 100%;
    padding: 10px;
    overflow-wrap: break-word;
    line-height: 1.4;
}

@media (max-width: 768px) {
    .price_section h2 {
        font-size: 22px;
    }
}

@media (max-width: 576px) {
    .price_section h2 {
        font-size: 18px;
    }
}
@media (max-width: 991px) {
    .price_section h2 .word, .price_section h2 .superscript {
    display: flex;
    background: linear-gradient(135deg, #ffd700, #ff9000);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    flex-direction: column;
}
}

.no-products-message {
    text-align: center;
    max-width: 90%;
    margin: auto;
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.4;
}

@media (max-width: 768px) {
    .no-products-message {
        font-size: 18px;
        padding: 10px;
    }
}

@media (max-width: 576px) {
    .no-products-message {
        font-size: 16px;
    }
}

</style>
<div class="container mt-4">
    <form method="POST" action="">
        <div class="input-group mb-3">
            <input type="text" name="search_query" class="form-control" placeholder="Search for a product..." value="<?php echo htmlspecialchars($search_query); ?>">
            <div class="input-group-append">
                <button class="btn  search-btn " type="submit" name="search">Search</button>
            </div>
        </div>
    </form>
</div>

<?php if (!empty($search_query)) { ?>
    <section class="price_section layout_padding">
        <div class="container">
        <h2 class="text-center"><span class="word">Search Results for <span class="superscript">" <?php echo $search_query;?> "</span></span></h2>
            <div class="price_container">
                <?php 
                if (mysqli_num_rows($search_result) > 0) {
                    while ($row = mysqli_fetch_assoc($search_result)) { 
                        $product_id = $row['id'];
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $product_image = "../admin/" . $row['image_url'];
                ?>
                        <div class="box">
                            <div class="name"><h6><?php echo $product_name; ?></h6></div>
                            <div class="img-box">
                                <a href="product.php?id=<?php echo $product_id; ?>">
                                    <img src="<?php echo $product_image; ?>" alt="Product Image">
                                </a>
                            </div>
                            <div class="detail-box">
                                <h5>PKR <span><?php echo $product_price; ?></span></h5>
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-dark rounded-pill">Add to Cart</button>
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="buy_now" class="btn btn-danger rounded-pill">Buy Now</button>
                                </form>
                            </div>
                        </div>
                <?php } } else { ?>
                    
                    <p class="no-products-message">No products found for " <?php echo $search_query; ?> "</span></p>
                
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<!-- Subcategory Display -->
<div class="item_section layout_padding2">
    <div class="container">
        <div class="item_container">
            <?php 
            foreach ($subcategories as $sub) { 
                $sub_name = $sub['name'];
                $sub_image = !empty($sub['image']) ? "../admin/" . $sub['image'] : "images/default.png"; 
            ?>
                <a href="#<?php echo $sub_name; ?>" class="catogries">
                    <div class="box">
                        <div class="price"><h6>Best PRICE</h6></div>
                        <div class="img-box"><img src="<?php echo $sub_image; ?>" alt="<?php echo $sub_name; ?>"></div>
                        <div class="name"><h5><?php echo $sub_name; ?></h5></div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Product Sections -->
<?php 
foreach ($subcategories as $sub) { 
    $subcat_id = $sub['id'];
    $sub_name = $sub['name'];

    $product_query = "SELECT * FROM products WHERE category_id = $subcat_id";
    $product_result = mysqli_query($con, $product_query);
    
    if (mysqli_num_rows($product_result) > 0) { 
?>
        <section class="price_section layout_padding" id="<?php echo $sub_name; ?>">
            <div class="container">
                <h2><span class="word">Our <span class="superscript"><?php echo $sub_name; ?></span></span></h2>
                <div class="price_container">
                    <?php 
                    while ($row = mysqli_fetch_assoc($product_result)) { 
                        $product_id = $row['id'];
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $product_image = "../admin/" . $row['image_url'];
                    ?>
                        <div class="box">
                            <div class="name"><h6><?php echo $product_name; ?></h6></div>
                            <div class="img-box">
                                <a href="product.php?id=<?php echo $product_id; ?>">
                                    <img src="<?php echo $product_image; ?>" alt="Product Image">
                                </a>
                            </div>
                            <div class="detail-box">
                                <h5>PKR <span><?php echo $product_price; ?></span></h5>
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-dark rounded-pill">Add to Cart</button>
                                </form>
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit" name="buy_now" class="btn btn-danger rounded-pill">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } 
} ?>
<style>
    @media (max-width: 992px) {
    .price_section .price_container .box {
        height: 510px;
    }
}
    .hero_area {
    height: auto;
    position: relative;
    background-image: url(images/hero-bg.png);
    background-size: cover;
    background-position: top right;
    background-repeat: no-repeat;
    z-index: 1;
}
    .item_section {
        padding: 40px 0;
        background: #f8f9fa;
    }
    .item_container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 20px 0;
    }
    .catogries {
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease;
    }
    .catogries:hover {
        transform: translateY(-5px);
    }
    .catogries .box {
        background: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .price_section .price_container .box {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .price_section .price_container .box:hover {
        transform: translateY(-5px);
    }
    .price_section .price_container .box h6 {
        font-weight: bold;
        font-size: 18px;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    .price_section .price_container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        padding: 20px 0;
    }
    .img-box img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin: 15px 0;
    }
    .detail-box {
        padding: 15px 0;
    }
    .detail-box h5 {
        color: #2c3e50;
        font-size: 24px;
        margin-bottom: 20px;
    }
    .detail-box form {
        margin: 12px 0;
    }
    .detail-box .btn {
        width: 100%;
        padding: 12px 25px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 25px;
    }
    .detail-box .btn-dark {
        background-color: #2c3e50;
        border: 2px solid #2c3e50;
    }
    .detail-box .btn-dark:hover {
        background-color: transparent;
        color: #2c3e50;
        transform: translateY(-2px);
    }
    .detail-box .btn-danger {
        background-color: #e74c3c;
        border: 2px solid #e74c3c;
    }
    .detail-box .btn-danger:hover {
        background-color: transparent;
        color: #e74c3c;
        transform: translateY(-2px);
    }
    .price_section h2 {
        text-align: center;
        margin-bottom: 40px;
        color: #2c3e50;
        font-size: 36px;
        font-weight: 700;
    }
    .price_section h2 .superscript {
        color: #e74c3c;
    }
    .name h5 {
        margin: 10px 0;
        color: #2c3e50;
        font-weight: 600;
    }
    .price h6 {
        display: inline-block;
        background: #e74c3c;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
    }
</style>
<?php include("footer.php"); ?>
