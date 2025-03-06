<?php
include('header.php');
include('connection.php');


require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (!isset($_SESSION['Buyerid'])) {
    echo "<script>alert('Please log in to proceed with checkout'); window.location.href='login.php';</script>";
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h3 class='text-center display-2 bg-light m-5'>Your cart is empty.</h3>";
    include('footer.php');
    exit();
}

$buyer_id = $_SESSION['Buyerid'];

$total_price = 0;
foreach ($_SESSION['cart'] as $id => $quantity) {
    $q = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($con, $q);
    $product = mysqli_fetch_assoc($result);
    if ($product) {
        $subtotal = $product['price'] * $quantity;
        $total_price += $subtotal;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $payment_method = "Cash on Delivery";

    $insert_order = "INSERT INTO orders (user_id, total_price, order_status, payment_method) 
                     VALUES ('$buyer_id', '$total_price', 'Pending', '$payment_method')";
    
    if (mysqli_query($con, $insert_order)) {
        $order_id = mysqli_insert_id($con);

        foreach ($_SESSION['cart'] as $id => $quantity) {
            $q = "SELECT * FROM products WHERE id = $id";
            $result = mysqli_query($con, $q);
            $product = mysqli_fetch_assoc($result);
            if ($product) {
                $price = $product['price'];
                $subtotal = $price * $quantity;
                $insert_item = "INSERT INTO order_items (order_id, product_id, quantity, price, total_price) 
                                VALUES ('$order_id', '$id', '$quantity', '$price', '$subtotal')";
                mysqli_query($con, $insert_item);
            }
        }
        unset($_SESSION['cart']);

       $mail = new PHPMailer(true);
       try {

           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com';
           $mail->SMTPAuth = true;
           $mail->Username = 'graceherris20@gmail.com';  // 
           $mail->Password = 'khzk hsca tmfg hfyw';  // 
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
           $mail->Port = 587;

           // Recipients
           $mail->setFrom('graceherris20@gmail.com', 'Royal Store');
           $mail->addAddress($email, $full_name);

           // Email Content
           $mail->isHTML(true);
           $mail->Subject = "Order Confirmation - Order #$order_id";
           $mail->Body = "
               <h2>Thank You for Your Order!</h2>
               <p>Dear $full_name,</p>
               <p>Your order has been placed successfully. Below are the details:</p>
               <ul>$order_items_list</ul>
               <p><strong>Total Amount:</strong> PKR $total_price</p>
               <p><strong>Delivery Address:</strong> $address, $city, $postal_code</p>
               <p><strong>Payment Method:</strong> $payment_method</p>
               <p>We will notify you once your order is shipped.</p>
               <p>Best Regards,<br>Your Store</p>
           ";

           $mail->send();
       } catch (Exception $e) {
           echo "<script>alert('Order placed, but email could not be sent.');</script>";
       }

       echo "<script>alert('Order placed successfully!'); window.location.href='thankyou.php';</script>";
       exit();
   } else {
       echo "<script>alert('There was an error placing your order. Please try again.'); window.location.href='checkout.php';</script>";
   }
}
?>

<section class="checkout_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="checkout-form-container">
                    <h2 class="section-title">Checkout Details</h2>
                    <form action="" method="post" class="checkout-form" id="checkoutForm" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter your full name" required>
                            <div class="invalid-feedback" id="full_name_error"></div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter your phone number" required>
                            <div class="invalid-feedback" id="phone_error"></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
                            <div class="invalid-feedback" id="email_error"></div>
                        </div>
                        <div class="form-group">
                            <label>Delivery Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter your complete delivery address" required></textarea>
                            <div class="invalid-feedback" id="address_error"></div>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city" required>
                            <div class="invalid-feedback" id="city_error"></div>
                        </div>
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Enter postal code" required>
                            <div class="invalid-feedback" id="postal_code_error"></div>
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
                        <div class="form-group">
                            <h4>Total Amount: <b>PKR <?php echo $total_price; ?></b></h4>
                        </div>
                        <button type="submit" class="btn btn-primary checkout-btn">Place Order</button>
                    </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="order-summary">
                    <h2>Order Summary</h2>
                    <div class="order-items">
                        <?php 
                        foreach ($_SESSION['cart'] as $id => $quantity) {
                            $q = "SELECT * FROM products WHERE id = $id";
                            $result = mysqli_query($con, $q);
                            $product = mysqli_fetch_assoc($result);
                            if ($product) {
                                $price = $product['price'];
                                $subtotal = $price * $quantity;
                        ?>
                                <div class="order-item">
                                    <div class="product-image">
                                        <img src="<?php echo '../admin/uploads/' . basename($product['image_url']); ?>" alt="Product">
                                    </div>
                                    <div class="product-details">
                                        <h4><?php echo $product['name']; ?></h4>
                                        <p class="price">PKR <?php echo $price; ?></p>
                                        <div class="quantity">Quantity: <?php echo $quantity; ?></div>
                                    </div>
                                </div>
                        <?php } } ?>
                    </div>
                    <div class="order-total">
                        <div class="subtotal">
                            <span>Subtotal</span>
                            <span>PKR <?php echo $total_price; ?></span>
                        </div>
                        <div class="delivery">
                            <span>Delivery</span>
                            <span>PKR 100</span>
                        </div>
                        <div class="total">
                            <span>Total</span>
                            <span>PKR <?php echo $total_price + 100; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
function validateForm() {
    let isValid = true;
    
    // Full Name validation
    const fullName = document.getElementById('full_name');
    if (fullName.value.trim().length < 3) {
        showError('full_name', 'Full name must be at least 3 characters long');
        isValid = false;
    } else {
        clearError('full_name');
    }

    // Phone validation
    const phone = document.getElementById('phone');
    const phoneRegex = /^[0-9]{11}$/;
    if (!phoneRegex.test(phone.value.trim())) {
        showError('phone', 'Please enter a valid 11-digit phone number');
        isValid = false;
    } else {
        clearError('phone');
    }

    // Email validation
    const email = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
        showError('email', 'Please enter a valid email address');
        isValid = false;
    } else {
        clearError('email');
    }

    // Address validation
    const address = document.getElementById('address');
    if (address.value.trim().length < 10) {
        showError('address', 'Please enter a complete address (minimum 10 characters)');
        isValid = false;
    } else {
        clearError('address');
    }

    // City validation
    const city = document.getElementById('city');
    if (city.value.trim().length < 3) {
        showError('city', 'City name must be at least 3 characters long');
        isValid = false;
    } else {
        clearError('city');
    }

    // Postal Code validation
    const postalCode = document.getElementById('postal_code');
    const postalRegex = /^[0-9]{5}$/;
    if (!postalRegex.test(postalCode.value.trim())) {
        showError('postal_code', 'Please enter a valid 5-digit postal code');
        isValid = false;
    } else {
        clearError('postal_code');
    }

    return isValid;
}

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + '_error');
    field.classList.add('is-invalid');
    errorDiv.textContent = message;
}

