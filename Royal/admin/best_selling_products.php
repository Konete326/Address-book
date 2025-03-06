<?php 
include("header.php");
include("connection.php");

$q = "SELECT p.name AS product_name, SUM(oi.quantity) AS total_sold, SUM(oi.total_price) AS total_revenue 
      FROM order_items oi
      JOIN products p ON oi.product_id = p.id
      GROUP BY oi.product_id
      ORDER BY total_sold DESC
      LIMIT 10";
$result = mysqli_query($con, $q);
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
            <h4 class="card-title">Top 10 Best Selling Products</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>Product Name</th>
                    <th>Total Quantity Sold</th>
                    <th>Total Revenue</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['product_name']; ?></td>
                      <td class="text-dark"><?php echo $row['total_sold']; ?></td>
                      <td class="text-dark">PKR <?php echo number_format($row['total_revenue'], 2); ?></td>
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
