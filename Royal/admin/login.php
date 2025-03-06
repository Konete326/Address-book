<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Admin Login | PolluxUI</title>
  
  <!-- ✅ Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  
  <!-- ✅ Bootstrap & CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />


  <style>

    body {
      background: linear-gradient(135deg, #1e1e2f, #2a2a3b);
      color: #fff;
      font-family: 'Montserrat', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      width: 350px;
      text-align: center;
      transition: 0.3s ease-in-out;
    }

    .login-box:hover {
      transform: translateY(-5px);
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.4);
    }

    .login-box h4 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .login-box h6 {
      font-weight: 300;
      color: #bbb;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      padding: 12px;
      border-radius: 8px;
      transition: 0.3s ease-in-out;
    }

    .form-control:focus {
    background: rgba(255, 255, 255, 0.3);
    outline: none;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    color: white;
}
    .btn-primary {
      background: #ffbf00;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      transition: 0.3s ease-in-out;
    }

    .btn-primary:hover {
      background: #d9a600;
      transform: scale(1.05);
    }

    .text-primary {
      color: #ffbf00 !important;
      transition: 0.3s ease-in-out;
    }

    .text-primary:hover {
      color: #d9a600 !important;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <div class="brand-logo">
      <img src="assets/img/logo/logo-2.png" alt="logo" width="200">
    </div>
    <h4>Welcome Back!</h4>
    <h6 class="font-weight-light">Sign in to continue</h6>

    <form class="pt-3" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Username" required>
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control" name="pass" placeholder="Password" required>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block" name="login">SIGN IN</button>
      </div>
      <div class="text-center mt-4">
        <span>Don't have an account? <a href="signup.php" class="text-primary">Create</a></span>
      </div>
    </form>
  </div>
</body>

</html>

<?php
session_start();
include('connection.php');

if(isset($_POST['login'])) {
    $un = $_POST['name'];
    $pas = $_POST['pass'];

    $q = "SELECT * FROM users WHERE username='$un' AND password='$pas'";
    $run = mysqli_query($con, $q);

    $row = mysqli_num_rows($run);
    
    if($row > 0) {
        $data = mysqli_fetch_assoc($run);
        $_SESSION['AdminName'] = $un; 
    
        $_SESSION['Admin_ID'] = $data['id'];
        $_SESSION['role_id'] = $data['role_id_fk'];
        echo "<script>alert('Logged in successfully'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location.href='login.php';</script>";
    }
}
?>

