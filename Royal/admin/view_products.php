<?php 
include("header.php");
include("connection.php");

$q = "SELECT p.id, p.name, p.price, p.stock, p.image_url, p.description, 
             c1.name AS subcategory_name, c2.name AS main_category_name
      FROM products p 
      JOIN categories c1 ON p.category_id = c1.id
      LEFT JOIN categories c2 ON c1.parent_id = c2.id";
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
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Products List</h4>
            <input type="text" id="productSearch" class="form-control search-bar" placeholder="Search Products..." style="width: 250px;">
            <a href="add_product.php" class="btn btn-primary btn-round text-light add-btn">Add Product</a>
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" id="productTable">
                <thead class="text-primary">
                  <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['name']; ?></td>
                      <td class="text-dark">
                        <?php 
                          if ($row['main_category_name'] != "") {
                            echo $row['main_category_name'] . " → " . $row['subcategory_name']; 
                          } else {
                            echo $row['subcategory_name']; 
                          }
                        ?>
                      </td>
                      <td class="text-dark">PKR <?php echo $row['price']; ?></td>
                      <td class="text-dark"><?php echo $row['stock']; ?></td>
                      <td class="text-dark">
                        <div class="description-box">
                          <?php echo $row['description']; ?>
                        </div>
                      </td> 
                      <td>
                        <img src="<?php echo $row['image_url']; ?>" alt="Product Image" class="product-img">
                      </td>
                      <td class="crud-buttons">
                        <a href="edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-round">Edit</a>
                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-round">Delete</a>
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

<style>
  .description-box {
    max-width: 300px;
    word-wrap: break-word;
    white-space: normal;
  }

  .product-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
  }

  @media (max-width: 768px) {
    .description-box {
      max-width: 200px;
    }
  }

  @media (max-width: 576px) {
    .description-box {
      max-width: 150px;
    }
  }
  @media (max-width: 658px) {
    .search-bar {
    width: 203px !important;
}
h4{
  font-size: 1.300em;
}
.add-btn{
  padding: 10px;
}
  }
  @media (max-width:509px){
    .card-header{
    flex-direction: column-reverse;
}
.search-bar{
  width: 272px !important;
}
h4{
  font-size: 2.3em;
}
.add-btn{
  margin-left: 177px;
}
  }
  .crud-buttons {
    display: flex;
    gap: 5px;
    flex-direction: column;
}
</style>

<script>
  document.getElementById("productSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#productTable tbody tr");
    rows.forEach(row => {
      row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
  });
</script>
