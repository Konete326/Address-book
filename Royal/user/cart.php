<?php
include('header.php');
include('connection.php');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    echo "<script>window.location.href='cart.php';</script>";
}

if (isset($_POST['update'])) {
    $id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if ($quantity < 1) {
        $quantity = 1;
    }
    $_SESSION['cart'][$id] = $quantity;
    echo "<script>window.location.href='cart.php';</script>";
}

if (isset($_POST['remove'])) {
    $id = $_POST['remove_id'];
    unset($_SESSION['cart'][$id]);
    echo "<script>window.location.href='cart.php';</script>";
}

$cart_items = $_SESSION['cart'];
$total_price = 0;
?>

<section class="cart_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Shopping Cart</h2>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="cart-items-container">
          <?php 
          if ($cart_items) { 
            foreach ($cart_items as $id => $quantity) {
              $q = "SELECT * FROM products WHERE id = $id";
              $result = mysqli_query($con, $q);
              $product = mysqli_fetch_assoc($result);

              if ($product) {
                $price = $product['price'];
                $subtotal = $price * $quantity;
                $total_price += $subtotal;
          ?>
                <div class="cart-item">
                  <div class="row align-items-center">
                    <div class="col-md-2">
                      <img src="<?php echo '../admin/uploads/' . basename($product['image_url']); ?>" alt="Product" class="img-fluid rounded">
                    </div>
                    <div class="col-md-4">
                      <h5><?php echo $product['name']; ?></h5>
                    </div>
                    <div class="col-md-2">
                      <span class="price">PKR <?php echo $price; ?></span>
                    </div>
                    <div class="col-md-2">
                      <form method="post">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <input type="number" name="quantity" class="form-control quantity-input" value="<?php echo $quantity; ?>" min="1">
                        <button type="submit" name="update" class="btn btn-sm btn-primary mt-1">Update</button>
                      </form>
                    </div>
                    <div class="col-md-2 text-end">
                      <form method="post">
                        <input type="hidden" name="remove_id" value="<?php echo $id; ?>">
                        <button type="submit" name="remove" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</button>
                      </form>
                    </div>
                  </div>
                </div>
          <?php } } } else { ?>
            <p class="text-center">Your cart is empty.</p>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cart-summary">
          <h4>Cart Summary</h4>
          <div class="summary-item d-flex justify-content-between">
            <span>Subtotal:</span>
            <span>PKR <?php echo $total_price; ?></span>
          </div>
          <div class="summary-item d-flex justify-content-between">
            <span>Tax (10%):</span>
            <span>PKR <?php echo $total_price * 0.10; ?></span>
          </div>
          <hr>
          <div class="summary-item d-flex justify-content-between">
            <strong>Total:</strong>
            <strong>PKR <?php echo $total_price * 1.10; ?></strong>
          </div>
          <a href="checkout.php" class="btn btn-primary w-100 mt-3">Proceed to Checkout</a>
          <a href="jewellery.php" class="btn btn-outline-secondary w-100 mt-2">Continue Shopping</a>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.cart_section {
  padding: 90px 0;
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.cart-items-container {
  background: rgba(255, 255, 255, 0.95);
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.cart-item {
  padding: 20px 0;
  border-bottom: 1px solid rgba(238, 238, 238, 0.5);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.cart-item:hover {
  transform: translateY(-2px);
  background: rgba(255, 255, 255, 0.5);
}

.cart-item:last-child {
  border-bottom: none;
}

.cart-item img {
  max-width: 100px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
}

.cart-item img:hover {
  transform: scale(1.05);
}

.quantity-selector {
  display: flex;
  align-items: center;
  gap: 8px;
}

.quantity-input {
  width: 70px;
  text-align: center;
  border: 2px solid #eee;
  border-radius: 8px;
  padding: 8px;
  transition: all 0.3s ease;
}

.quantity-input:focus {
  border-color: #f0b23e;
  box-shadow: 0 0 0 2px rgba(240, 178, 62, 0.2);
  outline: none;
}

.cart-summary {
  background: rgba(255, 255, 255, 0.95);
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(10px);
  position: sticky;
  top: 20px;
}

.summary-item {
  margin: 15px 0;
  color: #555;
  font-size: 1.1em;
}

.btn-primary {
  background: linear-gradient(45deg, #f0b23e 0%, #f5c162 100%);
  border: none;
  padding: 12px 25px;
  border-radius: 10px;
  font-weight: 600;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background: linear-gradient(45deg, #e5a736 0%, #edb654 100%);
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(240, 178, 62, 0.3);
}

.btn-outline-secondary {
  border: 2px solid #6c757d;
  padding: 12px 25px;
  border-radius: 10px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-outline-secondary:hover {
  background: #6c757d;
  color: white;
  transform: translateY(-2px);
}

.price {
  color: #f0b23e;
  font-weight: bold;
  font-size: 1.2em;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
}

.btn-danger {
  background: linear-gradient(45deg, #dc3545 0%, #e35d6a 100%);
  border: none;
  padding: 8px 15px;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background: linear-gradient(45deg, #c82333 0%, #dc3545 100%);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
}

@media (max-width: 768px) {
  .cart-items-container,
  .cart-summary {
    margin-bottom: 20px;
    padding: 15px;
  }
  
  .cart-item img {
    max-width: 80px;
  }
  
  .quantity-input {
    width: 60px;
  }
  
  .btn-primary,
  .btn-outline-secondary {
    padding: 10px 20px;
  }
}
</style>
<?php include('footer.php'); ?>
