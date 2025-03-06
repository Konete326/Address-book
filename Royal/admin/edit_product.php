<?php 
include("header.php");
include("connection.php");

$id = $_GET['id'];

$q = "SELECT * FROM products WHERE id = $id";
$row = mysqli_query($con, $q);
$data = mysqli_fetch_assoc($row);

$category_id = $data['category_id'];
$category_q = "SELECT * FROM categories WHERE id = $category_id";
$category_result = mysqli_query($con, $category_q);
$category_data = mysqli_fetch_assoc($category_result);

$main_category_id = $category_data['id']; 
$sub_category_id = "";

if ($category_data['parent_id'] != NULL) {
    $sub_category_id = $category_data['id'];
    $main_category_id = $category_data['parent_id'];
}

$main_c_q = "SELECT * FROM categories WHERE parent_id IS NULL";
$main_c_result = mysqli_query($con, $main_c_q);

$sub_c_q = "SELECT * FROM categories WHERE parent_id IS NOT NULL";
$sub_c_result = mysqli_query($con, $sub_c_q);
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
    .form-group input[type=file] {
    opacity: 1;
    position: relative;
    top: 6px;
    right: 0;
    bottom: 0;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 100;
    padding: 14px;
}
  </style>
</head>

<div class="main-panel">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Edit Product</h5>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label>Product Name</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $data['name']; ?>" required>
              </div>

              <div class="mb-3">
                <label>Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo $data['price']; ?>" required>
              </div>

              <div class="mb-3">
                <label>Stock</label>
                <input type="number" class="form-control" name="stock" value="<?php echo $data['stock']; ?>" required>
              </div>

              <div class="mb-3">
                <label>Main Category</label>
                <select name="main_category_id" class="form-select">
                  <option value="">Select Main Category</option>
                  <?php while ($row = mysqli_fetch_assoc($main_c_result)) { ?>
                    <option value="<?php echo $row['id']; ?>" 
                      <?php if ($main_category_id == $row['id']) echo 'selected'; ?>>
                      <?php echo $row['name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label>Subcategory</label>
                <select name="sub_category_id" class="form-select">
                  <option value="">Select Subcategory</option>
                  <?php while ($row = mysqli_fetch_assoc($sub_c_result)) { ?>
                    <option value="<?php echo $row['id']; ?>" 
                      <?php if ($sub_category_id == $row['id']) echo 'selected'; ?>>
                      <?php echo $row['name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label>Product Image</label>
                <input type="file" class="form-control" name="product_image">
              </div>
              <label>Current Image</label><br>
              <img src="<?php echo $data['image_url']; ?>" width="100"><br><br>

              <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" rows="3" name="description"><?php echo $data['description']; ?></textarea>
              </div>

              <button type="submit" class="btn btn-primary" name="update">Update Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include("footer.php");

if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $main_category_id = $_POST['main_category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $description = $_POST['description'];

    if ($sub_category_id != "") {
        $category_id = $sub_category_id;
    } else {
        $category_id = $main_category_id;
    }


    $image_name = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    $folder = "uploads/";

    if ($image_name != "") {
        $image_path = $folder . basename($image_name);
        if (move_uploaded_file($tmp_name, $image_path)) {
            $sql = "UPDATE products SET 
                    name = '$product_name', 
                    price = '$price', 
                    stock = '$stock', 
                    category_id = '$category_id', 
                    description = '$description', 
                    image_url = '$image_path' 
                    WHERE id = $id";
        } else {
            echo "<script>alert('Failed to upload new image');</script>";
            exit;
        }
    } else {
        $sql = "UPDATE products SET 
                name = '$product_name', 
                price = '$price', 
                stock = '$stock', 
                category_id = '$category_id', 
                description = '$description' 
                WHERE id = $id";
    }

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Product updated successfully'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Failed to update product');</script>";
    }
}
?>
