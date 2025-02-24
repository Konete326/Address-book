<?php
include('header.php');
?>

<section class="cart_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Shopping Cart</h2>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="cart-items-container">
          <!-- Sample Cart Items (Replace with dynamic data later) -->
          <div class="cart-item">
            <div class="row align-items-center">
              <div class="col-md-2">
                <img src="images/p-1.png" alt="Product" class="img-fluid rounded">
              </div>
              <div class="col-md-4">
                <h5>Diamond Ring</h5>
                <p class="text-muted">SKU: JW001</p>
              </div>
              <div class="col-md-2">
                <span class="price">$999</span>
              </div>
              <div class="col-md-2">
                <div class="quantity-selector">
                  <button class="btn btn-sm btn-outline-secondary quantity-btn" data-action="decrease">-</button>
                  <input type="number" class="form-control quantity-input" value="1" min="1">
                  <button class="btn btn-sm btn-outline-secondary quantity-btn" data-action="increase">+</button>
                </div>
              </div>
              <div class="col-md-2 text-end">
                <button class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash"></i> Remove</button>
              </div>
            </div>
          </div>

          <div class="cart-item mt-3">
            <div class="row align-items-center">
              <div class="col-md-2">
                <img src="images/i-2.png" alt="Product" class="img-fluid rounded">
              </div>
              <div class="col-md-4">
                <h5>Gold Necklace</h5>
                <p class="text-muted">SKU: JW002</p>
              </div>
              <div class="col-md-2">
                <span class="price">$1,299</span>
              </div>
              <div class="col-md-2">
                <div class="quantity-selector">
                  <button class="btn btn-sm btn-outline-secondary quantity-btn" data-action="decrease">-</button>
                  <input type="number" class="form-control quantity-input" value="1" min="1">
                  <button class="btn btn-sm btn-outline-secondary quantity-btn" data-action="increase">+</button>
                </div>
              </div>
              <div class="col-md-2 text-end">
                <button class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash"></i> Remove</button>
              </div>
            </div>
          </div>
          
          <div class="text-end mt-3">
            <button class="btn btn-primary update-cart">Update Cart</button>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cart-summary">
          <h4>Cart Summary</h4>
          <div class="summary-item d-flex justify-content-between">
            <span>Subtotal:</span>
            <span>$2,298</span>
          </div>
          <div class="summary-item d-flex justify-content-between">
            <span>Shipping:</span>
            <span>$0</span>
          </div>
          <div class="summary-item d-flex justify-content-between">
            <span>Tax:</span>
            <span>$229.80</span>
          </div>
          <hr>
          <div class="summary-item d-flex justify-content-between">
            <strong>Total:</strong>
            <strong>$2,527.80</strong>
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
  background-color: #f8f9fa;
}

.cart-items-container {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.cart-item {
  padding: 15px 0;
  border-bottom: 1px solid #eee;
}

.cart-item:last-child {
  border-bottom: none;
}

.cart-item img {
  max-width: 80px;
  border: 1px solid #eee;
}

.quantity-selector {
  display: flex;
  align-items: center;
  gap: 5px;
}

.quantity-selector input {
  width: 50px;
  text-align: center;
}

.cart-summary {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.summary-item {
  margin: 10px 0;
  color: #666;
}

.btn-primary {
  background-color: #f0b23e;
  border-color: #f0b23e;
}

.btn-primary:hover {
  background-color: #d99b2b;
  border-color: #d99b2b;
}

.price {
  color: #f0b23e;
  font-weight: bold;
}
</style>

<?php
include('footer.php');
?>
<script>
$(document).ready(function() {
    // Handle quantity increase/decrease
    $('.quantity-btn').click(function() {
        const input = $(this).siblings('.quantity-input');
        const currentValue = parseInt(input.val());
        
        if ($(this).data('action') === 'increase') {
            input.val(currentValue + 1);
        } else if ($(this).data('action') === 'decrease' && currentValue > 1) {
            input.val(currentValue - 1);
        }
        
        calculateTotal();
    });

    // Handle manual quantity input
    $('.quantity-input').change(function() {
        if ($(this).val() < 1) {
            $(this).val(1);
        }
        calculateTotal();
    });

    // Handle remove item
    $('.remove-item').click(function() {
        $(this).closest('.cart-item').fadeOut(300, function() {
            $(this).remove();
            calculateTotal();
        });
    });

    // Handle update cart
    $('.update-cart').click(function() {
        // Here you would typically send an AJAX request to update the cart in the backend
        alert('Cart updated successfully!');
    });

    // Calculate total
    function calculateTotal() {
        let subtotal = 0;
        
        $('.cart-item').each(function() {
            const price = parseFloat($(this).find('.price').text().replace('$', '').replace(',', ''));
            const quantity = parseInt($(this).find('.quantity-input').val());
            subtotal += price * quantity;
        });

        const tax = subtotal * 0.10;
        const total = subtotal + tax;

        $('.summary-item:eq(0) span:last').text('$' + subtotal.toFixed(2));
        $('.summary-item:eq(2) span:last').text('$' + tax.toFixed(2));
        $('.summary-item:eq(3) strong:last').text('$' + total.toFixed(2));
    }
});
</script>