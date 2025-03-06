<?php
include("header.php");
?>
<style>
  .slider_section {
    background-color: #363636;
    color: #ffffff;
    z-index: -1;
  }
  .btn-shop-now {
    display: inline-block;
    padding: 12px 25px;
    background-color: #f7444e;
    color: #ffffff;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  .btn-shop-now:hover {
    background-color: #d63a43;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    text-decoration: none;
  }
  .btn-shop-now:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }
</style>
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="design-box">
        <img src="images/design-1.png" alt="Elegant Design Element">
      </div>
      <div class="slider_number-container d-none d-md-block">
        <div class="number-box">
          <span>01</span>
          <hr>
          <span class="jwel">
            J <br>
            e <br>
            w <br>
            e <br>
            l <br>
            l <br>
            e <br>
            r <br>
            y
          </span>
          <hr>
          <span>02</span>
        </div>
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2><span>Luxury Collection</span><hr></h2>
                    <h1>Timeless Elegance</h1>
                    <p>Discover our exquisite collection of handcrafted jewelry, where each piece tells a unique story of artistry and sophistication. From classic designs to contemporary masterpieces, find your perfect expression of style.</p>
                    <div>
                      <a href="jewellery.php" class="btn-shop-now">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="Luxury Jewelry Collection">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2><span>Designer Series</span><hr></h2>
                    <h1>Bespoke Creations</h1>
                    <p>Experience the pinnacle of jewelry craftsmanship with our designer series. Each piece is meticulously crafted using the finest materials, ensuring unparalleled quality and lasting beauty.</p>
                    <div>
                      <a href="jewellery.php" class="btn-shop-now">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="Designer Jewelry Series">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2><span>Bridal Collection</span><hr></h2>
                    <h1>Forever Moments</h1>
                    <p>Celebrate life's most precious moments with our stunning bridal collection. From engagement rings to wedding bands, find pieces that symbolize your eternal love story.</p>
                    <div>
                      <a href="jewellery.php" class="btn-shop-now">Shop Now</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="Bridal Jewelry Collection">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- item section -->

  <div class="item_section price_section layout_padding2">
    <div class="container">
    <div>
       <h2>
  <span class="word">Our<span class="superscript">Jewellery</span> </span>

</h2>
      </div>
      <div class="item_container">
        <a href="jewellery.php">
          <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-1.png" alt="">
          </div>
          <div class="name">
            <h5>
              Bracelet
            </h5>
          </div>
        </div>
        </a>
        <a href="jewellery.php">
          <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-2.png" alt="">
          </div>
          <div class="name">
            <h5>
              Ring
            </h5>
          </div>
</div></a>
<a href="jewellery.php"><div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/i-3.png" alt="">
          </div>
          <div class="name">
            <h5>
              Earings
            </h5>
          </div>
        </div>
        </a>
      </div>
      <div class="d-flex justify-content-center">
        <a href="jewellery.php" class="price_btn">
          See More
        </a>
      </div>
    </div>
  </div>

  <!-- end item section -->

  <!-- about section -->

  <section class="about_section layout_padding2-top layout_padding-bottom">
    <div class="design-box">
      <img src="images/sell-my-jewelry-form-header.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Jewellery Shop
              </h2>
            </div>
            <p>
            Welcome to our distinguished jewelry establishment, where timeless elegance meets contemporary design. With over decades of expertise in fine jewelry, we take pride in offering an exquisite collection of handcrafted pieces that exemplify superior craftsmanship and unparalleled quality.

Our master jewelers combine traditional techniques with modern innovation to create stunning pieces that capture life's most precious moments. We carefully source the finest gemstones and precious metals, ensuring each piece meets our rigorous standards of excellence. From engagement rings to bespoke creations, our diverse collection caters to discerning clients who appreciate sophisticated design and exceptional quality.

At our jewelry shop, we believe in building lasting relationships with our clients through personalized service, expert guidance, and unwavering commitment to customer satisfaction. Visit us to experience the artistry and elegance that defines our legacy in fine jewelry.
            </p>
            <div>
              <a href="about.php">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
 

  <div class="item_section price_section layout_padding2">
    <div class="container">
    <div>
       <h2>
  <span class="word">Our<span class="superscript">Cosmatic</span> </span>

