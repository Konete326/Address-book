<?php
require('header.php');
require('connection.php');

if (!isset($_SESSION['Buyerid'])) {
    echo "<script>alert('Please log in to view your order details'); window.location.href='login.php';</script>";
    exit();
}

$buyer_id = $_SESSION['Buyerid'];
$order_query = "SELECT * FROM orders WHERE user_id = $buyer_id ORDER BY id DESC LIMIT 1";
$order_result = mysqli_query($con, $order_query);

if (mysqli_num_rows($order_result) == 0) {
    echo "<script>window.location.href='index.php';</script>";
    exit();
}

$order = mysqli_fetch_assoc($order_result);
$order_id = $order['id'];
$order_date = date('F d, Y', strtotime($order['created_at']));
$estimated_delivery = date('F d, Y', strtotime($order['created_at'] . ' +5 days'));
$total_price = $order['total_price'];
?>

<div class="thank-you-container">
    <div class="thank-you-box">
        <div class="checkmark-circle">
            <div class="background"></div>
            <div class="checkmark draw"></div>
        </div>
        <h1 class="thank-you-title">Thank You for Your Order!</h1>
        <p class="thank-you-message">Your order has been successfully placed. We'll send you a confirmation email with your order details shortly.</p>
        
        <div class="order-details">
            <h3>Order Details</h3>
            <p>Order Number: #<?php echo $order_id; ?></p>
            <p>Order Date: <?php echo $order_date; ?></p>
            <p>Estimated Delivery: <?php echo $estimated_delivery; ?></p>
            <p>Total Amount: PKR <?php echo $total_price; ?></p>
        </div>
        
        <a href="index.php" class="continue-shopping-btn">Continue Shopping</a>
    </div>
</div>
<style>
.thank-you-container {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
}

.thank-you-box {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 600px;
    width: 100%;
}

.checkmark-circle {
    width: 100px;
    height: 100px;
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin-bottom: 20px;
}

.checkmark-circle .background {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #f0b23e;
    position: absolute;
}

.checkmark-circle .checkmark {
    border-radius: 5px;
}

.checkmark-circle .checkmark.draw:after {
    animation-delay: 100ms;
    animation-duration: 1s;
    animation-timing-function: ease;
    animation-name: checkmark;
    transform: scaleX(-1) rotate(135deg);
    animation-fill-mode: forwards;
}

.checkmark-circle .checkmark:after {
    opacity: 0;
    height: 50px;
    width: 25px;
    transform-origin: left top;
    border-right: 7px solid #fff;
    border-top: 7px solid #fff;
    border-radius: 2px !important;
    content: '';
    left: 35px;
    top: 65px;
    position: absolute;
}

@keyframes checkmark {
    0% {
        height: 0;
        width: 0;
        opacity: 1;
    }
    20% {
        height: 0;
        width: 25px;
        opacity: 1;
    }
    40% {
        height: 50px;
        width: 25px;
        opacity: 1;
    }
    100% {
        height: 50px;
        width: 25px;
        opacity: 1;
    }
}

.thank-you-title {
    color: #333;
    font-size: 32px;
    margin-bottom: 15px;
    font-weight: 600;
}

.thank-you-message {
    color: #666;
    font-size: 18px;
    margin-bottom: 30px;
    line-height: 1.6;
}

.order-details {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.order-details h3 {
    color: #333;
    font-size: 20px;
    margin-bottom: 15px;
}

.continue-shopping-btn {
    display: inline-block;
    background: #f0b23e;
    color: white;
    padding: 12px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 18px;
    transition: all 0.3s ease;
}

.continue-shopping-btn:hover {
    background: #d49c2f;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(240, 178, 62, 0.3);
}
</style>
<?php
require('footer.php');
?>
