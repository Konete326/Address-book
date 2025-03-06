<?php 
include("header.php");
include("connection.php");

$q = "SELECT c1.id, c1.name AS subcategory_name, c1.image, c2.name AS parent_name 
      FROM categories c1 
      INNER JOIN categories c2 ON c1.parent_id = c2.id 
      ORDER BY c2.name ASC, c1.name ASC";
$result = mysqli_query($con, $q);
?>


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
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Subcategory List</h4>
            <a href="add_subcategory.php" class="btn btn-primary btn-round text-light add-butttn">Add Subcategory</a>
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" style="margin: auto; width: 80%;">
                <thead class="text-primary">
                  <tr>
                    <th>Subcategory Name</th>
                    <th>Main Category</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { 
                    $subcategory_image = !empty($row['image']) ? "../admin/" . $row['image'] : "images/default.png"; // Default image if none exists
                  ?>
                    <tr>
                      <td><img src="<?php echo $subcategory_image; ?>" alt="Subcategory Image" width="50"></td>
                      <td class="text-dark"><?php echo $row['subcategory_name']; ?></td>
                      <td class="text-dark"><?php echo $row['parent_name']; ?></td>
                      <td class="crud-buttons">
                        <a href="edit_subcategory.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-round">Edit</a>
                        <a href="delete_subcategory.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-round">Delete</a>
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
