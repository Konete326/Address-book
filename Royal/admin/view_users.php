<?php 
include("header.php");
include("connection.php");

$q = "SELECT * FROM users";
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
    @media (max-width:443px){
      .card-header{
        flex-direction: column;
      }
    }
    @media (max-width:589px){
      .crud-buttons {
    display: flex;
    gap: 5px;
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
            <h4 class="card-title">Users List</h4>
            <input type="text" id="userSearch" class="form-control" placeholder="Search Users..." style="width: 250px;">
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" id="userTable">
                <thead class="text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo $row['id']; ?></td>
                      <td class="text-dark"><?php echo $row['username']; ?></td>
                      <td class="text-dark"><?php echo $row['email']; ?></td>
                      <td class="crud-buttons">
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-round">Edit</a>
                        <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-round">Delete</a>
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
  document.getElementById("userSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#userTable tbody tr");
    rows.forEach(row => {
      row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
  });
</script>
