<?php 
include("header.php");
include("connection.php");

$id = $_GET['id'];

$order_q = "SELECT o.*, u.username, u.email, u.address, u.cell_phone FROM orders o 
            JOIN users u ON o.user_id = u.id 
            WHERE o.id = $id";
$order_result = mysqli_query($con, $order_q);
$order = mysqli_fetch_assoc($order_result);

$order_items_q = "SELECT oi.*, p.name AS product_name FROM order_items oi 
                  JOIN products p ON oi.product_id = p.id 
                  WHERE oi.order_id = $id";
$order_items_result = mysqli_query($con, $order_items_q);
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Order Details - #<?php echo $order['id']; ?></h4>
          </div>
          <div class="card-body">
            <h5>Customer Details</h5>
            <p><strong>Name:</strong> <?php echo $order['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $order['cell_phone']; ?></p>
            <p><strong>Address:</strong> <?php echo $order['address']; ?></p>

            <hr>

            <h5>Order Summary</h5>
            <p><strong>Total Price:</strong> PKR <?php echo $order['total_price']; ?></p>
            <p><strong>Status:</strong> <?php echo $order['order_status']; ?></p>
            <p><strong>Order Date:</strong> <?php echo $order['created_at']; ?></p>

            <hr>

            <h5>Ordered Products</h5>
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($item = mysqli_fetch_assoc($order_items_result)) { ?>
                    <tr>
                      <td><?php echo $item['product_name']; ?></td>
                      <td><?php echo $item['quantity']; ?></td>
                      <td>$<?php echo $item['price']; ?></td>
                      <td>$<?php echo $item['total_price']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>

            <hr>

            <form method="post">
              <label><strong>Update Order Status:</strong></label>
              <select name="order_status" class="form-control">
                <option value="Pending" <?php if($order['order_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Processing" <?php if($order['order_status'] == 'Processing') echo 'selected'; ?>>Processing</option>
                <option value="Completed" <?php if($order['order_status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                <option value="Cancelled" <?php if($order['order_status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
              </select>
              <br>
              <button type="submit" class="btn btn-success">Update Status</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php");

if (isset($_POST['order_status'])) {
    $status = $_POST['order_status'];
    $update_q = "UPDATE orders SET order_status = '$status' WHERE id = $id";
    mysqli_query($con, $update_q);
    echo "<script>alert('Order status updated!'); window.location.href='view_order_details.php?id=$id';</script>";
}
?>