</h2>
      </div>
      <div class="item_container">
        <a href="cosmetics.php">
          <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/MASCARA-900X1084_2_720x-removebg-preview.png" alt="">
          </div>
          <div class="name">
            <h5>
              Eye Products
            </h5>
          </div>
        </div>
        </a>
        <a href="cosmetics.php">
          <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/EYELIGHTS-PPAGE-900x1084-Eclipse-removebg-preview.png" alt="">
          </div>
          <div class="name">
            <h5>
              Face Products
            </h5>
          </div>
</div></a>
<a href="cosmetics.php"><div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="images/WWD-RMS-RED-900X1084_720x-removebg-preview.png" alt="">
          </div>
          <div class="name">
            <h5>
              Lip Products
            </h5>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <!-- end item section -->
      <div class="d-flex justify-content-center">
        <a href="cosmetics.php" class="price_btn">
          See More
        </a>
      </div>
    </div>
  </section>

  <!-- end price section -->
  <section class="about_section layout_padding2-top layout_padding-bottom">
    <div class="design-box">
      <img src="images/sell-my-jewelry-form-header.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Cosmatic Shop
              </h2>
            </div>
            <p>
            Welcome to our premier cosmetic destination, where beauty meets expertise. With years of experience in the beauty industry, we take pride in curating a comprehensive collection of high-quality cosmetic products from renowned brands worldwide. Our dedicated team of beauty professionals is committed to helping you discover the perfect products for your unique needs.

We believe in the transformative power of quality cosmetics and understand that every individual's beauty journey is unique. That's why we offer personalized consultations, expert advice, and a carefully selected range of skincare, makeup, and beauty essentials that meet our stringent quality standards. Your satisfaction and confidence are our top priorities.
            </p>
            <div>
              <a href=" about.php">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/MASCARA-900X1084_2_720x-removebg-preview.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ring section -->

  <section class="ring_section layout_padding">
    <div class="design-box">
      <img src="images/design-1.png" alt="">
    </div>
    <div class="container">
      <div class="ring_container layout_padding2">
        <div class="row">
          <div class="col-md-5">
            <div class="detail-box">
              <h4>
                special
              </h4>
              <h2>
                Wedding Ring
              </h2>
              <a href="">
                Buy Now
              </a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img src="images/ring-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end ring section -->

  <!-- client section -->

  <section class="client_section">
    <div class="container">
      <div class="heading_container text-center mb-5">
        <h2>Customer Testimonials</h2>
       
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="images/client.png" alt="Sarah Johnson" class="rounded-circle shadow">
                </div>
                <div class="name">
                  <h5>Sarah Johnson</h5>
                  <h6>Jewelry Enthusiast</h6>
                </div>
              </div>
              <div class="detail-box">
                <p class="testimonial-text">
                  "The craftsmanship of their jewelry is absolutely stunning! I purchased an engagement ring here and the attention to detail is remarkable. The staff was incredibly helpful in finding the perfect piece that matched my style and budget."
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="images/client.png" alt="Michael Chen" class="rounded-circle shadow">
                </div>
                <div class="name">
                  <h5>Michael Chen</h5>
                  <h6>Loyal Customer</h6>
                </div>
              </div>
              <div class="detail-box">
                <p class="testimonial-text">
                  "I've been a customer for years and their collection never disappoints. The quality of their pieces is exceptional, and their customer service goes above and beyond. Highly recommend for anyone looking for unique, high-quality jewelry."
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container">
              <div class="client-id">
                <div class="img-box">
                  <img src="images/client.png" alt="Emily Martinez" class="rounded-circle shadow">
                </div>
                <div class="name">
                  <h5>Emily Martinez</h5>
                  <h6>Fashion Blogger</h6>
                </div>
              </div>
              <div class="detail-box">
                <p class="testimonial-text">
                  "Their cosmetic collection is simply amazing! The products are of premium quality and the variety is impressive. The beauty consultants are knowledgeable and helped me find the perfect products for my skin type."
                </p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>

  <!-- end client section -->



  <?php
  include("footer.php");
  ?>
