<?php 
include("header.php");
include("connection.php");

$q = "SELECT * FROM categories WHERE parent_id IS NULL";
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
  <style>
    @media (max-width: 441px) {
      .add-butttn {
    padding: 12px;
}
    }
    @media (max-width:475px){
      .crud-buttons {
    display: flex;
    gap: 5px;
    flex-direction: column;
}
    }
    @media (max-width:356px){
      .card-header {
    background-color: transparent;
    flex-direction: column-reverse;
}
    }
  </style>
</head>

<div class="main-panel">
  <!-- Navbar -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Category List</h4>
            <a href="add_category.php" class="btn btn-primary btn-round text-light add-butttn">Add Category</a>
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" style="margin: auto; width: 80%;">
                <thead class="text-primary">
                  <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['name']; ?></td>
                      <td class="crud-buttons">
                        <a href="edit_category.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-round">Edit</a>
                        <a href="delete_category.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-round">Delete</a>
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
