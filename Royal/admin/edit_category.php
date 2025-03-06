<?php 
include("header.php");
include('connection.php');

$id = $_GET['id'];

$q = "SELECT * FROM `categories` WHERE id=$id";
$row = mysqli_query($con, $q);
$data = mysqli_fetch_assoc($row);
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
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Edit Category</h5>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Category name" name="category_name" value="<?php echo $data['name']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round" name="update">Update Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include("footer.php");

if(isset($_POST['update'])) {
    $category_name = $_POST['category_name'];

    $sql = "UPDATE categories SET name='$category_name' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result) {
        echo "<script>alert('Category updated successfully'); window.location.href='view_categories.php';</script>";
    } else {
        echo "<script>alert('Failed to update category');</script>";
    }
}
?>
