<?php 
include("header.php");
include("connection.php");

$id = $_GET['id'];

$q = "SELECT * FROM categories WHERE id = $id";
$row = mysqli_query($con, $q);
$data = mysqli_fetch_assoc($row);

$main_c_q = "SELECT * FROM categories WHERE parent_id IS NULL";
$main_c_result = mysqli_query($con, $main_c_q);

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
            <h5 class="card-title">Edit Subcategory</h5>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data"> 
              
              <div class="mb-3">
                <label>Subcategory Name</label>
                <input type="text" class="form-control" name="subcategory_name" value="<?php echo $data['name']; ?>" required>
              </div>

              <div class="mb-3">
                <label>Parent Category</label>
                <select name="parent_id" class="form-select">
                  <option value="">Select Parent Category</option>
                  <?php while ($row = mysqli_fetch_assoc($main_c_result)) { ?>
                    <option value="<?php echo $row['id']; ?>" 
                      <?php if ($data['parent_id'] == $row['id']) echo 'selected'; ?>>
                      <?php echo $row['name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label>Upload New Image (Optional)</label>
                <input type="file" class="form-control" name="subcategory_image">
              </div>

              <div class="mb-3">
                <label>Current Image:</label><br>
                <img src="<?php echo $data['image']; ?>" alt="Subcategory Image" width="100"><br><br>
              </div>

              <button type="submit" class="btn btn-primary btn-round" name="update">Update Subcategory</button>
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
    $subcategory_name = $_POST['subcategory_name'];
    $parent_id = $_POST['parent_id'];

    $image_name = $_FILES['subcategory_image']['name'];
    $tmp_name = $_FILES['subcategory_image']['tmp_name'];
    $folder = "uploads/subcategories/";

    if (!empty($image_name)) {
        $image_path = $folder . basename($image_name);
        move_uploaded_file($tmp_name, $image_path);
        $sql = "UPDATE categories SET name='$subcategory_name', parent_id='$parent_id', image='$image_path' WHERE id=$id";
    } else {
        $sql = "UPDATE categories SET name='$subcategory_name', parent_id='$parent_id' WHERE id=$id";
    }

    $result = mysqli_query($con, $sql);

    if($result) {
        echo "<script>alert('Subcategory updated successfully'); window.location.href='view_subcategories.php';</script>";
    } else {
        echo "<script>alert('Failed to update subcategory');</script>";
    }
}
?>
