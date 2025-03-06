<?php
include("header.php");
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
  if($stmt = $con->prepare($sql)) {
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    if($stmt->execute()) {
      $success_message = "Message sent successfully!";
    } else {
      $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
  } else {
    $error_message = "Error: " . $con->error;
  }
}
?>

<style>
  body{
    background: linear-gradient(135deg, #1a1a1a 0%, #363636 100%);
  }
.contact_section {
  background: linear-gradient(135deg, #1a1a1a 0%, #363636 100%);
  color: #ffffff;
  padding: 100px 0;
  position: relative;
  overflow: hidden;
  margin-top: 4rem;

}
.contact_section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('images/pattern.png');
  opacity: 0.05;
}
.contact_section h2 {
  font-size: 2.5rem;
  font-weight: 600;
  margin-bottom: 2rem;
  text-align: center;
  position: relative;
}
.contact_section h2::after {
  content: '';
  display: block;
  width: 80px;
  height: 4px;
  background: linear-gradient(to right, #f7a600, #ff6c6c);
  margin: 15px auto 0;
  border-radius: 2px;
}
.contact_section form {
  background: rgba(255, 255, 255, 0.05);
  padding: 30px;
  border-radius: 15px;
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
  margin-top: 30px;
}
.contact_section input {
  width: 100%;
  border: 2px solid rgba(255, 255, 255, 0.1);
  height: 55px;
  margin-bottom: 25px;
  padding-left: 25px;
  background-color: rgba(255, 255, 255, 0.9);
  outline: none;
  color: #333;
  border-radius: 10px;
  transition: all 0.3s ease;
  font-size: 16px;
}
.contact_section input:focus {
  border-color: #f7a600;
  box-shadow: 0 0 15px rgba(247, 166, 0, 0.2);
  transform: translateY(-2px);
}
.contact_section input.message-box {
  height: 150px;
  padding-top: 15px;
  resize: none;
}
.contact_section button {
  padding: 15px 50px;
  outline: none;
  border: none;
  border-radius: 30px;
  color: #fff;
  background: linear-gradient(to right, #f7a600, #ff6c6c);
  margin-top: 35px;
  font-weight: 600;
  font-size: 16px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: all 0.3s ease;
  cursor: pointer;
  box-shadow: 0 5px 15px rgba(247, 166, 0, 0.4);
}
.contact_section button:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(247, 166, 0, 0.6);
}
.contact_section button:active {
  transform: translateY(1px);
}
.alert {
  padding: 15px 25px;
  margin-bottom: 25px;
  border: none;
  border-radius: 10px;
  font-weight: 500;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.alert-success {
  color: #0f5132;
  background: linear-gradient(to right, #d1e7dd, #badbcc);
}
.alert-danger {
  color: #842029;
  background: linear-gradient(to right, #f8d7da, #f5c2c7);
}
.map_container {
  height: 100%;
  min-height: 450px;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
}
@media (max-width: 768px) {
  .contact_section {
    padding: 60px 0;
  }
  .contact_section h2 {
    font-size: 2rem;
  }
  .map_container {
    margin-top: 40px;
    min-height: 300px;
  }
}
</style>

<section class="contact_section layout_padding">
  <div class="design-box">
    <img src="images/design-2.png" alt="">
  </div>
  <div class="container">
    <div class="">
      <h2 class="">Contact Us</h2>
    </div>
    <?php if(isset($success_message)): ?>
      <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if(isset($error_message)): ?>
      <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="" method="POST" id="contactForm">
          <div>
            <input type="text" name="name" placeholder="Name" required />
          </div>
          <div>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div>
            <input type="tel" name="phone" placeholder="Phone" required pattern="[0-9]{10}" title="Please enter valid 10 digit phone number" />
          </div>
          <div>
            <input type="text" name="message" class="message-box" placeholder="Message" required />
          </div>
          <div class="d-flex">
            <button type="submit">SEND</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="map_container">
          <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>