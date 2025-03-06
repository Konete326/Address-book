<?php 
session_start();

include('connection.php');

$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$user_logged_in = isset($_SESSION['Buyername']);
?>
<!DOCTYPE html>
<html>

<head>
 <!-- Basic -->
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <meta name="keywords" content="" />
 <meta name="description" content="" />
 <meta name="author" content="" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/style.css" rel="stylesheet" />
 <link href="css/responsive.css" rel="stylesheet" />
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="hero_area">
    <!-- Header section starts -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="">
            <span>Royal</span>
          </a>
          
          <!-- Mobile Cart Icon -->
          <div class="quote_btn-container d-lg-none">
            <a href="cart.php" class="cart_icon">
              <img src="images/cart.png" alt="Cart">
              <span class="cart_number"><?php echo $cart_count; ?></span>
            </a>
          </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
          </button>

          <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="index.php">Home</a>
                </li>

                <!-- ✅ FIXED: Dropdown for Categories -->
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <li><a class="dropdown-item" href="jewellery.php">Jewellery</a></li>
                    <li><a class="dropdown-item" href="cosmetics.php">Cosmetics</a></li>
                  </ul>
                </li>

                <li class="nav-item <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>

                <?php if (!$user_logged_in) { ?>
                  <li class="nav-item <?php echo ($current_page == 'login.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item <?php echo ($current_page == 'register.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="register.php">Sign Up</a>
                  </li>
                <?php } else { ?>
                  <li class="nav-item <?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                <?php } ?>
              </ul>
            </div>

            <!-- Desktop Cart Icon -->
            <div class="quote_btn-container d-none d-lg-block">
              <a href="cart.php" class="cart_icon">
                <img src="images/cart.png" alt="Cart">
                <span class="cart_number"><?php echo $cart_count; ?></span>
              </a>
            </div>

          </div>

        </nav>
        
      </div>
      
    </header>
    <!-- End header section -->
</div>
<style>
  .slider_section {
    background-color: #363636;
    color: #ffffff;
}

.detail_box h1, .detail_box h2, .detail_box span {
    color: #ffffff;
}

.detail_box p {
    color: #e0e0e0;
}

.detail_box a {
    background: linear-gradient(to right, #ffd277, #77530a);
    color: #363636;
    padding: 10px 25px;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.detail_box a:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 210, 119, 0.3);
}

body {
    background-color: #363636;
    
   
}

.about_section {
    background-color: #363636;
    color: #ffffff;
}

.price_section {
    background-color: #363636;
    color: #ffffff;
}

.ring_section {
    background-color: #363636;
    color: #ffffff;
}

.client_section {
    background-color: #2a2a2a;
    color: #ffffff;
}

.contact_section {
    background-color: #363636;
    color: #ffffff;
}

.box {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.price_btn, .contact_section button {
    background: linear-gradient(to right, #ffd277, #77530a);
    color: #363636;
    padding: 10px 25px;
    border-radius: 25px;
    border: none;
    transition: all 0.3s ease;
}

.price_btn:hover, .contact_section button:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 210, 119, 0.3);
}

.contact_section input {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #ffffff;
}

.contact_section input::placeholder {
    color: #a0a0a0;
}

.heading_container h2, .secondary_heading {
    color: #ffd277;
}
    .catogries{
      cursor: pointer;
      text-decoration: none;
      color:black;
    }
    


@keyframes wave {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@keyframes glowing {
  0% { box-shadow: 0 0 5px #ffd700; }
  50% { box-shadow: 0 0 20px #ff9000; }
  100% { box-shadow: 0 0 5px #ffd700; }
}

@keyframes shine {
  0% { background-position: -100% 50%; }
  100% { background-position: 200% 50%; }
}

.price_container .box {
    position: relative;
    background: white;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    overflow: hidden; /* Ensure content doesn't overflow */
    transition: transform 0.5s, box-shadow 0.5s; /* Smooth transition */
}

.price_container .box:hover {
    transform: translateY(-20px) rotateX(10deg) rotateY(-10deg);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.price_container .box .detail-box {
    padding: 15px;
    position: relative; /* Ensure positioning context for buttons */
    z-index: 2; /* Bring detail box above other elements */
}

.price_container .box .detail-box a {
    display: inline-block; /* Ensure buttons are inline-block */
    padding: 12px 30px;
    background: linear-gradient(90deg, #ffd700, #ff9000);
    color: #333; /* Ensure text is visible */
    border-radius: 25px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    margin: 5px 0; /* Add margin for spacing */
    text-decoration: none; /* Remove underline */
    position: relative; /* Ensure positioning context */
    z-index: 3; /* Bring buttons above other elements */
}

.price_container .box .detail-box a:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 25px rgba(255, 215, 0, 0.4);
    color: white; /* Change text color on hover */
    background: linear-gradient(90deg, #ff9000, #ffd700);
}
.price_section h2 .word,
.price_section h2 .superscript {
  display: inline-block;
  background: linear-gradient(135deg, #ffd700, #ff9000);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

.price_section h2 .superscript {
  margin-left: 10px;
  animation: typewriter 3s ease-in-out infinite;
}

@media (max-width: 768px) {
  .price_section h2 {
  font-size: 2.0rem;
  font-weight: 900;
  text-align: center;
  margin: 2rem 0;
  position: relative;
  padding: 20px 0;
  white-space: nowrap;
  display: flex;
  justify-content: center;
  align-items: baseline;
}

.price_section h2 .word,
.price_section h2 .superscript {
  display: inline-block;
  background: linear-gradient(135deg, #ffd700, #ff9000);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

.price_section h2 .superscript {
  margin-left: 10px;
  animation: typewriter 3s ease-in-out infinite;
}
}
.item_container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
  padding: 50px 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.item_container .box {
  position: relative;
  height: 400px;
  background: linear-gradient(145deg, #ffffff, #f3f3f3);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(255, 215, 0, 0.15);
  transition: all 0.4s ease;
}

.item_container .box::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(45deg, rgba(255,215,0,0.1), rgba(255,144,0,0.1));
  opacity: 1;
}

.item_container .box .price {
  position: absolute;
  top: 15px;
  right: 15px;
  z-index: 2;
  opacity: 1;
}

.item_container .box .price h6 {
  background: linear-gradient(135deg, #ffd700, #ff9000);
  padding: 8px 15px;
  border-radius: 15px;
  color: white;
  font-size: 14px;
  font-weight: 600;
  box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
  animation: float 3s ease-in-out infinite;
}

.item_container .box .img-box {
  position: relative;
  height: 70%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  padding: 20px;
}

.item_container .box .img-box img {
  max-width: 85%;
  max-height: 85%;
  filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
  animation: floatImage 4s ease-in-out infinite;
}

.item_container .box .name {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  background: linear-gradient(to top, rgba(255,215,0,0.2), transparent);
  z-index: 2;
}

.item_container .box .name h5 {
  color: #333;
  font-size: 26px;
  font-weight: 700;
  text-align: center;
  margin: 0;
  background: linear-gradient(45deg, #b8860b, #ffd700);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: shimmerText 3s linear infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@keyframes floatImage {
  0%, 100% { transform: translateY(0) scale(1); }
  50% { transform: translateY(-10px) scale(1.02); }
}

@keyframes shimmerText {
  0% { background-position: -100%; }
  100% { background-position: 200%; }
}

/* New Hover Effects */
.item_container .box:hover {
  transform: perspective(1000px) rotateX(10deg) rotateY(-10deg);
  box-shadow: 30px 30px 50px rgba(255, 215, 0, 0.3);
}

.item_container .box:hover::before {
  background: linear-gradient(45deg, 
    rgba(255,215,0,0.2), 
    rgba(255,144,0,0.2)
  );
  animation: borderGlow 2s infinite;
}

.item_container .box:hover .img-box img {
  transform: scale(1.1) translateZ(50px);
  filter: brightness(1.2) drop-shadow(0 20px 30px rgba(255, 215, 0, 0.4));
}

@keyframes borderGlow {
  0%, 100% { opacity: 0.5; }
  50% { opacity: 1; }
}

@media (max-width: 992px) {
  .item_container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .item_container {
    grid-template-columns: 1fr;
  }
}
.item_container .box::before {
  content: '';
  position: absolute;
  inset: -2px;
  background: linear-gradient(315deg,
    #ffd700,
    #ff9000,
    #ffd700,
    #ff9000,
    #ffd700,
    #b8860b,
    #ffd700
  );
  background-size: 300% 300%;
  border-radius: 20px;
  animation: animatedBorder 4s linear infinite;
  z-index: 0;
}

.item_container .box::after {
  content: '';
  position: absolute;
  inset: 5px;
  background: white;
  border-radius: 18px;
  z-index: 1;
}

@keyframes animatedBorder {
  0% { background-position: 0% 0%; }
  50% { background-position: 100% 100%; }
  100% { background-position: 0% 0%; }
}

/* Update box hover to not interfere with border animation */
.item_container .box:hover::before {
  animation: animatedBorder 2s linear infinite;
}
.header_section {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
  border: 1px solid rgba(255, 255, 255, 0.18);
  transform-style: preserve-3d;
  perspective: 1000px;
}

.navbar-brand {
  transform-style: preserve-3d;
  transition: transform 0.5s ease;
}

.navbar-brand:hover {
  transform: translateZ(20px);
}

.navbar-brand img {
  max-height: 50px;
  filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.2));
  transform: translateZ(30px);
}

.nav-link {
  position: relative;
  padding: 8px 15px !important;
  color: white !important;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  transition: all 0.3s ease;
  transform-style: preserve-3d;
}

.nav-link:hover {
  transform: translateZ(15px);
  color: #ffd700 !important;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.navbar-brand span {
  font-family: 'Poppins', sans-serif;
  font-size: 30px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1px;
  background: linear-gradient(135deg, #ffd700, #ff9000);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.15);
  transform: translateZ(25px);
}

.nav-item.active .nav-link {
  background: linear-gradient(135deg, #ffd700, #ff9000);
  -webkit-background-clip: text;
  background-clip: text;
  
  font-weight: 700;
  position: relative;
  transform: translateZ(20px);
}

.nav-item.active .nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, #ffd700, #ff9000);
  transform: scaleX(1);
  box-shadow: 0 2px 10px rgba(255, 215, 0, 0.4);
}

.nav-item.active .nav-link::before {
  content: '';
  position: absolute;
  top: -5px;
  left: 50%;
  transform: translateX(-50%);
  width: 6px;
  height: 6px;
  background: #ffd700;
  border-radius: 50%;
  box-shadow: 0 0 15px #ffd700;
  animation: pulseActive 2s infinite;
}

@keyframes pulseActive {
  0% { transform: translateX(-50%) scale(1); opacity: 1; }
  50% { transform: translateX(-50%) scale(1.5); opacity: 0.5; }
  100% { transform: translateX(-50%) scale(1); opacity: 1; }
}


.nav-link:hover::before {
  transform: scaleX(1);
  transform-origin: left;
}

.quote_btn-container {
  transform-style: preserve-3d;
}

.quote_btn-container a {
  transform: translateZ(20px);
}

.cart_number {
  position: absolute;
  top: -8px;
  right: -8px;
  background: linear-gradient(135deg, #ffd700, #ff9000);
  color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: bold;
  transform: translateZ(25px);
  box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.nav_search-btn {
  background: linear-gradient(135deg, #ffd700, #ff9000);
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  transform: translateZ(20px);
  box-shadow: 0 5px 15px rgba(255, 215, 0, 0.2);
}

/* Mobile Responsive Styles */
@media (max-width: 992px) {
  .navbar-collapse {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    padding: 20px;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
  }
}
.hero_area {
    height: auto;
    position: relative;
    background-image: url(images/hero-bg.png);
    background-size: cover;
    background-position: top right;
    background-repeat: no-repeat;
}

  </style>
</body>
</html>
