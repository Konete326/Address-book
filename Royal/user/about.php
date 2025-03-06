<?php
include("header.php");
?>

<style>
  body{
    background: linear-gradient(135deg,rgb(32, 32, 32) 0%, #2d2d2d 100%);
  }
  .about_section {
    background: linear-gradient(135deg,rgb(29, 29, 29) 0%, #2d2d2d 100%);
    color: #ffffff;
    padding: 100px 0;
    position: relative;
    overflow: hidden;
    margin-top: 4rem;
  }

  .about_section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    z-index: 0;
  }

  .detail-box {
    position: relative;
    z-index: 1;
    padding: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(4px);
    transition: transform 0.3s ease;
  }

  .detail-box:hover {
    transform: translateY(-5px);
  }

  .heading_container h2 {
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 30px;
    background: linear-gradient(45deg, #ffffff, #e0e0e0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .detail-box p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 30px;
  }

  .detail-box a {
    display: inline-block;
    padding: 12px 35px;
    background: linear-gradient(45deg, #4a90e2, #67b8e3);
    color: #ffffff;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: all 0.3s ease;
  }

  .detail-box a:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
  }

  .img-box {
    position: relative;
    z-index: 1;
  }

  .img-box img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
  }

  .img-box:hover img {
    transform: scale(1.02);
  }

  @media (max-width: 768px) {
    .about_section {
      padding: 60px 0;
    }

    .detail-box {
      margin-bottom: 40px;
    }

    .heading_container h2 {
      font-size: 2rem;
    }
  }
</style>

<!-- about section -->
<section class="about_section layout_padding2-top layout_padding-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>About Jewellery Shop</h2>
          </div>
          <p>
            Welcome to our premier jewelry boutique, where timeless elegance meets contemporary design. With over two decades of expertise in fine jewelry, we take pride in curating exquisite pieces that celebrate life's most precious moments. Our master craftsmen combine traditional techniques with modern innovation to create stunning jewelry that reflects both sophistication and style. Each piece in our collection is meticulously crafted using the finest materials, ensuring unparalleled quality and lasting beauty. Whether you're seeking the perfect engagement ring, a statement piece, or a meaningful gift, our dedicated team of jewelry experts is here to guide you through our carefully curated collection.
          </p>
         
        </div>
      </div>
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.png" alt="About Us Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end about section -->

<!-- cosmetics section -->
<section class="about_section layout_padding2-top layout_padding-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/MASCARA-900X1084_2_720x.png" alt="Cosmetics Image" class="img-fluid">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>Premium Cosmetics</h2>
          </div>
          <p>
            Discover our exclusive collection of premium cosmetics and skincare products, crafted with the finest ingredients to enhance your natural beauty. Our expert beauty consultants bring years of industry experience to help you find the perfect products for your unique skin type and concerns. From luxurious skincare routines to professional-grade makeup, we offer a comprehensive range of beauty solutions that combine scientific innovation with natural ingredients. Experience the transformation with our carefully selected products that promise to nurture your skin while delivering exceptional results.
          </p>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end cosmetics section -->

<?php
include("footer.php");
?>