function clearError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.getElementById(fieldId + '_error');
    field.classList.remove('is-invalid');
    errorDiv.textContent = '';
}

// Real-time validation
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('input', function() {
        validateForm();
    });
});
</script>

<style>
.checkout_section {
    padding: 90px 0;
    background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
}

.section-title {
    font-size: 2.5rem;
    color: #2d3748;
    margin-bottom: 1.5rem;
    text-align: center;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.checkout-form-container, .order-summary {
    background: rgba(255, 255, 255, 0.95);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    transition: transform 0.3s ease;
}

.checkout-form-container:hover, .order-summary:hover {
    transform: translateY(-5px);
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
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #f8fafc;
}

.form-control:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
    background-color: #fff;
}

.form-control.is-invalid {
    border-color: #e53e3e;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e53e3e' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e53e3e' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.invalid-feedback {
    display: block;
    color: #e53e3e;
    font-size: 0.875rem;
    margin-top: 0.25rem;
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
    background: linear-gradient(45deg, #4299e1 0%, #667eea 100%);
    border: none;
    padding: 1rem 2rem;
    font-weight: 600;
    width: 100%;
    margin-top: 1.5rem;
    color: white;
    border-radius: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.checkout-btn:hover {
    background: linear-gradient(45deg, #3182ce 0%, #5a67d8 100%);
    transform: translateY(-2px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
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
<?php include('footer.php'); ?>
