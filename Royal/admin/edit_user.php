<?php 
include("header.php");
include("connection.php");

$id = $_GET['id'];
$q = "SELECT * FROM users WHERE id = $id";
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
                <h5 class="card-title">Edit User</h5>
              </div>
              <div class="card-body">
                <form method="post">
                 
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $data['username']; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $data['email']; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="sub" class="btn btn-primary btn-round">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</div>

<?php 
include("footer.php");

if (isset($_POST['sub'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('User updated successfully'); window.location.href='view_users.php';</script>";
    } else {
        echo "<script>alert('Failed to update user');</script>";
    }
}
?>
