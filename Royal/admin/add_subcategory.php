<?php 
include("header.php");
include("connection.php");
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
            <h5 class="card-title">Add Subcategory</h5>
          </div>

          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label>Subcategory Name</label>
                    <input type="text" class="form-control" placeholder="Enter subcategory name" name="subcategory_name" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label>Select Parent Category</label>
                    <select class="form-control" name="parent_id" required>
                      <option value="">Select Main Category</option>
                      <?php
                      $result = mysqli_query($con, "SELECT id, name FROM categories WHERE parent_id IS NULL");
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='".$row['id']."'>".$row['name']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-1">
                  <div class="form-group">
                    <label>Upload Subcategory Image</label>
                    <input type="file" class="form-control u_img" name="subcategory_image" style="opacity: 1;position: relative;top: 6px;right: 0;bottom: 0;left: 0px;width: 100%;height: 100%;z-index: 100;padding: 14px;" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round" name="sub">Add Subcategory</button>
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

if(isset($_POST['sub'])) {
    $subcategory_name = $_POST['subcategory_name'];
    $parent_id = $_POST['parent_id'];

    $image_name = $_FILES['subcategory_image']['name'];
    $tmp_name = $_FILES['subcategory_image']['tmp_name'];
    $folder = "uploads/subcategories/";
    $image_path = $folder . basename($image_name);

    if (move_uploaded_file($tmp_name, $image_path)) {
        $sql = "INSERT INTO categories (name, parent_id, image) VALUES ('$subcategory_name', '$parent_id', '$image_path')";
        $result = mysqli_query($con, $sql);

        if($result) {
            echo "<script>alert('Subcategory added successfully'); window.location.href='view_subcategories.php';</script>";
        } else {
            echo "<script>alert('Failed to add subcategory');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image');</script>";
    }
}
?>
