<?php 
include("header.php");
include("connection.php");

$q = "SELECT u.username AS customer_name, COUNT(o.id) AS total_orders, SUM(o.total_price) AS total_spent 
      FROM orders o
      JOIN users u ON o.user_id = u.id
      GROUP BY o.user_id
      ORDER BY total_spent DESC
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
            <h4 class="card-title">Top 10 Best Customers</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>Customer Name</th>
                    <th>Total Orders Placed</th>
                    <th>Total Amount Spent</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['customer_name']; ?></td>
                      <td class="text-dark"><?php echo $row['total_orders']; ?></td>
                      <td class="text-dark">PKR <?php echo number_format($row['total_spent'], 2); ?></td>
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
