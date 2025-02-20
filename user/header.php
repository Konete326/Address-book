<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Lodge</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
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
  transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  background: white;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  transform-style: preserve-3d;
  perspective: 1500px;
}

.price_container .box:hover {
  transform: translateY(-20px) rotateX(10deg) rotateY(-10deg);
  box-shadow: 30px 30px 50px rgba(0, 0, 0, 0.2);
  animation: glowing 2s infinite;
}

.price_container .box .name h6 {
  color: white;
  margin: 0;
  font-weight: bold;
  animation: wave 2s ease-in-out infinite;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.price_container .box .detail-box a {
  position: relative;
  padding: 12px 30px;
  background: linear-gradient(90deg, #ffd700, #ff9000, #ffd700);
  background-size: 200% 100%;
  color: #333333 !important; /* Added !important to ensure initial color */
  border-radius: 25px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.5s ease, color 0.3s ease; /* Added specific transition for color */
  overflow: hidden;
  animation: shine 3s infinite;
}

.price_container .box .detail-box a:hover {
  transform: translateY(-5px) translateZ(30px);
  letter-spacing: 2px;
  box-shadow: 0 15px 25px rgba(255, 215, 0, 0.4);
  color: white !important; /* Added !important to ensure hover color */
  background: linear-gradient(90deg, #ff9000, #ffd700, #ff9000);
}
.price_container .box .detail-box a::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
  transition: 0.5s;
}

.price_container .box .detail-box a:hover::before {
  left: 100%;
 
}

.price_container .box .img-box img {
  transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
  transform-style: preserve-3d;
}

.price_container .box:hover .img-box img {
  transform: scale(1.2) translateZ(50px) rotateZ(5deg);
}

.price_container .box .detail-box h5 {
  background: linear-gradient(45deg, #ffd700, #ff9000);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 1.8rem;
  font-weight: bold;
  animation: wave 3s ease-in-out infinite;
}

.price_container .box::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(255,215,0,0.1), rgba(255,144,0,0.1));
  border-radius: 15px;
  opacity: 0;
  transition: 0.5s;
}

.price_container .box:hover::after {
  opacity: 1;
  transform: translateZ(-10px);
}
@keyframes cursorEffect {
  0% { transform: scale(0); opacity: 1; }
  100% { transform: scale(1.5); opacity: 0; }
}

.price_container .box {
  /* ... existing properties ... */
  cursor: pointer;
}

.price_container .box::before {
  content: '';
  position: absolute;
  width: 100px;
  height: 100px;
  background: radial-gradient(circle, rgba(255,215,0,0.4) 0%, transparent 70%);
  border-radius: 50%;
  pointer-events: none;
  transform: translate(-50%, -50%);
  opacity: 0;
  mix-blend-mode: screen;
  z-index: 1;
  transition: opacity 0.2s;
}

.price_container .box:hover::before {
  opacity: 1;
}

.price_container .box {
  position: relative;
  overflow: visible;
}

@keyframes typewriter {
  0% { width: 0; opacity: 0; }
  5% { opacity: 1; }
  50% { width: 100%; opacity: 1; }
  95% { opacity: 1; }
  100% { width: 0; opacity: 0; }
}

.price_section h2 {
  font-size: 4.5rem;
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
  </style>
</head>

<body>

<script>
document.querySelectorAll('.price_container .box').forEach(card => {
  card.addEventListener('mousemove', (e) => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    card.style.setProperty('--cursor-x', `${x}px`);
    card.style.setProperty('--cursor-y', `${y}px`);
    
    const glow = card.querySelector('::before');
    if (glow) {
      glow.style.left = `${x}px`;
      glow.style.top = `${y}px`;
    }
  });
});
</script>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Lodge
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cosmatic.php"> Cosmatic</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jewellery.php">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              </ul>

            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="images/cart.png" alt="">
                <div class="cart_number">
                  0
                </div>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->