<?php 
include("header.php");
include("connection.php");

$q = "SELECT o.id, o.total_price, o.order_status, o.created_at, u.username 
      FROM orders o 
      JOIN users u ON o.user_id = u.id";
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
<style>
    .crud-buttons {
    display: flex;
    gap: 5px;
    flex-direction: column;
}

@media (max-width: 472px) {
    .card-header {
    background-color: transparent;
    flex-direction: column;
}
  }
</style>
<div class="main-panel">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Orders List</h4>
            <input type="text" id="orderSearch" class="form-control" placeholder="Search Orders..." style="width: 250px;">
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" id="orderTable">
                <thead class="text-primary">
                  <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['id']; ?></td>
                      <td class="text-dark"><?php echo $row['username']; ?></td>
                      <td class="text-dark">PKR <?php echo $row['total_price']; ?></td>
                      <td class="text-dark"><?php echo $row['order_status']; ?></td>
                      <td class="text-dark"><?php echo $row['created_at']; ?></td>
                      <td class="crud-buttons">
                        <a href="view_order_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-round">View</a>
                        <a href="edit_order.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-round">Edit</a>
                        <a href="delete_order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-round">Delete</a>
                      </td>
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

<script>
  document.getElementById("orderSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#orderTable tbody tr");
    rows.forEach(row => {
      row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
  });
</script>
