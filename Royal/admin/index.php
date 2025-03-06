<?php 
include("header.php");
include("connection.php");

$user_q = "SELECT COUNT(*) AS total_users FROM users";
$user_result = mysqli_query($con, $user_q);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

$order_q = "SELECT COUNT(*) AS total_orders FROM orders";
$order_result = mysqli_query($con, $order_q);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'];

$revenue_q = "SELECT SUM(total_price) AS total_revenue FROM orders WHERE order_status = 'Completed'";
$revenue_result = mysqli_query($con, $revenue_q);
$revenue_data = mysqli_fetch_assoc($revenue_result);
$total_revenue = $revenue_data['total_revenue'] ? $revenue_data['total_revenue'] : 0;

$product_q = "SELECT COUNT(*) AS total_products FROM products";
$product_result = mysqli_query($con, $product_q);
$product_data = mysqli_fetch_assoc($product_result);
$total_products = $product_data['total_products'];

?>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Admin Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<div class="main-panel">
  <div class="content">
    <div class="row">
      <!-- Total Users -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-single-02 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total Users</p>
                  <p class="card-title"><?php echo $total_users; ?><p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Orders -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-basket text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total Orders</p>
                  <p class="card-title"><?php echo $total_orders; ?><p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Revenue -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-money-coins text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total Revenue</p>
                  <p class="card-title">PKR <?php echo number_format($total_revenue, 2); ?><p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Products -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-box text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total Products</p>
                  <p class="card-title"><?php echo $total_products; ?><p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Latest Orders -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Latest Orders</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $latest_orders_q = "SELECT o.id, o.total_price, o.order_status, o.created_at, u.username 
                                      FROM orders o 
                                      JOIN users u ON o.user_id = u.id 
                                      ORDER BY o.created_at DESC LIMIT 5";
                  $latest_orders_result = mysqli_query($con, $latest_orders_q);
                  while ($order = mysqli_fetch_assoc($latest_orders_result)) { ?>
                    <tr>
                      <td><?php echo $order['id']; ?></td>
                      <td><?php echo $order['username']; ?></td>
                      <td>PKR <?php echo $order['total_price']; ?></td>
                      <td><?php echo $order['order_status']; ?></td>
                      <td><?php echo $order['created_at']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include("footer.php"); ?>
